<template>
  <div class="tmp">
    <div class="title">
      <ul>
        <li><a href="javascript:;" @click="getImgData(0)">全部</a></li>
        <li v-for="(item,index) in imgCategory" :key="index">
          <a href="javascript:;" @click="getImgData(item.id)">{{item.title}}</a>
        </li>
      </ul>
    </div>
    <div class="img" v-for="(item,index) in ImgData" :key="index">
      <router-link v-bind='{to:"/PicDetail/"+item.id}'>
        <p>{{item.title}}</p>
        <img :src="item.img_url" alt="">
        <p class="zhaiyao">{{item.zhaiyao}}</p>
      </router-link>
      
    </div>
  </div>
</template>

<script>
import tool from "../tools";

export default {
  data(){
    return {
      imgCategory:[],
      ImgData:[]
    }
  },
  created:function(){
    this.getImgCategory();
    this.getImgData();
  },
  methods:{
    getImgCategory:function(){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getimgcategory`;
      this.$http.get(url).then(
        res=>{
          this.imgCategory = res.body.message;
        },
        res=>{
          console.log("请求图片分类出错:"+res);
        }
      );
    },
    getImgData:function(id=0){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getimages/${id}`;
      this.$http.get(url).then(
        res=>{
          this.ImgData = res.body.message;
        },
        res=>{
          console.log("请求图文列表出错:"+res);
        }
      );
    }
  }
}
</script>

<style>
  .title ul {
    padding:0;
    height: 40px;
    list-style: none;
    display: flex;
    overflow: auto;
  }

  .title li {
    flex-shrink: 0;
    line-height: 32px;
    padding: 0 5px;
  }

  .img{
    position: relative;
  }
  .img img{
    width: 100%;
  }
  .zhaiyao{
    position: absolute;
    bottom: 0;
    left: 0;
    color:#fff;
    padding-top:10px;
    background-color: rgba(0, 0, 0, .3);
  }
</style>
