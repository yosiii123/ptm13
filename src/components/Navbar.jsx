import React from "react";
import { Link } from "react-router-dom";

const Navbar = () => {
  return (
    <nav
      className="border-b-4 border-green-700 text-center fixed top-0 bg-green-600 font-bold 
    w-full text-lg text-white"
    >
      <ul>
        <li className="inline-block py-4">
          <Link to="/Home" className="pl-6 pr-8">
            Home
          </Link>
        </li>
        <li className="inline-block py-4">
          <Link to="/About" className="pl-6 pr-8">
            About
          </Link>
        </li>
        <li className="inline-block py-4">
          <Link to="/List" className="pl-6 pr-8">
            Article List
          </Link>
        </li>
        <li className="inline-block py-4">
        <Link to="/Article" className="pl-6 pr-8">
  Article
</Link>
        </li>
      </ul>
    </nav>
  );
};
export default Navbar;
