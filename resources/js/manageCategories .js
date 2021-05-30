export const initCategory = () => {
    var text = $(".status-body-text");
    btn = $(".btn-overflow");
    h = text[0] && text[0].scrollHeight;
    if (h > 150) {
        btn.addClass("less");
        btn.css("display", "block");
    }

    var categorie = $("#categorie option:selected").text();

    if (categorie != "Catégories") {
        var cat_id = $("#categorie option:selected").val();
        var subcat_id = $("#id_subcat").val();

        $.get("/json-sousCategorie?idCat=" + cat_id, function (data) {
            $("#sousCat").empty();
            $("#sousCat").append(
                '<option value="" disable="true" selected="true">-- Sélectionner --</option>'
            );

            $.each(data, function (index, sousCatObj) {
                if (subcat_id != "") {
                    if (subcat_id == sousCatObj.idSousCat) {
                        $("#sousCat").append(
                            '<option selected value="' +
                                sousCatObj.idSousCat +
                                '">' +
                                sousCatObj.sousCat +
                                "</option>"
                        );
                    } else {
                        $("#sousCat").append(
                            '<option value="' +
                                sousCatObj.idSousCat +
                                '">' +
                                sousCatObj.sousCat +
                                "</option>"
                        );
                    }
                } else {
                    $("#sousCat").append(
                        '<option value="' +
                            sousCatObj.idSousCat +
                            '">' +
                            sousCatObj.sousCat +
                            "</option>"
                    );
                }
            });

            $(".sousCat").prop("disabled", false);
            var nameSousCat = $("#sousCat option:selected").text();
            switch (nameSousCat) {
                case "Automobiles":
                case "Camions":
                case "Remorques":
                case "Engin":
                case "Tracteurs":
                case "Motos - Scooters":
                case "Bus":
                case "Bateaux":
                    $("#vehicule").show();
                    $(
                        "#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event"
                    ).hide();
                    $(".state").hide();
                    break;

                case "Téléphones":
                    $("#phone, .state").show();
                    $(
                        "#vehicule, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event"
                    ).hide();
                    break;

                case "Stockage":
                    $("#stockage, .state").show();
                    $(
                        "#vehicule, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event"
                    ).hide();
                    break;

                case "Ordinateurs":
                    $("#ordinateurs, .state").show();
                    $(
                        "#vehicule, #stockage, #phone, #offresEmploi, #demandesEmploi, #immobilier, #event"
                    ).hide();
                    break;

                case "Offres d'emploi":
                    $("#offresEmploi").show();
                    $(
                        "#vehicule, #stockage, #phone, #ordinateurs, #demandesEmploi, #immobilier, #event"
                    ).hide();
                    $(".state").hide();
                    break;

                case "Demandes d'emploi":
                    $("#demandesEmploi").show();
                    $(
                        "#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #event"
                    ).hide();
                    $(".state").hide();
                    break;

                case "Événements":
                    $("#event").show();
                    $(
                        "#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi"
                    ).hide();
                    $(".state").hide();
                    break;

                case "Vente":
                case "Cherche Achat":
                case "Location":
                case "Cherche Location":
                    $("#immobilier").show();
                    $(
                        "#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event"
                    ).hide();
                    $(".state").hide();
                    break;

                case "hideState":
                    $(".state").hide();
                    $(".details").hide();
                    break;

                default:
                    // Hiding All Elements
                    $(".details").hide();
                    $(".state").hide();
                    break;
            }
        });
    } else {
        $(".details").hide();
        $(".state").hide();
    }
};

// Load Sous catégorie from catégorie

$("#categorie").on("change", function (e) {
    var cat_id = e.target.value;
    if (cat_id == "") {
        $("#sousCat").attr("disabled", "disabled");
        $(".details").hide();
    } else {
        $.get("/json-sousCategorie?idCat=" + cat_id, function (data) {
            $("#sousCat").empty();
            $("#sousCat").append(
                '<option value="" disable="true" selected="true">-- Sélectionner --</option>'
            );

            $.each(data, function (index, sousCatObj) {
                $("#sousCat").append(
                    '<option value="' +
                        sousCatObj.idSousCat +
                        '">' +
                        sousCatObj.sousCat +
                        "</option>"
                );
            });
            $("#sousCat").removeAttr("disabled");
        });
    }
});

$("#deleteAds").click(function (e) {
    var number = $(".selectbox:checked").length;
    if ($("#checkAll").prop("checked") == false) {
        if (number == "0") {
            swal(
                "Attention !",
                "Vous n'avez sélectionné aucune annonce.",
                "warning"
            );
        } else {
            e.preventDefault();
            swal({
                title: "Êtes-vous sûr?",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $("#formSubmit").submit();
                }
            });
        }
    } else {
        e.preventDefault();
        swal({
            title: "Êtes-vous sûr?",
            icon: "warning",
            buttons: ["Annuler", "Oui"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $("#formSubmit").submit();
            }
        });
    }
});
