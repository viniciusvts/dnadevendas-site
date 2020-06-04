<template>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row video">
        <div class="col-12">
          <div class="iframe-palestrante" v-html="obj.video">
          </div>
        </div>
        <!-- <div class="col-12">
          <Pagination/>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row align-items-center right">
        <div class="col-12 bio">
          <h3>{{obj.nome_palestrante}}</h3>
          <h4>{{obj.cargo}}</h4>
          <p v-html="obj.bio"></p>
        </div>
      </div>
    </div>
    <div class="col-sm-12 portfolio">
      <div class="row align-items-center">
        <div class="col-auto">
          <h4>Empresas que palestrou</h4>
        </div>
        <div class="col">
          <hr id="hr-golden">
        </div>
      </div>
      <div class="empresas">
        <ul>
          <li v-for="(empresa, index) in obj.onde_palestrou" :key="index">
            <img class="lazy images" src="@/assets/loading.gif"  :data-src="empresa.sizes.medium" :alt="empresa.name">
          </li>
        </ul>

      </div>


        <div class="controllers">
          <div class="control" id="next">
            <div class="svg">
              <img src="../assets/svg/big-arrow.svg" alt="Avança">
            </div>
          </div>
          <div class="control" id="back">
            <div class="svg">
              <img src="../assets/svg/big-arrow.svg" alt="Volta">
            </div>
          </div>
        </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'card-palestrante',
  props: ['dataCase',],
  data() {
    return {
      obj: this.dataCase,
      dataPos: this.position,
    };
  },
  mounted() {
    setTimeout(() => {
      if(screen.width < 800) {
        this.controllers('mobile')
      } else if (screen.width > 1919) {
        this.controllers('fullHdDesktop')
      } else if(screen.width >= 1119 && screen.width < 1300) {
        this.controllers('largeDesktop')
      } else if (screen.width > 800 && screen.width < 1024) {
        this.controllers('tablet')
      } else {
        this.controllers('desktop')
      }
    }, 100);
  },
  methods: {
    controllers(screen) {
      var itens = 0;
      switch (screen) {
        case 'mobile':
          itens = 1;
          break;
        case 'tablet':
          itens = 3;
          break;
        case 'desktop':
          itens = 6;
          break;
        case 'fullHdDesktop':
          itens = 9;
          break;
        case 'largeDesktop':
          itens = 5;
          break;
      }
      if(this.obj.onde_palestrou.length > itens) {
        const images = document.getElementsByClassName('images');
        const next = document.getElementById('next');
        const back = document.getElementById('back');
        next.setAttribute('style', 'display:block');
        back.setAttribute('style', 'display:block');
        images[0].setAttribute('position', '0');
        const total = images.length;
        const limit = total - itens;
        const test = limit * images[0].offsetWidth;
        let offset = test;
        var aux = images[0].offsetWidth;
        next.addEventListener('click', function() {
          if(aux <= test) {
            offset = aux + images[0].offsetWidth;
            for(let i = 0; i < images.length; i++) {
              images[i].setAttribute('style', `transform:translateX(-${aux}px);`);
              images[i].setAttribute('position', aux);
            }
            aux = offset;
          } else {
            aux = 0;
            for(let i = 0; i < images.length; i++) {
              images[i].setAttribute('style', `transform:translateX(${aux});`);
              images[i].setAttribute('position', aux);
            }
          }
        })
        back.addEventListener('click', function() {
          if(aux > 0) {
            offset = aux - images[0].offsetWidth;
            for(let i = 0; i < images.length; i++) {
              images[i].setAttribute('style', `transform:translateX(-${aux}px);`);
            }
            aux = offset;
          } else {
            aux = 0;
            for(let i = 0; i < images.length; i++) {
              images[i].setAttribute('style', `transform:translateX(${aux});`);
            }
          }
        })
      }
    }
  },
}
</script>

<style lang="scss">
@import '@/assets/scss/variables.scss';
@import '@/assets/scss/breakpoint.scss';
</style>
