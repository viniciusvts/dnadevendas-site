<template>
  <section class="blog">
    <div class="container-fluid">
      <BlogFilter/>
      <div class="content">
        <div class="columns">
          <div class="column" v-if="posts.length > 0">
              <div class="cards"> 
                <div class="columns">
                  <div v-for="post in posts" :key="post.id" >
                    <BlogCard v-bind:post="post"/>
                  </div>
                </div>
              </div>
            <Pagination/>
          </div>
          <div v-else>{{message}}</div>
          <div class="column">
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
        message: 'Carregando'
      }
    },
    mounted() {
      this.getPosts();
    },
    methods: {
      getPosts() {
        let args = [];
        if (typeof this.$route.params.page != 'undefined') {
          args['page'] = this.$route.params.page;
        }
        Api.getPosts(args)
        .then(res=>{
          this.posts = res.data;
        })
        .catch(err=>{
          this.message = 'Erro ao consultar os posts';
          console.warn('error =>', err);
        });
      }
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/blog.scss';
</style>