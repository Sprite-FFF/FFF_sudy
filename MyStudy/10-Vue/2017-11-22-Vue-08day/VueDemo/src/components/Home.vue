<template>
	<div class="tmp">
		<!-- <Slide :dataData="slideData"></Slide> -->
		<Swipe :swipe="slideData"></Swipe>
		<div class="mui-content">
			<ul class="mui-table-view mui-grid-view mui-grid-9">
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/Home">
						<span class="mui-icon mui-icon-home"></span>
						<div class="mui-media-body">主页</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/NewsList">
						<span class="mui-icon mui-icon-list">
							<span class="mui-badge">5</span>
						</span>
						<div class="mui-media-body">新闻资讯</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/SharePic">
						<span class="mui-icon mui-icon-image"></span>
						<div class="mui-media-body">图片分享</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/GoodsList">
						<span class="mui-icon mui-icon-starhalf"></span>
						<div class="mui-media-body">商品展示</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/">
						<span class="mui-icon mui-icon-search"></span>
						<div class="mui-media-body">Search</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/">
						<span class="mui-icon mui-icon-phone"></span>
						<div class="mui-media-body">Phone</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/">
						<span class="mui-icon mui-icon-gear"></span>
						<div class="mui-media-body">Setting</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/">
						<span class="mui-icon mui-icon-info"></span>
						<div class="mui-media-body">about</div>
					</router-link>
				</li>
				<li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
					<router-link to="/">
						<span class="mui-icon mui-icon-more"></span>
						<div class="mui-media-body">more</div>
					</router-link>
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
	// import Slide from "./sub/Slide.vue";
	import Swipe from "./sub/Swipe.vue";
	import tool from "../tools"
	export default {
		data() {
			return {
				slideData: []
			}
		},
		created: function () {
			this.getSlideData();
		},
		methods: {
			getSlideData() {
				let url = `${tool.HTTP}${tool.SERVER_PATH}/api/getlunbo`;
				this.$http.get(url).then(
					res => {
						this.slideData = res.body.message;
						// console.log(this.slideData);
					},
					res => {
						console.log("Home页面请求轮播错误" + res);
					}
				);
			}
		},
		components: {
			// Slide
			Swipe
		}
	}
</script>

<style>

</style>