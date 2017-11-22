import Vue from "vue";
import App from "./App.vue";
// 引入mint-ui组件库
import {Header} from 'mint-ui';
import { Button } from 'mint-ui';
Vue.component(Button.name, Button);
import { Swipe, SwipeItem } from 'mint-ui';
Vue.component(Swipe.name, Swipe);
Vue.component(SwipeItem.name, SwipeItem);
// 引入mint-ui样式
import "../node_modules/mint-ui/lib/style.css";
// 引入mui css文件
import "./static/css/mui.min.css";
import Moment from "moment";
Vue.use(Moment);

import vuePicturePreview from 'vue-picture-preview'
Vue.use(vuePicturePreview)

Vue.filter("formatTime",function (input,format) { 
  return Moment(input).format(format);
});
import VueResource from "vue-resource";
Vue.use(VueResource);
// 引入根样式 
import "./root.css"
// 定义mui Header组件
Vue.component(Header.name, Header);
// 引入Hash路由
import Home from "./components/Home.vue";
import NewsList from "./components/NewsList.vue";
import Member from "./components/Member.vue";
import Cart from "./components/Cart.vue";
import Newsdetail from "./components/Newsdetail.vue";
import SharePic from "./components/SharePic.vue";
import PicDetail from "./components/PicDetail.vue";
import GoodsList from "./components/GoodsList.vue";
import GoodsDetail from "./components/GoodsDetail.vue";
import GoodsDesc from "./components/GoodsDesc.vue";
import GoodsComment from "./components/GoodsComment.vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
var router = new VueRouter({
  linkActiveClass:"mui-active",
  routes:[
    {path:"/",redirect:"/Home"},
    {path:"/Home",component:Home},
    {path:"/NewsList",component:NewsList},
    {path:"/Cart",component:Cart},
    {path:"/Member",component:Member},
    {path:"/Newsdetail/:id",component:Newsdetail},
    {path:"/SharePic",component:SharePic},
    {path:"/PicDetail/:id",component:PicDetail},
    {path:"/GoodsList",component:GoodsList},
    {path:"/GoodsDetail/:id",component:GoodsDetail},
    {name:"goodsDesc",path:"/GoodsDesc/:id",component:GoodsDesc},
    {path:"/GoodsComment/:id",component:GoodsComment}
  ]
});
var vm = new Vue({
  el:"#app",
  router,
  render:createElement => createElement(App)
});