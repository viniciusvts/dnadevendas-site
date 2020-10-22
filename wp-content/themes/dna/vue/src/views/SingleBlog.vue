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
                <a :href="linkFace" target="_blank">
                  <img src="@/assets/svg/facebook-circle.svg" alt="facebook logo">
                </a>
                <a :href="linkTwitter" id="twitter" target="_blank">
                  <img src="@/assets/svg/twitter-circle.svg" alt="twitter logo">
                </a>
                <a :href="linkLinkedin" id="linkedin" target="_blank">
                  <img src="@/assets/svg/linkedin-circle.svg" alt="linkedin logo">
                </a>
                <a :href="linkPint" target="_blank">
                  <img src="@/assets/svg/pinterest-circle.svg" alt="pinterest logo">
                </a>
                <a :href="linkWhats" target="_blank">
                  <img src="@/assets/whats.png" alt="whatsapp logo">
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
            <div class="sumary d-none d-md-block" v-if="createTheSumaryOfThisSlug(this.post.slug)">
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
        this.$nextTick(this.makeSummary)
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
          this.$nextTick(this.makeSummary)
        });
      },
      /** faz um sumário ná página do blogpost
       * @author Vinicius de Santana
       */
      makeSummary () {
        if (!this.createTheSumaryOfThisSlug(this.post.slug)) return
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
      /** Cliente tem uma lista de blogposts que não quer o sumário?
       * Inserir o slug dos blogposts no array que o sumário não aparecerá
       * @author Vinicius de Santana
       */
      createTheSumaryOfThisSlug (slug) {
        if (typeof slug != 'string')
          throw new TypeError("É necessário passar uma string como parametro")
        var titlesIDontWantToSummarize = [
          'termos-de-vendas-atualizados'
        ]
        for (let i = 0; i < titlesIDontWantToSummarize.length; i++) {
          if (titlesIDontWantToSummarize[i] == slug) return false
        }
        return true
      },
      initRdForms () {
        /** o atributo "role" é comum dos forms do rd */
        const allDivsWithRole = this.$refs.content.querySelectorAll('[role="main"]')
        // se tem alguma div do rd vou adicionar o script do rd e iniciar os forms
        if (allDivsWithRole.length > 0) {
          // primeiro adiciona o script do RD
          const script = document.createElement('script')
          script.src = 'https://d335luupugsy2.cloudfront.net/js/rdstation-forms/stable/rdstation-forms.min.js'
          document.body.append(script)
          // após adicionar o script ao dom, esperar o script bbaixar
          const verifyRD = setInterval(()=>{
            if (typeof window.RDStationForms == 'function'){
              clearInterval(verifyRD)
              for (const form of allDivsWithRole) {
                new window.RDStationForms(form.id, 'UA-25914892-1')
                  .createForm()
              }
            }
          }, 200)
        }
      }
    },
    watch: {
      'post.id': function(val) {
        this.$http.postIterateView(val);
      },
      'post.yoast_title': function(val) {
        document.title = val
      },
      // ao atualizar o conteúdo do post verificarei se tem div do RD
      'post.content.rendered': function() {
        this.$nextTick(this.initRdForms)
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
      linkFace () {
        var link = "https://www.facebook.com/sharer/sharer.php?u="+document.URL;
        return link;
      },
      linkPint () {
          var link = "https://www.pinterest.com/pin/create/button/?url="+document.URL;
          //imagem  
          var imagemDestaq = this.post.DNA_custom.thumb.full
          if( imagemDestaq ){
              link += "&media="+imagemDestaq;
          }
          //descrição
          try{
              var descriptionP = document.querySelector("meta[name='description']").getAttribute("content");
          }catch(e){
              console.log("error", e);
          }
          if( descriptionP ){
              link += "&description="+descriptionP;
          }
        return link;
      },
      linkTwitter () {
        var link = "https://twitter.com/intent/tweet?url="+document.URL;
        try{
            var tituloTt = document.querySelector("title").innerText;
        }catch(e){
            console.log("error", e);
        }
        if( tituloTt ){
            link += "&text="+tituloTt;
        }
        return link;
      },
      linkLinkedin () {
        var link = "https://www.linkedin.com/shareArticle?mini=true&url="+document.URL;
        try{
            var tituloLI = document.querySelector("title").innerText;
        }catch(e){
            console.log("error", e);
        }
        if( tituloLI ){
            link += "&title="+tituloLI;
        }
        try{
            var descriptionL = document.querySelector("meta[name='description']").getAttribute("content");
        }catch(e){
            console.log("error", e);
        }
        if( descriptionL ){
            link += "&summary="+descriptionL;
        }
        return link;
      },
      linkWhats () {
        var link = "https://api.whatsapp.com/send?text=Visite esse site: "+document.URL;
        return link;
      },
      
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>