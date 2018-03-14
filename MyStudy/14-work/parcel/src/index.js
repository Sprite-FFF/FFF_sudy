import React from 'react'
import ReactDOM from 'react-dom'
// import {Router, Route, hashHistory} from 'react-router'
import {
  Switch,
  Route,
  HashRouter,
  Link,
  BrowserRouter as Router,
  NavLink,
  Redirect
} from 'react-router-dom'
import MyForm from './component/form/myfrom'
import Clock from './component/clock'
import MySelect from './component/myselect/myselect'
import List from './component/list/list'
import Home from './component/home/home'
// import Router from './router'
class App extends React.Component {
  constructor () {
    super()
    this.state = {
      name:'伍鑫'
    }
  }
  render () {
    return (
        <Router>
          <div>
          <Switch>
            <Route path='/login' component={MyForm}></Route>
            <Route path='/home' component={Home}></Route>
            <Route path='/clock' component={Clock}></Route>
            <Route path='/list' component={List}></Route>
            <Redirect to='/home'/>
          </Switch>
          </div>
        </Router>
    )
  }
}

let mountNode = document.getElementById("app")
ReactDOM.render(<App />,mountNode)