import React from 'react'
import ReactDOM from 'react-dom'
import {Route,NavLink} from 'react-router-dom'

import ChatList from './ChatList'
import Concat from './Concat'
import Find from './Find'
import Mine from './Mine'

export default class Home extends React.Component {
  render () {
    let {path} = this.props.match
    return (
      <div>
        <h1>Home</h1>
        <Route path = {`${path}/chatList`} component={ChatList} />
        <Route path = {`${path}/concat`} component={Concat} />
        <Route path = {`${path}/find`} component={Find} />
        <Route path = {`${path}/mine`} component={Mine} />
        <NavLink to={`${path}/chatList`}>Chat</NavLink>
        <NavLink to={`${path}/concat`}>Concat</NavLink>
        <NavLink to={`${path}/find`}>Find</NavLink>
        <NavLink to={`${path}/mine`}>Mine</NavLink>
      </div>
    )
  }
}