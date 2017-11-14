<template>
  <div>
    <p>BotherB</p>
  </div>
</template>

<script>
import bus from "./bus";
export default {
  created:function (){
    bus.$on("toBflag",function(data){
      console.log(data);
    });
  }
}
</script>

<style>

</style>


