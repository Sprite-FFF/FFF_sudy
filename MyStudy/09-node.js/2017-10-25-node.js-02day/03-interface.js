// 仅仅以.js结尾 不能完全称为一个模块
// 只是node.js将其对待成为一个模块

// 作为开发者 真正对功能 进行封装 并能够供开发者调用

function addCart() {
  // 假设 添 
  console.log("add:山有木兮木有枝 心悦君兮君不知");
}

function deleteCart() {
  // 假设删除
  console.log("del:桃李春风一杯酒 江湖夜雨十年灯");
}

// 仅仅将方法定义好不行 还的将这些方法公开出去 使用return不和语法
// node.js新增了一个专门负责将模块内部方法或者变量公开对象 module.exports

module.exports.add = addCart;
module.exports.delete = deleteCart;

// 模块的返回值就是 module.exports

// node.js 又提供了一个exports来实现与module.exports相似的功能  