import { useDispatch, useSelector } from "react-redux";
import {
  getBasketProducts,
  getBasketTotalPrice,
  increaseQty,
  decreaseQty,
  removeItemFromBasket,
  emptyBasket,
} from "../features/basket/basketSlice.js";

export default function BasketView() {
  const dispatch = useDispatch();
  const basketItems = useSelector(getBasketProducts);
  const totalPrice = useSelector(getBasketTotalPrice);

  if (basketItems.length === 0) {
    return (
      <div className="text-center py-5">
        <div className="mb-4">
          <i className="bi bi-cart3 display-1 text-primary"></i>
        </div>
        <h2 className="text-primary fw-bold mb-3">Your Shopping Cart</h2>
        <p className="text-muted fs-5">
          Your cart is empty. Start shopping to add items!
        </p>
        <a href="/products" className="btn btn-warning text-dark fw-bold mt-3 px-4">
          Browse Items
        </a>
      </div>
    );
  }

  return (
    <div>
      <h2 className="mb-4 text-primary fw-bold">Your Shopping Cart</h2>
      <div className="table-responsive">
        <table className="table align-middle table-hover">
          <thead className="table-primary">
            <tr>
              <th>Item Details</th>
              <th style={{ width: "180px" }}>Quantity</th>
              <th>Remove</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            {basketItems.map((product) => (
              <tr key={product.id}>
                <td>
                  <div className="d-flex align-items-center gap-3">
                    <img
                      src={product.thumbnail}
                      alt={product.title}
                      className="rounded"
                      style={{ width: "80px", height: "80px", objectFit: "cover" }}
                    />
                    <div>
                      <h6 className="mb-0 fw-bold">{product.title}</h6>
                      <small className="text-muted">${product.price} each</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div className="btn-group" role="group">
                    <button
                      className="btn btn-sm btn-outline-primary"
                      onClick={() => dispatch(decreaseQty(product.id))}
                    >
                      -
                    </button>
                    <span className="btn btn-sm btn-light fw-bold">
                      {product.qty}
                    </span>
                    <button
                      className="btn btn-sm btn-outline-primary"
                      onClick={() => dispatch(increaseQty(product.id))}
                    >
                      +
                    </button>
                  </div>
                </td>
                <td>
                  <button
                    className="btn btn-sm btn-danger"
                    onClick={() => dispatch(removeItemFromBasket(product.id))}
                  >
                    <i className="bi bi-trash"></i>
                  </button>
                </td>
                <td className="fw-bold text-warning">
                  ${(product.price * product.qty).toFixed(2)}
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <div className="d-flex justify-content-between align-items-center mt-4">
        <button
          className="btn btn-outline-danger"
          onClick={() => dispatch(emptyBasket())}
        >
          Clear Cart
        </button>
        <h3 className="text-success fw-bold">Total: ${totalPrice.toFixed(2)}</h3>
      </div>
    </div>
  );
}
