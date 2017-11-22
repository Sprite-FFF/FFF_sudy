<template>
  <div>
    <div class="comment">
      <h5>发表评论:</h5>
      <textarea ref="content" name="" id="" placeholder="在此处填写评论内容"></textarea>
      <div @click="reportComment" class="mui-btn mui-btn-primary">
        发表评论
      </div>
      <ul>
        <li v-for="(item,index) in commentList" :key="index">
          <p><span>{{item.user_name}}:</span><span>{{item.add_time | formatTime("YY-MM-DD hh:mm:ss")}}</span> </p>
          <div>
            {{item.content}}
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import tool from "../../tools";
import { Toast } from 'mint-ui';
export default {
  data () {
    return {
      commentList:[]
    }
  },
  created: function(){
      this.getComment();
  },
  props:["imgid"],
  methods:{
    reportComment () {
      let content = this.$refs.content.value;
      if (!content || content.trim() == ""){
        Toast({
          message: '内容不能为空',
          position: 'bottom',
          duration: 2000
        });
        return;
      }
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/postcomment/${this.imgid}`
      this.$http.post(url,{content:content},{emulateJSON:true}).then(
        res=>{
          Toast({
            message: '评论成功!',
            position: 'middle',
            duration: 2000
          });
          this.$refs.content.value = "";
          this.getComment();
        },
        res=>{
          console.log("评论post请求失败:"+res);
        }
      );
    },
    getComment (){
      let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getcomments/${this.imgid}?pageindex=1`
      this.$http.get(url).then(
        res => {
          this.commentList = res.body.message;
        },
        res => {
          console.log("请求评论列表失败");
        }
      );
    }
  }
}
</script>

<style scoped>
  .comment {
    padding: 0 10px;
  }
  .mui-btn{
    width: 100%;
  }
  textarea {
    font-size: 12px;
  }

  ul {
    list-style: none;
    padding: 0;
  }
  li {
    border-bottom: 1px dashed rgba(0, 0, 0, .3);
    padding:5px 10px;
    font-size: 14px;
  }
</style>


