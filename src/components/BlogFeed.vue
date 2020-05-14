<template>
  <div class="feedblog section">
      <BlogFilter/>

      <div class="bottom">
        <div class="container-fluid">
            <div class="row">
                <div v-for="(post, index) in posts" class="col-md-4" :key="index">
                    <div class="top">
                        <img :src="post.DNA_custom.thumb.large" alt="Imagem destaque do post">
                        <div class="bottom">
                            <h3>{{post.title.rendered}}</h3>
                            <div class="signature">
                            <div class="author">
                                <img :src="post.DNA_custom.author.thumb[48]" alt="Imagem do autor">
                                <p>{{post.DNA_custom.author.name}}</p>
                            </div>
                            <div class="views">
                                <span>{{post.DNA_custom.views}}</span>
                                <img src="@/assets/svg/book.svg" alt="livro">
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
    import Api from "@/services/ApiRest.js";

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
                let args = []
                args['per_page'] = 3
                Api.getPosts(args)
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
