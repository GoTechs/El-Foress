// **************************   SUBMIT FORM AJAX *******************************
$(document).ready(function () {
    var fileList = [];
    var num = 2;
    $(".pro-image").change(function () {
        if (window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                fileList.push(file);
                if (!file.type.match("image")) continue;
                var picReader = new FileReader();
                picReader.readAsDataURL(file);
                picReader.addEventListener("load", function (event) {
                    var picFile = event.target;
                    var html =
                        '<div class="preview-image preview-show-' +
                        num +
                        '">' +
                        '<div class="image-cancel" data-no="' +
                        num +
                        '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' +
                        num +
                        '" src="' +
                        picFile.result +
                        '"></div>' +
                        "</div>";
                    output.prepend(html);
                    num = num + 1;
                });
            }
        }
    });

    $("#submit").click(function (e) {
        e.preventDefault();
        var myForm = document.getElementById("addAd");
        formData = new FormData(myForm);
        fileList.forEach((file) => formData.append("fileToUpload[]", file));
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/insertAd",
            method: "post",
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (data) {
                if ($.isEmptyObject(data.success)) {
                    $(
                        ".sousCat-error,.Cat-error,.titl-error,.desc-error,.wilaya-error,.condition-error"
                    ).empty();
                    $.each(data.errors, function (key, value) {
                        if (key == "categorie") {
                            $(".Caterror").addClass("has-error");
                            $(".Cat-error").append(value);
                        }
                        if (key == "sousCat") {
                            $(".sousCaterror").addClass("has-error");
                            $(".sousCat-error").append(value);
                        }
                        if (key == "Adtitle") {
                            $(".titlerror").addClass("has-error");
                            $(".titl-error").append(value);
                        }
                        if (key == "descrp") {
                            $(".descerror").addClass("has-error");
                            $(".desc-error").append(value);
                        }
                        if (key == "wilaya") {
                            $(".wilayaerror").addClass("has-error");
                            $(".wilaya-error").append(value);
                        }
                        if (key == "condition") {
                            $(".condition-error").append(value);
                        }
                        $("html, body").animate(
                            {
                                scrollTop: 0,
                            },
                            "slow"
                        );
                    });
                } else {
                    document.location.href = "/my-ads";
                }
            },
            complete: function (data) {
                // Hide image container
                $("#loading").hide();
            },
        });
    });

    $("#submitUpdate").click(function (e) {
        e.preventDefault();
        var id = document.getElementById("idAnnonce");
        var myForm = document.getElementById("addAd");
        formData = new FormData(myForm);
        fileList.forEach((file) => formData.append("fileToUpload[]", file));

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/update-AD/" + id,
            method: "post",
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (data) {
                if ($.isEmptyObject(data.success)) {
                    $(
                        ".sousCat-error,.Cat-error,.titl-error,.desc-error,.wilaya-error"
                    ).empty();
                    $.each(data.errors, function (key, value) {
                        if (key == "Adtitle") {
                            $(".titlerror").addClass("has-error");
                            $(".titl-error").append(value);
                        }
                        if (key == "descrp") {
                            $(".descerror").addClass("has-error");
                            $(".desc-error").append(value);
                        }
                        if (key == "wilaya") {
                            $(".wilayaerror").addClass("has-error");
                            $(".wilaya-error").append(value);
                        }
                        $("html, body").animate(
                            {
                                scrollTop: 0,
                            },
                            "slow"
                        );
                    });
                } else {
                    document.location.href = "/my-ads";
                }
            },
            complete: function (data) {
                // Hide image container
                $("#loading").hide();
            },
        });
    });

    $(".preview-images-zone").sortable();

    $(document).on("click", ".image-cancel", function () {
        let no = $(this).data("no");
        $(".preview-image.preview-show-" + no).remove();
    });
});
