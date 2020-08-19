<template>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row video">
        <div class="col-12">
          <div class="iframe-palestrante" v-if="dataCase.video" v-html="dataCase.video">
          </div>
          <img class="iframe-palestrante" v-else-if="dataCase.imagem" :src="dataCase.imagem.sizes.large" :alt="dataCase.imagem.alt" />
        </div>
        <!-- <div class="col-12">
          <Pagination/>
        </div> -->
      </div>
    </div>
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row align-items-center right">
        <div class="col-12 bio">
          <h3>{{dataCase.nome_palestrante}}</h3>
          <p v-html="dataCase.bio"></p>
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
          <li v-for="(empresa, index) in dataCase.onde_palestrou" :key="index">
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
  props: {
    dataCase: Object,
  },
  mounted() {
    setTimeout(() => {
      if(screen.width < 800) {
        this.controllers(1)
      } else if (screen.width < 1024) {
        this.controllers(3)
      } else if(screen.width < 1300) {
        this.controllers(5)
      } else if(screen.width < 1900) {
        this.controllers(6)
      } else {
        this.controllers(9)
      }
    }, 100);
  },
  methods: {
    controllers(itens) {
      if(this.dataCase.onde_palestrou.length > itens) {
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
