/**
 * define a url base do app
 * @author Vinicius de Santana
*/
const baseURL = process.env.NODE_ENV === 'production' ? '/api/' : 'https://novo.dnadevendas.com.br/api/';
/**
 * Comunicação com o servidor DNA
 * @author Vinicius de Santana
 */
const apiRest = {

  /**
   * Resgata todos os usuários do banco se vc é adm, só o seu user se não
   * @author Vinicius de Santana
   */
  getHeader() {
    const url = baseURL + 'wp-json/dna_theme/v1/wp_header/';
    return fetch(url);
  },

  /**
   * Resgata o conteúdo do wp footer
   * @author Vinicius de Santana
   */
  getFooter() {
    const url = baseURL + 'wp-json/dna_theme/v1/wp_footer/';
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
    let url = baseURL + 'wp-json/wp/v2/posts/';
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
    let url = baseURL + 'wp-json/dna_theme/v1/getPostsByViews/';
    return fetch(url);
  },

  /**
   * Resgata uma página pelo seu id
   * @param {number} id - Id da página
   * @author Vinicius de Santana
   */
  getPagesById(id) {
    if (!Number.isInteger(id))  throw new TypeError("O parametro precisa ser um número inteiro");
    let url = baseURL + 'wp-json/wp/v2/pages/' + id;
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
    let url = baseURL + 'wp-json/wp/v2/pages/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return fetch(url);
  },

  /**
   * Resgata informações do acf
   * @param {Number} id - id da página
   * @param {String} field - dado do acf que se deseja obter
   * @author Vinicius de Santana
   */
  getPostsAcfData(id, field) {
    if (typeof id == 'undefined') throw new TypeError("O parametro id é obrigatório");
    let url = baseURL + 'wp-json/acf/v3/pages/';
    url += id +"/";
    if (typeof field != 'undefined') url += field +"/";
    return fetch(url);
  },
  
  /**
   * retorna as meta tags globais do site
   * @author Vinicius de Santana
   */
  getHomeMeta() {
    let url = baseURL + 'wp-json/wp-rest-yoast-meta/v1/home/';
    return fetch(url);
  },

  /**
   * Itera o contador do post
   * @param _id - id do post a ser iterado
   * @author Vinicius de Santana
   */
  postIterateView(_id) {
    let url = baseURL + 'wp-json/dna_theme/v1/post_count/' + _id;
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
    let url = baseURL + 'wp-json/wp/v2/categories/';
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
    let url = baseURL + 'wp-json/dna_theme/v1/portfolio';
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
    let url = baseURL + 'wp-json/dna_theme/v1/portfolio-taxonomy';
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
    let url = baseURL + 'wp-json/contact-form-7/v1/contact-forms/';
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

};
export default apiRest;
