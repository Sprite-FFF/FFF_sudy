<template>
  <div class="page-swipe">
    <mt-swipe :auto="4000">
      <mt-swipe-item v-for="(item,index) in swipe" :key="index">
        <img v-if="item.img" :src="item.img" alt="">
        <img v-else :src="item.src" alt="">
      </mt-swipe-item>
    </mt-swipe>
  </div>
</template>

<script>
export default {
  props:["swipe"],
  created:function(){
    // console.log(this);
    // console.log(this.swipe);
  }
}
</script>


<style scoped>
      .mint-swipe {
        height: 200px;
        color: #fff;
        font-size: 30px;
        text-align: center;
        margin-bottom: 20px;
      }

      .mint-swipe-item {
        line-height: 200px;
      }

      img {
        width: 100%;
      }
</style>
