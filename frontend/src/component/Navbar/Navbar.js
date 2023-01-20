import React from 'react';

function Navbar() {
    return <nav className="navbar navbar-expand-lg bg-body-tertiary">
        <div className="container">
            <a className="navbar-brand" href="index.php">StoryBook</a>
            <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarNav">
                <ul className="navbar-nav ms-auto">
                    <li className="nav-item dropdown">
                        <a className="nav-link dropdown-toggle" href="/" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Settings
                        </a>
                        <ul className="dropdown-menu">
                            <li><a className="dropdown-item" href="user/account.php">Account</a></li>
                            <li><a className="dropdown-item" href="/">Another action</a></li>
                            <li>
                                <hr className="dropdown-divider"/>
                            </li>
                            <li><a className="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li className="nav-item">
                        <a className="nav-link"
                           href="user/home.php">User</a>
                    </li>
                    <li className="nav-item">
                        <a className="btn btn-outline-primary" href="login.php">Login</a>
                    </li>
                    <li className="nav-item">

                        <a className="btn btn-outline-info" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>;
}

export default Navbar;