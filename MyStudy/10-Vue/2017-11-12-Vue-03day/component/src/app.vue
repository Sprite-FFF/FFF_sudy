<template>
  <div>
    <p>绿蚁新醅酒</p> 
    <p>红泥小火炉</p> 
    <p>晚来天欲雪</p> 
    <p>能饮一杯无</p>
    <input type="text" v-model="msg">
    <img src="../images/desktop-bg-gilr-02.jpg" alt="">
    <p>{{msg}}</p>
    <!-- 父组件通过属性给子组件 传递数据-->
    <!-- 通过标识符接收数据 -->
    <son :a="msg" b="hello" @sendMsg="test"></son>
    <p>{{info}}</p>
  </div>
</template>

<script>
  // 引入子组件
  import son from "./son.vue";
  export default {
    data:function(){
      return{
        msg:"给儿子的礼物...",
        info:''
      }
    },
    
    // 父子组件之间传值
    // 父组件调用子组件 先声明子组件
    components:{
      // 名字相同可以简写
      // son:son
      son
    },

    methods:{
      test:function(info){
        console.log(info);
        this.$data.info = info;
      }
    }
  }
</script>

<style>
  div {
    color: #00ffff;
    line-height: 24px;
  }
  img{
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0.6;
    width: 100%;
  }
</style>






