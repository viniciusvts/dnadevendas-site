<?php
/**
 * Adiciona os scripts e folha de estilos ao site
 *
 * @package DNA
 * @subpackage loadSources
 * @author Vinicius de Santana
 */
function add_css_and_js() {
  //scripts: wp_enqueue_script( $nome, $origem, $dependencia, $versao, $rodape );
  $jsInternalPath = get_template_directory() . "/"."vue/dist/js/";
  $jsUriPath = get_template_directory_uri() . "/"."vue/dist/js/";
  //styles: wp_enqueue_style( $nome, $origem, $dependencia, $versao, $media );
  $media = 'all';
  $cssInternalPath = get_template_directory() . "/"."vue/dist/css/";
  $cssUriPath = get_template_directory_uri() . "/"."vue/dist/css/";

  $dir = scandir($jsInternalPath);
  $diretorio = array_reverse($dir);
  //carrega todo o javascript gerado
  foreach ($diretorio as $file) {
    if (strpos( $file , ".map" ) || $file == "." || $file == ".."){
      continue;
    }
    $archive = $file;
    $urlPath = $jsUriPath . $archive;
    $internalPath = $jsInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_script( $archive, $urlPath, array (), $fileVersion, true);
  }
  
  //carrega todo o css gerado
  $dir = scandir($cssInternalPath);
  $diretorio = array_reverse($dir);
  //carrega todo o javascript gerado
  foreach ($diretorio as $file) {
    if (strpos( $file , ".map" ) || $file == "." || $file == ".."){
      continue;
    }
    $archive = $file;
    $urlPath = $cssUriPath . $archive;
    $internalPath = $cssInternalPath . $archive;
    $fileVersion = filemtime($internalPath);
    wp_enqueue_style( $archive, $urlPath, array(), $fileVersion, $media );
  }
  // aqui removo folhas de estilo e os scripts padrão para não alterar nosso front
  $stylesDeq = ["contact-form-7","wp-block-library", "mpp_gutenberg", "js_composer_front"];
  $scriptsDeq = ["contact-form-7", "mpp_gutenberg_tabs", "google-recaptcha", "wpcf7-recaptcha"];
  foreach ($stylesDeq as $style) {
    wp_dequeue_style($style);
  }
  foreach ($scriptsDeq as $script) {
    wp_dequeue_script($script);
  }
}
//do it
add_action( 'wp_enqueue_scripts', 'add_css_and_js' );

/**
 * aqui adiciono o atributo rel=prefetch ao css
 * e adiciono rel=reload as=script aos js
 * como o vue faz como padrão
 */
function addRelPrefetchToStyle() {
  global $wp_styles;
  global $wp_scripts;
  // prefetch in styles
  foreach ($wp_styles->queue as $handle) {
    $style = $wp_styles->registered[$handle];
    
    //-- If version is set, append to end of source.
    $source = $style->src . ($style->ver ? "?ver={$style->ver}" : "");

    //-- Spit out the tag.
    echo "<link href='{$source}' rel='prefetch' />";
  }
  // preload in scripts
  foreach ($wp_scripts->queue as $handle) {
    $script = $wp_scripts->registered[$handle];
    
    //-- If version is set, append to end of source.
    $source = $script->src . ($script->ver ? "?ver={$script->ver}" : "");

    //-- Spit out the tag.
    echo "<link href='{$source}' rel='preload' as='script' />";
  }
}
add_action('wp_head', 'addRelPrefetchToStyle', 1);