<template>
  <div class="tmp">
    Cart
  </div>
</template>

<script>
import {getItem} from "../localStorageHelper";
import tool from "../tools";
export default {
  data(){
    return {
      cartInfo:[]
    }
  },
  created(){
    let goodsArr =JSON.parse(getItem());
    let message = {};
    for(let i = 0;i<goodsArr.length;i++){
      let tmp = goodsArr[i];
      if(message[tmp.id]){
        message[tmp.id] = message[tmp.id] + tmp.count;
      }else {
        message[tmp.id] = tmp.count;
      }
    }
    let ids = [];
    for (const key in message) {
      ids.push(key);
    }
    this.getCartInfo(ids.join(","));
  },
  methods:{
    getCartInfo:function(ids){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/goods/getshopcarlist/${ids}`;
      this.$http.get(url).then(
        res => {
          this.cartInfo = res.body.message;
        },
        res => {
          console.log("购物车页面请求发送失败");
        }
      );
    }
  }
}
</script>


<style>

</style>

