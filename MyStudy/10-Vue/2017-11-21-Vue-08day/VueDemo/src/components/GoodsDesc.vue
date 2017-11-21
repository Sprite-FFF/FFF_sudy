<template>
  <div class="tmp">
    <h3>{{goodsDescData.title}}</h3>
    <div class="content" v-html="goodsDescData.content"></div>
  </div>
</template>

<script>
import tool from "../tools";

export default {
  data(){
    return {
      goodsDescData:{}
    }
  },
  created(){
    this.getGoodsDesc();
  },
  methods:{
    getGoodsDesc(){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/goods/getdesc/${this.$route.params.id}`;
      this.$http.get(url).then(
        res=>{
          this.goodsDescData = res.body.message[0];
        },
        res=>{
          console.log("请求商品图文详情出错:"+res);
        }
      );
    }
  }
}
</script>

<style scoped>
  h3 {
    padding: 10px;
    font-size: 18px;
  }
  img {
    width: 100%!important;
  }
  .content {
    padding: 10px;
  }
</style>
