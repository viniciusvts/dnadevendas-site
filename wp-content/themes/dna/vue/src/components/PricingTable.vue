<template>
    <div class="pricingComponent section">
        <div class="title">
            <h2>Nossos planos</h2>
            <span></span>
        </div>
        <div id="scroll">
            <table class="tabela">
                <thead>
                    <tr>
                        <th class="first-header">Nossos planos</th>
                        <th class="head-table sm">
                            <span><p>Smart</p></span>
                            <br v-if="data.acf.precos.smart.parcelado">
                            <span class="price" v-if="data.acf.precos.smart.parcelado" v-html="data.acf.precos.smart.parcelado"></span>
                            <br v-if="data.acf.precos.smart.a_vista">
                            <span class="full-price" v-if="data.acf.precos.smart.a_vista" v-html="data.acf.precos.smart.a_vista"></span>
                        </th>
                        <th class="head-table pro">
                            <span><p>Professional</p></span>
                            <br v-if="data.acf.precos.professional.parcelado">
                            <span class="price" v-if="data.acf.precos.professional.parcelado" v-html="data.acf.precos.professional.parcelado"></span>
                            <br v-if="data.acf.precos.professional.parcelado">
                            <span class="full-price" v-if="data.acf.precos.professional.a_vista" v-html="data.acf.precos.professional.a_vista"></span>
                        </th>
                        <th class="head-table prod">
                            <span><p>Productivity</p></span>
                            <br v-if="data.acf.precos.productivity.parcelado">
                            <span class="price" v-if="data.acf.precos.productivity.parcelado" v-html="data.acf.precos.productivity.parcelado"></span>
                            <br v-if="data.acf.precos.productivity.a_vista">
                            <span class="full-price" v-if="data.acf.precos.productivity.a_vista" v-html="data.acf.precos.productivity.a_vista"></span>
                        </th>
                        <th class="head-table str">
                            <span><p>Strategic</p></span>
                            <br v-if="data.acf.precos.strategic.parcelado">
                            <span class="price" v-if="data.acf.precos.strategic.parcelado" v-html="data.acf.precos.strategic.parcelado"></span>
                            <br v-if="data.acf.precos.strategic.a_vista">
                            <span class="full-price" v-if="data.acf.precos.strategic.a_vista" v-html="data.acf.precos.strategic.a_vista"></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in data.acf.linhas" :key="item.servico" class="row-table-item">
                        <td class="title-row">{{ item.servico }}</td>
                        <td v-for="planos in item.planos"
                        :key="planos.index"
                        :class="['item-row', planos]"></td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div>
</template>

<script>
export default {
  name: 'pricing-table',
  data() {
      return {
        pageID: 8113,
        data: [],
        check: null,
      };
  },
  mounted() {
    this.getPrices();
    this.haveInPlan();
    // this.tableHover();
  },
    methods:{
        getPrices() {
            const ctx = this;
            this.$http.getPostsAcfData(this.pageID)
            .then(r => r.json())
            .then(r => {
                ctx.data = r;
                try {
                    ctx.data.acf.linhas.forEach(element => {
                        if(element.planos.length == 3) {
                            const list = 'none no';
                            element.planos.splice(0, 0, list);
                            for(var i = 0; i < element.planos.length; i++) {
                                if(element.planos[i].indexOf('none no') < 0) {
                                    element.planos[i] = element.planos[i] + ' yes';
                                }
                            }
                        }
                        if(element.planos.length == 2) {
                            const list = 'none no';
                            element.planos.splice(0, 0, list);
                            element.planos.splice(1, 0, list);
                            for(var j = 0; j < element.planos.length; j++) {
                                if(element.planos[j].indexOf('none no') < 0) {
                                    element.planos[j] = element.planos[j] + ' yes';
                                }
                            }
                        }
                        if(element.planos.length == 1) {
                            const list = 'none no';
                            element.planos.splice(0, 0, list);
                            element.planos.splice(1, 0, list);
                            element.planos.splice(2, 0, list);
                            for(var l = 0; l < element.planos.length; l++) {
                                if(element.planos[l].indexOf('none no') < 0) {
                                    element.planos[l] = element.planos[l] + ' yes';
                                }
                            }
                        }
                        if(element.planos.length == 4) {
                            for(var m = 0; m < element.planos.length; m++) {
                                if(element.planos[m].indexOf('none no') < 0) {
                                    element.planos[m] = element.planos[m] + ' yes';
                                }
                            }
                        }
                    });
                } catch(e) {
                    //do nothing
                }
            });
        },
        haveInPlan() {
            const x = document.getElementsByClassName('item-row');
            // x.forEach(element => {
            //     console.log(element);
            // });
                console.log(x);

            for (var i = 0; i < x.length; i++) {
                // console.log(x);
            }
            // for (var i in td) {
            //     console.log(document.td);
            //     if(td.item[i].classList.contains('none')) {
            //         td[i].classList.add('no');
            //     } else {
            //         td[i].classList.add('yes');
            //     }
            // }
        },
        tableHover() {
            const cel = document.querySelectorAll('td');
            const row = document.querySelectorAll('tr');
            for (var i = 0; i < cel.length; i++) {
                cel[i].addEventListener('mouseover', (i) => {
                    var pos = i.target.cellIndex;
                    for (var j = 0; j < row.length; j++) {
                        row[j].children[pos].classList.add('hover');
                    }
                })
                cel[i].addEventListener('mouseleave', (i) => {
                    var pos = i.target.cellIndex;
                    for (var j = 0; j < row.length; j++) {
                        row[j].children[pos].classList.remove('hover');
                    }
                })
            }
        },
    },
};
</script>

<style lang="scss">
   @import '@/assets/scss/pricingTable.scss';
</style>
