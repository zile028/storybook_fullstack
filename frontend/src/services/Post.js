import axios from "axios";

export default class Post {
	static getAllPost = () => {
		return axios.get("post.php");
	}
}