<?php

/**
 * Função a ser usada no rest api para retornar a lista de clientes no portifolio
 * @author Vinicius de Santana
 */
function dnaapi_get_portfolio($req){
  // pega os parametros
  $post_per_page = $req->get_param('post_per_page');
  $page = $req->get_param('page');
  // verifica se os parametros são válidos, senão, seta default
  $post_per_page = isset($post_per_page) ? $post_per_page : 10;
  $page = isset($page) ? $page : 1;
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $post_per_page,
    'paged' => $page
  );
  $query = new WP_Query($args);
  $dataResp = array();
  foreach ($query->posts as $post) {
    $post_api['thumb']['thumbnail'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $post_api['thumb']['medium'] = get_the_post_thumbnail_url($post->ID, 'medium');
    $post_api['thumb']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
    $post_api['thumb']['full'] = get_the_post_thumbnail_url($post->ID, 'full');
    $post_api['thumb']['alt'] = get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true );
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
      'description' => 'recupera a lista de clientes no portifólio',
      'args' => array(
        'post_per_page' => array(
          'required' => false,
          'validate_callback' => 'dna_validate_isNumeric',
          'description' => 'Valor irá indicar quantos itens por página será entregue',
          'default' => 10
        ),
        'page' => array(
          'required' => false,
          'validate_callback' => 'dna_validate_isNumeric',
          'description' => 'Valor irá indicar qual página será entregue',
          'default' => 1
        )
      )
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_portfolio');