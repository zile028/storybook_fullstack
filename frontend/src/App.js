import './App.css';
import axios from "axios";
import Home from "./pages/Home/Home";
import Navbar from "./component/Navbar/Navbar";
import {Outlet} from "react-router-dom";

axios.defaults.baseURL = "http://localhost/storybook_fullstack/beckend/api/";

function App() {

    return (
        <div className="App">
            <Navbar/>
            <Outlet/>
        </div>
    );
}

export default App;
