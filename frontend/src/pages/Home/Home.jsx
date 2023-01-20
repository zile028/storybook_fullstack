import React, {useState} from 'react';
import {useEffect} from "react";
import Post from "../../services/Post";
import Shared from "../../services/Shared";

function Home(props) {
	const [allPosts, setAllPosts] = useState([]);
	useEffect(() => {
		Post.getAllPost().then((res) => {
			setAllPosts(res.data)
		})
	}, [])

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
					   href="index.php?user={post.user_id}">{post.first_name} {post.last_name}</a>

					<a href="user/single_post.php?id={post.id}"
					   className="btn btn-sm btn-success me-1">Read
						more</a>
					<a className="btn btn-sm btn-warning me-1"
					   href="voting.php?id={post.id}">Voting <span
					  className="badge bg-danger rounded-pill">{post.voting_count}</span></a>
					<a className="btn btn-sm btn-danger" href="add_comment.php?id={post.id}">Add
						comment</a>
				</div>
			</div>
		})

	}

	return (
	  <div className="container">
		  <h1 className="text-center py-5">All posts</h1>
		  <div className="row">
			  <div className="col-md-2">
				  <ul className="list-group">
					  <li className="list-group-item"><a href="index.php">All post</a></li>
					  {/*<?php foreach ($categories as $category): ?>*/}
					  {/*<li className="list-group-item">*/}
					  {/*  <a href="index.php?category=<?php echo $category->id; ?>"><?php echo $category->name ?></a>*/}
					  {/*</li>*/}
					  {/*<?php endforeach; ?>*/}
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