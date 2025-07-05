import React from "react";
import { Link } from "react-router-dom";

const Articles = ({ articles }) => {
  return (
    <>
      {articles.map((article) => (
        <div key={article.id} className="mb-4">
          <Link
            to={`/Article/${article.id}`}
            className="text-green-500 inline-flex items-center md:mb-2 lg:mb-0"
          >
            {article.title}
          </Link>
          <span className="text-gray-400 inline-flex items-center loading-none text-sm p-1 px-3 bg-gray-200 rounded">
            {article.id || "Unknown Date"}
          </span>
        </div>
      ))}
    </>
  );
};

export default Articles;
