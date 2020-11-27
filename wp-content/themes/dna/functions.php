<?php
  // constantes
  define('POST_META_COUNT', 'dna_views');
  // imports
  include_once 'api/index.php';
  include_once 'custom-posts/index.php';
  include_once 'inc/index.php';
  // contact form estava marcando como spam qualquer requisição ao endpoind rest api
  add_filter('wpcf7_spam', '__return_false');