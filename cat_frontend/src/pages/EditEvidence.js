import React, { Component } from 'react';
import { FormSubmitButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './Cases.css';

// View Evidence
class DisplayEditForm extends Component{

  constructor(props){
    super(props)
    this.state = {
        list:[],
        list2:[],
        list3:[]
    }

    this.callAPI = this.callAPI.bind(this)
    this.callAPI2 = this.callAPI2.bind(this)
    this.callAPI3 = this.callAPI3.bind(this)
    this.callAPI();
    this.callAPI2();
    this.callAPI3();
}

callAPI(){
  fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=viewdetails")
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
    fetch("http://localhost/soteria_cat_project/cat_backend/evidence/index.php?action=viewevi")
    .then(
        (response) => response.json()
    ).then((data2)=>{
        console.log(data2)
        this.setState({
           list2:data2
        })
    })
}

callAPI3(){
    fetch("http://localhost/soteria_cat_project/cat_backend/caselist/index.php?action=usernames")
    .then(
        (response) => response.json()
    ).then((data3)=>{
        console.log(data3)
        this.setState({
            list3:data3
        })
    })
}

  render(){
    let code = this.state.list.map((data)=>{
        return(
        <input type ="hidden" name ="codename" value={data.codename}></input>
        )
    })

    let collector = this.state.list3.map((data)=>{
        return(
        <option value={data.username}>{data.username}</option>
        )
    })

    let form = this.state.list2.map((data)=>{
      return(
      <div className='container'>
        <h1>Edit Evidence</h1>
        <form action="." method="post">

            <label>File Name:</label>
            <input type="text" name="filename" value={data.fileName}></input><br />

            <label>Descriptor:</label>
            <input type="text" name="descriptor" value={data.descriptor}></input><br />

            <label>Size:</label>
            <input type="text" name="size" value={data.size}></input><br />
            
            <label>Date Created/Modified:</label>
            <input type="text" name="datemodified" value={data.dateModified}></input><br />
            
            <label>Item Hash:</label>
            <input type="text" name="itemhash" value={data.itemHash}></input><br />

            <label>Collector: </label>
            <select name="collector">
                {collector}
            </select><br/>
            {code}

            <label>&nbsp;</label>
            <FormSubmitButton type="submit" name="action" value="add">Submit</FormSubmitButton><br />
        </form>
        </div>
        )
    })

    let codename = this.state.list.map((data)=>{
      return(
        <div id= "button-wrapper">
          <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <GeneralButton type='submit' name='action' value='getnotes'>View Notes</GeneralButton>
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

    return(
    <main>
        {codename}
        {form[0]}
    </main>
    )
  }
};

// Add Evidence Page
export const EditEvidencePage = () => {
    return (
      <main>
        <DisplayEditForm />
      </main>
    );
  };