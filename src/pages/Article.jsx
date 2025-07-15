import React, { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";

const Article = () => {
  const { id } = useParams(); // Ambil ID dari URL
  const [article, setArticle] = useState(null); // State untuk artikel

  useEffect(() => {
    //link get menyesuaikan dengan folder project masing-masing
    axios
      .get(`http://127.0.0.1/project_UAS/ptm13/Back-end/api/?id=${id}`)
      .then((res) => setArticle(res.data))
      .catch((err) => console.error("Gagal mengambil artikel:", err));
  }, [id]);

  if (!article) {
    return <h1 className="text-xl font-bold">Loading atau tidak ditemukan...</h1>;
  }

  return (
    <div className="p-4 border border-gray-300 rounded shadow-md">
      <table className="table-auto w-full border-collapse border border-gray-400 mb-6">
        <thead>
          <tr className="bg-gray-100">
            <th className="border px-4 py-2">ID</th>
            <th className="border px-4 py-2">Name</th>
            <th className="border px-4 py-2">Title</th>
            <th className="border px-4 py-2">Thumbnail</th>
            <th className="border px-4 py-2">Content</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td className="border px-4 py-2">{article.id}</td>
            <td className="border px-4 py-2">{article.name}</td>
            <td className="border px-4 py-2">{article.title}</td>
            <td className="border px-4 py-2">
              <img
                src={article.thumbnail}
                alt={article.title || "Thumbnail"}
                className="w-24 h-auto"
              />
            </td>
            <td className="border px-4 py-2">{article.content}</td>
          </tr>
        </tbody>
      </table>
    </div>
  );
};

export default Article;
