$("#menu-items-position2").on("change", function(e) {
    $("#main-nav-list2").css("justify-content", $(this).find("option:selected").val());
});

$("#menu-items2").on("change", function(e) {
    $("#main-nav-list2 li").css("flex", $(this).find("option:selected").val());
});

$("#show").on("change", function(e) {
    $("#main-nav2").removeClass("outlines").addClass($(this).find("option:selected").val());
});