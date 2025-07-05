import Home from "./pages/Home";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import About from "./pages/About";
import ArticleList from "./pages/ArticleList.jsx";
import Article from "./pages/Article";
import Navbar from "./components/Navbar";

function App() {
  return (
    <Router>
      <Navbar />
      <div className="max-w-screen-md mx-auto pt-20 ">
        <Routes>
          <Route path="/Home" element={<Home />} />
          <Route path="/About" element={<About />} />
          <Route path="/List" element={<ArticleList />} />

          {/* ✅ Tambahkan route untuk /Article (tanpa parameter) */}
          <Route path="/Article" element={<ArticleList />} />

          {/* ✅ Detail artikel berdasarkan nama/slug */}
          <Route path="/Article/:id" element={<Article />} />
        </Routes>
      </div>
    </Router>
  );
}

export default App;
