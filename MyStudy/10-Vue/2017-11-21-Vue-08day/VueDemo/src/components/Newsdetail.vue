<template>
  <div class="tmp">
     <div>
       <h3 class="title">{{newsDetailData.title}}</h3>
       <p class="extra">
         <span class="time">发表时间:{{newsDetailData.add_time | formatTime("YYYY-MM-DD")}}</span>
         <span class="click">点击量:{{newsDetailData.click}}</span>
       </p>
     </div>
     <div v-html="newsDetailData.content">
     </div>
  </div>
</template>


<script>
import tool from "../tools";
export default {
  data(){
    return {
      newsDetailData:{}
    }
  },
  created:function(){
    this.getNewsDetail(this.$route.params.id);
  },
  methods:{
    getNewsDetail(id){
      // console.log(id);
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getnew/${id}`
      this.$http.get(url).then(
        res=>{
          this.newsDetailData = res.body.message[0];
        },
        res=>{
          console.log("新闻详情页请求出错"+res);
        }
      );
    }
  }
}
</script>

<style scope>
  .title{
    font-size: 16px;
    line-height: 28px;
    font-weight: 400;
    white-space: nowrap;
  }

  div p.extra {
    font-size: 12px;
    display: flex;
    justify-content: space-between;
    padding: 0 10px; 
  }
</style>
