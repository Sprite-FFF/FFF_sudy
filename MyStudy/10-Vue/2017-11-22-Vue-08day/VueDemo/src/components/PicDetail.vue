<template>
  <div class="tmp">
    <lg-preview></lg-preview>
    <div class="title">
      {{detailInfo.title}}
    </div>
    <div class="mui-content">
      <ul class="mui-table-view mui-grid-view mui-grid-9">
        <li v-for="(item,index) in imgArr" :key="index" class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
          <a href="javascript:;">
            <img v-preview="item.src" :src="item.src" alt="">
          </a>
        </li>
      </ul>
    </div>
    <p class="content" v-html="detailInfo.content"></p>
    <Comment :imgid = "imgId"></Comment>
  </div>
</template>

<script>
  import tool from "../tools";
  import Comment from "./sub/Comment.vue";
  export default {
    data() {
      return {
        imgArr: [],
        detailInfo: {},
        imgId:0
      }
    },
    components:{
      Comment
    },
    created: function () {
      this.imgId = this.$route.params.id;
      this.getPicdata("/api/getimageInfo/");
      this.getPicdata("/api/getthumimages/");
    },
    methods: {
      getPicdata: function (api) {
        let url = `${tool.HTTP}${tool.SERVER_PATH}${api}${this.$route.params.id}`;
        this.$http.get(url).then(
          res => {
            // console.log(res.body.message);
            if (res.body.message.length > 1) {
              this.imgArr = res.body.message;
              return;
            }
            this.detailInfo = res.body.message[0];
          },
          res => {
            console.log("请求图片详情页面出错:" + res);
          }
        );
      }
    }
  }
</script>

<style scoped>
  .mui-content{
    background: #fff;
  }
  .mui-content a,.mui-content img {
    width: 100%;
    height: 100%;
  }

  .title {
    padding: 10px;
  }

  .content {
    text-indent: 2em;
    padding: 10px;
  }
</style>