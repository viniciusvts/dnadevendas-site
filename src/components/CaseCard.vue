<template>
    <div class="card-case row">
      <div class="col-sm-12 col-md-9 img-field out-l">
        <img class="img-notebook" src="../assets/img-notebook-alpha.png" alt="bg">
        <!-- <div class="overlay-video"></div> -->
        <div class="iframe" v-html="obj.video"></div>
      </div>
      <div class="col-sm-12 col-md-3 content-client out-r">
        <div class="infos">
          <img :src="obj.logo.url" alt="Logo empresa"/>
          <h2 :class="[pink]">
            {{ obj.titulo }}
          </h2>
          <p v-html="obj.texto"></p>
        </div>
    </div>
  </div>
</template>

<script>
import TextPink from '../services/TextPink';
export default {
  name: 'card-case',
  props: ['dataCase', 'position'],
  mixins: [TextPink],
  data() {
    return {
      obj: this.dataCase,
      dataPos: this.position,
      pink: null,
    };
  },
  mounted() {
    // this.elementScroll();
  },
  methods: {
    elementScroll() {
      const img = document.getElementsByClassName('img-field');
      const content = document.getElementsByClassName('content-client');
      window.addEventListener('scroll', () => {
        if(window.scrollY > 3000) {
          img[0].classList.remove('out-l');
          content[0].classList.remove('out-r');
        } else {
          img[0].classList.add('out-l');
          content[0].classList.add('out-r');
        }
      })
    },
  },
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  // .out-l {
  //   transform: translateX(-100px);
  //   opacity: .5;
  //   transition-duration: .5s;
  //   @include breakpoint(smartphones) {
  //     transform: translateX(0);
  //   }
  // }
  // .out-r {
  //   transform: translateX(100px);
  //   opacity: .5;
  //   transition-duration: .5s;
  //   @include breakpoint(smartphones) {
  //     transform: translateX(0);
  //   }
  // }
  .img-field, .content-client {
    transition-duration: .5s;
  }
  .overlay-video {
    position: absolute;
    left: -40px;
    height: 443px;
    width: 708px;
    top: 75px;
    z-index: 2;
    background-color: black;
  }
  .content-client {
    position: relative;
    .infos {
      position: absolute;
      top: 180px;
      left: -150px;
      @include breakpoint(fullHdDesktops) {
        top: 45px;
      }
      img {
        width: 200px;
        height: 100px;
        object-fit: cover;
      }
      @include breakpoint(smartphones) {
        position: unset;
      }
      img {
        margin: 10px 0;
      }
      h2 {
        margin: 10px 0;
      }
      p {
        font-size: 14px;
        @include breakpoint(fullHdDesktops) {
          font-size: 30px;
          line-height: 40px;
        }
      }
    }
  }
</style>
