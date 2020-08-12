<template>
  <section class="materials videos mt-5">
    <div v-if="page" class="container">
      <h1>{{page.title.rendered}}</h1>
      <p>Assista nossos especialistas apresentando dicas valiosas para melhorar a performance de seu time <br> e aumentar sua produtividade de vendas.</p>
      
      <ul class="menu row justify-content-center">
          <li class="col-auto">
              <div v-on:click="showVideos" class="tooltip active" id="todos">
                  Todos
              </div>                    
          </li>
          <li v-for="cat in getVideosCategories" :key="cat" class="col-auto">
              <div class="tooltip" v-on:click="showVideos" :id="cleanSpaces(cat)">
                  {{cat}}
              </div>
          </li>
      </ul>

      <div class="row">
        <div v-for="(vid, index) in page.acf.videos" 
        :key="index" 
        :class="cleanSpaces(vid.categoria)"
        class="col-12 col-lg-4 mb-4 videoCard active">
          <div class="card h-100">
            <div class="row h-100">
              <div class="col-12">
                <div class="left">
                  <iframe
                  width="100%" 
                  height="220px" 
                  :src="'//www.youtube.com/embed/'+ getYtId(vid.video)"
                  frameborder="0"
                  allowfullscreen="">
                  </iframe>
                </div>
              </div>
              <div class="col-12 h-50">
                <div class="right h-90">
                  <h2>{{vid.titulo}}</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-else class="container">
      <Loading />
    </div>
  </section>
</template>

<script>
import Loading from "@/components/Loading.vue";

export default {
name: "Videos",
  components:{Loading},
  data(){
    return {
      pageId: 906,
      page: null
    }
  },
  created(){
    this.getPage();
  },
  methods:{
    getPage () {
      this.$http.getPagesById(this.pageId)
      .then(resp => resp.json())
      .then(json => {
        this.page = json;
        this.$root.meta.title = this.page.yoast_title;
        this.$root.meta.tags = this.page.yoast_meta;
      });
    },
    showVideos (evt) {
        let categorias = document.querySelectorAll('.tooltip');
        let videos = document.querySelectorAll('.videoCard');
        let item = evt.target.getAttribute('id');
        if (videos.length == 0) return; // se não carregou ainda as imagens, faz nada
        for(let cat of categorias){
            if (cat.getAttribute('id') == item) cat.classList.add('active');
            else cat.classList.remove('active');
        }
        for(let video of videos){
            if(video.classList.contains(item) || item === 'todos') video.classList.add('active');
            else video.classList.remove('active');
        }
    },
    cleanSpaces(string){
      return string.replace(/ /g,"");
    },
    /**https://stackoverflow.com/questions/21607808/convert-a-youtube-video-url-to-embed-code/21607897*/
    getYtId (url) {
      const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
      const match = url.match(regExp);

      return (match && match[2].length === 11)
        ? match[2]
        : null;
    }
  },
  computed:{
    getVideosCategories () {
      let cats = [];
      for (const video of this.page.acf.videos) {
        cats.push(video.categoria);
      }
      return [...new Set(cats)]
    }
  }
}
</script>

<style lang="scss">
  @import '@/assets/scss/videos.scss';
</style>