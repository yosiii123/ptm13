import React, { useState, useEffect } from "react";
import Articles from "../components/Articles";
import axios from "axios";

const ArticleList = () => {
  const [articles, setArticles] = useState([]);

  useEffect(() => {
    axios
      .get(" http://127.0.0.1/project_UAS/ptm13/Back-end/api/")
      .then((res) => {

        console.log(res.data);
        setArticles(res.data);
      })
      .catch((err) => {
        console.error("Gagal memuat artikel:", err);
      });
  }, []);

  return (
    <div>
      <h1 className="text-2xl font-bold mb-4">Daftar Artikel</h1>
      <Articles articles={articles} />
    </div>
  );
};

export default ArticleList;
