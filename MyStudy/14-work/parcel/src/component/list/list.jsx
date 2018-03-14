import React from 'react'
import REactDOM from 'react-dom'

export default class List extends React.Component {
  constructor () {
    super()
    this.state = {
      list:[
        {id:1,name:'林黛玉'},
        {id:2,name:'薛宝钗'},
        {id:3,name:'史湘云'},
        {id:4,name:'贾迎春'},
        {id:5,name:'贾探春'},
        {id:6,name:'贾惜春'},
      ]
    }
  }
  render () {
    return (
      <div>
        {this.state.list.map((item) => {
         return <div key={item.id}>{item.name}</div>
        })}
      </div>
    )
  }
}