<template>
  <div class="tmp">
    <Comment :imgid="id"></Comment>
  </div>
</template>

<script>
import Comment from "./sub/Comment.vue";
export default {
  data(){
    return {
      id:0
    }
  },
  created(){
    this.id = this.$route.params.id;
  },
  components:{
    Comment
  }
}
</script>

<style>

</style>
