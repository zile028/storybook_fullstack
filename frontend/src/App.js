import './App.css';
import axios from "axios";
import Home from "./pages/Home/Home";

axios.defaults.baseURL = "http://localhost/storybook/api/";

function App() {

	return (
	  <div className="App">
		  <Home/>
	  </div>
	);
}

export default App;
