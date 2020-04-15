<?php
function dnaapi_get_pages($object) {
  WPBMap::addAllMappedShortcodes(); // This does all the work
  global $post;
  $post = get_post($object['id']);
  $content = apply_filters('the_content', $post->post_content);
  $vccss = get_post_meta($object['id'], '_wpb_shortcodes_custom_css', true);
  if(!empty($vccss)) 
  {
      $vccss = strip_tags($vccss);
      $content.='<style type="text/css" data-type="vc_shortcodes-custom-css">';
      $content.=$vccss;
      $content.='</style>';
  }
  $resp['rendered'] = $content;
  return $resp;
}

function dnaapi_register_get_pages() {
  register_rest_field(
    // if you need it to work with other (even custom post) types,
    // then you have to use an array:
    // array( 'page', 'post', 'custom_post_type', 'etc' )
    // this example only does the trick for 'page'
    // look at the link in the first EDIT section of this answer
    'page',
    'DNA_custom',
    array(
      'get_callback'    => 'dnaapi_get_pages',
      'update_callback' => null,
      'schema'          => null,
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_get_pages');