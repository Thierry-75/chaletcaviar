jQuery(".chaletcaviar _datepicker").flatpickr({});

//Hauteur du jumbotron
var hauterJumbotron = jQuery('.jumbotron').outerHeight();
//Fonction appelée au scroll de la souris
function parallax()
{
//On calcule la distance de scroll, puis on réduit la taille du container du jumbotron en fonction de cette distance.
var scrolled = $(window).scrollTop();
jQuery('.fond').css('height', (hauterJumbotron-scrolled) + 'px');
}
//Ajout de la fonction à l'événement scroll
jQuery(window).scroll(function(e){
parallax();
});