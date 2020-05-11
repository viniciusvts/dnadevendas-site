<template>
  <section class="blog">
    <div class="container-fluid">
      <BlogFilter/>
      <div class="content">
        <div class="row">
          <div v-if="posts.length > 0" class="col-12 col-lg-9">
              <div class="cards"> 
                <div class="row">
                  <div v-for="post in posts" :key="post.id" class="mb-100px w-100">
                    <BlogCard v-bind:post="post"/>
                  </div>
                </div>
              </div>
            <Pagination/>
          </div>
          <div v-else class="col-12 col-lg-9">{{message}}</div>
          <div class="col-12 col-lg-3">
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
  import Api from "@/services/ApiRest.js"; 

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
        message: 'Carregando Posts'
      }
    },
    created() {
      this.initPosts();
    },
    methods: {
      getPosts(args) {
        Api.getPosts(args)
        .then(res=>{
          if(res.status == 200)
            return res.json();
          else
            this.message = 'Erro ao consultar os posts';
        })
        .then(json=>{
          this.posts = json;
        });
      },
      initPosts(){
        this.posts = [];
        /**argumento para buscar os posts */
        let args = [];
        if (typeof this.$route.params.page != 'undefined') {
          args['page'] = this.$route.params.page;
        }
        if (typeof this.$route.params.categories != 'undefined') {
          args['categories'] = this.$route.params.categories;
        }
        this.getPosts(args);
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