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
const axios = require('axios');

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
    const url = 'api/wp-json/dna_theme/v1/wp_header/';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

  /**
   * Resgata o conteúdo do wp footer
   * @author Vinicius de Santana
   */
  getFooter() {
    const url = 'api/wp-json/dna_theme/v1/wp_footer/';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
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
    }
    let url = '/api/wp-json/wp/v2/posts/';
    if (urlArgs.length > 0){
      url += "?" + urlArgs;
    }
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
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
   * @author Vinicius de Santana
   */
  getTaxonomyPortfolio() {
    let url = '/api/wp-json/dna_theme/v1/portfolio-taxonomy';
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
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
    let url = '/api/wp-json/contact-form-7/v1/contact-forms/';
    url += idForm;
    url += '/feedback/';
    //formar conteúdo
    let formData = new FormData;
    for (const key in data) {
      formData.append(key, data[key]);
    }
    return axios.post(url, formData, {
      headers: { 'Content-type': 'multipart/form-data' },
    });
  },

};
export default apiRest;
