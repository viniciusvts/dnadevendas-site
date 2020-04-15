<?php
/**
 * @author Vinicius de Santana
 */
function dnaapi_get_postsList($object){
  $post_api['author'] = array();
  $post_api['author']['name'] = get_the_author_meta('display_name', $object["author"]);
  $post_api['author']['thumb'] = rest_get_avatar_urls($object["author"]);
  $post_api['SEOtitle'] = get_post_meta($object["id"], '_yoast_wpseo_title', true);
  $post_api['SEOmetaDescription'] = get_post_meta($object["id"], '_yoast_wpseo_metadesc', true);
  $post_api["categories"] = array();
  $post_api["categories"]['category'] = wp_get_object_terms($object["id"], 'category');
  $post_api['thumb'] = array();
  $post_api['thumb']['thumbnail'] = get_the_post_thumbnail_url($object["id"], 'thumbnail');
  $post_api['thumb']['medium'] = get_the_post_thumbnail_url($object["id"], 'medium');
  $post_api['thumb']['large'] = get_the_post_thumbnail_url($object["id"], 'large');
  $post_api['thumb']['full'] = get_the_post_thumbnail_url($object["id"], 'full');
  $countview = get_post_meta($object["id"], POST_META_COUNT, true);
  $post_api['views'] = $countview?intval($countview):0;
  return $post_api;
}

/**
 * @author Vinicius de Santana
 */
function dnaapi_get_postCount($req) {
  $postID = $req->get_param('id');
  $count = get_post_meta($postID, POST_META_COUNT, true);
  if($count==''){
      $count = 1;
      delete_post_meta($postID, POST_META_COUNT);
      add_post_meta($postID, POST_META_COUNT, $count);
  }else{
      $count++;
      update_post_meta($postID, POST_META_COUNT, $count);
  }
  $postCount = array($postID => $count);
  return $postCount;
}

/**
 * @author Vinicius de Santana
 */
function dnaapi_get_postByViews($req) {
  //query no banco
  global $wpdb;
  $query = "SELECT * FROM {$wpdb->prefix}postmeta";
  $query .= " WHERE meta_key = '" . POST_META_COUNT . "'";
  $query .= " ORDER BY meta_value DESC;";
  $orderedMetaKeys = $wpdb->get_results( $query, ARRAY_A );
  //monta resposta
  $resp = array();
  foreach ($orderedMetaKeys as $key => $value) {
    $post = get_post($value['post_id']);
    // DNA_custom para ficar igual a api padrão em que eu registrei um field com este nome e não bugar o front
    $DNA_custom['author'] = array();
    $DNA_custom['author']['name'] = get_the_author_meta('display_name', $post->author);
    $DNA_custom['author']['thumb'] = rest_get_avatar_urls($post->author);
    $DNA_custom['SEOtitle'] = get_post_meta($post->ID, '_yoast_wpseo_title', true);
    $DNA_custom['SEOmetaDescription'] = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
    $DNA_custom["categories"] = array();
    $DNA_custom["categories"]['category'] = wp_get_object_terms($post->ID, 'category');
    $DNA_custom['thumb'] = array();
    $DNA_custom['thumb']['thumbnail'] = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $DNA_custom['thumb']['medium'] = get_the_post_thumbnail_url($post->ID, 'medium');
    $DNA_custom['thumb']['large'] = get_the_post_thumbnail_url($post->ID, 'large');
    $DNA_custom['thumb']['full'] = get_the_post_thumbnail_url($post->ID, 'full');
    $countview = get_post_meta($post->ID, POST_META_COUNT, true);
    $DNA_custom['views'] = $countview?intval($countview):0;
    $post->DNA_custom = $DNA_custom;
    $resp[] = $post;
  }
  return $resp;
}

/**
 * @author Vinicius de Santana
 */
function dnaapi_register_postsApi(){
  register_rest_field( 'post',
    'DNA_custom',
    array(
        'get_callback'    => 'dnaapi_get_postsList',
        'schema'          => null,
    )
  );

  register_rest_route('dna_theme/v1',
    '/post_count/(?P<id>\d+)',
    array(
      'methods' => 'GET',
      'callback' => 'dnaapi_get_postCount',
      'description' => 'Itera o contador de views do id do post do argumento'
    )
  );

  register_rest_route('dna_theme/v1',
    '/getPostsByViews',
    array(
      'methods' => 'GET',
      'callback' => 'dnaapi_get_postByViews',
      'description' => 'Retorna uma lista de posts ordenada por views'
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_postsApi');