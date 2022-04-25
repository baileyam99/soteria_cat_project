import React, { Component } from 'react';
import { FormSubmitButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './Cases.css';

// View Evidence
class DisplayAddForm extends Component{

  constructor(props){
    super(props)
    this.state = {
        list:[]
    }

    this.callAPI = this.callAPI.bind(this)
    this.callAPI();
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

  render(){
    let form = this.state.list.map((data)=>{
      return(
      <div className='container'>
        <h1>Collect New Evidence</h1>
        <form action="http://localhost/soteria_cat_project/cat_backend/evidence/index.php" method="post">

            <label>File Name:</label>
            <input type="text" name="filename"></input><br />

            <label>Descriptor:</label>
            <input type="text" name="descriptor"></input><br />

            <label>Size:</label>
            <input type="text" name="size"></input><br />
            
            <label>Date Created/Modified:</label>
            <input type="text" name="datemodified"></input><br />
            
            <label>Item Hash:</label>
            <input type="text" name="itemhash"></input><br />

            <input type ="hidden" name ="username" value="csarlo"></input>
            <input type ="hidden" name ="codename" value={data.codename}></input>

            <label>&nbsp;</label>
            <FormSubmitButton type="submit" name="action" value="add">Collect Evidence</FormSubmitButton><br />
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
        {form}
    </main>
    )
  }
};

// Add Evidence Page
export const AddEvidencePage = () => {
    return (
      <main>
        <DisplayAddForm />
      </main>
    );
  };