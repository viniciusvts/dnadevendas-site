<template>
  <div class="feedblog section">
      <BlogFilter/>

      <div class="bottom">
        <div class="container-fluid">
            <div class="row">
                <div v-for="(post, index) in posts" class="col-md-4" :key="index">
                    <div class="top">
                        <img src="https://www.dnadevendas.com.br/wp-content/uploads/consultoria-online-de-vendas.jpg" alt="">
                        <div class="bottom">
                            <h3>{{post.title.rendered}}</h3>
                            <div class="signature">
                            <div class="author">
                                <img v-bind:src="post.link" alt="">
                                <p>Lucia Haracemiv</p>
                            </div>
                            <div class="views">
                                <span>200</span>
                                <img src="@/assets/svg/book.svg" alt="">
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <router-link :to="{ name: 'Blog' }">
            <button>Veja mais</button>
        </router-link>
      </div>
  </div>
</template>

<script>
    import BlogFilter from "@/components/BlogFilter.vue";

    export default {
        name: 'Feedblog',
        data(){
            return{
                posts: null
            }
        },
        components: {
            BlogFilter,
        },
        methods:{
            getPosts(){
                fetch("https://www.dnadevendas.com.br/wp-json/wp/v2/posts/?per_page=3")
                .then(r => r.json())
                .then(r => {
                    this.posts = r;
                })
            }
        },
        created(){
            this.getPosts()
        }
    }
</script>

<style lang="scss">
    @import '@/assets/scss/variables.scss';
    @import '@/assets/scss/mixins.scss';
    @import '@/assets/scss/breakpoint.scss';
    @import '@/assets/scss/blogFilter.scss';
    @import '@/assets/scss/blogFeed.scss';
</style>
