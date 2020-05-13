<template>
  <div class="row align-items-center">
    <div class="col-12 col-lg-6 col-sm-12">
      <div class="row video">
        <div class="col-12">
          <div class="iframe" v-html="obj.video">
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
          <p>{{obj.bio}}</p>
        </div>
      </div>
    </div>
    <div class="col-12 portfolio">
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


        <div class="controllers container">
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
          itens = 1
          break;
        case 'desktop':
          itens = 6;
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
  // methods: {
  //   video() {
  //     const iframe = document.getElementsByClassName('iframe');
  //     const video = iframe[0].children[0]
  //     const src = video.getAttribute('src');
  //     let newSrc = src + '?enablejsapi=1';
  //     video.setAttribute('id', 'video-palestrante');
  //     video.removeAttribute('src');
  //     video.setAttribute('src', newSrc);
  //   },
  // },
}
</script>

<style lang="scss">
@import '@/assets/scss/variables.scss';
@import '@/assets/scss/breakpoint.scss';
.controllers {
  width: 100vw;
  position: relative;
  .control {
    display: none;
    border-top: 1px solid $baseColor;
    border-right: 1px solid $baseColor;
    border-bottom: 1px solid $baseColor;
    width: 30px;
    height: 30px;
    padding: 5px 0px;
    cursor: pointer;
    img {
      width: 30px;
      height: 17px;
    }
    &#next {
      position: absolute;
      top: -70px;
      right: -45px;
      @include breakpoint(smartphones) {
        right: 25px;
      }
    }
    &#back {
      position: absolute;
      top: -70px;
      left: -10px;
      transform: rotateY(180deg);
      @include breakpoint(smartphones) {
        left: 10px;
      }
    }
  }
}
.images {
  transition-duration: .5s;
}
  .empresas {
    max-width: 100vw;
    overflow-x: hidden;
    @include breakpoint(smartphones) {
      max-width: 200px;
      margin: auto;
    }
    ul {
      display: inline-flex;
      img {
        width: 200px;
        height: 100px;
        max-width: 200px !important;
        height: 100px;
        margin: auto;
        object-fit: contain;
        @include breakpoint(fullHdDesktops) {
          object-fit: cover;
        }
      }
    }
  }
  .portfolio {
    h4 {
      font-size: 26px;
      font-weight: 100;
    }
  }
  .video {
    position: relative;
    #top-right {
      position: absolute;
      z-index: 9;
      top: -20px;
      bottom: 20px;
      left: 0;
      right: 40px;
      height: 2px;
      background-color: $golden;
      &::after {
        content: '';
        z-index: 9;
        top: 0px;
        bottom: 20px;
        right: 0px;
        height: 500px;
        width: 2px;
        background-color: $golden;
        position: absolute;
      }
    }
    #bottom-left {
      position: absolute;
      z-index: 9;
      bottom: 20px;
      left: 0;
      right: 40px;
      height: 2px;
      background-color: $golden;
      &::after {
        content: '';
        z-index: 9;
        bottom: 0;
        left: 0;
        height: 500px;
        width: 2px;
        background-color: $golden;
        position: absolute;
      }
    }
  }
</style>
