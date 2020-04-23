<template>
  <section class="section historias">
    <div class="title">
      <h2>Mais histórias de sucesso</h2>
      <span></span>
    </div>
    <div class="container">
      <div class="row sec-card">
        <div v-for="item in posts" :key="item.id" class="col-sm-12 col-md-6">
          <div class="card-historias">
            <img :src="item.template" alt="Img historia">
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
      <p class="centered"><button class="fsmall-btn">Ver mais Artigos</button></p>
    </div>
  </section>
</template>

<script>
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
    getPosts() {
      const ctx = this;
      fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/posts?categories=${this.postId}`)
        .then(r => r.json())
        .then(r => {
          ctx.posts = r;
          ctx.posts.forEach(element => {
            fetch(`https://www.dnadevendas.com.br/wp-json/wp/v2/media/${element.featured_media}`)
            .then(f => f.json())
            .then(f => {
              element.template = f.guid.rendered;
            });
          });
      })
    },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  .historias {
    background-color: white;
    .title {
      width: 250px;
      h2 {
        color: $baseColor;
      }
    }
    .sec-card {
      padding: 0 200px;
      @include breakpoint(smartphones) {
        padding: unset;
      }
    }
    .card-historias {
        width: 300px;
        margin: auto auto auto;
        position: relative;
        margin-bottom: 20px;
        .preenche {
          height: 165px;
        }
        .img-field-h {
          position: absolute;
          width: 300px;
          height: 165px;
          border: 1px solid $golden-dark;
          left: -10px;
          top: 10px;
          z-index: 0;
        }
        img {
          width: 100%;
          height: 165px;
          object-fit: cover;
          position: absolute;
          z-index: 1;
        }
        .text-historia {
          padding-top: 10px;
          color: #444444;
          text-align: center;
        }
    }
  }
</style>
