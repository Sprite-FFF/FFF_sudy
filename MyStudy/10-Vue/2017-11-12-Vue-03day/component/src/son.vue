<template>
  <div>
    七月七日长生殿 夜半无人私语时
    <span>{{a}}</span>
    <span>{{b}}</span>
    <!-- 点击向父组件发送数据 -->
    <button @click="hello">发送</button>
  </div>
</template>
<script>
export default {

  data:function(){
    return{
      msg:"",
    }
  },
  // 接收来自父组件的数据
  props:["a","b"],
  created:function(){
    console.log(this);
  },

  methods:{
    hello:function (){
      // 子组件向父组件传值
      // $emit方法 有两个参数
      // 1.方法名(标识符)
      // 2.要传的值
      this.$emit("sendMsg","--来自son");
    }
  }
}
</script>

<style>
  button{
    position: fixed;
    top: 20px;
    left: 50%;
    z-index: 999;
    width: 80px;
    height: 30px;
  }
</style>

