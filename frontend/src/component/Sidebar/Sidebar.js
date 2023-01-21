import React, {useEffect, useState} from 'react';
import Category from "../../services/Category";

function Sidebar() {

    const [allCategory, setAllCategory] = useState([]);

    useEffect(() => {
        Category.getCategory().then((res) => setAllCategory(res.data));
    }, []);

    function sidebarLayout() {
        return allCategory.map((category, index) => {
            return <li key={index} className="list-group-item">
                <a href={"index.php?category=" + category.id}>{category.name}</a></li>;
        });
    }

    return (
        <ul className="list-group">
            <li className="list-group-item"><a href="beckend/index.php">All post</a></li>
            {allCategory.length > 0 && sidebarLayout()}
        </ul>
    );
}

export default Sidebar;