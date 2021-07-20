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
function dnaapi_get_menu(WP_REST_Request $request){
    $menuThemeLocation = $request->get_param('menu-location');
    $menuLocations = get_nav_menu_locations();
    $hasLocation = key_exists($menuThemeLocation, $menuLocations);
    if(!$hasLocation) return false;
    
    $menuID = $menuLocations[$menuThemeLocation];
    $primaryNav = wp_get_nav_menu_items($menuID);
    return $primaryNav;
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

    register_rest_route('dna_theme/v1', '/menu', array(
        'methods' => 'GET',
        'callback' => 'dnaapi_get_menu',
        'description' => 'Retorna o conteudo do menu solicitado',
        'args' => array(
            'menu-location' => array(
              'required' => true,
            ),
        ),
    ));
}

add_action('rest_api_init', 'dnaapi_register_wpHeaderFooter');