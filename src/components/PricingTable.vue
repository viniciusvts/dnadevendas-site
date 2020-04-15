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
                    <tr class="row-table-item">
                        <td class="title-row">Diagnóstico presencial</td>
                        <td class="item-row no"></td>
                        <td class="item-row no"></td>
                        <td class="item-row yes"></td>
                        <td class="item-row yes"></td>
                    </tr>
                    <tr class="row-table-item">
                        <td class="title-row">Definição da metodologia de atração</td>
                        <td class="item-row yes"></td>
                        <td class="item-row yes"></td>
                        <td class="item-row yes"></td>
                        <td class="item-row yes"></td>
                    </tr>
                </tbody>
        </table>
        </div>
    </div>
</template>

<script>
export default {
  name: 'pricing-table',
  mounted() {
      tableHover();
      function tableHover() {
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
      }
  },
};
</script>

<style lang="scss">
@import '@/assets/scss/breakpoint.scss';
    #scroll {
        @include breakpoint(smartphones){
            overflow-x: auto;
            width: 100vw;
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
