<template>
  <div>
    <p>App.vue</p>
    <Son :info="msg" @flag="recieve"></Son>
    <bother-a></bother-a>
    <bother-b></bother-b>
  </div>
</template>
<script>
  import Son from "./Son.vue";
  // 引入bortherA/B
  import botherA from "./botherA.vue"
  import botherB from "./botherB.vue"

export default {
  data:function (){
    return {
      msg:"I Have a Dream"
    }
  },
  components:{
    Son,
    botherA,
    botherB
  },
  methods:{
    recieve:function (data){
      console.log(data);
    }
  }
}
</script>

<style>

</style>


