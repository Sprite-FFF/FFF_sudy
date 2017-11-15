import Vue from "vue";
import App from "./App.vue";
// 引入mint-ui组件库
import {Header} from 'mint-ui';
// 引入mint-ui样式
import "../node_modules/mint-ui/lib/style.css";
// 引入mui css文件
import "./static/css/mui.min.css";
import VueResource from "vue-resource";
Vue.use(VueResource);
// 引入根样式 
import "./root.css"
// 定义mui Header组件
Vue.component(Header.name, Header);
import Home from "./components/Home.vue";
import NewsList from "./components/NewsList.vue";
import Member from "./components/Member.vue";
import Cart from "./components/Cart.vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
var router = new VueRouter({
  linkActiveClass:"mui-active",
  routes:[
    {path:"/",redirect:"/Home"},
    {path:"/Home",component:Home},
    {path:"/NewsList",component:NewsList},
    {path:"/Cart",component:Cart},
    {path:"/Member",component:Member}
  ]
});
var vm = new Vue({
  el:"#app",
  router,
  render:createElement => createElement(App)
});