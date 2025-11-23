import { Link } from "react-router-dom";
import { useDispatch } from "react-redux";
import { addItemToBasket } from "../features/basket/basketSlice.js";

export default function ItemCard({ item }) {
  const dispatch = useDispatch();
  const isAvailable = item.stock > 0;

  const handleAdd = () => {
    if (isAvailable) {
      dispatch(addItemToBasket(item));
    }
  };

  return (
    <div className="col-md-4 col-lg-3 mb-3">
      <div className="card h-100 shadow-sm border-0">
        <Link to={`/products/${item.id}`} className="text-decoration-none text-dark">
          <img
            src={item.thumbnail}
            className="card-img-top"
            alt={item.title}
            style={{ objectFit: "cover", height: "180px" }}
          />
        </Link>
        <div className="card-body d-flex flex-column">
          <h6 className="card-title fw-bold">{item.title}</h6>
          <p className="mb-1 small text-primary fw-bold">
            ${item.price}
          </p>
          <span
            className={
              "badge mb-2 " +
              (isAvailable ? "bg-info" : "bg-secondary")
            }
          >
            {isAvailable ? "Available" : "Unavailable"}
          </span>

          <div className="mt-auto d-flex justify-content-between align-items-center">
            <Link to={`/products/${item.id}`} className="btn btn-sm btn-outline-primary">
              View
            </Link>
            <button
              className="btn btn-sm btn-warning text-dark"
              onClick={handleAdd}
              disabled={!isAvailable}
            >
              Add
            </button>
          </div>
        </div>
      </div>
    </div>
  );
}
