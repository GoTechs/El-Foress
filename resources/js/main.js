//Bootstrap Select

jQuery(document).ready(function ($) {
    $('.selectpicker').selectpicker({
        style: 'btn-select',
        size: 4
    });
});

//CounterUp
jQuery(document).ready(function ($) {
    $('.counter').counterUp({
        delay: 1,
        time: 800
    });
});

//WOW Scroll Spy
var wow = new WOW({
    //disabled for mobile
    mobile: false
});
wow.init();

// Page Loader
$(window).load(function () {
    "use strict";
    $('#loader').fadeOut();
});


/* ==========================================================================
   New Products Owl Carousel
   ========================================================================== */
$("#new-products").owlCarousel({
    navigation: true,
    pagination: true,
    slideSpeed: 1000,
    stopOnHover: true,
    autoPlay: true,
    items: 5,
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1]
});

$('#search-input-phone').click(function () {
    $('.wilaya, .btn-search').show();
});

$("#sousCat").change(function () {

    var nameSousCat;
    var categorie = $("#categorie option:selected").text();

    if (categorie == "Animaux" || categorie == "Services" || categorie == "Voyages") {

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
            $('#vehicule').show();
            $('#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
            $('.state').hide();
            break;

        case "Téléphones":
            $('#phone, .state').show();
            $('#vehicule, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
            break;

        case "Stockage":
            $('#stockage, .state').show();
            $('#vehicule, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
            break;

        case "Ordinateurs":
            $('#ordinateurs, .state').show();
            $('#vehicule, #stockage, #phone, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
            break;

        case "Offres d'emploi":
            $('#offresEmploi').show();
            $('#vehicule, #stockage, #phone, .state, #ordinateurs, #demandesEmploi, #immobilier, #event').hide();
            break;

        case "Demandes d'emploi":
            $('#demandesEmploi').show();
            $('#vehicule, #stockage, #phone, .state, #ordinateurs, #offresEmploi, #immobilier, #event').hide();
            break;

        case "Événements":
            $('#event').show();
            $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi').hide();
            $('.state').hide();
            break;

        case "Vente":
        case "Cherche Achat":
        case "Location":
        case "Cherche Location":
            $('#immobilier').show();
            $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event').hide();
            $('.state').hide();
            break;


        case "hideState":
            $('.state').hide();
            $('.details').hide();
            break;

        default:
            // Hiding All Elements
            $('.details').hide();
            $('.state').hide();
            break;
    }
});

$('#checkAll').click(function () {
    $('.selectbox').prop('checked', $(this).prop('checked'));
});

$('#deleteAll').click(function (e) {
    var number = $('.selectbox:checked').length;
    if ($('#checkAll').prop("checked") == false) {
        if (number == '0') {
            swal("Attention !", "Vous n'avez sélectionné aucune annonce.", "warning");
        } else {
            e.preventDefault();
            swal({
                    title: "Êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne pourrez plus récupérer vos annonces!",
                    icon: "warning",
                    buttons: ["Annuler", "Oui"],
                    dangerMode: true,
                })
                .then((willDelete) => {
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
            })
            .then((willDelete) => {
                if (willDelete) {
                    $("#deleteAdsForm").submit();
                }
            });
    }
});


// **************************   SUBMIT FORM AJAX *******************************
$(document).ready(function () {
    var fileList = [];
    var num = 2;
    $('.pro-image').change(function () {
        if (window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");
            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                fileList.push(file)
                if (!file.type.match('image')) continue;
                var picReader = new FileReader();
                picReader.readAsDataURL(file);
                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                        '</div>';
                    output.prepend(html);
                    num = num + 1;
                });
            }
        }
    });

    $('#submit').click(function (e) {
        e.preventDefault();
        var myForm = document.getElementById('addAd');
        formData = new FormData(myForm);
        fileList.forEach(file => formData.append('fileToUpload[]', file));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "/insertAd",
            method: 'post',
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (data) {
                if ($.isEmptyObject(data.success)) {
                    $('.sousCat-error,.Cat-error,.titl-error,.desc-error,.wilaya-error,.condition-error').empty();
                    $.each(data.errors, function (key, value) {
                        if (key == 'categorie') {
                            $(".Caterror").addClass("has-error");
                            $('.Cat-error').append(value);
                        }
                        if (key == 'sousCat') {
                            $(".sousCaterror").addClass("has-error");
                            $('.sousCat-error').append(value);
                        }
                        if (key == 'Adtitle') {
                            $(".titlerror").addClass("has-error");
                            $('.titl-error').append(value);
                        }
                        if (key == 'descrp') {
                            $(".descerror").addClass("has-error");
                            $('.desc-error').append(value);
                        }
                        if (key == 'wilaya') {
                            $(".wilayaerror").addClass("has-error");
                            $('.wilaya-error').append(value);
                        }
                        if (key == 'condition') {
                            $('.condition-error').append(value);
                        }
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                    });
                } else {
                    document.location.href = "/my-ads";
                }

            },
            complete: function (data) {
                // Hide image container
                $("#loading").hide();
            }

        });
    });

    $('#submitUpdate').click(function (e) {
        e.preventDefault();
        var id = document.getElementById('idAnnonce');
        var myForm = document.getElementById('addAd');
        formData = new FormData(myForm);
        fileList.forEach(file => formData.append('fileToUpload[]', file));

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            url: "/update-AD/" + id,
            method: 'post',
            contentType: false,
            processData: false,
            data: formData,
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (data) {
                if ($.isEmptyObject(data.success)) {
                    $('.sousCat-error,.Cat-error,.titl-error,.desc-error,.wilaya-error').empty();
                    $.each(data.errors, function (key, value) {
                        if (key == 'Adtitle') {
                            $(".titlerror").addClass("has-error");
                            $('.titl-error').append(value);
                        }
                        if (key == 'descrp') {
                            $(".descerror").addClass("has-error");
                            $('.desc-error').append(value);
                        }
                        if (key == 'wilaya') {
                            $(".wilayaerror").addClass("has-error");
                            $('.wilaya-error').append(value);
                        }
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                    });
                } else {
                    document.location.href = "/my-ads";
                }

            },
            complete: function (data) {
                // Hide image container
                $("#loading").hide();
            }

        });
    });

    $(".preview-images-zone").sortable();

    $(document).on('click', '.image-cancel', function () {
        let no = $(this).data('no');
        $(".preview-image.preview-show-" + no).remove();
    });
});


$('.selectbox').click(function () {

    var total = $('.selectbox').length;
    var number = $('.selectbox:checked').length;
    if (total == number) {
        $('#checkAll').prop('checked', true);
    } else {
        $('#checkAll').prop('checked', false);
    }
});

$('#filter').keyup(function () {

    // Search text
    var text = $(this).val().toLowerCase();;

    // Hide all content class element
    $('.filter').hide();

    // Search 
    $('.filter .title').each(function () {

        if ($(this).text().toLowerCase().indexOf("" + text + "") != -1) {
            $(this).closest('.filter').show();
        }
    });


});
/* ==========================================================================
   Touch Owl Carousel
   ========================================================================== */
$(".touch-slider").owlCarousel({
    navigation: false,
    pagination: true,
    slideSpeed: 1000,
    stopOnHover: true,
    autoPlay: true,
    items: 1,
    itemsDesktopSmall: [1024, 1],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1]
});

/* ******************************   Gallery *************************************** */
$(document).ready(function () {
    $('[data-fancybox="images-preview"]').fancybox({

        // Close existing modals
        // Set this to false if you do not need to stack multiple instances
        thumbs: {
            autoStart: false
        },
        closeExisting: false,

        // Enable infinite gallery navigation
        loop: false,

        // Horizontal space between slides
        gutter: 50,

        // Enable keyboard navigation
        keyboard: true,

        // Should allow caption to overlap the content
        preventCaptionOverlap: true,

        // Should display navigation arrows at the screen edges
        arrows: true,

        // Should display counter at the top left corner
        infobar: true,

        // Should display close button (using `btnTpl.smallBtn` template) over the content
        // Can be true, false, "auto"
        // If "auto" - will be automatically enabled for "html", "inline" or "ajax" items
        smallBtn: "auto",

        // Should display toolbar (buttons at the top)
        // Can be true, false, "auto"
        // If "auto" - will be automatically hidden if "smallBtn" is enabled
        toolbar: "auto",

        // What buttons should appear in the top right corner.
        // Buttons will be created using templates from `btnTpl` option
        // and they will be placed into toolbar (class="fancybox-toolbar"` element)
        buttons: [
            "zoom",
            "slideShow",
            "share",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],

        // Detect "idle" time in seconds
        idleTime: 3,

        // Disable right-click and use simple image protection for images
        protect: false,

        // Shortcut to make content "modal" - disable keyboard navigtion, hide buttons, etc
        modal: false,

        image: {
            // Wait for images to load before displaying
            //   true  - wait for image to load and then display;
            //   false - display thumbnail and load the full-sized image over top,
            //           requires predefined image dimensions (`data-width` and `data-height` attributes)
            preload: true
        },

        // Open/close animation type
        // Possible values:
        //   false            - disable
        //   "zoom"           - zoom images from/to thumbnail
        //   "fade"
        //   "zoom-in-out"
        //
        animationEffect: "zoom",

        // Duration in ms for open/close animation
        animationDuration: 366,

        // Should image change opacity while zooming
        // If opacity is "auto", then opacity will be changed if image and thumbnail have different aspect ratios
        zoomOpacity: "auto",

        // Transition effect between slides
        //
        // Possible values:
        //   false            - disable
        //   "fade'
        //   "slide'
        //   "circular'
        //   "tube'
        //   "zoom-in-out'
        //   "rotate'
        //
        transitionEffect: "fade",

        // Container is injected into this element
        parentEl: "body",

        // Hide browser vertical scrollbars; use at your own risk
        hideScrollbar: true,

        // Focus handling
        // ==============

        // Try to focus on the first focusable element after opening
        autoFocus: true,

        // Put focus back to active element after closing
        backFocus: true,

        // Do not let user to focus on element outside modal content
        trapFocus: true,

        // Module specific options
        // =======================

        fullScreen: {
            autoStart: false
        },

        // Set `touch: false` to disable panning/swiping
        touch: {
            vertical: true, // Allow to drag content vertically
            momentum: true // Continue movement after releasing mouse/touch when panning
        },

        // Hash value when initializing manually,
        // set `false` to disable hash change
        hash: null,

        media: {},

        slideShow: {
            autoStart: false,
            speed: 3000
        },

        // Use mousewheel to navigate gallery
        // If 'auto' - enabled for images only
        wheel: "auto",



        onInit: $.noop, // When instance has been initialized

        beforeLoad: $.noop, // Before the content of a slide is being loaded
        afterLoad: $.noop, // When the content of a slide is done loading

        beforeShow: $.noop, // Before open animation starts
        afterShow: $.noop, // When content is done loading and animating

        beforeClose: $.noop, // Before the instance attempts to close. Return false to cancel the close.
        afterClose: $.noop, // After instance has been closed

        onActivate: $.noop, // When instance is brought to front
        onDeactivate: $.noop, // When other instance has been activated


        // Clicked on the content
        clickContent: function (current, event) {
            return current.type === "image" ? "zoom" : false;
        },

        // Clicked on the slide
        clickSlide: "close",

        // Clicked on the background (backdrop) element;
        // if you have not changed the layout, then most likely you need to use `clickSlide` option
        clickOutside: "close",

        // Same as previous two, but for double click
        dblclickContent: false,
        dblclickSlide: false,
        dblclickOutside: false,

        // Custom options when mobile device is detected
        // =============================================

        mobile: {
            preventCaptionOverlap: false,
            idleTime: false,
            clickContent: function (current, event) {
                return current.type === "image" ? "toggleControls" : false;
            },
            clickSlide: function (current, event) {
                return current.type === "image" ? "toggleControls" : "close";
            },
            dblclickContent: function (current, event) {
                return current.type === "image" ? "zoom" : false;
            },
            dblclickSlide: function (current, event) {
                return current.type === "image" ? "zoom" : false;
            }
        },

    });


});

// Load Sous catégorie from catégorie

$('#categorie').on('change', function (e) {
    var cat_id = e.target.value;
    if (cat_id == "") {
        $('#sousCat').attr('disabled', 'disabled');
        $('.details').hide();
    } else {
        $.get('/json-sousCategorie?idCat=' + cat_id, function (data) {
            $('#sousCat').empty();
            $('#sousCat').append('<option value="" disable="true" selected="true">-- Sélectionner --</option>');

            $.each(data, function (index, sousCatObj) {
                $('#sousCat').append('<option value="' + sousCatObj.idSousCat + '">' + sousCatObj.sousCat + '</option>');
            })
            $('#sousCat').removeAttr('disabled');
        });
    }
});


/* ******************************   AutoComplete Field Wilaya *************************************** */

$(function () {
    var wilaya = [
        "ADRAR", "AIN DEFLA", "AIN TEMOUCHENT", "AL TARF", "ALGER", "ANNABA", "B.B.ARRERIDJ", "BATNA", "BECHAR", "BEJAIA", "BISKRA", "BLIDA", "BOUIRA", "BOUMERDES", "CHLEF", "CONSTANTINE", "DJELFA", "EL BAYADH", "EL OUED", "GHARDAIA", "GUELMA", "ILLIZI", "JIJEL", "KHENCHELA", "LAGHOUAT", "MASCARA", "MEDEA", "MILA", "MOSTAGANEM", "M’SILA", "NAAMA", "ORAN", "OUARGLA", "OUM ELBOUAGHI", "RELIZANE", "SAIDA", "SETIF", "SIDI BEL ABBES", "SKIKDA", "SOUKAHRAS", "TAMANGHASSET", "TEBESSA", "TIARET", "TINDOUF", "TIPAZA", "TISSEMSILT", "TIZI.OUZOU", "TLEMCEN"
    ];
    $("#wilaya").autocomplete({
        source: wilaya
    });
});


$('#deleteAds').click(function (e) {
    var number = $('.selectbox:checked').length;
    if ($('#checkAll').prop("checked") == false) {
        if (number == '0') {
            swal("Attention !", "Vous n'avez sélectionné aucune annonce.", "warning");
        } else {
            e.preventDefault();
            swal({
                    title: "Êtes-vous sûr?",
                    icon: "warning",
                    buttons: ["Annuler", "Oui"],
                    dangerMode: true,
                })
                .then((willDelete) => {
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
            })
            .then((willDelete) => {
                if (willDelete) {
                    $("#formSubmit").submit();
                }
            });
    }
});

$('.touch-slider').find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
$('.touch-slider').find('.owl-next').html('<i class="fa fa-angle-right"></i>');

$('#new-products').find('.owl-prev').html('<i class="fa fa-angle-left"></i>');
$('#new-products').find('.owl-next').html('<i class="fa fa-angle-right"></i>');

var owl;

$(document).ready(function () {

    owl = $("#owl-demo");

    owl.owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        afterInit: afterOWLinit, // do some work after OWL init
        afterUpdate: afterOWLinit
    });

    function afterOWLinit() {
        // adding A to div.owl-page
        $('.owl-controls .owl-page').append('<a class="item-link" />');
        var pafinatorsLink = $('.owl-controls .item-link');
        /**
         * this.owl.userItems - it's your HTML <div class="item"><img src="http://www.ow...t of us"></div>
         */
        $.each(this.owl.userItems, function (i) {

            $(pafinatorsLink[i])
                // i - counter
                // Give some styles and set background image for pagination item
                .css({
                    'background': 'url(' + $(this).find('img').attr('src') + ') center center no-repeat',
                    '-webkit-background-size': 'cover',
                    '-moz-background-size': 'cover',
                    '-o-background-size': 'cover',
                    'background-size': 'cover'
                })
                // set Custom Event for pagination item
                .click(function () {
                    owl.trigger('owl.goTo', i);
                });

        });
        // add Custom PREV NEXT controls
        $('.owl-pagination').prepend('<a href="#prev" class="prev-owl"/>');
        $('.owl-pagination').append('<a href="#next" class="next-owl"/>');
        // set Custom event for NEXT custom control
        $(".next-owl").click(function () {
            owl.trigger('owl.next');
        });
        // set Custom event for PREV custom control
        $(".prev-owl").click(function () {
            owl.trigger('owl.prev');
        });
    }
});

// Back Top Link
var offset = 200;
var duration = 500;
$(window).scroll(function () {
    if ($(this).scrollTop() > offset) {
        $('.back-to-top').fadeIn(400);
    } else {
        $('.back-to-top').fadeOut(400);
    }
});
$('.back-to-top').click(function (event) {
    event.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, 600);
    return false;
})

$('.list,switchToGrid').click(function (e) {
    e.preventDefault();
    $('.grid').removeClass("active");
    $('.list').addClass("active");
    $('.item-list').addClass("make-list");
    $('.item-list').removeClass("make-grid");
    $('.item-list').removeClass("make-compact");
    $('.item-list .add-desc-box').removeClass("col-sm-9");
    $('.item-list .add-desc-box').addClass("col-sm-7");
});
$('.grid').click(function (e) {
    e.preventDefault();
    $('.list').removeClass("active");
    $(this).addClass("active");
    $('.item-list').addClass("make-grid");
    $('.item-list').removeClass("make-list");
    $('.item-list').removeClass("make-compact");
    $('.item-list .add-desc-box').removeClass("col-sm-9");
    $('.item-list .add-desc-box').addClass("col-sm-7");
});


$(document).ready(function () {
    var text = $('.status-body-text');
    btn = $('.btn-overflow');
    h = text[0] && text[0].scrollHeight;
    if (h > 150) {
        btn.addClass('less');
        btn.css('display', 'block');
    }

    var categorie = $("#categorie option:selected").text();

    if (categorie != 'Catégories') {
        var cat_id = $("#categorie option:selected").val();
        var subcat_id = $('#id_subcat').val();

        $.get('/json-sousCategorie?idCat=' + cat_id, function (data) {

            $('#sousCat').empty();
            $('#sousCat').append('<option value="" disable="true" selected="true">-- Sélectionner --</option>');

            $.each(data, function (index, sousCatObj) {
                if (subcat_id != '') {
                    if (subcat_id == sousCatObj.idSousCat) {
                        $('#sousCat').append('<option selected value="' + sousCatObj.idSousCat + '">' + sousCatObj.sousCat + '</option>');
                    } else {
                        $('#sousCat').append('<option value="' + sousCatObj.idSousCat + '">' + sousCatObj.sousCat + '</option>');
                    }

                } else {
                    $('#sousCat').append('<option value="' + sousCatObj.idSousCat + '">' + sousCatObj.sousCat + '</option>');
                }
            })

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
                    $('#vehicule').show();
                    $('#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    $('.state').hide();
                    break;

                case "Téléphones":
                    $('#phone, .state').show();
                    $('#vehicule, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;

                case "Stockage":
                    $('#stockage, .state').show();
                    $('#vehicule, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;

                case "Ordinateurs":
                    $('#ordinateurs, .state').show();
                    $('#vehicule, #stockage, #phone, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;

                case "Offres d'emploi":
                    $('#offresEmploi').show();
                    $('#vehicule, #stockage, #phone, #ordinateurs, #demandesEmploi, #immobilier, #event').hide();
                    $('.state').hide();
                    break;

                case "Demandes d'emploi":
                    $('#demandesEmploi').show();
                    $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #event').hide();
                    $('.state').hide();
                    break;

                case "Événements":
                    $('#event').show();
                    $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi').hide();
                    $('.state').hide();
                    break;

                case "Vente":
                case "Cherche Achat":
                case "Location":
                case "Cherche Location":
                    $('#immobilier').show();
                    $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event').hide();
                    $('.state').hide();
                    break;


                case "hideState":
                    $('.state').hide();
                    $('.details').hide();
                    break;

                default:
                    // Hiding All Elements
                    $('.details').hide();
                    $('.state').hide();
                    break;
            }

        });

    } else {
        $('.details').hide();
        $('.state').hide();
    }

});




$('#form, #contactForm').submit(function () {
    $('#loading').show();
});

$('.btn-overflow').click(function (e) {

    e.stopPropagation();
    var btn = $('.btn-overflow'),
        text = $('.status-body-text');
    if (btn.hasClass('less')) {
        btn.removeClass('less');
        btn.addClass('more');
        btn.text('Afficher moins');
        $("html, body").animate({
            scrollTop: h + 500
        }, 1000);
        text.animate({
            'height': h
        });
    } else {
        btn.addClass('less');
        btn.removeClass('more');
        btn.text('Afficher plus...');
        text.animate({
            'height': '150px'
        });
        $("html, body").animate({
            scrollTop: h + 300
        }, 1000);
    }

});

/* ******************************   Add post to favorits *************************************** */



$('#MyID').click(function () {

    var StateName = $(this).text();
    showState(StateName);
});

$('#pass-status').click(function () {
    var passwordInput = document.getElementById('password-field');
    var passStatus = document.getElementById('pass-status');

    if (passwordInput.type == 'password') {
        passwordInput.type = 'text';
        passStatus.className = 'fa fa-eye-slash field-icon toggle-password';
    } else {
        passwordInput.type = 'password';
        passStatus.className = 'fa fa-eye field-icon toggle-password';
    }
});

$(document).ready(function () {
    /* ******************************   Get the height and the width of the detail pic  *************************************** */
    var imgHeight = document.querySelector('#principal-image>img') && document.querySelector('#principal-image>img').naturalHeight;
    var imgWidth = document.querySelector('#principal-image>img') && document.querySelector('#principal-image>img').naturalWidth;
    if (imgWidth && imgWidth < 600) {
        $("#details-pricipale-img").css('width', "300")
    } else {
        $("#details-pricipale-img").css('width', "100%")
    }
});
