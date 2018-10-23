/* Ouverture - fermeture menu */

$("#menu .container-fluid button").click(function (e) {
    $("body").toggleClass("show-menu");
    e.stopPropagation();
})

$("#cross_close_menu").click(function () {
    $("body").removeClass("show-menu");
})

$("#menu_open").click(function (e) {
    e.stopPropagation();
});

$(document).click(function () {
    $("body").removeClass("show-menu");
});


/* Changement couleur menu - scroll */

var backgroundMenu = $("#menu").outerHeight();

window.onscroll = function () {
    menuBackground();
    addCommentFixed();
};

function menuBackground(){
    if(window.pageYOffset >= backgroundMenu){
        $("#menu").addClass("background");
    }
    else{
        $("#menu").removeClass("background");
    }
}


/* Ajout commentaire - Position Fixed */

