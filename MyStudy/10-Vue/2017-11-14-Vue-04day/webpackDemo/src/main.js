import Vue from "vue";
import App from "./App.vue";

var vm = new Vue({
  el:"#app",
  render:(createElement)=>{return createElement(App);}
});