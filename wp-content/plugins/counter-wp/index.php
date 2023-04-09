<?php
/*
Plugin Name: Compteur de pages vues
Description: Compte le nombre de pages vues sur le site
Version: 1.0
Author: Julien DERACHE
*/

// Fonction pour incrémenter le compteur de pages vues
function incrementer_compteur_pages_vues()
{
    $compteur_pages_vues = get_option('compteur_pages_vues', 0); // Récupération du compteur
    $compteur_pages_vues++; // Incrémentation du compteur
    update_option('compteur_pages_vues', $compteur_pages_vues); // Enregistrement 
}

// Fonction pour afficher le compteur de pages vues en bas de chaque page (wp_footer)
function afficher_compteur_pages_vues()
{
    $compteur_pages_vues = get_option('compteur_pages_vues', 0); // Récupération du compteur
    echo '<p>Nombre de pages vues sur le site : ' . $compteur_pages_vues . '</p>'; // Affichage du compteur
}

// Action pour incrémenter le compteur de pages vues à chaque rechargement de page
add_action('wp', 'incrementer_compteur_pages_vues');

// Action pour afficher le compteur de pages vues en bas de chaque page (wp_footer)
add_action('wp_footer', 'afficher_compteur_pages_vues');
