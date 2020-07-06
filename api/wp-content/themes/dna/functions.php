<?php
  include_once 'api/index.php';
  // contact form estava marcando como spam qualquer requisição ao endpoind rest api
  add_filter('wpcf7_spam', '__return_false');