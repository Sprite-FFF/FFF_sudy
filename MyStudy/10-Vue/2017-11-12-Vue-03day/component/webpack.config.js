var path = require("path");
var webpack = require("webpack");
var htmlwebpackplugin = require("html-webpack-plugin");

module.exports = {
  // 入口
  entry: "./src/main.js",
  // 出口
  output: {
    path: path.join(__dirname + "/dist"),
    filename: "merge.js"
  },
  // 配置加载器
  module: {
    rules: [{
        // 加载Vue文件的加载器
        test: /\.vue$/,
        use: 'vue-loader'
      },
      {
        // 加载css文件的加载器
        test: /\.css$/,
        use: ['style-loader', 'css-loader']
      },
      {
        // 加载图片的加载器
        test: /\.(png|jpg|gif)$/,
        // use: [
        //   {
        //     loader: 'url-loader',
        //     options: {
        //       // 如果图片小于8192bit(位) 则将图片以base64格式字符串进行加载
        //       limit: 8192
        //     }
        //   }
        // ]
        use: "url-loader?limit=8192"
      },
    ],
  },

  // webpack-dev-server 服务器 配置信息
  devtool: 'eval',
  devServer: {
    contentBase: __dirname + '/src', // 当前服务器监听的路径
    hot: true, // 热更新
    port: 8080, // 定义端口号
    host: 'localhost',
    open: true, // 是否自动打开浏览器
    openPage: ''
  },

  // 插件:
  plugins: [
    //  打包生成html的插件
    new htmlwebpackplugin({
      template: "./src/index.html",
      htmlWebpackPlugin: {
        "files": [{
          "css": [],
          "js": ["merge.js"]
        }]
      }
    }),
  ]
}