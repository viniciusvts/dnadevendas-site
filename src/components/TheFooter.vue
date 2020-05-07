<template>
  <footer>
    <div class="footer section">
      <div class="top">
        <div class="row">
          <div class="col-md-2 ">
            <h3>Contato</h3>
            <p>
              <b>Salvador</b><br>
              <a href="tel:+55 (71) 3289-5595">+55 (71) 3289-5595</a>
            </p>
            <p>
              <b>São Paulo</b> <br>
              <a href="tel:+55 (11) 2384-1502">+55 (11) 2384-1502</a>
            </p>
            <p>
              <b>Belo Horizonte</b> <br>
              <a href="tel:+55 (31) 4042-0442">+55 (31) 4042-0442</a>
            </p>
            <p>
              <b>Rio de Janeiro</b> <br>
              <a href="tel:+55 (21) 4042-6965">+55 (21) 4042-6965</a>
            </p>
          </div>

          <div class="col-md-2">
            <h3>Saiba Mais</h3>
            <ul>
              <li>
                <router-link :to="{ name: 'ForSmall' }">Consultoria de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'Trainning' }">Treinamento de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'Workshops' }">Workshop de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'ForSmall' }">Consultoria de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'Talk' }">Palestra de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'Materials' }">Materiais de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'Blog' }">Blog de Vendas</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'ForSmall' }">Consultoria Comercial</router-link>
              </li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Últimos Posts</h3>
            <ul>
              <li v-for="post in ultPosts" :key="post.id" >
                <router-link :to="{ name: 'SingleBlog', params: { slug: post.slug, post: post } }">{{post.title.rendered}}</router-link>
              </li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Receba conteúdos exclusivos</h3>
            <form name="dna_newsletter" action="#" v-on:submit="sendForm">
              <input type="text" v-model="formData.nome" name="Nome" placeholder="Insira seu nome*" id="nome">
              <input type="email" v-model="formData.email" placeholder="Seu e-mail*" nome="email" id="email">
              <p>{{formMessage}}</p>
              <p>* Campos obrigatórios</p>
              <input type="submit" value="Quero me inscrever">
            </form>
          </div>

        </div>
      </div>

      <div class="bottom">
        <div class="row">
          <div class="col-md-12">
            <h4>Clientes atendidos em:</h4>
            <p>Acre • Alagoas • Amapá • Amazonas • Bahia • Ceará • Distrito Federal • Espírito Santo • Goiás • Maranhão • Mato Grosso • Mato Grosso do Sul • Minas Gerais • Pará • Paraíba •Paraná • Pernambuco • Piauí • Rio de Janeiro • Rio Grande do Norte • Rio Grande do Sul • Rondônia • Roraima • Santa Catarina • São Paulo • Sergipe • Tocantins</p>
          </div>

          <div class="col-md-12">
            <hr>
          </div>

          <div class="col-12">
            <ul class="social">
              <li>
                <a href="https://www.facebook.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/facebook.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/instagram.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/company/dna-de-vendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/linkedin.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/channel/UCFVjn3D1_niovczni8e9jeg" target="_blank" noreferrer>
                  <img src="@/assets/svg/youtube.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://br.pinterest.com/dnadevendas/" target="_blank" noreferrer>
                  <img src="@/assets/svg/pinterest.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://twitter.com/dnadevendas" target="_blank" noreferrer>
                  <img src="@/assets/svg/twitter.svg" alt="">
                </a>
              </li>
            </ul>
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
import Api from "@/services/ApiRest.js";

export default {
  name: "TheFooter",
  data() {
    return {
      formMessage: null,
      ultPosts: [],
      formData: {
        nome: null,
        email: null,
      }
    }
  },
  created() {
    this.getFooterPosts();
  },
  methods: {
    getFooterPosts() {
      let args = [];
      args['per_page'] = 5;
      Api.getPosts(args)
      .then(res=>{
        if(res.status == 200)
          return res.json();
        else
          console.log('Erro ao consultar os posts');
      })
      .then(json=>{
        this.ultPosts = json;
      });
    },
    sendForm(evt) {
      evt.preventDefault();
      Api.sendToCF7(3795, this.formData)
      .then(res => {
        return res.json();
      })
      .then(json => {
        this.formMessage = json.message;
      });
    }
  }
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/footer.scss';
</style>
