import './App.css';
import Sidebar from './components/Sidebar';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
import { Adminadd, Adminedit } from './pages/Admin';
import { 
  AddCasePage, CaseDetails, CaseList, IndiciesSearch, CaseMetrics, 
  SearchCasePage, EditCasePage
} from './pages/Cases';
import Edit from './pages/EditCredentials';
import { Footer } from './pages/Footer';
import { Home } from './pages/Home';
import { NotesPage } from './pages/Notes';
import { ViewEvidencePage } from './pages/ViewEvidence';
import { ViewPhysicalEvidencePage } from './pages/ViewPhysicalEvidence';

function App() {
  return (
    <Router>
      <Sidebar />
      <Switch>
        <Route path='/' exact component={Home} />
        <Route path='/home' exact component={Home} />
        <Route path='/admin/add_user' exact component={Adminadd} />
        <Route path='/admin/edit_user' exact component={Adminedit} />
        <Route path='/cases/add_case' exact component={AddCasePage} />
        <Route path='/cases/case_details' exact component={CaseDetails} />
        <Route path='/cases/edit_case' exact component={EditCasePage} />
        <Route path='/cases/notes' exact component={NotesPage} />
        <Route path='/cases/view_evidence' exact component={ViewEvidencePage} />
        <Route path='/cases/view_physical_evidence' exact component={ViewPhysicalEvidencePage} />
        <Route path='/cases/case_list' exact component={CaseList} />
        <Route path='/cases/case_list/search' exact component={SearchCasePage} />
        <Route path='/cases/indicies_search' exact component={IndiciesSearch} />
        <Route path='/cases/case_metrics' exact component={CaseMetrics} />
        <Route path='/edit_credentials/edit' exact component={Edit} />
      </Switch>
      <Footer />
    </Router>
  );
}

export default App;
