<template>
  <div>
    <p>BotherA</p>
    <button @click="sendToB">给B</button>
  </div>
</template>

<script>
import bus from "./bus"
export default {
  methods:{
    sendToB:function(){
      bus.$emit("toBflag","A给B的数据");
    }
  }
}
</script>

<style>

</style>


