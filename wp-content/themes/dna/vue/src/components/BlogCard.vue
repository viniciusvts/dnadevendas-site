<template>
  
  <router-link :to="{ name: 'SingleBlog', params: { slug: post.slug, post: post } }">
    <div class="column">
      <div class="card">
        <div class="row mw100w">
          <div class="left col-12 col-md-7 col-tb-12">
            <img :src="post.DNA_custom.thumb.large" alt="">
          </div>
          <div class="right col-12 col-md-5 col-tb-12">
            <div class="categories">
              <ul class="row">
                <li v-for="cat in post.DNA_custom.categories.category" 
                v-bind:key="cat.name"
                class="mb-1 post-categorie">{{cat.name}}</li>
              </ul>
            </div>
            <h2>{{post.title.rendered}}</h2>
            <div class="bottom">
              <div class="signature">
                <div class="dateAgo">
                  <span>{{daysAgo}}</span>
                </div>
                <div class="viewsAgo">
                  <span>{{post.DNA_custom.views}}</span>
                  <img src="@/assets/svg/book.svg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>

  export default {
    name: 'BlogCard',
    props: {
      post: Object,
    },
    computed: {
      daysAgo(){
        const postDate = new Date(this.post.date);
        // define os valores em milisegundos
        const secInMilli = 1000
        const minInMilli = secInMilli * 60
        const hourInMilli = minInMilli * 60
        const dayInMilli = hourInMilli * 24
        const monthInMilli = dayInMilli * 30
        const yearInMilli = dayInMilli * 365
        // define a data atual e obtem a diferença
        let dateDiference = Date.now() - postDate.getTime()
        // obtem quantos anos se passaram
        const years = Math.floor(dateDiference / yearInMilli)
        if(years == 1) return (years + ' ano atrás')
        if(years > 1) return (years + ' anos atrás')
        // obtem quantos meses se passaram
        const months = Math.floor(dateDiference / monthInMilli)
        if(months == 1) return (months + ' mês atrás')
        if(months > 1) return (months + ' meses atrás')
        // obtem quantos dias se passaram
        const days = Math.floor(dateDiference / dayInMilli)
        if(days == 1) return (days + ' dia atrás')
        if(days > 1) return (days + ' dias atrás')
        // obtem quantas horas se passaram
        const hours = Math.floor(dateDiference / hourInMilli)
        if(hours == 1) return (hours + ' hora atrás')
        if(hours > 1) return (hours + ' horas atrás')
        // obtem quantas minuutos se passaram
        const min = Math.floor(dateDiference / minInMilli)
        if(min == 1) return (min + ' minuto atrás')
        if(min > 1) return (min + ' minutos atrás')
        return 'Agora';//apenas para garantir um retorno
      }
    }
  }
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/blog.scss';
</style>