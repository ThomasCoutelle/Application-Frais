/*
 *	Détermination de la taille du corps de la page
 */
var hauteur_fenetre = $(window).height();
var hauteur_header = $('header').height();
$('#corps').css({
    'height': hauteur_fenetre - hauteur_header-6
});
