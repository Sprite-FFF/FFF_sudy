import React from 'react'
import ReactDOM from 'react-dom'

class Son extends React.Component {
  constructor () {
    super ()
  }
  render () {
    return <button onClick = {() => {this.props.changeName('晴雯')}}> 点击给父组件传值 </button>
  }
}

class Father extends React.Component {
  constructor (){
    super()
    this.state = {
      name:'wuxin'
    }
  }
  render (){
    return (
      <div>我是父组件{this.state.name}<Son changeName={this.changeName.bind(this)}></Son></div>
    )
  }
  changeName (name) {
    this.state.name = name;
    this.setState({})
  }
}

ReactDOM.render(<Father></Father>,document.querySelector('#box'));