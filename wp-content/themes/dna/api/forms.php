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
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
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
  $to = 'forsmall-leads@dnadevendas.com.br';
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
  $to = array('contato@dnadevendas.com.br>',
      'vinicius@dnadevendas.com.br',
      'lucia@dnadevendas.com.br>'
    );
  $subject = 'DNA de Vendas - Contato';
  $message = criaMensagemPáginaDeContato($nome, $email, $setor, $nVendedores, $telefone, $assunto, $mensagem, $urlOrigem);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  // redireciona a página
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
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

// funções auxiliares da api
/**
 * Cria a mensagem dá página contato com os parametros passados
 * 
 * @param string $nome - campo nome do formulário
 * @param string $email - campo email do formulário
 * @param string $setor - campo setor do formulário
 * @param string $nVendedores - campo nVendedores do formulário
 * @param string $telefone - campo telefone do formulário
 * @param string $assunto - campo assunto do formulário
 * @param string $mensagem - campo mensagem do formulário
 * @param string $urlOrigem - campo urlOrigem do formulário
 * @return string  - o html para enviar o email
 * @author Vinicius de Santana
*/
function criaMensagemPáginaDeContato($nome, $email, $setor, $nVendedores, $telefone, $assunto, $mensagem, $urlOrigem){
  // inicio mensagem
  $message = '<div style="font-family: Arial, sans-serif;margin: 40px auto;width: 550px;">';
  $message .=   '<table>';
  $message .=     '<tbody><tr>';
  $message .=     '<td><img src="https://www.dnadevendas.com.br/wp-content/uploads/mail_dnadevendas.png" width="100" height="45"></td>';
  $message .=     '<td><h1 style="margin-left: 30px;font-weight: 800;margin-bottom: 0;">Solicitação de Contato</h1>';
  $message .=     '<h3 style="font-weight: 100;margin-left: 30px;margin-top: 0;">Site DNA de Vendas</h3></td>';
  $message .=     '</tr></tbody>';
  $message .=   '</table>';
  $message .=   '<table style="font-family: Arial, sans-serif;background-color: #eee;margin: 20px 40px 50px 40px;border-radius: 6px;min-width: 450px;">';
  $message .=     '<tbody>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;width: 60px">Nome:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $nome;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">E-mail:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $email;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Falar com setor:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $setor;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Vendedores:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $nVendedores;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Telefone:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $telefone;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Assunto:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $assunto;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;" colspan="2">';
	$message .=         '<p style="padding-bottom: 20px;">Mensagem:</p>';
  $message .=         '<div style="font-size: 18px;">';
  $message .=            $mensagem;
  $message .=          '</div>';
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">UrlOrigem:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $urlOrigem;
  $message .=       '</td>';
  $message .=     '</tr>';
  $message .=     '</tbody>';
  $message .=   '</table>';
  $message .=   '<p style="font-family: Arial, sans-serif;font-weight: 100;font-style: italic;">Enviado pelo site Consultoria DNA de Vendas.</p>';
  $message .= '</div>';
  return $message;
  // fim mensagem
}

