<template>
  <section class="blog podcast fhd-max-width">
    <h1 class="d-none">O mais completo podcast de vendas do Brasil</h1>
    <picture v-if="page">
      <source :srcset="page.acf.banner.sizes.medium" media="(max-width: 400px)" class="mt-banner w-100">
      <source :srcset="page.acf.banner.sizes.large" media="(max-width: 1200px)" class="mt-banner w-100">
      <source :srcset="page.acf.banner.sizes.medium_large" media="(min-width: 1200px)" class="mt-banner w-100">
      <img :src="page.acf.banner.url" :alt="page.acf.banner.alt" class="mt-banner w-100">
    </picture>
    <PodcastLineSearch title="Episódios" placeholder="Pesquisar episódios" />
    <div class="container-fluid">
      <div class="content">
        <div class="row">
          <div v-if="posts.length > 0" class="col-12 col-tb-12">
              <div class="cards"> 
                <div class="row">
                  <div v-for="(post, index) in posts" :key="index" class="mb-100px w-100">
                    <PodcastCard v-bind:post="post" v-bind:index="index"/>
                  </div>
                </div>
              </div>
            <PaginationPodcast :XWPTotalPages="XWPTotalPages"/>
          </div>
          <div v-else class="col-12 col-lg-9 col-tb-12">{{message}}</div>
          <!-- <div class="col-12 col-lg-3 col-tb-12">
            <Sidebar/>
          </div> -->
        </div>
      </div>
    </div>
    <SolicitarContato />
  </section>
</template>

<script>

  import PodcastCard from "@/components/PodcastCard.vue";
  import PodcastLineSearch from "@/components/PodcastLineSearch.vue";
  import PaginationPodcast from "@/components/PaginationPodcast.vue"; 
  // import Sidebar from "@/components/Sidebar.vue";
  import SolicitarContato from "@/components/SolicitarContato.vue";

  export default {
    name: 'Podcast',
    components: {
      PodcastCard,
      PodcastLineSearch,
      PaginationPodcast,
      // Sidebar,
      SolicitarContato,
    },
    data() {
      return {
        posts: [],
        message: null,
        pageId: 10763,
        page: null,
        XWPTotalPages: null,
      }
    },
    created() {
      this.initPosts();
      this.getPage();
    },
    methods: {
      getPosts(args) {
        this.$http.getPodcasts(args)
        .then(res=>{
          if(res.status == 200) {
            this.XWPTotalPages = Number(res.headers.get('X-WP-TotalPages'));
            return res.json();
          } else
            this.message = 'Erro ao consultar os posts';
        })
        .then(json=>{
          this.posts = json;
        });
      },
      initPosts(){
        this.posts = [];
        this.message = 'Carregando Artigos';
        /**argumento para buscar os posts */
        let args = [];
        if (typeof this.$route.params.page != 'undefined') {
          args['page'] = this.$route.params.page;
        }
        // se não tenho dados de categoria, verifico se tenho que buscar dados da categoria
        if (typeof this.$route.params.categories != 'undefined') {
          args['categories'] = this.$route.params.categories;
        } else {
          if (typeof this.$route.params.cat != 'undefined') {
            this.message = 'Carregando Categorias';
            let catArgs = [];
            catArgs['slug'] = this.$route.params.cat;
            return this.$http.getCategories(catArgs)
            .then(resp => resp.json())
            .then(json => {
              this.$route.params.categories = json[0].id;
              this.initPosts()
            });
          }
        }
        // se não tenho dados de tag, verifico se tenho que buscar dados da tag
        if (typeof this.$route.params.tags != 'undefined') {
          args['tags'] = this.$route.params.tags;
        } else {
          if (typeof this.$route.params.tag != 'undefined') {
            this.message = 'Carregando Categorias';
            let tagArgs = [];
            tagArgs['slug'] = this.$route.params.tag;
            return this.$http.getTags(tagArgs)
            .then(resp => resp.json())
            .then(json => {
              this.$route.params.tags = json[0].id;
              this.initPosts()
            });
          }
        }
        this.getPosts(args);
      },
      getPage(){
        this.$http.getPagesById(this.pageId)
        .then(resp => resp.json())
        .then( json => {
          this.page = json
          document.title = this.page.title.rendered
        })
      }
    },
    watch: {
      '$route.params.page': function() {
        this.initPosts();
      },
      '$route.params.categories': function() {
        this.initPosts();
      },
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/blog.scss';
</style>