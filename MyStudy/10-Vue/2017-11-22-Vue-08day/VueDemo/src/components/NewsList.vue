<template>
  <div class="tmp">
    <ul class="mui-table-view">
				<li class="mui-table-view-cell mui-media" v-for="(item,index) in newsListData":key="index">
					<router-link :to="'/Newsdetail/'+item.id">
						<img class="mui-media-object mui-pull-left" :src="item.img_url">
						<div class="mui-media-body">
              {{item.title}}
							<p class='mui-ellipsis'>{{item.add_time | formatTime("YYYY-MM-DD HH:mm")}}</p>
						</div>
					</router-link>
				</li>
		</ul>
  </div>
</template>

<script>
import tool from "../tools"
export default {
  data(){
    return {
      newsListData:[]
    }
  },
  created:function (){
    this.getNewsList();
  },
  methods:{
    getNewsList(){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getnewslist`;
      this.$http.get(url).then(
        res => {
          this.newsListData = res.body.message;
        },
        res => {
          console.log("请求图文资讯页面出错"+res)
        }
      );  
    }
  }
}
</script>

<style>

</style>


