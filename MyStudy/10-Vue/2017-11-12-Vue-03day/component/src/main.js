import Vue from "../node_modules/vue/dist/vue";
import app from "./app.vue";

var vue = new Vue({
  el:"app",
  render:createElement => {return createElement(app)}
});