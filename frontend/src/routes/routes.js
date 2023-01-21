import Home from "../pages/Home/Home";
import SinglePost from "../pages/SinglePost/SinglePost";

export const home = {
    path: "/",
    element: <Home/>
}
export const singlePost = {
    path: "/singlePost/:id",
    element: <SinglePost/>
}