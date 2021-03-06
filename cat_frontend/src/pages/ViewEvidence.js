import React, { Component } from 'react';
import { AddButton, DetailsButton, GeneralButton, DeleteButton } from '../components/Buttons';
import { Link } from 'react-router-dom';
import './ViewEvidence.css';

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
    fetch("http://localhost/soteria_cat_project/cat_backend/evidence/index.php?action=viewevi")
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
          <td>{data.fileName}</td>
          <td>{data.descriptor}</td>
          <td>{data.size}</td>
          <td>{data.dateModified}</td>
          <td>{data.itemHash}</td>
          <td>{data.collector}</td>
          <td>
            <Link to="/cases/view_evidence/edit">
              <DetailsButton>Edit</DetailsButton>
            </Link>
          </td>
          <td>
            <form action="http://localhost/soteria_cat_project/cat_backend/evidence/index.php" method='post'>
              <input type="hidden" name="idNum" value={data.idNum}></input>
              <input type="hidden" name="codename" value={data.codename}></input>
              <DeleteButton type='submit' name='action' value='Delete'>Delete</DeleteButton>
            </form>
          </td>
        </tr>
      )
    })

    let codename = this.state.list2.map((data)=>{
      return(
        <div id= "button-wrapper4">
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

    let addnew = this.state.list2.map(()=>{
      return (
        <div id= "button-wrapper5">
          <Link to="/cases/view_evidence/collect">
            <AddButton className='CollectButton2'>Collect Evidence</AddButton>
          </Link>
        </div>
      )
    })

    return(
      <main>
        {codename}
        {addnew}
        <div className="container">
          <table className="center">
            <thead>
              <tr>
                <th>File Name</th>
                <th>Descriptor</th>
                <th>Size</th>
                <th>Date Modified</th>
                <th>Item Hash</th>
                <th>Collector</th>
                <th></th>
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

// View Evidence Page
export const ViewEvidencePage = () => {
    return (
      <main>
        <h1>Evidence</h1>
        <DisplayEvidenceTable />
      </main>
    );
  };