<?php
/**
 * @author Vinicius de Santana
 */
function dnaapi_get_wp_header() {
    return wp_head();
}
/**
 * @author Vinicius de Santana
 */
function dnaapi_get_wp_footer(){
    return wp_footer();
}

/**
 * @author Vinicius de Santana
 */
function dnaapi_register_wpHeaderFooter(){
    register_rest_route('dna_theme/v1', '/wp_header', array(
        'methods' => 'GET',
        'callback' => 'dnaapi_get_wp_header',
        'description' => 'Retorna o conteudo de wp_header'
    ));

    register_rest_route('dna_theme/v1', '/wp_footer', array(
        'methods' => 'GET',
        'callback' => 'dnaapi_get_wp_footer',
        'description' => 'Retorna o conteudo de wp_footer'
    ));
}

add_action('rest_api_init', 'dnaapi_register_wpHeaderFooter');