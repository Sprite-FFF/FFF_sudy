import React from 'react'
import ReactDOM from 'react-dom'
import bus from './bus'

class A extends React.Component{
  constructor(){
    super()
    this.state = {
      msg:'妾家高楼连苑起 良人执戟明光里'
    }
  }
  render (){
    return <div>君知妾有夫 赠妾双明珠
      <button onClick={() => {bus.$emit('send',this.state.msg)}}>点击发送给B</button>
    </div>
  }
}

class B extends React.Component{
  constructor (){
    super()
    this.state = {
      msg : ''
    }
  }

  render () {
    bus.$on('send',(msg) => {
      this.state.msg = msg
      this.setState({})
      alert(msg)
    })
    return <div>感君缠绵意 系在红罗襦 {this.state.msg}</div>
  }
}

class App extends React.Component{
  constructor(){
    super()
  }

  render () {
    return <div>
      <A></A>
      <B></B>
    </div>
  }
}

ReactDOM.render (<App />,document.querySelector('#box'));