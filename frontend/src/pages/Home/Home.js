import React, {useState} from 'react';
import {useEffect} from "react";
import Post from "../../services/Post";
import Shared from "../../services/Shared";
import Category from "../../services/Category";

function Home(props) {
    const [allPosts, setAllPosts] = useState([]);
    const [allCategory, setAllCategory] = useState([]);
    useEffect(() => {
        Post.getAllPost().then((res) => setAllPosts(res.data));
        Category.getCategory().then((res) => setAllCategory(res.data));
    }, []);

    function sidebarLayout() {
        return allCategory.map((category, index) => {
            return <li key={index} className="list-group-item">
                <a href={"index.php?category=" + category.id}>{category.name}</a></li>;
        });
    }

    function postsLayout() {
        return allPosts.map((post, index) => {
            return <div key={index} className="card mb-3">
                <div className="card-header d-flex justify-content-between">
                    <h5>{post.title}</h5>
                    <span>Published: {post.created_at}</span>
                </div>
                <div className="card-body">
                    <div className="d-flex gap-4">
                        {post.image && <div className="col-md-3">
                            <img className="img-fluid" src={Shared.fileUrl(post.image)} alt=""/>
                        </div>}
                        <div className="col">
                            <p className="text-start">{post.text.slice(0, 100)}</p>
                        </div>
                    </div>
                </div>
                <div className="card-footer text-end">

                    <a className="btn btn-sm btn-info me-1"
                       href="beckend/index.php?user={post.user_id}">{post.first_name} {post.last_name}</a>

                    <a href="beckend/user/single_post.php?id={post.id}"
                       className="btn btn-sm btn-success me-1">Read
                        more</a>
                    <a className="btn btn-sm btn-warning me-1"
                       href="beckend/voting.php?id={post.id}">Voting <span
                        className="badge bg-danger rounded-pill">{post.voting_count}</span></a>
                    <a className="btn btn-sm btn-danger" href="beckend/add_comment.php?id={post.id}">Add
                        comment</a>
                </div>
            </div>;
        });

    }

    return (
        <div className="container">
            <h1 className="text-center py-5">All posts</h1>
            <div className="row">
                <div className="col-md-2">
                    <ul className="list-group">
                        <li className="list-group-item"><a href="beckend/index.php">All post</a></li>
                        {allCategory.length > 0 && sidebarLayout()}
                    </ul>
                </div>
                <div className="col-md-10">
                    {allPosts.length > 0 && postsLayout()}
                </div>
            </div>
        </div>
    );
}

export default Home;