import React from 'react'
export default class Add extends React.Component {
  constructor () {
    super()
  }

  render (){
    return (
      <header className="header">
        <h1>todos</h1>
        <input className="new-todo" placeholder="What needs to be done?" autoFocus />
      </header>
    )
  }
}