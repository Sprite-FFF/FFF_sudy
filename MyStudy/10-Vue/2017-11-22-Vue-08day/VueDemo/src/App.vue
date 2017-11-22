<template>
  <div>
    <!-- header -->
    <mt-header fixed title="我的APP"></mt-header>

		<router-view></router-view>

    <nav class="mui-bar mui-bar-tab">
			<router-link class="mui-tab-item" to="/Home">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">首页</span>
			</router-link>
			<router-link class="mui-tab-item" to="/NewsList">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">新闻</span>
			</router-link>
			<router-link class="mui-tab-item" to="/Cart">
				<span class="mui-icon mui-icon-contact"><span id="badge" class="mui-badge">0</span></span>
				<span class="mui-tab-label">购物车</span>
			</router-link>
			<router-link class="mui-tab-item" to="/Member">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">设置</span>
			</router-link>
		</nav>
  </div>
</template>
<script>
import bus from "./bus";
bus.$on("sendCount",function(data){
	let el = document.querySelector("#badge");
	let count = Number(el.innerHTML)+Number(data);
	el.innerHTML = count;
})
export default {

}
</script>

<style>

</style>


