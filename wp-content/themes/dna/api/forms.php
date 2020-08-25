<?php

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_contatoFooter($req){
  // pega os parametros
  $nome = $req->get_param('nome');
  $email = $req->get_param('email');
  $urlOrigem = $req->get_param('urlOrigem');
  // envia email
  $to = 'no-reply@dnadevendas.com.br';
  $subject = 'DNA de Vendas - Contato';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>urlOrigem: ".$urlOrigem;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  $url = $_SERVER['HTTP_ORIGIN'] . '/agradecimento';
  wp_redirect($url);
  exit;
}

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_solicitarContato($req){
  // pega os parametros
  $nome = $req->get_param('nome');
  $email = $req->get_param('email');
  $mobile_phone = $req->get_param('mobile_phone');
  $company_name = $req->get_param('company_name');
  $qtdfunc = $req->get_param('qtdfunc');
  $urlOrigem = $req->get_param('urlOrigem');
  // envia email
  $to = 'no-reply@dnadevendas.com.br';
  $subject = 'DNA de Vendas - Contato';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>mobile_phone: ".$mobile_phone
      ."<br>company_name: ".$company_name
      ."<br>qtdfunc: ".$qtdfunc
      ."<br>urlOrigem: ".$urlOrigem;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
  wp_redirect($url);
  exit;
}

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_paginaContato($req){
  // pega os parametros
  $nome = $req->get_param('nome');
  $email = $req->get_param('email');
  $setor = $req->get_param('setor');
  $nVendedores = $req->get_param('nVendedores');
  $telefone = $req->get_param('telefone');
  $assunto = $req->get_param('assunto');
  $mensagem = $req->get_param('mensagem');
  $urlOrigem = $req->get_param('urlOrigem');
  // envia email
  $to = 'site@dnadevendas.com.br';
  $subject = 'DNA de Vendas - Contato';
  $message = "Nome: ".$nome
      ."<br>Email: ".$email
      ."<br>setor: ".$setor
      ."<br>nVendedores: ".$nVendedores
      ."<br>telefone: ".$telefone
      ."<br>assunto: ".$assunto
      ."<br>mensagem: ".$mensagem
      ."<br>urlOrigem: ".$urlOrigem;
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  $url = $_SERVER['HTTP_ORIGIN'] . '/agradecimento';
  wp_redirect($url);
  exit;
}

/**
 * Função registra os endpoints
 * @author Vinicius de Santana
 */
function dnaapi_register_ccp(){
  //contato footer
  register_rest_route('dna_theme/v1',
    '/contato-footer',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_contatoFooter',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'nome' => array(
          'required' => true,
        ),
        'email' => array(
          'required' => true,
        ),
      )
    )
  );
  //Solicitar contato
  register_rest_route('dna_theme/v1',
    '/solicitar-contato',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_solicitarContato',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'nome' => array(
          'required' => true,
        ),
        'email' => array(
          'required' => true,
        ),
        'mobile_phone' => array(
          'required' => true,
        ),
        'company_name' => array(
          'required' => true,
        ),
        'qtdfunc' => array(
          'required' => true,
        ),
      )
    )
  );
  //Solicitar contato
  register_rest_route('dna_theme/v1',
    '/pagina-contato',
    array(
      'methods' => 'POST',
      'callback' => 'dnaapi_paginaContato',
      'description' => 'recebe as informações do form e envia um email notificando o adm do site',
      'args' => array(
        'nome' => array(
          'required' => true,
        ),
        'email' => array(
          'required' => true,
        ),
        'setor' => array(
          'required' => true,
        ),
        'telefone' => array(
          'required' => true,
        ),
        'assunto' => array(
          'required' => true,
        ),
        'mensagem' => array(
          'required' => true,
        ),
      )
    )
  );
}

add_action('rest_api_init', 'dnaapi_register_ccp');