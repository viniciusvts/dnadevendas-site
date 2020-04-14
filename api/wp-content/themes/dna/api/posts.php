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
    ));
}

add_action('rest_api_init', 'dnaapi_register_postsApi');