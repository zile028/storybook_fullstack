import React from 'react';
import Sidebar from "../../component/Sidebar/Sidebar";

function SinglePost() {
    return (
        <div className="container">
            <h1 className="text-center py-5">Single posts</h1>
            <div className="row">
                <div className="col-md-2">
                    <Sidebar/>
                </div>
                <div className="col-md-10">
                    
                </div>
            </div>
        </div>
    );
}

export default SinglePost;