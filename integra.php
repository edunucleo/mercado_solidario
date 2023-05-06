<?php

require_once '../wp-load.php';


$current_user = wp_get_current_user();

if ( in_array( 'administrator', (array) $current_user->caps ) ) {
    // O usuário atual é um administrador
    
} else {
    // O usuário atual não é um administrador /
    header('Location: ../wp-login.php?loggedout=true&wp_lang=pt_BR');
    exit();
}