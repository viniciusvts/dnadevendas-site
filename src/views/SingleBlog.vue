<template>
  <section class="blogSingle section">
    <div class="container-fluid">
      <div class="row">
          <div class="col-1">
          </div>

          <div v-if="post" class="col-8 content">
            <div class="thumbnail">
              <img :src="post.DNA_custom.thumb.large" alt="">
            </div>
            <h1>{{post.title.rendered}}</h1>
            <p class="breadcrumb">
              <router-link :to="{ name: 'Home' }">Home</router-link> / 
              <router-link :to="{ name: 'Blog' }">Blog</router-link> /
              {{post.title.rendered}}
            </p>
            <article v-html="post.content.rendered"></article>
          </div>

          <div v-else class="col-8 content">{{message}}</div>

          <div class="col-md-3">
            <Sidebar/>
          </div>
      </div>
      <SolicitarContato></SolicitarContato>
    </div>
  </section>
</template>


<script>

  import Sidebar from "@/components/Sidebar.vue";
  import Api from "@/services/ApiRest.js";
  import SolicitarContato from '@/components/SolicitarContato.vue';
  
  export default {
    name: "Contato",
    components: {
      SolicitarContato,
      Sidebar
    },
    data() {
      return {
        post: null,
        message: 'Carregando'
      }
    },
    mounted() {
      if(typeof this.$route.params.post == 'undefined'){
        this.getPost(this.$route.params.slug);
      }else{
        this.post = this.$route.params.post;
      }
    },
    methods: {
      loadSumario(val) {
        let content = document.createElement('div');
        if(typeof val != 'undefined') {
          content.innerHTML = val;
        } else {
          content.innerHTML = this.post.content.rendered;
        }
        let h2List = content.getElementsByTagName('h2');
        //de posse da lista apago o conteúdo atual
        this.subtitulos = []
        h2List.forEach(elem => {
          this.subtitulos.push(elem.innerText);
        });
      },
      updateMetaAndTitle() {
        this.$route.meta.title = this.post.yoast_title;
        this.$route.meta.metaTags = []; // metaTags é Array
        this.$route.meta.metaTags = this.post.yoast_meta;
        this.$route.meta.metaTags.push({ description: this.post.yoast_title});
      },
      getPost(slug) {
        if (typeof slug == 'undefined') throw new TypeError("É necessário definir slug");
        let args = [];
        args['slug'] = slug;
        Api.getPosts(args)
        .then(res=>{
          if(res.status == 200)
            return res.json();
          else
            this.message = 'Erro ao carregar o post';
        })
        .then(json=>{
          this.post = json[0];
        });
      },
    },
    watch: {
      'post.id': function(val) {
        Api.postIterateView(val);
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>