<template>
  <div class="pagination">
    <div class="row no-gutters align-items-center">          
      <div class="col-auto">
        <span @click="toPrev" class="btn prev" :class="{'disabled':isFirstPage}">
          <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
        </span>
      </div>
      <div class="col">
        <div class="bullets">
          <div class="row justify-content-md-center">

            <div v-for="n in totalPages" :key="n" class="col">
              <span @click="toPage(n)" :class="{'active':(n==page)}">
                <img src="@/assets/svg/separator.svg" alt="" class="mr-auto ml-auto">
              </span>
            </div>

          </div>
        </div>
      </div>
      <div class="col-auto">
        <span @click="toNext" class="btn next" :class="{'disabled':isLastPage}">
          <img src="@/assets/svg/big-arrow.svg" alt="Voltar">
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SliderPagination",
  data() {
    return {
      page: 1
    }
  },
  props: {
    totalPages: Number
  },
  methods: {
    toNext(){
      this.page++;
      if(this.page > this.totalPages) this.page = 1;
      this.emitEventPage(this.page)
    },
    toPrev(){
      this.page--;
      if(this.page < 0) this.page = this.totalPages-1;
      this.emitEventPage(this.page)
    },
    toPage(_page){
      this.page = _page
      this.emitEventPage(this.page)
    },
    emitEventPage(_page){
      // o array do componente pai começa com 0 >> lógico :>
      this.$emit('pageEvent',{
          page: _page -1
      });
    }
  },
  computed: {
    isFirstPage(){
      return (this.page == 1);
    },
    isLastPage(){
      return (this.page == this.totalPages);
    }
  }
}
</script>

<style lang="scss" >
@import "@/assets/scss/variables.scss";
@import "@/assets/scss/mixins.scss";
@import "@/assets/scss/pagination.scss";
</style>