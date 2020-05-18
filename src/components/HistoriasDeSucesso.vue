<template>
  <section class="section historias">
    <div class="title">
      <h2>Mais histórias de sucesso</h2>
      <span></span>
    </div>
    <div class="container">
      <div class="row sec-card">
        <div v-for="item in posts" :key="item.id" class="col-sm-12 col-tb-12 col-md-6">
          <div class="card-historias">
            <router-link :to="{ name: 'SingleBlog', params: { slug: item.slug, post: item } }">
              <img :src="item.DNA_custom.thumb.medium" alt="Img historia">
            </router-link>
            <div class="img-field-h"></div>
            <div class="preenche"></div>
            <div class="text-historia">
              <p>
                {{ item.title.rendered }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <router-link :to="{ name: 'BlogCat', params: { cat: 'cases-de-sucesso', page: 1, categories: 130} }">
        <p class="centered"><button class="fsmall-btn">Ver mais Artigos</button></p>
      </router-link>
    </div>
  </section>
</template>

<script>
import Api from '../services/ApiRest';

export default {
  name: 'hsitorias-de-desucesso',
  data() {
    return {
      posts: [],
      postId: 130,
    };
  },
  mounted() {
    this.getPosts();
  },
  methods: {
    // getPosts() {
    //   const ctx = this;
    //   fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/posts?categories=${this.postId}`)
    //     .then(r => r.json())
    //     .then(r => {
    //       ctx.posts = r;
    //       ctx.posts.forEach(element => {
    //         fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/media/${element.featured_media}`)
    //         .then(f => f.json())
    //         .then(f => {
    //           element.template = f.guid.rendered;
    //         });
    //       });
    //   })
    // },
    getPosts(args) {
        Api.getPosts(args)
        .then(res=>{
          if(res.status == 200)
            return res.json();
          else
            this.message = 'Erro ao consultar os posts';
        })
        .then(json=>{
          this.aux = json;
          // console.log(this.posts);
          for (let i = 0; i < this.aux.length; i++) {
            if(this.aux[i].categories[0] == 130) {
              this.posts.push(this.aux[i]);
            }
          }
        });
      },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/historiasDeSuc.scss';
</style>
