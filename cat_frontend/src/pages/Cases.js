import React, { Component } from 'react';
import Axios from 'axios';
import { FormSubmitButton, DetailsButton } from '../components/Buttons';
var req; var data; var post; var response1;

// Fetch Case Data and render
class DisplayCaseTable extends Component{

  constructor(props){
      super(props)
      this.state = {
          list:[]
      }

      this.callAPI = this.callAPI.bind(this)
      this.callAPI();
  }

  callAPI(){
      //fetch data from API
      fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=view")
      .then(
          (response) => response.json()
      ).then((data)=>{
          console.log(data)
          this.setState({
             list:data
          })
      })
  }

  render(){
      let tb_data = this.state.list.map((data)=>{
          return(
              <tr key = {data.codename}>
                  <td>{data.codename}</td>
                  <td>{data.clientName}</td>
                  <td>{data.caseType}</td>
                  <td>{data.description}</td>
                  <td>{data.lead}</td>
                  <td>{data.caseStatus}</td>
                  <td>{data.openDate}</td>
                  <td>
                  <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
                    <input type="hidden" name="codename" value={data.codename}></input>
                    <DetailsButton type='submit' name='action' value='Details'>Details</DetailsButton>
                  </form>
                  </td>
              </tr>
          )
      })
      return(
          <div className="container">
              <table className="center">
                  <thead>
                      <tr>
                          <th>Codename</th>
                          <th>Client Name</th>
                          <th>Case Type</th>
                          <th>Description</th>
                          <th>Lead</th>
                          <th>Case Status</th> 
                          <th>Open Date</th> 
                      </tr>
                  </thead>
                  <tbody>
                      {tb_data}
                  </tbody>
              </table>

          </div>
      )
  }

};

// Displays Case Details
class DisplayCaseDetails extends React.Component {
  constructor(props){
    super(props)
    this.state = {
        list:[]
    }

    this.callAPI = this.callAPI.bind(this)
    this.callAPI();
  }

  callAPI(){
    //fetch data from API
    //Axios.post("http://localhost/soteria_cat_project/cat_backend/caseList/index.php", req)
    fetch("http://localhost/soteria_cat_project/cat_backend/caseList/index.php?action=viewdetails")
    .then(
      (data) => data.json()
    ).then((data)=>{
        console.log(data)
        this.setState({
           list:data
        })
    })
  }

  render() {
    let codename = this.state.list.map((data)=>{
      return(
        <h2>Case: {data.codename}</h2>
      )
    })
    let details = this.state.list.map((data)=>{
      return (
        <main>
          <label>Client: {data.clientName}</label><br/>
          <label>Type: {data.caseType}</label><br/>
          <label>Description: {data.description}</label><br/>
          <label>Case Lead: {data.lead}</label><br/>
          <label>Status: {data.caseStatus}</label><br/>
          <label>Date Opened: {data.openDate}</label><br/>
          <label>Date Closed: {data.closeDate}</label><br/>
        </main>
      )
    })
    return (
      <main>
        <h1>CASE DETAILS</h1><br/>
        {codename}<br/>
        {details}
      </main>

    )
  }
};

export const CaseDetails = () => {
  return (
    <DisplayCaseDetails />
  );
};


// Post add case
class AddCaseForm extends React.Component{

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
    //fetch data from API
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=types")
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
    //fetch data from API
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=usernames")
    .then(
        (response) => response.json()
    ).then((data2)=>{
        console.log(data2)
        this.setState({
           list2:data2
        })
    })
  }

  render(){
    let types = this.state.list.map((data)=>{
      return(
        <option value={data.caseType}>{data.caseType}</option>
      )
    })
    let leads = this.state.list2.map((data2)=>{
      return(
        <option value={data2.username}>{data2.username}</option>
      )
    })
    return (
      <main>
      <h1>Open New Case</h1>
      <body>
        <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php?' method='post' id='add_product_form'>
          <label>Codename:</label>
          <input type='text' name='codename'></input><br/>

          <label>Client Name:</label>
          <input type='text' name='clientname'></input><br/>

          <label>Case Type:</label>
          <select name='casetype'>
            {types}
          </select><br/>

          <label>Case Lead:</label>
          <select name='lead'>
            {leads}
          </select><br/>

          <label>Description: </label>
          <textarea id='description' name='description' rows='4' cols='50'></textarea><br/><br/>

          <label>&nbsp;</label>
          <FormSubmitButton type='submit' name='action' value='opencase'>Open Case</FormSubmitButton><br/>
        </form>
      </body>
    </main>
    )
  }
};

// Add Case Page
export const AddCasePage = () => {
  return (
    <AddCaseForm />
  )
};

// Post add case
class AddNewCase extends React.Component{

  constructor(props){
      super(props)
      this.state = {
          list:[]
      }

      this.callAPI = this.callAPI.bind(this)
      this.callAPI();
  }

  req = {
    method: 'POST',
    headers: {'Content-type' : 'application/json'}
  }

  callAPI(){
    //fetch data from API
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php")
    .then(
        (response) => response.json()
    ).then((data)=>{
        console.log(data)
        this.setState({
           list:data
        })
    })
  }
};

// adds new case
export const AddCase = () => {
  return (
    <AddNewCase />
  )
};

// Case List Page
export const CaseList = () => {
  return (
    <DisplayCaseTable />
  );
};

export const IndiciesSearch = () => {
  return (
    <main>
      <h1>Indicies Search</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};

export const CaseMetrics = () => {
  return (
    <main>
      <h1>Case Metrics</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};
