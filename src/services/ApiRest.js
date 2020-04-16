/**
 * @description https://github.com/axios/axios
 * @example
      .then((response) => {
        //do anything
      })
      .catch((error) => {
        //do anything in error
      })
      .finally(() => {
        // always executed
      });
*/
const axios = require('axios').default;

/**
 * Comunicação com o servidor DNA
 */
const apiRest = {

  /**
   * Resgata todos os usuários do banco se vc é adm, só o seu user se não
   */
  getHeader() {
    const url = 'api/wp-json/dna_theme/v1/wp_header/';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata o conteúdo do wp footer
   */
  getFooter() {
    const url = 'api/wp-json/dna_theme/v1/wp_footer/';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata lista de posts informando ou não qual página
   * @param {number} slug - pagina a ser requisitada
   */
  getPosts(page) {
    let url = '/api/wp-json/wp/v2/posts/';
    if (typeof page !== 'undefined') {
      url+='?page='+page;
    }
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata um post informando o slug
   * @param {String} slug - slug da pagina a ser requisitada
   */
  getPost(slug) {
    let url = '/api/wp-json/wp/v2/posts/';
    if (typeof slug == 'undefined') throw new TypeError("É necessário definir slug");
    url+='?slug='+slug;
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata a lista de portfólio com parametros
   * @param {[]} args - args da pagina a ser requisitada
   * @param {number} args.post_per_page - quantos posts por página -1 sem limite
   * @param {number} args.page - número da písitada
   */
  getPortfolio(args) {
    let urlArgs = "";
    if (typeof args != 'undefined'){
      if (!Array.isArray(args))  throw new TypeError("O parametro precisa ser array");
      for (const key in args) {
        urlArgs += key + "=" + args[key] + "&";
      }
    }
    let url = '/api/wp-json/dna_theme/v1/portfolio';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata a lista da taxonomia do portfólio
   */
  getTaxonomyPortfolio() {
    let url = '/api/wp-json/dna_theme/v1/portfolio-taxonomy';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

};
export default apiRest;
