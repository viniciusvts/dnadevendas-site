<template>
  <router-link :to="{ name: 'PodcastSingle', params: { slug: post.slug, post: post } }">
    <div class="column">
      <div class="card podcast">
        <div class="row mw100w">
          <div class="left podcast col-12 col-md-5 col-tb-12">
            <img :src="post.acf.imagem_destaque.sizes.large" :alt="post.acf.imagem_destaque.alt">
          </div>
          <div class="right col-12 col-md-7 col-tb-12">
            <h2 v-html="post.title.rendered"></h2>
            <div v-html="getResume()"></div>
            <div class="bottom row">
              <span class="col-6">{{post.acf.nome_dos_participantes}}</span>
              <span class="col-4 offset-2 ml-auto d-flex">
                <img src="@/assets/svg/clock.svg" alt="relogio" class="mr-1 relogio">
                {{daysAgo}}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </router-link>
</template>

<script>

  export default {
    name: 'PodcastCard',
    props: {
      post: Object,
    },
    methods: {
      getResume(){
        // transformar o conteúdo em HTMLElement e obteros paragrafos
        const vDiv = document.createElement('div');
        vDiv.innerHTML = this.post.acf.descricao;
        const paragrafos = vDiv.querySelectorAll('p');
        /** o resumo que retornaremos */
        var resume = '';
        // enquanto tamanho do resumo for menor que 360 caracteres
        for (const p of paragrafos) {
          const maxSize = 200;
          const tamanhoFuturo = resume.length + p.innerText.length;
          if(tamanhoFuturo > maxSize){
            /** quanto falta para completar temanho máximo */
            const faltaParaMaxSize = maxSize - resume.length;
            const innerTextDeP = p.innerText;
            const wordsOfP = innerTextDeP.split(' ');
            // inicia o paragrafo no resumo
            var lastP = '<p>';
            // popula o paragrafo até o tamanho máximo
            for (const word of wordsOfP) {
              const lastPtamanhoFuturo = lastP.length + word.length;
              if(lastPtamanhoFuturo > faltaParaMaxSize) break;
              lastP += word + ' ';
            }
            resume += lastP + '[...]</p>'
            break;
          } else {
            resume += '<p>' + p.innerHTML + '</p>';
          }
        }
        return resume;
      }
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
  @import '@/assets/scss/cards.scss';
</style>