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
};

function menuBackground(){
    if(window.pageYOffset >= backgroundMenu){
        $("#menu").addClass("background");
    }
    else{
        $("#menu").removeClass("background");
    }
}


/* TINYMCE Module - Start */
tinymce.init({
    selector: ".admin textarea",
    plugins: [
        "advlist autolink lists link  charmap print preview anchor",
        "searchreplace visualblocks code fullscreen emoticons",
        "insertdatetime table contextmenu paste textcolor",
    ],
    toolbar: [
        "undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify |,fontsize |,bullist |, numlist outdent indent |,forecolor"
    ],
    font_formats: ['Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n'],
    force_p_newlines: true,
    fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt",
});
/* TINYMCE Module - End */