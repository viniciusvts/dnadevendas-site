<template>
  <footer>
    <div class="footer section container-fluid">
      <div class="top">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-2">
            <h3>Contato</h3>
            <p>
              <b>São Paulo</b>
              <br />
              <a href="tel:+55 (11) 2384-1502">Fone: (11) 2384-1502</a>
            </p>
            <p>
              <b>Belo Horizonte</b>
              <br />
              <a href="tel:+55 (31) 4042-0442">Fone: (31) 4042-0442</a>
            </p>
            <p>
              <b>Rio de Janeiro</b>
              <br />
              <a href="tel:+55 (21) 4042-5440">Fone: (21) 4042-5440</a>
            </p>
            <p>
              <b>Salvador</b>
              <br />
              <a href="tel:+55 (71) 3289-5595">Fone: (71) 3289-5595</a>
            </p>
          </div>

          <div class="col-12 col-md-6 col-lg-2">
            <h3>Saiba Mais</h3>
            <ul>
              <li v-for="(item, index) in menuSaibaMais" v-bind:key="index">
                <a
                  :href="item.url"
                  target="_blank"
                  rel="noopener noreferrer"
                >{{item.title}}</a>
              </li>
            </ul>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <h3>Últimos Posts</h3>
            <ul>
              <li v-for="post in ultPosts" :key="post.id" class="af-l-2 mb-3">
                <router-link
                  :to="{ name: 'SingleBlog', params: { slug: post.slug, post: post } }"
                >{{post.title.rendered}}</router-link>
              </li>
            </ul>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <h3>Receba conteúdos exclusivos</h3>
            <form name="newsletterform"
            method="POST"
            :action="$http.baseURL + 'wp-json/dna_theme/v1/contato-footer'"
            @submit="sendForm">
              <input type="hidden" name="urlOrigem" id="urlOrigem-foot" required />
              <input type="hidden" name="traffic_source" id="traffic_source-foot">
              <input type="hidden" name="traffic_medium" id="traffic_medium-foot">
              <input type="hidden" name="traffic_campaign" id="traffic_campaign-foot">
              <input type="hidden" name="traffic_value" id="traffic_value-foot">
              <input type="text" name="nome" placeholder="Insira seu nome*" id="nome" required />
              <input type="email" placeholder="Seu e-mail*" name="email" id="email" required />
              <p>* Campos obrigatórios</p>
              <input type="submit" value="Quero me inscrever" />
            </form>
          </div>

          <div class="col-12">
            <div class="address">
              <b>Endereço</b>
              <p>Av. Maj. Sylvio de Magalhães Padilha 5200, América Business Park, Ed. Montreal 8º andar, Morumbi - São Paulo</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bottom">
        <div class="row align-items-end">
          <div class="col">
            <h4>Clientes atendidos em:</h4>
            <p>Acre • Alagoas • Amapá • Amazonas • Bahia • Ceará • Distrito Federal • Espírito Santo • Goiás • Maranhão • Mato Grosso • Mato Grosso do Sul • Minas Gerais • Pará • Paraíba •Paraná • Pernambuco • Piauí • Rio de Janeiro • Rio Grande do Norte • Rio Grande do Sul • Rondônia • Roraima • Santa Catarina • São Paulo • Sergipe • Tocantins</p>
          </div>

          <div class="col-md-auto">
            <ul class="social">
              <li>
                <a href="https://www.facebook.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/facebook.svg" alt />
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/instagram.svg" alt />
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/dna-de-vendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/linkedin.svg" alt />
                </a>
              </li>
              <li>
                <a
                  href="https://www.youtube.com/channel/UCFVjn3D1_niovczni8e9jeg"
                  target="_blank"
                  noreferrer
                >
                  <img src="@/assets/svg/youtube.svg" alt />
                </a>
              </li>
              <li>
                <a href="https://br.pinterest.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/pinterest.svg" alt />
                </a>
              </li>
              <li>
                <a href="https://twitter.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/twitter.svg" alt />
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <hr />
          </div>

          <div class="col">
            <p>© Copyright 2020. Direitos Reservados - DNA de Vendas</p>
          </div>

          <div class="col-md-auto">
            <router-link to="/politicas-de-privacidade">
              <p>Políticas de privacidade</p>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "TheFooter",
  data() {
    return {
      formMessage: null,
      ultPosts: [],
      menuSaibaMais: [],
    };
  },
  created() {
    this.getMenuSaibaMais();
    this.getFooterPosts();
  },
  mounted() {
    // completa o formulário com alguns dados
    setTimeout(()=>{
      document.getElementById('urlOrigem-foot').value = location.href
      document.getElementById('traffic_source-foot').value = this.$http.getUriParam('utm_source') ? this.$http.getUriParam('utm_source') : this.$http.getCookie('__trf.src')
      document.getElementById('traffic_medium-foot').value = this.$http.getUriParam('utm_medium')
      document.getElementById('traffic_campaign-foot').value = this.$http.getUriParam('utm_campaign')
      document.getElementById('traffic_value-foot').value = this.$http.getUriParam('utm_term')
    }, 2000)
  },
  methods: {
    getFooterPosts() {
      let args = [];
      args["per_page"] = 5;
      this.$http.getPosts(args)
        .then(res => {
          if (res.status == 200) return res.json();
          else console.log("Erro ao consultar os posts");
        })
        .then(json => {
          this.ultPosts = json;
        });
    },
    sendForm (evt) {
      evt.preventDefault()
      const formData = new FormData(evt.target)
      const url = evt.target.action
      this.$http.sendFormToWP(url, formData)
      .then(resp => {
        if (resp.ok) return resp.json()
        alert('Houve um erro ao enviar,\nTente novamente.')
      })
      .then(json => {
        location.href = json.data.url
      })
    },
    getMenuSaibaMais() {
      this.$http.getMenuItens('footer-saiba-mais')
        .then(res => {
          if (res.status == 200) return res.json();
          else console.log("Erro ao consultar os posts");
        })
        .then(json => {
          this.menuSaibaMais = json;
        });
    },
  }
};
</script>

<style lang="scss">
@import "@/assets/scss/variables.scss";
@import "@/assets/scss/mixins.scss";
@import "@/assets/scss/breakpoint.scss";
@import "@/assets/scss/footer.scss";
</style>
