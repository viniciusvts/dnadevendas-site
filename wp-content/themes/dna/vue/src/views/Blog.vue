<template>
  <section class="blog">
    <h1 class="d-none">O melhor blog de vendas do Brasil</h1>
    <div class="container-fluid">
      <BlogFilter/>
      <div class="content">
        <div class="row">
          <div v-if="posts.length > 0" class="col-12 col-lg-9 col-tb-12">
              <div class="cards"> 
                <div class="row">
                  <div v-for="(post, index) in posts"
                  :key="index"
                  class="mb-100px w-100">
                    <BlogCard v-bind:post="post" v-bind:index="index" />
                  </div>
                </div>
              </div>
            <Pagination :XWPTotalPages="XWPTotalPages"/>
          </div>
          <div v-else class="col-12 col-lg-9 col-tb-12">{{message}}</div>
          <div class="col-12 col-lg-3 col-tb-12">
            <Sidebar/>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>

  import BlogFilter from "@/components/BlogFilter.vue";
  import BlogCard from "@/components/BlogCard.vue";
  import Pagination from "@/components/Pagination.vue"; 
  import Sidebar from "@/components/Sidebar.vue";

  export default {
    name: 'Blog',
    components: {
      BlogFilter,
      BlogCard,
      Pagination,
      Sidebar
    },
    data() {
      return {
        posts: [],
        message: null,
        pageId: 329,
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
        this.$http.getPosts(args)
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
          this.post = json
          document.title = this.post.title.rendered
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