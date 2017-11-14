
import Vue from "vue";
var bus = new Vue();

// Cannot assign to read only property 'exports' of object '#<Object>'
// webpack可以使用require和export ，但是不能混合使用import 和module.exports 
// 不然会报错Cannot assign to read only property 'exports' of object '#<Object>'
// module.exports = bus;

export default bus;