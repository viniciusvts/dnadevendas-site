<template>
  <section class="blogSingle section">
    <div class="container-fluid">
      <div class="row">
          <div class="col-1">
          </div>

          <div v-if="post" class="col-sm-12 col-md-8 content">
            <div class="thumbnail">
              <img :src="post.DNA_custom.thumb.large" alt="">
            </div>
            <div class="row single-information">
              <div class="row col-12 col-lg-6 social-col m-0">
                <img @click="iniciaSocialButtons" src="@/assets/svg/Facebook_logo.svg" alt="facebook logo" id="facebook">
                <img @click="iniciaSocialButtons" src="@/assets/svg/Twitter_logo.svg" alt="twitter logo" id="twitter">
                <img @click="iniciaSocialButtons" src="@/assets/svg/Linkedin_icon.svg" alt="linkedin logo" id="linkedin">
                <img @click="iniciaSocialButtons" src="@/assets/svg/Pinterest_Shiny_Icon.svg" alt="pinterest logo" id="pinterest">
              </div>
              <div class="col-12 col-lg-6 m-0">
                <p>{{postInformation}}</p>
              </div>
            </div>
            <h1>{{post.title.rendered}}</h1>
            <p class="breadcrumb">
              <router-link :to="{ name: 'Home' }">Home</router-link> / 
              <router-link :to="{ name: 'Blog' }">Blog</router-link> /
              {{post.title.rendered}}
            </p>
            <article v-html="post.content.rendered"></article>
          </div>

          <div v-else class="col-sm-12 col-md-8 content">{{message}}</div>

          <div class="col-md-3 col-sm-12">
            <Sidebar/>
          </div>
      </div>
      <SolicitarContato></SolicitarContato>
    </div>
  </section>
</template>


<script>

  import Sidebar from "@/components/Sidebar.vue";
  import SolicitarContato from '@/components/SolicitarContato.vue';
  // import UpMeta from "@/services/UpdateMeta.js";
  
  export default {
    name: "Contato",
    components: {
      SolicitarContato,
      Sidebar
    },
    // mixins:[UpMeta],
    data() {
      return {
        post: null,
        message: 'Carregando'
      }
    },
    mounted() {
      this.iniciaSocialButtons();
      if(typeof this.$route.params.post == 'undefined'){
        this.getPost(this.$route.params.slug);
      }else{
        this.post = this.$route.params.post;
      }
    },
    methods: {
      loadSumario(val) {
        let content = document.createElement('div');
        if(typeof val != 'undefined') {
          content.innerHTML = val;
        } else {
          content.innerHTML = this.post.content.rendered;
        }
        let h2List = content.getElementsByTagName('h2');
        //de posse da lista apago o conteúdo atual
        this.subtitulos = []
        h2List.forEach(elem => {
          this.subtitulos.push(elem.innerText);
        });
      },
      getPost(slug) {
        if (typeof slug == 'undefined') throw new TypeError("É necessário definir slug");
        let args = [];
        args['slug'] = slug;
        this.$http.getPosts(args)
        .then(res=>{
          if(res.status == 200)
            return res.json();
          else
            this.message = 'Erro ao carregar o post';
        })
        .then(json=>{
          this.post = json[0];
        });
      },
      iniciaSocialButtons(){
        var facebook = document.getElementById('facebook');
        if(facebook){
          facebook.addEventListener("click", function(){
              var link = "https://www.facebook.com/sharer/sharer.php?u="+document.URL;
              window.open(link);
          });
        }

        var pinterest = document.getElementById('pinterest');
        if(pinterest){
          pinterest.addEventListener("click", function(){
              var link = "https://www.pinterest.com/pin/create/button/?url="+document.URL;
              try{
                  var description = document.querySelector("meta[name='description']").getAttribute("content");
              }catch(e){
                  console.log("error", e);
              }
              if( description ){
                  link += "&description="+description;
              }
              window.open(link);
          });
        }

        var twitter = document.getElementById('twitter');
        if(twitter){
          twitter.addEventListener("click", function(){
              var link = "https://twitter.com/intent/tweet?url="+document.URL;
              try{
                  var titulo = document.querySelector("title").innerText;
              }catch(e){
                  console.log("error", e);
              }
              if( titulo ){
                  link += "&text="+titulo;
              }
              window.open(link);
          });
        }

        var linkedin = document.getElementById('linkedin');
        if(linkedin){
          linkedin.addEventListener("click", function(){
              var link = "https://www.linkedin.com/shareArticle?mini=true&url="+document.URL;
              try{
                  var titulo = document.querySelector("title").innerText;
              }catch(e){
                  console.log("error", e);
              }
              if( titulo ){
                  link += "&title="+titulo;
              }
              try{
                  var description = document.querySelector("meta[name='description']").getAttribute("content");
              }catch(e){
                  console.log("error", e);
              }
              if( description ){
                  link += "&summary="+description;
              }
              window.open(link);
          });
        }
      },
    },
    watch: {
      'post.id': function(val) {
        this.$http.postIterateView(val);
      },
      'post.yoast_title': function(val) {
        document.title = val
      }
    },
    computed: {
      postInformation () {
        // data: fevereiro, 2020
        const date = new Date(this.post.date);
        let dateToString = '';
        dateToString += date.toLocaleString('default', { month: 'long' });
        dateToString += ', ' + date.getFullYear();
        // monta a string a ser exibida
        let resp = '';
        resp += this.post.DNA_custom.author.name + " • ";
        resp += dateToString + " • ";
        resp += this.post.DNA_custom.views;
        if (this.post.DNA_custom.views == 1) resp += " visualização";
        else resp += " visualizações";
        return resp;
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>