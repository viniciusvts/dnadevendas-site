<?php

/**
 * Função a ser usada no rest api para retornar a lista de clientes no portifolio
 * @author Vinicius de Santana
 */
function dnaapi_get_portfolio(){
  $query = new WP_Query('post_type=portfolio');
  $dataResp = array();
  foreach ($query->posts as $post) {
    $post_api['thumb']['thumbnail'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $post_api['thumb']['medium'] = get_the_post_thumbnail_url($post->ID, 'medium');
    $post_api['thumb']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
    $post_api['thumb']['full'] = get_the_post_thumbnail_url($post->ID, 'full');
    $post_api['post_title'] = $post->post_title;
    $post_api['post_content'] = $post->post_content;
    $post_api['post_excerpt'] = $post->post_excerpt;
    $post_api['post_name'] = $post->post_name;
    $post_api['author'] = array();
    $post_api['author']['name'] = get_the_author_meta('display_name', $post->post_author);
    $post_api['author']['thumb'] = rest_get_avatar_urls($post->post_author);
    $post_api['categories'] = array();
    $post_api['categories']['portfolio_category'] = wp_get_object_terms($post->ID, 'portfolio_category');
    
    //itera no array
    $dataResp[] = $post_api;
  }
  return $dataResp;
}

/**
 * Função registra os endpoints relacionados a portfolio na api
 * @author Vinicius de Santana
 */
function dnaapi_register_portfolio(){
  register_rest_route('dna_theme/v1',
    '/portfolio',
    array(
      'methods' => 'GET',
      'callback' => 'dnaapi_get_portfolio',
      'description' => 'recupera a lista de clientes no portifólio'
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_portfolio');