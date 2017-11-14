<template>
  <div>
    <p>Son.vue</p>
    <p>{{info}}</p>
    <button @click="hello">点击发送信息</button>
  </div>
</template>

<script>
export default {
  props:["info"],
  methods:{
  hello:function(){
    this.$emit("flag",{a:1,b:2});
  }
}
}


</script>

<style>

</style>


