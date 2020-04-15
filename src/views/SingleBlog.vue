<template>
  <section class="blogSingle section">
    <div class="container-fluid">
      <div class="row">
          <div class="col-md-2">
            <div class="sumary">
              <div class="title">
                <h2>Sumário</h2>
                <span></span>
              </div>
              <ul>
                <li v-for="sub in subtitulos" v-bind:key="sub">{{sub}}</li>
              </ul>
            </div>
          </div>

          <div class="col-md-7 content">
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

          <div class="col-md-3">
            <Sidebar/>
          </div>
      </div>
    </div>
  </section>
</template>


<script>

  import Sidebar from "@/components/Sidebar.vue";
  import Api from "@/services/ApiRest.js";
  
  export default {
    name: "Contato",
    components: {
      Sidebar
    },
    data() {
      return {
        post: this.$route.params.post,
        subtitulos: []
      }
    },
    mounted() {
      if(typeof this.$route.params.post == 'undefined'){
        this.getPost(this.$route.params.slug);
      }else{
        this.updateMetaAndTitle();
      }
      this.loadSumario();
      console.log('route =>', this.$route);
      console.log('this =>', this);
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
        Api.getPost(slug)
        .then(response => {
          this.post = response.data[0];
          this.updateMetaAndTitle();
        });
      },
    },
    watch: {
      'post.content.rendered': function(val) {
        this.loadSumario(val);
      }
    }
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>