<template>
  <section class="blogSingle podcast section">
    <div class="container-fluid">
      <div class="row">
          <div v-if="post" class="col-sm-12 content fhd-max-width">
            <!-- use HeadSinglePodcastv1 só com spotify -->
            <!-- use HeadSinglePodcastv2 spotify e yt, com bg gradient -->
            <HeadSinglePodcastv3 :postDataAcf="post.acf" :postDate="post.date" />
            <div class="row single-information">
              <div class="confiratbm col-12 col-lg">
                <p v-if="post.acf.youtube ||
                post.acf.souncloud ||
                post.acf.deezer ||
                post.acf.applepodcast ||
                post.acf.googlepodcast">
                  Confira também:
                </p>
                <a v-if="post.acf.youtube" :href="post.acf.youtube" target="_blank">
                  <img src="@/assets/youtube-logo-9.jpg" alt="youtube logo">
                </a>
                <a v-if="post.acf.souncloud" :href="post.acf.souncloud" target="_blank">
                  <img src="@/assets/soudcloudlogo.png" alt="soundclud logo">
                </a>
                <a v-if="post.acf.deezer" :href="post.acf.deezer" target="_blank">
                  <img src="@/assets/deezer.jpg" alt="deezer logo">
                </a>
                <a v-if="post.acf.applepodcast" :href="post.acf.applepodcast" target="_blank">
                  <img src="@/assets/Apple-Podcast.png" alt="applepodcast logo">
                </a>
                <a v-if="post.acf.googlepodcast" :href="post.acf.googlepodcast" target="_blank">
                  <img src="@/assets/Google-Podcasts.png" alt="googlepodcast logo">
                </a>
              </div>
              <div class="row col-12 col-lg-3 col-xl-4 social-col m-0 ml-auto">
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
  import HeadSinglePodcastv3 from "@/components/HeadSinglePodcastv3.vue";
  
  export default {
    name: "PodcastSingle",
    components: {
      PodcastLineSearch,
      SolicitarContato,
      PodcastCard,
      HeadSinglePodcastv3,
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