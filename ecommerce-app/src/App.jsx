import { Routes, Route, Navigate } from "react-router-dom";
import Header from "./components/Navbar.jsx";
import ItemsGallery from "./pages/ProductsList.jsx";
import ItemDetailsView from "./pages/ProductDetails.jsx";
import BasketView from "./pages/CartPage.jsx";
import PageNotFound from "./pages/NotFound.jsx";
import RegisterPage from "./pages/RegisterPage.jsx";
import ContactPage from "./pages/ContactPage.jsx";
import { useLanguage } from "./context/LanguageContext.jsx";

export default function App() {
  const { direction } = useLanguage();

  return (
    <div dir={direction}>
      <Header />
      <main className="container py-4">
        <Routes>
          <Route path="/" element={<Navigate to="/products" replace />} />
          <Route path="/products" element={<ItemsGallery />} />
          <Route path="/products/:id" element={<ItemDetailsView />} />
          <Route path="/cart" element={<BasketView />} />
          <Route path="/register" element={<RegisterPage />} />
          <Route path="/contact" element={<ContactPage />} />
          <Route path="*" element={<PageNotFound />} />
        </Routes>
      </main>
    </div>
  );
}
