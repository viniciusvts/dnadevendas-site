<template>
  <div id="app">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,800&display=swap" rel="stylesheet">
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
  import WhatsApp from "@/components/WhatsApp.vue";
  import TheFooter from "@/components/TheFooter.vue";

  export default {
    components: {
      TheHeader,
      WhatsApp,
      TheFooter
    },
  };
</script>