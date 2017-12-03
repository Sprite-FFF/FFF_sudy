import React from 'react'
import ReactDOM from 'react-dom'
import {Route} from 'react-router-dom'

export default class Login extends React.Component {
  render () {
    return (
      <div>
        <button onClick = {()=>{this.login()}}>点击登陆</button>
      </div>
    )
  }

  login(){
    console.log(this.props)
    this.props.history.push({pathname:'/home'})
  }
}