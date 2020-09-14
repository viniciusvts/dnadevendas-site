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
                <a href="#" id="facebook" target="_blank">
                  <img src="@/assets/svg/facebook-circle.svg" alt="facebook logo">
                </a>
                <a href="#" id="twitter" target="_blank">
                  <img src="@/assets/svg/twitter-circle.svg" alt="twitter logo">
                </a>
                <a href="#" id="linkedin" target="_blank">
                  <img src="@/assets/svg/linkedin-circle.svg" alt="linkedin logo">
                </a>
                <a href="#" id="pinterest" target="_blank">
                  <img src="@/assets/svg/pinterest-circle.svg" alt="pinterest logo">
                </a>
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
            <div class="sumary d-none d-md-block">
              <h2>Sumário</h2>
              <ul>
                <li v-for="sub in listOfTitles" :key="sub">
                  <a :href="'#'+sub.href" v-html="sub.text"></a>
                </li>
              </ul>
            </div>
            <article ref="content" v-html="post.content.rendered"></article>
          </div>

          <div v-else class="col-sm-12 col-md-6 content">{{message}}</div>

          <div class="col-sm-12 col-md-3">
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
    name: "SingleBlog",
    components: {
      SolicitarContato,
      Sidebar
    },
    // mixins:[UpMeta],
    data() {
      return {
        post: null,
        message: 'Carregando',
        listOfTitles: []
      }
    },
    mounted() {
      if(typeof this.$route.params.post == 'undefined'){
        this.getPost(this.$route.params.slug);
      }else{
        this.post = this.$route.params.post;
        this.$nextTick(this.setTitles)
        this.$nextTick(this.iniciaSocialButtons)
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
          this.$nextTick(this.setTitles)
        });
      },
      setTitles () {
        const allH2 = this.$el.querySelectorAll('article h2');
        for (var i = 0; i < allH2.length; i++) {
          const newId = 't'+ i
          // se liga aqui que eu coloco id no elemento anterior, para dar a margem da menubar
          // caso não tenha elemento anterior (geralmente forms rd e etc) pula
          if (allH2[i].previousElementSibling) allH2[i].previousElementSibling.id = newId
          else continue
          this.listOfTitles.push({
            text: allH2[i].innerText,
            href: newId
          })
        }
      },
      iniciaSocialButtons(){
        var facebook = document.getElementById('facebook');
        if(facebook){
          var linkFace = "https://www.facebook.com/sharer/sharer.php?u="+document.URL;
          facebook.href = linkFace;
        }

        var pinterest = document.getElementById('pinterest');
        if(pinterest){
          var linkPint = "https://www.pinterest.com/pin/create/button/?url="+document.URL;
          try{
              var descriptionP = document.querySelector("meta[name='description']").getAttribute("content");
          }catch(e){
              console.log("error", e);
          }
          if( descriptionP ){
              linkPint += "&description="+descriptionP;
          }
          pinterest.href = linkPint;
        }

        var twitter = document.getElementById('twitter');
        if(twitter){
          var linkTwitter = "https://twitter.com/intent/tweet?url="+document.URL;
          try{
              var tituloTt = document.querySelector("title").innerText;
          }catch(e){
              console.log("error", e);
          }
          if( tituloTt ){
              linkTwitter += "&text="+tituloTt;
          }
          twitter.href =linkTwitter;
        }

        var linkedin = document.getElementById('linkedin');
        if(linkedin){
          var linkLinkedin = "https://www.linkedin.com/shareArticle?mini=true&url="+document.URL;
          try{
              var tituloLI = document.querySelector("title").innerText;
          }catch(e){
              console.log("error", e);
          }
          if( tituloLI ){
              linkLinkedin += "&title="+tituloLI;
          }
          try{
              var descriptionL = document.querySelector("meta[name='description']").getAttribute("content");
          }catch(e){
              console.log("error", e);
          }
          if( descriptionL ){
              linkLinkedin += "&summary="+descriptionL;
          }
          linkedin.href = linkLinkedin;
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
        resp += dateToString;
        return resp;
      },
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>