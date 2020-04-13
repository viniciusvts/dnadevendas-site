<template>
  
  <router-link :to="{ name: 'SingleBlog', params: { slug: post.slug, post: post } }">
    <div class="column">
      <div class="card">
        <div class="columns">
          <div class="left">
            <img :src="post.DNA_custom.thumb.medium" alt="">
          </div>
          <div class="right">
            <div class="categories">
              <ul>
                <li v-for="cat in post.DNA_custom.categories.category" v-bind:key="cat.name">{{cat.name}}</li>
              </ul>
            </div>
            <h2>{{post.title.rendered}}</h2>
            <div class="bottom">
              <div class="signature">
                <div class="author">
                  <img :src="post.DNA_custom.author.thumb[48]" alt="">
                  <p>{{post.DNA_custom.author.name}}</p>
                </div>
                <div class="views">
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
  }
</script>

<style lang="scss">
  @import '@/assets/scss/variables.scss';
  @import '@/assets/scss/mixins.scss';
  @import '@/assets/scss/breakpoint.scss';
  @import '@/assets/scss/blog.scss';
</style>