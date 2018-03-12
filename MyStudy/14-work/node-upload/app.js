const path = require('path')
const express = require('express')
const multer = require('multer')

const app = express()
app.use('/uploads',express.static('uploads'))
app.get('/', (req, res) => {
  res.end('<h1>Hello Word</h1>')
})

const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, path.resolve('./uploads'));
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + path.extname(file.originalname)); //增加了文件的扩展名
  }
});

const upload = multer({
  storage: storage
});
app.post('/upload', upload.single('avatar'), (req, res) => {
  res.header('Access-Control-Allow-Origin', '*')
  res.send({
    err:null,
    path:`/uploads/${path.basename(req.file.path)}`
  })
})
let server = app.listen(3000, err => {
  console.log('服务器开启监听...')
})