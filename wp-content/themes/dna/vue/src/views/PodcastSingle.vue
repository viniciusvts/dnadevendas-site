<template>
  <section class="blogSingle podcast section">
    <div class="container-fluid">
      <div class="row">
          <div class="col-1">
          </div>

          <div v-if="post" class="col-sm-12 col-xl-11 content">
            <div class="d-flex thumbnail">
              <div class="iframe" v-html="post.acf.embed_spotify">
              </div>
              <div class="info d-none d-lg-block">
                <p class="top">A Ciência da Venda</p>
                <h1 v-html="post.acf.titulo_single"></h1>
                <div class="bottom row mt-date">
                  <span class="col-6">{{post.acf.nome_dos_participantes}}</span>
                  <span class="offset-3 ml-auto d-flex">{{getOcidentalDate(post.date)}}</span>
                </div>
              </div>
            </div>
            <div class="row single-information mt-5">
              <div class="row col-12 col-lg-6 social-col m-0 mt-md-5">
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
            </div>
            <article ref="content" class="mt-article" v-html="post.acf.descricao"></article>
          </div>

          <div v-else class="col-sm-12 col-xl-6 content">{{message}}</div>
          
          <PodcastLineSearch title="Mais Episódios" placeholder="Pesquisar episódios" />

          <div class="container-fluid">
            <div class="content">
              <div class="row">
                <div  class="col-12 col-tb-12">
                    <div class="cards"> 
                      <div class="row">
                        <div v-for="post in postsRelacionados" :key="post.id" class="mb-100px w-100">
                          <PodcastCard v-bind:post="post"/>
                        </div>
                      </div>
                    </div>
                  <!-- <PaginationPodcast :XWPTotalPages="XWPTotalPages"/> -->
                </div>
                <!-- <div v-else class="col-12 col-lg-9 col-tb-12">{{message}}</div> -->
              </div>
            </div>
          </div>

          <!-- <div class="col-sm-12 col-xl-3">
            <Sidebar/>
          </div> -->
      </div>
      <SolicitarContato></SolicitarContato>
    </div>
  </section>
</template>


<script>

  // import Sidebar from "@/components/Sidebar.vue";
  import PodcastLineSearch from '@/components/PodcastLineSearch.vue';
  import SolicitarContato from '@/components/SolicitarContato.vue';
  import PodcastCard from '@/components/PodcastCard.vue';
  // import PaginationPodcast from '@/components/PaginationPodcast.vue';
  // import UpMeta from "@/services/UpdateMeta.js";
  
  export default {
    name: "PodcastSingle",
    components: {
      PodcastLineSearch,
      SolicitarContato,
      PodcastCard,
      // PaginationPodcast,
      // Sidebar
    },
    // mixins:[UpMeta],
    data() {
      return {
        post: null,
        message: 'Carregando',
        listOfTitles: [],
        postsRelacionados: null,
        XWPTotalPages: 0,
      }
    },
    mounted() {
      if(typeof this.$route.params.post == 'undefined'){
        this.getPost(this.$route.params.slug);
      }else{
        this.post = this.$route.params.post;
      }
      this.getPodcasts();
    },
    methods: {
      getPost(slug) {
        if (typeof slug == 'undefined') throw new TypeError("É necessário definir slug");
        let args = [];
        args['slug'] = slug;
        this.$http.getPodcasts(args)
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
      getPodcasts() {
        let args = Array();
        args['per_page'] = 3;
        this.$http.getPodcasts(args)
        .then(res=>{
          if(res.status == 200){
            this.XWPTotalPages = Number(res.headers.get('X-WP-TotalPages'));
            return res.json();
          }
        })
        .then(json=>{
          this.postsRelacionados = json;
        });
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
      },
      getOcidentalDate(date){
        var dateObj = new Date(date)
        return dateObj.toLocaleDateString();
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
      linkFace () {
        var link = "https://www.facebook.com/sharer/sharer.php?u="+document.URL;
        return link;
      },
      linkPint () {
          var link = "https://www.pinterest.com/pin/create/button/?url="+document.URL;
          //imagem  
          var imagemDestaq = this.post.acf.imagem_destaque.sizes.thumbnail
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