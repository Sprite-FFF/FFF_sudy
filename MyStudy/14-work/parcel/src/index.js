import React from 'react'
import ReactDOM from 'react-dom'
import MyForm from './component/form/myfrom'
import Clock from './component/clock'
import MySelect from './component/myselect/myselect'
class App extends React.Component {
  constructor () {
    super()
    this.state = {
      name:'伍鑫'
    }
  }
  render () {
    return (
    <div>
      {this.state.name}
      <Clock />
      <MyForm />
      <MySelect />
    </div>
  )
  }
}

let mountNode = document.getElementById("app")
ReactDOM.render(<App />,mountNode)