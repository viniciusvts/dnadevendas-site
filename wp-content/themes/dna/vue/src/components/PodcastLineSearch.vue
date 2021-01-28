<template>
  <div class="titlesearch mg-title podcastsearch">
    <div class="title">
      <h2>{{title}}</h2>
      <span></span>
    </div>
    <div class="search" id="podSearch">
      <input type="text" name="s" id="s" :placeholder="placeholder">
      <button type="submit">
        <img src="@/assets/svg/search.svg" alt="icone de pesquisa">
      </button>
    </div>
    <PodcastSearch />
  </div>
</template>

<script>
import PodcastSearch from '@/components/PodcastSearch.vue';

export default {
  name: 'PodcastLineSearch',
    components: {
      PodcastSearch,
    },
  props: {
    title: String,
    placeholder: String,
  }
};
</script>
<style lang="scss">
  @import '@/assets/scss/podcastsearch.scss';
</style>
