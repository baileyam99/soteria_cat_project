import './App.css';
import Sidebar from './components/Sidebar';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import { Adminadd, Adminedit } from './pages/Admin';
import { AddCase, CaseList, IndiciesSearch, CaseMetrics } from './pages/Cases';
import Edit from './pages/EditCredentials';

function App() {
  return (
    <Router>
      <Sidebar />
      <Switch>
        <Route path='/admin/add_user' exact component={Adminadd} />
        <Route path='/admin/edit_user' exact component={Adminedit} />
        <Route path='/cases/add_case' exact component={AddCase} />
        <Route path='/cases/case_list' exact component={CaseList} />
        <Route path='/cases/indicies_search' exact component={IndiciesSearch} />
        <Route path='/cases/case_metrics' exact component={CaseMetrics} />
        <Route path='/editcredentials/edit' exact component={Edit} />
      </Switch>
    </Router>
  );
}

export default App;
