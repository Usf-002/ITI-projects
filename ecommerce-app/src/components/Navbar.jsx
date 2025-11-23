import { NavLink, Link } from "react-router-dom";
import { useSelector } from "react-redux";
import { getBasketItemsCount } from "../features/basket/basketSlice.js";
import { useLanguage } from "../context/LanguageContext.jsx";

export default function Header() {
  const { language, setLanguage } = useLanguage();
  const totalItems = useSelector(getBasketItemsCount);

  const handleLanguageSwitch = (e) => setLanguage(e.target.value);

  return (
    <nav className="navbar navbar-expand-lg navbar-dark bg-primary border-bottom shadow-sm">
      <div className="container">
        <Link className="navbar-brand fw-bold text-warning" to="/products">
          USF
        </Link>

        <button
          className="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#headerNav"
        >
          <span className="navbar-toggler-icon" />
        </button>

        <div className="collapse navbar-collapse" id="headerNav">
          <ul className="navbar-nav me-auto">
            <li className="nav-item">
              <NavLink className="nav-link text-light" to="/products">
                Items
              </NavLink>
            </li>
            <li className="nav-item">
              <NavLink className="nav-link text-light" to="/contact">
                Contact Us
              </NavLink>
            </li>
            <li className="nav-item">
              <NavLink className="nav-link text-light" to="/register">
                Register
              </NavLink>
            </li>
          </ul>

          <div className="d-flex align-items-center gap-3">
            {/* language dropdown */}
            <select
              className="form-select form-select-sm w-auto bg-light"
              value={language}
              onChange={handleLanguageSwitch}
            >
              <option value="en">English</option>
              <option value="ar">العربية</option>
            </select>

            {/* Cart button (was Basket) */}
            <NavLink
              className="btn btn-warning text-dark position-relative"
              to="/cart"
            >
              <i className="bi bi-cart3" /> Cart
              {totalItems > 0 && (
                <span className="badge bg-danger text-white position-absolute top-0 start-100 translate-middle">
                  {totalItems}
                </span>
              )}
            </NavLink>

            <NavLink className="btn btn-outline-light" to="/register">
              <i className="bi bi-person-circle" /> Sign In
            </NavLink>
          </div>
        </div>
      </div>
    </nav>
  );
}
