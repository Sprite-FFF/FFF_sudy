import React from 'react'
import {
  NavLink,
  BrowserRouter as Router,
  Route
} from 'react-router-dom'

import Chat from'./chat'
import Mine from './mine'
import ShopCart from './shopCart'

export default class extends React.Component{
  constructor (){
    super()
  }

  componentDidMount () {
    console.log(this.props.match)
  }
  render () {
    let {path} = this.props.match
    return (
      <div>
        <h1>Home页</h1>
          <div>
            <Route path={`${path}/chat`} component={Chat}></Route>
            <Route path={`${path}/cart`} component={ShopCart}></Route>
            <Route path={`${path}/mine`} component={Mine}></Route>
          </div>
        <ul>
          <li><NavLink to={`${path}/chat`}>聊天</NavLink></li>
          <li><NavLink to={`${path}/cart`}>购物车</NavLink></li>
          <li><NavLink to={`${path}/mine`}>我的</NavLink></li>
        </ul>
      </div>
    )
  }
}