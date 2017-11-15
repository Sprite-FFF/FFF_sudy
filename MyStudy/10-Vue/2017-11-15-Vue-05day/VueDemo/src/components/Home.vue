<template>
  <div class="tmp">
    <Slide :slideData="slideData"></Slide>
  </div>
</template>

<script>
import Slide from "./sub/Slide.vue"
export default {
  data(){
    return {
      slideData:[]
    }
  },
  created:function (){
    this.getSlideData();
  },
  methods:{
    getSlideData(){
      let url = "http://vue.studyit.io/api/getlunbo";
      this.$http.get(url).then(
        res=>{
          this.slideData = res.body.message;
        },
        res=>{
          console.log("Home页面请求轮播错误"+res);
        }
      );
    }
  },
  components:{
    Slide
  }
}
</script>

<style>

</style>


