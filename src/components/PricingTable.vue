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
                            <br>
                            <span class="price">4X de R$ 1.962,00</span>
                            <br>
                            <span class="full-price">R$ 7.850</span>
                        </th>
                        <th class="head-table pro">Professional</th>
                        <th class="head-table prod">Productivity</th>
                        <th class="head-table str">Strategic</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in prices.linhas" :key="item.servico" class="row-table-item">
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
        prices: [],
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
            fetch(`https://www.dnadevendas.com.br/wp-json/acf/v3/pages/${ctx.pageID}/linhas`)
            .then(r => r.json())
            .then(r => {
                ctx.prices = r;
                try {
                    ctx.prices.linhas.forEach(element => {
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
@import '@/assets/scss/breakpoint.scss';
    #scroll {
        @include breakpoint(smartphones){
            overflow-x: auto;
            width: 90vw;
        }
    }
    .tabela {
        background-color: white;
        padding: 20px;
        width: 100%;
        // border-collapse: collapse;
        border-collapse: 1px;
        position: relative;
        tbody tr:nth-child(even){
            background:#e2e2e2 !important;
            transition-duration: .5s;
            transform: translateY(0px);
        }
        tbody tr:nth-child(odd){
            background:#f5f5f5 !important;
            transition-duration: .5s;
            transform: translateY(0px);
        }
        .hover {
            box-shadow: black 5px 0px 15px;
            transform: translateY(-20px);
            transition-duration: .5s;
            .title-row {
                border-top: 0px solid transparent !important;
                border-bottom: 0px solid transparent !important;
                border-collapse: collapse;
            }
            .item-row {
                border-top: 0px solid transparent !important;
                border-bottom: 0px solid transparent !important;
                border-collapse: collapse;
            }
        }
        .head-table {
            height: 100px;
            width: 240px;
            padding: 30px;
            color: white;
            @include breakpoint(smartphones){
                min-width: 210px;
            }
            &.sm {
                background-color: rgba(145, 147, 162, 1);
            }
            &.pro {
                background-color: rgba(25, 48, 88, 1);
            }
            &.prod {
                background-color: rgb(150, 58, 99, 1);
            }
            &.str {
                background-color: rgba(65, 54, 94, 1);
            }
        }
        .first-header {
            max-width: 100px;
        }
        .title-row {
            font-size: 14px;
            font-weight: 200;
            // border-top: 1px solid grey;
            // border-bottom: 1px solid grey;
            text-align: center;
            padding: 5px 10px;
        }
        .item-row {
            text-align: center;
            // border-top: 1px solid grey;
            // border-bottom: 1px solid grey;
            &.no {
                &::after {
                    content: 'x';
                    font-weight: bold;
                    color: #b1aaaa;
                }
            }
            &.yes {
                position: relative;
                padding-bottom: 5px;
                &::after {
                    position: absolute;
                    content: '';
                    height: 5px;
                    width: 10px;
                    transform: rotate(-45deg);
                    border-left: 2px solid #f678b1;
                    border-bottom: 2px solid #f678b1;
                }
            }
        }
    }
</style>
