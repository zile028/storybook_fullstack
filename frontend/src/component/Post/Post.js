import React from 'react';
import Shared from "../../services/Shared";
import {Link} from "react-router-dom";

function Post({post}) {
    return (
        <div className="card mb-3">
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

                <Link to={"singlePost/" + post.id} className="btn btn-sm btn-success me-1">Read
                    more</Link>
                <a className="btn btn-sm btn-warning me-1"
                   href="beckend/voting.php?id={post.id}">Voting <span
                    className="badge bg-danger rounded-pill">{post.voting_count}</span></a>
                <a className="btn btn-sm btn-danger" href="beckend/add_comment.php?id={post.id}">Add
                    comment</a>
            </div>
        </div>
    );
}

export default Post;