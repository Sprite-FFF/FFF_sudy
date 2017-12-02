const data = {}
const bus = {}

bus.$emit = function (name,msg){
  data[name](msg)
}

bus.$on = function(name,callback){
  data[name] = callback
}

export default bus