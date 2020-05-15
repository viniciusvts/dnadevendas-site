<?php

/**
 * Função a ser usada no rest api para retornar a lista de clientes no portifolio
 * @author Vinicius de Santana
 */
function dnaapi_get_portfolio($req){
  // pega os parametros
  $post_per_page = $req->get_param('post_per_page');
  $page = $req->get_param('page');
  $orderby = $req->get_param('orderby');
  $order = $req->get_param('order');
  // verifica se os parametros são válidos, senão, seta default
  $post_per_page = isset($post_per_page) ? $post_per_page : 10;
  $page = isset($page) ? $page : 1;
  $orderby = isset($orderby) ? $orderby : 'date';
  $order = isset($order) ? $order : 'desc';
  $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => $post_per_page,
    'paged' => $page,
    'orderby' => $orderby,
    'order' => $order
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
 * Função a ser usada no rest api para retornar a lista de taxonomia no portifolio
 * @author Vinicius de Santana
 */
function dnaapi_get_portfolioTaxonomyList(){
  $dataResp = array();
  $query = get_terms( array(
    'taxonomy' => 'portfolio_category',
    )
  );
  $taxs = $query;
  foreach ($taxs as $key => $tax) {
    /* pq essa condicional e não hide_empty?
    pq tem uma categoria mae chamada "Clientes" que é mãe de TODAS as categorias
    nenhum cliente está cadastrado diretamente nessa categoria
    mas o wordpress entende que ela não está vazia pq seus filhos possuem clientes cadastrados*/
    if ($tax->count > 0) $dataResp[] = $tax;
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
        ),
        'orderby' => array(
          'required' => false,
          'description' => 'Valor irá indicar a ordem dos resultados',
          'default' => 'date',
          'enum' => array(
            'author',
            'date',
            'id',
            'include',
            'modified',
            'parent',
            'relevance',
            'sluginclude_slugs',
            'title'
          ),
          'order' => array(
            'required' => false,
            'description' => 'Valor irá indicar a ordem dos resultados',
            'default' => 'desc',
            'enum' => array(
              'asc',
              'desc'
            )
          )
        )
      )
    )
  );

  register_rest_route('dna_theme/v1',
    '/portfolio-taxonomy',
    array(
      'methods' => 'GET',
      'callback' => 'dnaapi_get_portfolioTaxonomyList',
      'description' => 'recupera a lista de da taxonomia do portfolio'
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_portfolio');