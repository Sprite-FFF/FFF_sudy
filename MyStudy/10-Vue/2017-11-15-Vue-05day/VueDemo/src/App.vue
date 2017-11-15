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
				<span class="mui-icon mui-icon-email"><span class="mui-badge">9</span></span>
				<span class="mui-tab-label">新闻</span>
			</router-link>
			<router-link class="mui-tab-item" to="/Cart">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">通讯录</span>
			</router-link>
			<router-link class="mui-tab-item" to="/Member">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">设置</span>
			</router-link>
		</nav>
  </div>
</template>
<script>
export default {
	// components:{
  //   Home,
  //   NewList
  // }
}
</script>

<style>

</style>


