<template>
  <div id="app">
    <link rel="shortcut icon" :href="$http.baseURL + 'wp-content/uploads/favicon-32x32.png'">
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <TheHeader/>
    <main id="main">
      <transition mode="out-in">
        <router-view/>
      </transition>
    </main>
    <WhatsApp/>
    <TheFooter/>
  </div>
</template>


<script>
  import TheHeader from "@/components/TheHeader.vue";
  import TheFooter from "@/components/TheFooter.vue";
  import WhatsApp from "@/components/WhatsApp.vue";
  // import UpMeta from "@/services/UpdateMeta.js";

  export default {
    components: {
      TheHeader,
      TheFooter,
      WhatsApp,
    },
    // mixins: [UpMeta],
    mounted() {
      window.scrollTo(0, 0);
      window.addEventListener("scroll", this.lazyLoad);
      this.scrolltop();
    },
    watch: {
      $route() {
        let menuItems = document.querySelector('#menuItems');
        if(menuItems.classList.contains('menuMobile')){
          menuItems.classList.remove('menuMobile');
          menuItems.classList.add('menuDesktop');
        }
      },
    },
    methods: {
      lazyLoad: function () {
        let lazyImages = [].slice.call(document.querySelectorAll("img.lazy, iframe.lazy"));
        let active = false;
        if (active === false) {
          active = true;
          setTimeout(() => {
            lazyImages.forEach(function (lazyImage) {
              if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
                lazyImage.src = lazyImage.dataset.src;
                lazyImage.classList.remove("lazy");
                lazyImages = lazyImages.filter(function (image) {
                  return image !== lazyImage;
                });

                if (lazyImages.length === 0) {
                  window.removeEventListener("scroll", this.lazyLoad);
                }
              }
            });
            active = false;
          }, 200)

        }
      },
      scrolltop() {
        const header = document.getElementById('menu-fixed');
        var lastPosition = 0;
        if(window.scrollY > 0) {
          if(header.classList.contains('darkTransparent')) {
            header.setAttribute('style', 'background-color:#151515')
          } else {
            header.setAttribute('style', 'opacity:1')
          }
        } else {
          header.removeAttribute('style')
        }
        window.addEventListener('scroll', () => {
            lastPosition = window.scrollY;
            if(lastPosition > 0) {
              if(header.classList.contains('darkTransparent')) {
                header.setAttribute('style', 'background-color:#151515')
              } else {
                header.setAttribute('style', 'opacity:1')
              }
            } else {
              header.removeAttribute('style')
            }
        })
      },
    }
  };
</script>

<style lang="scss">
// whatsapp rd station
div#bricks-component-Of5VlrYhER6fLeteZhLo5Q-wrapper.rdstation-popup-position-bottom_right.floating-button.floating-button--close{
  bottom: 90px!important;
}
</style>
