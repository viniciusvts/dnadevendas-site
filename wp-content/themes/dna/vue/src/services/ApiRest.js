/**
 * Comunicação com o servidor DNA
 * @author Vinicius de Santana
 */
const apiRest = {
  /**
   * define a url base do app
   * @author Vinicius de Santana
  */
  baseURL: process.env.NODE_ENV === 'production' ? '/' : 'https://www.dnadevendas.com.br/',
  /**
   * Resgata todos os usuários do banco se vc é adm, só o seu user se não
   * @author Vinicius de Santana
   */
  getHeader() {
    const url = this.baseURL + 'wp-json/dna_theme/v1/wp_header/';
    return fetch(url);
  },

  /**
   * Resgata o conteúdo do wp footer
   * @author Vinicius de Santana
   */
  getFooter() {
    const url = this.baseURL + 'wp-json/dna_theme/v1/wp_footer/';
    return fetch(url);
  },

  /**
   * Resgata lista de posts informando ou não qual página
   * @param {[]} args - args do endpoint do wordpress
   * @param {number} args.post_per_page - quantos posts por página -1 sem limite
   * @param {number} args.page - número da página visitada
   * @author Vinicius de Santana
   */
  getPosts(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
      //remove p último &
      urlArgs = urlArgs.substr(0, urlArgs.length-1);
    }
    let url = this.baseURL + 'wp-json/wp/v2/posts/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },
  
  /**
   * Resgata lista de posts pela quantidade de visualizações
   * função diferente pq o endpoint é diferente
   * @author Vinicius de Santana
   */
  getPostsByViews() {
    let url = this.baseURL + 'wp-json/dna_theme/v1/getPostsByViews/';
    return fetch(url);
  },

  /**
   * Resgata uma página pelo seu id
   * @param {number} id - Id da página
   * @author Vinicius de Santana
   */
  getPagesById(id) {
    if (!Number.isInteger(id))  throw new TypeError("O parametro precisa ser um número inteiro");
    let url = this.baseURL + 'wp-json/wp/v2/pages/' + id;
    return fetch(url);
  },

  /**
   * Resgata lista de páginas informando ou não qual página
   * @param {[]} args - args do endpoint do wordpress
   * @author Vinicius de Santana
   */
  getPages(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
      //remove p último &
      urlArgs = urlArgs.substr(0, urlArgs.length-1);
    }
    let url = this.baseURL + 'wp-json/wp/v2/pages/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },

  /**
   * Resgata informações do acf sobre a página
   * @param {Number} id - id da página
   * @param {String} field - dado do acf que se deseja obter
   * @author Vinicius de Santana
   */
  getPostsAcfData(id, field) {
    if (typeof id == 'undefined') throw new TypeError("O parametro id é obrigatório");
    let url = this.baseURL + 'wp-json/acf/v3/pages/';
    url += id +"/";
    if (typeof field != 'undefined') url += field +"/";
    return fetch(url);
  },
  
  /**
   * retorna as meta tags globais do site
   * @author Vinicius de Santana
   */
  getHomeMeta() {
    let url = this.baseURL + 'wp-json/wp-rest-yoast-meta/v1/home/';
    return fetch(url);
  },

  /**
   * Itera o contador do post
   * @param _id - id do post a ser iterado
   * @author Vinicius de Santana
   */
  postIterateView(_id) {
    let url = this.baseURL + 'wp-json/dna_theme/v1/post_count/' + _id;
    return fetch(url);
  },

  /**
   * Resgata lista de categorias padrão do wordpress
   * @param {[]} args - args do endpoint do wordpress
   * @author Vinicius de Santana
   */
  getCategories(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
    }
    let url = this.baseURL + 'wp-json/wp/v2/categories/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },

  /**
   * Resgata lista de tags padrão do wordpress
   * @param {[]} args - args do endpoint do wordpress
   * @author Vinicius de Santana
   */
  getTags(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
    }
    let url = this.baseURL + 'wp-json/wp/v2/tags/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },

  /**
   * Resgata a lista de portfólio com parametros
   * @param {[]} args - args da pagina a ser requisitada
   * @param {number} args.post_per_page - quantos posts por página -1 sem limite
   * @param {number} args.page - número da písitada
   * @author Vinicius de Santana
   */
  getPortfolio(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
    }
    let url = this.baseURL + 'wp-json/dna_theme/v1/portfolio';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },

  /**
   * Resgata a lista da taxonomia do portfólio
   * @author Vinicius de Santana
   */
  getTaxonomyPortfolio() {
    let url = this.baseURL + 'wp-json/dna_theme/v1/portfolio-taxonomy';
    return fetch(url);
  },

  /**
   * Envia formulário para o contact form
   * @param idForm - Id do form que receberá a transação
   * @param data - objeto a ser enviado para o form
   * @author Vinicius de Santana
   */
  sendToCF7(idForm, data) {
    if (typeof idForm == 'undefined') throw new TypeError("O parametro é obrigatório");
    if (typeof data == 'undefined') throw new TypeError("O parametro é obrigatório");
    //formar url
    let url = this.baseURL + 'wp-json/contact-form-7/v1/contact-forms/';
    url += idForm;
    url += '/feedback/';
    //formar conteúdo
    let formData = new FormData;
    for (const key in data) {
      formData.append(key, data[key]);
    }
    return fetch(url, {
      method: "POST",
      body: formData
    });
  },

  /**
   * Envia formulário para o RD Station
   * @param {String} indentificador - Identificador para o evento
   * @param {{}} data - objeto a ser enviado para o form
   * @author Vinicius de Santana
   */
  sendToRD(indentificador, data) {
    if (typeof indentificador == 'undefined') throw new TypeError("O parametro é obrigatório");
    if (typeof data == 'undefined') throw new TypeError("O parametro é obrigatório");
    data.conversion_identifier = indentificador;
    let url = 'https://api.rd.services/platform/conversions?api_key=a3a5dd520bafab6ff8cc64d58f3f1e83';
    let myHeaders = new Headers();
    myHeaders.append('Content-Type', 'application/json');
    let body = {
      "event_type": "CONVERSION",
      "event_family":"CDP",
      "payload": data
    }
    return fetch(url, {
      method: 'POST',
      body: JSON.stringify(body),
      headers: myHeaders,
    });
  },

  /**
   * Envia formulário para o wordpress
   * @param {String} url - Id do form que receberá a transação
   * @param {FormData} data - objeto a ser enviado para o form
   * @author Vinicius de Santana
   */
  sendFormToWP(url, data) {
    if (typeof url == 'undefined') throw new TypeError("O parametro é obrigatório");
    if (typeof data == 'undefined') throw new TypeError("O parametro é obrigatório");
    return fetch(url, {
      method: "POST",
      body: data
    });
  },

  //funções que auxiliam a aquisição de dados para envio pela api

  /** https://www.w3schools.com/js/js_cookies.asp */
  getCookie(cname) {
    let name = `${cname}=`;
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for (let i = 0; i < ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) === " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) === 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  },
  
  /**
   * Pega parametros passados pela uri
   * @param {String} param - parâmetro que se quer pegar
   * @author Vinicius de Santana
   */
  getUriParam(param) {
    var params = window.location.search.substr(1).split('&');
    for (var i = 0; i < params.length; i++) {
        var par = params[i].split('=');
        if (par[0] == param) {
            return decodeURIComponent(par[1]);
        }
    }
    return '';
  },
};
export default apiRest;
