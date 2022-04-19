import React, { Component } from 'react';
import { AddButton, GeneralButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './Cases.css';

// View Evidence
class DisplayEvidenceTable extends Component{

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
    fetch("http://localhost/soteria_cat_project/cat_backend/physInv/index.php?action=viewevi")
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
          <td>{data.idNum}</td>
          <td>{data.identifier}</td>
          <td>{data.description}</td>
          <td>{data.disposition}</td>
          <td>{data.collector}</td>
        </tr>
      )
    })
    if (this.state.list.codename === null) {
      tb_data = ()=>{
        return(
        <tr>
          <td>NONE</td>
          <td>NONE</td>
          <td>NONE</td>
          <td>NONE</td>
          <td>NONE</td>
          <td>NONE</td>
        </tr>
        )
      }
    }

    let codename = this.state.list2.map((data)=>{
      return(
        <div id= "button-wrapper">
          <form action='http://localhost/soteria_cat_project/cat_backend/caseList/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <GeneralButton type='submit' name='action' value='evi'>View Evidence</GeneralButton>
            <GeneralButton type='submit' name='action' value='getnotes'>View Notes</GeneralButton>
            <GeneralButton type='submit' name='action' value='editcase'>Edit Case</GeneralButton>
            <GeneralButton type='submit' name='action' value='Details'>Details</GeneralButton>
          </form>
          <Link to="/cases/case_list">
            <GeneralButton>View All Cases</GeneralButton>
          </Link>
        </div>
      )
    })

    let newcase = this.state.list2.map((data)=>{
      return (
        <div id= "button-wrapper2">
          <form action='http://localhost/soteria_cat_project/cat_backend/phyInv/index.php' method='post'>
            <input type="hidden" name="codename" value={data.codename}></input>
            <AddButton type='submit' name='action' value='add'>Collect Evidence</AddButton>
          </form>
        </div>
      )
    })

    return(
      <main>
        {codename}
        {newcase}

        <div className="container">
          <table className="center">
            <thead>
              <tr>
                <th>ID Number</th>
                <th>Identifier</th>
                <th>Description</th>
                <th>Disposition</th>
                <th>Collector</th>
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

// View Evidence Page
export const ViewPhysicalEvidencePage = () => {
    return (
      <main>
        <h1>Physical Evidence</h1>
        <DisplayEvidenceTable />
      </main>
    );
  };