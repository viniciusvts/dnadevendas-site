<?php

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_contatoFooter($req){
  // pega os parametros
  $reqData = array(
    'urlOrigem' => $req->get_param('urlOrigem'),
    'nome' => $req->get_param('nome'),
    'email' => $req->get_param('email')
  );
  //configura e envia para o rd
  $args = configuraEnviarParaRDNewsletterFooter($reqData);
  $statusEnvio = enviaParaRD($args);
  if (!$statusEnvio) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => false,
    ));
  }
  // envia email
  $to = 'no-reply@dnadevendas.com.br';
  $subject = 'DNA de Vendas - Contato';
  $message = criaMensagemPaginaDeContato($reqData);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  if (!$wpmail) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    ));
  }
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
  return array(
    'code' => 'Requisição OK',
    'message' => '',
    'data' => array(
      'url' => $url,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    )
  );
}

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_solicitarContato($req){
  // pega os parametros
  $reqData = array(
    'urlOrigem' => $req->get_param('urlOrigem'),
    'nome' => $req->get_param('nome'),
    'email' => $req->get_param('email'),
    'telefone' => $req->get_param('mobile_phone'),
    'company_name' => $req->get_param('company_name'),
    'nVendedores' => $req->get_param('qtdfunc'),
    /** Como agora quem envia para o RD é o servidor e esse form tem "name" diferentes para
     * páginas diferentes, preciso receber o name para enviar corretamente para o rd */
    'nameOfForm' => $req->get_param('nameOfForm')
  );
  //configura e envia para o rd
  $args = configuraEnviarParaRDSolicitarContato($reqData);
  $statusEnvio = enviaParaRD($args);
  if (!$statusEnvio) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => false,
    ));
  }
  // envia email
  $to = 'forsmall-leads@dnadevendas.com.br';
  $subject = 'DNA de Vendas - Contato';
  $message = criaMensagemPaginaDeContato($reqData);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  if (!$wpmail) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    ));
  }
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
  return array(
    'code' => 'Requisição OK',
    'message' => '',
    'data' => array(
      'url' => $url,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    )
  );
}

/**
 * Atende a requisição enviando um email para o adm do site
 * @author Vinicius de Santana
 */
function dnaapi_paginaContato($req){
  // pega os parametros
  $reqData = array(
    'urlOrigem' => $req->get_param('urlOrigem'),
    'nome' => $req->get_param('nome'),
    'email' => $req->get_param('email'),
    'setor' => $req->get_param('setor'),
    'nVendedores' => $req->get_param('nVendedores'),
    'telefone' => $req->get_param('telefone'),
    'assunto' => $req->get_param('assunto'),
    'mensagem' => $req->get_param('mensagem')
  );
  //configura e envia para o rd
  $args = configuraEnviarParaRDPaginaContato($reqData);
  $statusEnvio = enviaParaRD($args);
  if (!$statusEnvio) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => false,
    ));
  }
  // envia email
  $to = array('contato@dnadevendas.com.br>',
      'vinicius@dnadevendas.com.br',
      'lucia@dnadevendas.com.br>'
    );
  $subject = 'DNA de Vendas - Contato';
  $message = criaMensagemPaginaDeContato($reqData);
  $headers = array('Content-Type: text/html; charset=UTF-8');
  $wpmail = wp_mail( $to, $subject, $message, $headers );
  if (!$wpmail) {
    return new WP_Error( "Bad Gateway", 'Erro ao enviar para o rd', array(
      'status' => 502,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    ));
  }
  $url = $_SERVER['HTTP_ORIGIN'] . '/contato/agradecimento/';
  return array(
    'code' => 'Requisição OK',
    'message' => '',
    'data' => array(
      'url' => $url,
      'statusRD' => $statusEnvio,
      'statusMail' => $wpmail,
    )
  );
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

/**
 * Configura os campos para ir para o rd
 * 
 * @param array $data - informações do formulário
 * @return object - objeto preparado para envio
 * @author Vinicius de Santana
*/
function configuraEnviarParaRDNewsletterFooter($data){
  $args = new stdClass();
  $args->event_type = "CONVERSION";
  $args->event_family = "CDP";
  $args->payload = new stdClass();
  $args->payload->conversion_identifier = "dna_newsletter";
  //conteúdo do form
  $args->payload->name = $data['nome'];
  $args->payload->email = $data['email'];
  $args->payload->cf_urlorigem = $data['urlOrigem'];
  return $args;
}

/**
 * Configura os campos para ir para o rd
 * 
 * @param array $data - informações do formulário
 * @return object - objeto preparado para envio
 * @author Vinicius de Santana
*/
function configuraEnviarParaRDSolicitarContato($data){
  $args = new stdClass();
  $args->event_type = "CONVERSION";
  $args->event_family = "CDP";
  $args->payload = new stdClass();
  /** Como agora quem envia para o RD é o servidor e esse form tem "name" diferentes para
   * páginas diferentes, preciso receber o name para enviar corretamente para o rd */
  $args->payload->conversion_identifier = $data['nameOfForm'];
  //a partir daqui é o conteúdo do form
  $args->payload->name = $data['nome'];
  $args->payload->email = $data['email'];
  $args->payload->mobile_phone = $data['telefone'];
  $args->payload->company_name = $data['company_name'];
  $args->payload->cf_vendedores_na_equipe = $data['nVendedores'];
  $args->payload->cf_urlorigem = $data['urlOrigem'];
  return $args;
}


// funções auxiliares da api
/**
 * Cria a mensagem dá página contato com os parametros passados
 * 
 * @param array $data - informações do formulário
 * @return string  - o html para enviar o email
 * @author Vinicius de Santana
*/
function criaMensagemPaginaDeContato($data){
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
  if (isset($data['nome'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;width: 60px">Nome:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['nome'];
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  if (isset($data['email'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;">E-mail:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['email']; // obrigatório
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  if (isset($data['setor'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;">Falar com setor:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['setor'];
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  if (isset($data['nVendedores'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;">Vendedores:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['nVendedores'];
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  if (isset($data['telefone'])){
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Telefone:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $data['telefone'];
  $message .=       '</td>';
  $message .=     '</tr>';
  }
  if (isset($data['assunto'])){
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;">Assunto:</td>';
  $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
  $message .=         $data['assunto'];
  $message .=       '</td>';
  $message .=     '</tr>';
  }
  if (isset($data['mensagem'])){
  $message .=     '<tr>';
  $message .=       '<td style="padding: 10px 20px;" colspan="2">';
	$message .=         '<p style="padding-bottom: 20px;">Mensagem:</p>';
  $message .=         '<div style="font-size: 18px;">';
  $message .=            $data['mensagem'];
  $message .=          '</div>';
  $message .=       '</td>';
  $message .=     '</tr>';
  }
  if (isset($data['company_name'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;">Nome da Empresa:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['company_name'];
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  if (isset($data['urlOrigem'])){
    $message .=     '<tr>';
    $message .=       '<td style="padding: 10px 20px;">UrlOrigem:</td>';
    $message .=       '<td style="padding: 10px 20px; font-size: 18px;">';
    $message .=         $data['urlOrigem']; // obrigatório
    $message .=       '</td>';
    $message .=     '</tr>';
  }
  $message .=     '</tbody>';
  $message .=   '</table>';
  $message .=   '<p style="font-family: Arial, sans-serif;font-weight: 100;font-style: italic;">Enviado pelo site Consultoria DNA de Vendas.</p>';
  $message .= '</div>';
  return $message;
  // fim mensagem
}

/**
 * Configura os campos para ir para o rd
 * 
 * @param array $data - informações do formulário
 * @return object - objeto preparado para envio
 * @author Vinicius de Santana
*/
function configuraEnviarParaRDPaginaContato($data){
  $args = new stdClass();
  $args->event_type = "CONVERSION";
  $args->event_family = "CDP";
  $args->payload = new stdClass();
  $args->payload->conversion_identifier = "/contato"."/";
  //a partir daqui é o conteúdo do form
  $args->payload->name = $data['nome'];
  $args->payload->email = $data['email'];
  $args->payload->cf_setor = $data['setor'];
  $args->payload->cf_vendedores_na_equipe = $data['nVendedores'];
  $args->payload->mobile_phone = $data['telefone'];
  $args->payload->cf_assunto = $data['assunto'];
  $args->payload->cf_urlorigem = $data['urlOrigem'];
  $args->payload->cf_mensagem = $data['mensagem'];
  return $args;
}

/**
 * Configura os campos para ir para o rd
 * 
 * @param object $args - campos já formatados para o rd
 * @return array|boolean - conteúdo ou false em caso de erros
 * @author Vinicius de Santana
*/
function enviaParaRD($args){
  $url = 'https://api.rd.services/platform/conversions?api_key=a3a5dd520bafab6ff8cc64d58f3f1e83';

  $header = array(
      'Content-type: application/json'
  );
  
  $json = json_encode($args);
  
  $opts = array('http' =>
      array(
          'method'  => 'POST',
          'header'  => $header,
          'content' => $json
      )
  );
  $context = stream_context_create($opts);
  $result = @file_get_contents($url, false, $context);
  if ( $result ) return json_decode($result);
  return false;
}