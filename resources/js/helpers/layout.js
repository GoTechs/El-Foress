
$(".selectbox").click(function () {
    var total = $(".selectbox").length;
    var number = $(".selectbox:checked").length;
    if (total == number) {
        $("#checkAll").prop("checked", true);
    } else {
        $("#checkAll").prop("checked", false);
    }
});





$(".touch-slider").find(".owl-prev").html('<i class="fa fa-angle-left"></i>');
$(".touch-slider").find(".owl-next").html('<i class="fa fa-angle-right"></i>');

$("#new-products").find(".owl-prev").html('<i class="fa fa-angle-left"></i>');
$("#new-products").find(".owl-next").html('<i class="fa fa-angle-right"></i>');



$(".list,switchToGrid").click(function (e) {
    e.preventDefault();
    $(".grid").removeClass("active");
    $(".list").addClass("active");
    $(".item-list").addClass("make-list");
    $(".item-list").removeClass("make-grid");
    $(".item-list").removeClass("make-compact");
    $(".item-list .add-desc-box").removeClass("col-sm-9");
    $(".item-list .add-desc-box").addClass("col-sm-7");
});
$(".grid").click(function (e) {
    e.preventDefault();
    $(".list").removeClass("active");
    $(this).addClass("active");
    $(".item-list").addClass("make-grid");
    $(".item-list").removeClass("make-list");
    $(".item-list").removeClass("make-compact");
    $(".item-list .add-desc-box").removeClass("col-sm-9");
    $(".item-list .add-desc-box").addClass("col-sm-7");
});
