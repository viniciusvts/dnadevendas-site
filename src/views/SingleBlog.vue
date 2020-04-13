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
<<<<<<< HEAD

          <div class="col-md-3">
=======
          <div class="column">
>>>>>>> 54806a61b90907ecb42f7290142046513d4861c5
            <Sidebar/>
          </div>
      </div>
    </div>
  </section>
</template>


<script>

  import Sidebar from "@/components/Sidebar.vue";
  
  export default {
    name: "Contato",
    components: {
      Sidebar
    },
    data() {
      return {
        post: this.$route.params.post
      }
    },
    mounted() {
      document.title = `Dna de Vendas - Blog | ${this.$route.params.slug}`;
      console.log('params =>', this.$route.params);
      console.log('this =>', this);
    },
  };
</script>

<style lang="scss">
  @import '@/assets/scss/blogSingle.scss';
</style>