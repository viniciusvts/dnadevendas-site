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
   * Resgata lista de posts
   * @param {number} page - pagina a ser requisitada
   */
  getPosts(page) {
    let url = 'api/wp-json/wp/v2/posts/';
    if (typeof page !== 'undefined') {
      url+='?page='+page;
    }
    return axios.get(url, {
      headers: { 'Content-type': 'application/json' },
    });
  },

};
export default apiRest;
