<template>
  <section class="container" id="details-fs">
    <h2>Há mais de <span>14 anos</span> aumentando a
    produtividade de vendas em mais de <span id="animation"></span></h2>
    <img src="../assets/banner-4small.png" alt="Banner">
  </section>
</template>

<script>
export default {
  name: 'banner-4small',
};
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/breakpoint.scss';
  #details-fs {
    position: relative;
    margin-top: 50px;
    height: 500px;
    @include breakpoint(smartphones) {
      margin-top: 0;
      height: 400px;
    }
    img {
      position: absolute;
      right: -95px;
      top: 0;
      height: 500px;
      width: 950px;
      @include breakpoint(smartphones) {
        right: 10px;
        top: unset;
        height: unset;
        width: unset;
        bottom: 0;
      }
      @include breakpoint(largeDesktops-1280) {
        right: -73px;
      }
      @include breakpoint(fullHdDesktops) {
        width: 1100px;
        right: -300px;
      }
    }
    h2 {
      font-size: 25px;
      font-weight: 100;
      width: 400px;
      @include breakpoint(smartphones) {
        width: unset;
      }
      @include breakpoint(fullHdDesktops) {
        font-size: 35px;
        width: 470px;
      }
      span {
        color: $pink-fsmall;
        &#animation {
          position: relative;
          &::after {
            content: '|';
            color: $baseColor;
            animation: blink .5s cubic-bezier(0.1,0.25,0.1,1) 5s infinite;
            opacity: 1;
          }
          &::before {
            content: '35 segmentos';
            animation: typing 8s cubic-bezier(0.1,0.25,0.1,1) 10s infinite;
          }
        }
      }
    }
  }
  @keyframes blink {
    0%   {opacity: 1;}
    100% {opacity: 0;}
  }
  @keyframes typing {
    0%   {content: '35 segmentos'}
    10%   {content: '35 segmento'}
    15%   {content: '35 segment'}
    20%   {content: '35 segmen'}
    25%   {content: '35 segme'}
    30%   {content: '35 segm'}
    35%   {content: '35 seg'}
    40%   {content: '35 se'}
    45%   {content: '35 s'}
    50%   {content: '35'}
    45%   {content: '3'}
    50%   {content: '35 '}
    60%   {content: '35 seg'}
    70%   {content: '35 segment'}
    80%   {content: '35 segmento'}
    90%   {content: '35 segmentos'}
    100%   {content: '35 segmentos'}
  }
</style>
