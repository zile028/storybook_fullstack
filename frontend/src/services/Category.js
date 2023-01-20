import axios from "axios";
export default class Category{
    static getCategory=()=>{return axios.get("/category.php")}
}