import './Cases.css';
import React, { Component } from 'react';
import { FormSubmitButton, DetailsButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';

// Fetch Case Data
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

  search(){
    fetch("http://localhost/soteria_cat_project/cat_backend/caseList/index.php?action=viewsearch")
    .then(
      (data2) => data2.json()
    ).then((data2)=>{
        console.log(data2)
        this.setState({
           list2:data2
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
          <form className = "DetailsButton" action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <DetailsButton type='submit' name='action' value='Details'>Details</DetailsButton>
            </form>
            </td>
            </tr>
            )
          })
    return(
      <main>
        <div className="container">
          <form action="http://localhost/soteria_cat_project/cat_backend/caseList/index.php" method="post">
            <select name='param'>
              <option value='codename'>Codename</option>
              <option value='clientName'>Client Name</option>
              <option value='caseType'>Case Type</option>
              <option value='lead'>Case Lead</option>
            </select>
            <input type='text' name='srch'></input>
            <FormSubmitButton type='submit' name='action' value='search'>Search</FormSubmitButton>
            </form>
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
                  <th></th> 
                </tr>
                </thead>
                <tbody>
                  {tb_data}
                </tbody>
            </table>
        </div>
      </main>
    )
  }
};

// Search Case
class SearchCase extends Component{

  constructor(props){
      super(props)
      this.state = {
          list:[]
      }

      this.callAPI = this.callAPI.bind(this)
      this.callAPI();
  }

  callAPI(){
    fetch("http://localhost/soteria_cat_project/cat_backend/caseList/index.php?action=viewsearch")
    .then(
      (data) => data.json()
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
          <form className = "DetailsButton" action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <DetailsButton type='submit' name='action' value='Details'>Details</DetailsButton>
          </form>
        </td>
      </tr>
      )
    })
    return(
      <main>
        <div className="container">
          <form action="http://localhost/soteria_cat_project/cat_backend/caseList/index.php" method="post">
            <select name='param'>
              <option value='codename'>Codename</option>
              <option value='clientName'>Client Name</option>
              <option value='caseType'>Case Type</option>
              <option value='lead'>Case Lead</option>
            </select>
            <input type='text' name='srch'></input>
            <FormSubmitButton type='submit' name='action' value='search'>Search</FormSubmitButton>
            </form>
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
                  <th></th>
                </tr>
                </thead>
                <tbody>
                  {tb_data}
                </tbody>
            </table>
            <Link to="/cases/case_list">
              <GeneralButton>View All Cases</GeneralButton>
            </Link>
            
        </div>
      </main>
    )
  }
};

// Displays Case Details
class DisplayCaseDetails extends React.Component {
  constructor(props){
    super(props)
    this.state = {
        list:[],
        codename: null
    }

    this.callAPI = this.callAPI.bind(this)
    this.callAPI();
  }

  callAPI(){
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=viewdetails")
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

          <div id = "label-wrapper">
            <label>Client: {data.clientName}</label><br/>
            <label>Type: {data.caseType}</label><br/>
            <label>Description: {data.description}</label><br/>
            <label>Case Lead: {data.lead}</label><br/>
            <label>Status: {data.caseStatus}</label><br/>
            <label>Date Opened: {data.openDate}</label><br/>
            <label>Date Closed: {data.closeDate}</label><br/>
          </div>

          <div id= "button-wrapper">
            <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
              <input type="hidden" name="codename" value={data.codename}></input>
              <GeneralButton type='submit' name='action' value='getnotes'>View Notes</GeneralButton>
              <GeneralButton type='submit' name='action' value='evi'>View Evidence</GeneralButton>
              <GeneralButton type='submit' name='action' value='phys'>View Physical Evidence</GeneralButton>
              <GeneralButton type='submit' name='action' value='editcase'>Edit Case</GeneralButton>
              <Link to="/cases/case_list">
                <GeneralButton>View All Cases</GeneralButton>
              </Link>
            </form>
          </div>
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

// Add Case
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
            
              <label className='ONCLabel1'>Codename:</label>
              <input className='ONCInput1' type='text' name='codename'></input><br/>

              <label className='ONCLabel2'>Client Name:</label>
              <input className='ONCInput1' type='text' name='clientname'></input><br/>
            <div id = "OPCWrapper" >
              <label className='ONCLabel3'>Case Type:</label>
              <select name='casetype'>
                {types}
              </select><br/>

              <label className='ONCLabel4'>Case Lead:</label>
              <select name='lead'>
                {leads}
              </select><br/>

              <label className='ONCLabel5'>Description: </label>
              <textarea className = 'ONCDescription' id='description' name='description' rows='4' cols='50'></textarea><br/><br/>

              <label className='ONCLabel6'>&nbsp;</label>
              <FormSubmitButton type='submit' name='action' value='opencase'>Open Case</FormSubmitButton><br/>
            </div>
          </form>
      </body>
    </main>
    )
  }
};

// Edit Case
class EditCaseForm extends React.Component{

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
      <h1>Edit Case</h1>
      <body>
          <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php?' method='post' id='add_product_form'>
            
              <label className='ONCLabel1'>{}</label><br/>

              <label className='ONCLabel2'>Client Name:</label>
              <input className='ONCInput1' type='text' name='clientname'></input><br/>
            <div id = "OPCWrapper" >
              <label className='ONCLabel3'>Case Type:</label>
              <select name='casetype'>
                {types}
              </select><br/>

              <label className='ONCLabel4'>Case Lead:</label>
              <select name='lead'>
                {leads}
              </select><br/>

              <label className='ONCLabel5'>Description: </label>
              <textarea className = 'ONCDescription' id='description' name='description' rows='4' cols='50'></textarea><br/><br/>

              <label className='ONCLabel6'>&nbsp;</label>
              <FormSubmitButton type='submit' name='action' value='opencase'>Open Case</FormSubmitButton><br/>
            </div>
          </form>
      </body>
    </main>
    )
  }
};

// Edit Case Page
export const EditCasePage = () => {
  return (
    <main>
      <h1>Edit Case</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};

// Search Page
export const SearchCasePage = () => {
  return (
    <SearchCase />
  );
};

// Add Case Page
export const AddCasePage = () => {
  return (
    <AddCaseForm />
  )
};

// Case List Page
export const CaseList = () => {
  return (
    <DisplayCaseTable />
  );
};

// Case Details Page
export const CaseDetails = () => {
  return (
    <DisplayCaseDetails />
  );
};

// Indicies Search Page
export const IndiciesSearch = () => {
  return (
    <main>
      <h1>Indicies Search</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};

// Case Metrics Page
export const CaseMetrics = () => {
  return (
    <main>
      <h1>Case Metrics</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};
