import React, { Component } from 'react';
import { FormSubmitButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './AddPhysicalEvidence.css';

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
        <div className='ColllectEvidence-Container'>
            
            <form action="http://localhost/soteria_cat_project/cat_backend/physInv/index.php" method="post">
                <div className='Identifier'>
                <label>Identifier:</label>
                <input type="text" name="identifier"/><br/>
                </div>

                <div className='Description'>
                <label>description:</label>
                <input type="text" name="description"/><br/>
                </div>

                <div className='Disposition'>
                <label>disposition:</label>
                <input type="text" name="disposition"/><br/>
                </div>

                <input type ="hidden" name ="username" value="csarlo"/>
                <input type ="hidden" name ="codename" value={data.codename}/>

                <label>&nbsp;</label>
                <FormSubmitButton type="submit" name="action" value="add">Collect Evidence</FormSubmitButton><br />
            </form>
        </div>
        )
    })

    let codename = this.state.list.map((data)=>{
      return(
        <div id= "button-wrapper6">
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
export const AddPhysEvidencePage = () => {
    return (
      <main>
        <h1>Collect New Physical Evidence</h1>
        <DisplayAddForm />
      </main>
    );
  };