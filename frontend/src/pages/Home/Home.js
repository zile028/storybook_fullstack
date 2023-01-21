import React, {useState} from 'react';
import {useEffect} from "react";
import PostService from "../../services/Post";
import Sidebar from "../../component/Sidebar/Sidebar";
import Post from "../../component/Post/Post";


function Home(props) {
    const [allPosts, setAllPosts] = useState([]);

    useEffect(() => {
        PostService.getAllPost().then((res) => setAllPosts(res.data));
    }, []);

    function postsLayout() {
        return allPosts.map((post, index) => <Post key={index} post={post}/>);
    }

    return (
        <div className="container">
            <h1 className="text-center py-5">All posts</h1>
            <div className="row">
                <div className="col-md-2">
                    <Sidebar/>
                </div>
                <div className="col-md-10">
                    {allPosts.length > 0 && postsLayout()}
                </div>
            </div>
        </div>
    );
}

export default Home;