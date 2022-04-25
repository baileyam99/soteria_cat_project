import React, { Component } from 'react';
import { AddButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './Cases.css';

// No Results
export const NoResults = () => {
  return (
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  );
};

// View & Add Notes
class NotesTable extends Component{

  constructor(props){
      super(props)
      this.state = {
          list:[],
          list2:[]
      }

      this.callAPI = this.callAPI.bind(this)
      this.callAPI2 = this.callAPI2.bind(this)
      this.callAPI();
      this.callAPI2();
  }

  callAPI(){
      fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=viewnotes")
      .then(
          (response) => response.json()
      ).then((data)=>{
          console.log(data)
          this.setState({
             list:data
          })
      })
  }

  callAPI2(){
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=viewdetails")
    .then(
        (response) => response.json()
    ).then((data)=>{
        console.log(data)
        this.setState({
           list2:data
        })
    })
}

  render(){
    let tb_data = this.state.list.map((data)=>{
      return(
      <tr key = {data.codename}>
        <td>{data.codename}</td>
        <td>{data.submitDate}</td>
        <td>{data.body}</td>
        <td>{data.username}</td>
      </tr>
      )
    })
    
    let codename = this.state.list2.map((data)=>{
      return(
        <div id= "button-wrapper">
          <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <GeneralButton type='submit' name='action' value='evi'>View Evidence</GeneralButton>
            <GeneralButton type='submit' name='action' value='phys'>View Physical Evidence</GeneralButton>
            <GeneralButton type='submit' name='action' value='Details'>Details</GeneralButton>
          </form>
          <Link to="/cases/case_list">
            <GeneralButton>View All Cases</GeneralButton>
          </Link>
        </div>
      )
    })
    
    let addnote = this.state.list2.map((data)=>{
      return(
        <div className="container">
          <form action = 'http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'> 
            <textarea name="body" rows="6" cols="159">Type Your Note Here...</textarea> <br/>
            <input type ="hidden" name ="codename" value={data.codename} />
            <input type ="hidden" name ="username" value="tgilchrist" />
            <AddButton type='submit' name='action' value='addnote'>Add Note</AddButton><br/>
          </form>
        </div>
      )
    })
    return(
      <main>
        {codename}

        <div className="container">
          <table className="center">
            <thead>
              <tr>
                <th>Codename</th>
                <th>Submit Date</th>
                <th>Body</th>
                <th>Username</th>
              </tr>
              </thead>
              <tbody>
                {tb_data}
              </tbody>
          </table>
        </div>

        {addnote}
      </main>
    )
  }
};

// Notes Page
export const NotesPage = () => {
  return (
    <main>
      <h1>Notes</h1>
      <NotesTable />
    </main>
  );
};