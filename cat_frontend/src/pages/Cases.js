import React from 'react';
import { Button } from '../components/Button';

// Fetch Case Data and render
class DisplayCaseTable extends React.Component{

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
              <tr key = {data}>
                  <td>{data.codename}</td>
                  <td>{data.clientName}</td>
                  <td>{data.caseType}</td>
                  <td>{data.description}</td>
                  <td>{data.lead}</td>
                  <td>{data.caseStatus}</td>
                  <td>{data.openDate}</td>
                  <td>
                    <form action="." method="post">
                      <input type="hidden" name="codename" value={data.codename}></input>
                      <Button type="submit" name="action" id ="action" value="Details">Details</Button>
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

// Post add case

// Add Case Page
export const AddCase = () => {
  return (
    <main>
      <h1>Add Case</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
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
