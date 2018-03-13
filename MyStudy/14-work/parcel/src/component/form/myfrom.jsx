import './form.css'
import React from 'react'
import ReactDOM from 'react-dom'

export default class From extends React.Component {
  constructor () {
    super()
    this.state = {
      userInfo: {
        name:'',
        phone:'',
        pwd:'',
      }
    }
  }
  render () {
    return (
      <form action="" method="get">
        <label htmlFor="user">用户名:
        <input onChange={(e) => {this.handleChangeName(e)}} type="text" id="user" name="user" value={this.state.userInfo.name} placeholder='请填写用户名' />
        </label>
        <br />
        <label htmlFor="phone">手机号:
        <input onChange={(e) => {this.handleChangePhone(e)}} type="text" id="phone" name="phone" value={this.state.userInfo.phone} placeholder='请填写手机号' />
        </label>
        <br />
        <label htmlFor="pwd">密　码:
        <input onChange={(e) => {this.handleChangePwd(e)}} type="text" id="pwd" name="pwd" value={this.state.userInfo.pwd} placeholder='请填写密码' />
        </label>
        <br />
        <button onClick={(e) => {this.handleSubmit(e)}} className='submit'>提交</button>
        <button onClick={(e) => {this.handleReset(e)}} className='reset'>重置</button>
        <br />
      </form>
    )
  }
  handleChangeName (e) {
    this.state.userInfo.name = e.target.value
    this.setState({userInfo:this.state.userInfo})
  }
  handleChangePhone (e) {
    this.state.userInfo.phone = e.target.value
    this.setState({userInfo:this.state.userInfo})
  }
  handleChangePwd (e) {
    this.state.userInfo.pwd = e.target.value
    this.setState({userInfo:this.state.userInfo})
  }
  handleSubmit (e) {
    e.preventDefault()
    console.log(this.state.userInfo)
  }
  handleReset (e) {
    e.preventDefault()
    this.state.userInfo.name = ''
    this.state.userInfo.phone = ''
    this.state.userInfo.pwd = ''
    this.setState({userInfo:this.state.userInfo})
  }
}