import React from 'react';

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
      fetch("http://localhost/soteria_cat_prototype/caseList/index.php?action=view")
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
                  <td>{data.closeDate}</td>
                  <td>{data.retentionDate}</td>
                  <td>
                      <button className = "btn btn-danger">Remove</button>
                  </td>
              </tr>
          )
      })
      return(
          <div className="container">
              <table className="table table-striped">
                  <thead>
                      <tr>
                          <th>Codename</th>
                          <th>Client Name</th>
                          <th>Case Type</th>
                          <th>Description</th>
                          <th>Lead</th>
                          <th>Case Status</th> 
                          <th>Open Date</th> 
                          <th>Close Date</th> 
                          <th>Retention Date</th>
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

export const AddCase = () => {
  return (
    <main>
      <h1>Add Case</h1>
      <h2>Sorry, this page is currently under construction.</h2>
      <p>We'll finish it as quickly as we can. Thanks!</p>
    </main>
  );
};

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
