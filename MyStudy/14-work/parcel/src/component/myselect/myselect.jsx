import React from 'react'
import ReactDOM from 'react-dom'

import './myselect.css'

export default class MySelect extends React.Component {
  constructor(props){
    super(props)
    this.state = {
      // showOpt : true
      display:'none',
      value:''
    }
  }
  render () {
    return (
      <div className="myselect">
        <div onClick={(e)=>{this.handleTrigger(e)}} className="select">{this.state.value}</div>
            <ul onClick={(e) => {this.handleSelected(e)}} style={{display:this.state.display}} className="option">
              <li className="opts">select1</li>
              <li className="opts">select2</li>
              <li className="opts">select3</li>
              <li className="opts">select4</li>
            </ul>
      </div>
    )
  }
  handleTrigger(e) {
    let display = this.state.display
    display = display === 'none' ? 'block' : 'none'
    console.log(display)
    this.setState({display:display})
  }
  handleSelected(e) {
    let target = e.target;
    if(target.nodeName == 'LI'){
      this.setState({value:target.innerHTML,display:'none'})
    }

  }
}