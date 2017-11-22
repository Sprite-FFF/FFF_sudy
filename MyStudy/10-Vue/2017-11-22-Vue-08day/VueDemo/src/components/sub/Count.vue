<template>
  <div class="mui-numbox">
    <!-- "-"按钮，点击可减小当前数值 -->
    <button @click="minus" class="mui-btn mui-numbox-btn-minus" type="button">-</button>
    <input @blur="input" ref="num"  v-model="count" class="mui-numbox-input" type="number" />
    <!-- "+"按钮，点击可增大当前数值 -->
    <button @click="add" class="mui-btn mui-numbox-btn-plus" type="button">+</button>
  </div>
</template>
<script>
export default {
  data () {
    return {
      count:1
    }
  },
  props:["stock"],
  methods : {
    minus(){
      if(this.count>1){
        this.count--;
        this.countting();
      }
    },
    add(){
      if(this.count < this.stock){
        this.count++;
        this.countting();
      }
    },
    input(){ 
      var el = this.$refs.num;
      if(el.value<1){
        el.value = 1;
      }
      if(el.value > this.stock){
        el.value = this.stock;
      }
      this.countting();
    },
    countting(){
      this.$emit("count",this.count);
    }
  }
}
</script>

<style>

</style>
