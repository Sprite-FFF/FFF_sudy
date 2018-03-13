import React from 'react'
import ReactDOM from 'react-dom'

import './clock.css'

export default class Clock extends React.Component {
  constructor () {
    super()
    this.state = {
      time:new Date()
    }
  }
  render () {
    return (
      <div className='clock'>
        当前时间:{this.state.time.toLocaleString()}
      </div>
    )
  }
  task() {
    this.setState({time:new Date})
  }
  componentDidMount () {
    this.timer = setInterval (() => {
      this.task()
    },1000)
  }
  componentWillUnmount () {
    clearInterval(this.timer)
  }
}