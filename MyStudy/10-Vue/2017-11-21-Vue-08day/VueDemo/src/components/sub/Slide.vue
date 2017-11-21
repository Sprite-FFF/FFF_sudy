<template>
  <div>
    <div id="slider" class="mui-slider" >
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<!-- <div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img :src="slideData[slideData.length-1].img">
					</a>
				</div> -->
				<!-- 第一张 -->
				<div class="mui-slider-item" v-for="(item,index) in dataData" :key="index">
					<a href="#">
						<img :src="item.img">
					</a>
				</div>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<!-- <div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img :src="slideData[0].img">
					</a>
				</div> -->
			</div>
			<div class="mui-slider-indicator">
				<div class="mui-indicator mui-active"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
			</div>
		</div>
	</div>
</template>

<script>
// 引入mui js文件
import mui from "../../static/js/mui.min.js";
var slider = mui("#slider");
export default {
	data () {
		return {
			msg:''
		}
	},
  props:["dataData"],
  created:function(){
		// console.log(this.$data);
		// console.log(this.msg)
		// this.msg = this.slideData
		// console.log(this)
		// console.log(this.msg)
		// console.log(11111111111)
		// console.log(this);
    // console.log(this.slideData);
  },
}
</script>

<style>

</style>


