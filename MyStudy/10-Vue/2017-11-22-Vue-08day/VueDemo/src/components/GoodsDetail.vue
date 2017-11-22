<template>
  <div class="tmp">
    <Swipe :swipe="goodsSwipeImg"></Swipe>
    <div class="info">
      <h4>{{goodsDetail.title}}</h4>
      <p>市场价: <span class="red">{{goodsDetail.sell_price}}</span> 销售价: <del>{{goodsDetail.market_price}}</del></p>
      <div class="count">
        购买数量: <Count @count="getCount" :stock="goodsDetail.stock_quantity"></Count>
        <transition
          v-on:before-enter="beforeEnter"
          v-on:enter="enter"
          v-on:after-enter="afterEnter"
        >
          <span v-if="isShow" class="ball">{{count}}</span>
        </transition>
          <span v-if="isShow" class="ball">{{count}}</span>       
      </div>
      <div class="buy">
        <mt-button size="small" type="primary">立即购买</mt-button>
        <mt-button @click="addShoppingCart" size="small" type="danger">加入购物车</mt-button>
      </div>
      <h5>商品参数:</h5>
        <ul>
          <li>商品货号:{{goodsDetail.goods_no}}</li>
          <li>库存情况:{{goodsDetail.stock_quantity}}</li>
          <li>上架时间:{{goodsDetail.add_time | formatTime("YYYY-MM-DD hh:mm:ss")}}</li>
        </ul>
        <mt-button @click="goToGoodsDesc" type="primary" size="large" plain>图文介绍</mt-button>
        <mt-button @click="goToGoodsComment" class="btn" type="danger" size="large" plain>商品评论</mt-button>
    </div>
  </div>
</template>


<script>
import tool from "../tools";
import Swipe from "./sub/Swipe.vue";
import Count from "./sub/Count.vue";
import {setItem} from "../localStorageHelper";
import bus from "../bus";
export default {
  data(){
    return {
      goodsDetail:{},
      goodsSwipeImg:[],
      count:1,
      isShow:false,
    }
  },
  created (){
    this.getGoodsDetail();
    this.getGoodsDetailSwipe();
  },
  components:{
    Swipe,
    Count
  },
  methods:{
    getGoodsDetail:function(){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/goods/getinfo/${this.$route.params.id}`;
      this.$http.get(url).then(
        res => {
          this.goodsDetail = res.body.message[0];
        },
        res => {
          console.log("获取商品图文详情失败:"+res);
        }
      );
    },
    getGoodsDetailSwipe:function(){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getthumimages/${this.$route.params.id}`;
      this.$http.get(url).then(
        res=>{
          this.goodsSwipeImg = res.body.message;
        },
        res=>{
          console.log("请求商品轮播图失败"+res);
        }
      );

    },
    goToGoodsDesc:function(){
      this.$router.push({
        name:"goodsDesc",
        params:{id:this.goodsDetail.id}
      });
    },
    goToGoodsComment:function(){
      this.$router.push(`/GoodsComment/${this.goodsDetail.id}`);
    },
    getCount:function(data){
      console.log(data);
      this.count = data;
    },
    addShoppingCart:function (){
      // 将数据存入本地存储
      let data = {
        id:this.$route.params.id,
        count:this.count
      }
      setItem(data);
      this.isShow=!this.isShow;
      //兄弟组件间传值
      bus.$emit("sendCount",this.count);

    },
    // 动画钩子
    beforeEnter:function(el){
      el.style.transform = "translate3d(0,0,0)";
    },
    enter:function(el,done){
      var width = el.offsetWidth;
      el.style.transform = "translate3d(50px,316px,0)";
      done();
    },
    afterEnter:function(el){
      this.isShow = !this.isShow;
    }
  }
}
</script>

<style scoped>
  .info {
    padding: 20px;
  }
  .buy {
    margin-top:20px;
    display: flex;
    justify-content: space-around;
  }
  .red {
    color: red;
  }

  h4 {
    color:#319CFD;
    font-size: 16px;
    margin: 0;
    padding: 0;
  }
  ul {
    list-style: none;
    padding: 0;
    font-size:12px;
  }
  .count {
    font-size: 14px;
  }

  .btn {
    margin-top:20px;
  }
  .count{
    position: relative;
  }
  .ball {
    position: absolute;
    top: 6px;
    left: 112px;
    width: 25px;
    height: 25px;
    border-radius:50%;
    background-color: red;
    color: whitesmoke;
    font-size: 12px;
    line-height: 25px;
    text-align: center;
    transition: all 1s cubic-bezier(.5,-1.08,.73,.68);
  }
</style>

