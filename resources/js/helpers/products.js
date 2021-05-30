$("#new-products").owlCarousel({
    navigation: true,
    pagination: true,
    slideSpeed: 1000,
    stopOnHover: true,
    autoPlay: true,
    items: 5,
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1],
});

$("#search-input-phone").click(function () {
    $(".wilaya, .btn-search").show();
});

$("#sousCat").change(function () {
    var nameSousCat;
    var categorie = $("#categorie option:selected").text();

    if (
        categorie == "Animaux" ||
        categorie == "Services" ||
        categorie == "Voyages"
    ) {
        nameSousCat = "hideState";
    } else {
        nameSousCat = $("#sousCat option:selected").text();
    }

    // Récupérer le nom de la SOus Catégories pour afficher ces champs appropriés

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
                "#vehicule, #stockage, #phone, .state, #ordinateurs, #demandesEmploi, #immobilier, #event"
            ).hide();
            break;

        case "Demandes d'emploi":
            $("#demandesEmploi").show();
            $(
                "#vehicule, #stockage, #phone, .state, #ordinateurs, #offresEmploi, #immobilier, #event"
            ).hide();
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

$("#checkAll").click(function () {
    $(".selectbox").prop("checked", $(this).prop("checked"));
});

$("#deleteAll").click(function (e) {
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
                text: "Une fois supprimé, vous ne pourrez plus récupérer vos annonces!",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $("#deleteAdsForm").submit();
                }
            });
        }
    } else {
        e.preventDefault();
        swal({
            title: "Êtes-vous sûr?",
            text: "Une fois supprimé, vous ne pourrez plus récupérer vos annonces!",
            icon: "warning",
            buttons: ["Annuler", "Oui"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $("#deleteAdsForm").submit();
            }
        });
    }
});
