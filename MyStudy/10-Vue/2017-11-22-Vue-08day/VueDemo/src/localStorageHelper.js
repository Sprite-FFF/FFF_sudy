
// 从本地存储获取
export function getItem (){
  return localStorage.getItem("KEY") || "[]";
}
export function setItem (data){
  let tmp = JSON.parse(getItem());
  tmp.push(data);
  localStorage.setItem("KEY",JSON.stringify(tmp));
}