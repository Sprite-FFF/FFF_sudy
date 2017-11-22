<template>
  <div class="tmp">
    <div class="mui-content" style="background-color:#fff">
      <ul class="mui-table-view mui-grid-view">
        <li v-for="(item,index) in goodsList" :key="index" class="mui-table-view-cell mui-media mui-col-xs-6">
          <router-link :to="'/GoodsDetail/'+item.id">
            <img class="mui-media-object" :src="item.img_url">
            <div class="mui-media-body">
              <div>
                <a href="javascript:;">{{item.title}}</a>
                <p>{{item.zhaiyao}}</p>
                <span class="sell-price">¥{{item.sell_price}}</span>
                <span class="market-price">¥{{item.market_price}}</span>
              </div>
            </div>
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import tool from "../tools";
  export default {
    data() {
      return {
        goodsList: []
      }
    },
    created:function(){
      this.getGoodsList();
    },
    methods: {
      getGoodsList() {
        let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getgoods?pageindex=1`;
        this.$http.get(url).then(
          res => {
            console.log(res.body.message);
            this.goodsList = res.body.message;
          },
          res => {
            console.log("请求商品列表页出错");
          }
        );
      }
    }
  }
</script>

<style scoped>
  .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body {
    height: auto;
    line-height: 24px;
  }

  .sell-price {
    color:red;
    font-size: 16px;
  }

  .market-price {
    color: gray;
    font-size: 12px;
    text-decoration: line-through;
  }
</style>