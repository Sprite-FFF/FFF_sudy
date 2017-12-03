import React,{Component} from 'react'
import ReactDOM from 'react-dom'
import {HashRouter,Route,Switch,Redirect} from 'react-router-dom'

import home from './components/Home'
import login from './components/Login'

class App extends Component {
  constructor () {
    super()
  }
  render (){
    return (
      <HashRouter>
        <div>
          <Switch>
            <Route path='/home' component={home} />
            <Route path='/login' component={login} />
            <Redirect to='/home'/>
          </Switch>
        </div>
      </HashRouter>
    )
  }
}

ReactDOM.render(<App />,document.querySelector('#box'))