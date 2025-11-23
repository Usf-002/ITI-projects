import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { useDispatch } from "react-redux";
import { addItemToBasket } from "../features/basket/basketSlice.js";

export default function ItemDetailsView() {
  const { id } = useParams();
  const dispatch = useDispatch();
  const [itemData, setItemData] = useState(null);
  const [isLoading, setIsLoading] = useState(false);
  const [errorMsg, setErrorMsg] = useState("");

  useEffect(() => {
    const loadItemDetails = async () => {
      setIsLoading(true);
      setErrorMsg("");
      try {
        const response = await fetch(`https://dummyjson.com/products/${id}`);
        if (!response.ok) throw new Error("Not found");
        const jsonData = await response.json();
        setItemData(jsonData);
      } catch (err) {
        setErrorMsg("Failed to load item details");
      } finally {
        setIsLoading(false);
      }
    };

    loadItemDetails();
  }, [id]);

  const handleAddToBasket = () => {
    if (itemData && isAvailable) {
      dispatch(addItemToBasket(itemData));
    }
  };

  if (isLoading) return <p className="text-info">Loading item details...</p>;
  if (errorMsg) return <p className="text-danger">{errorMsg}</p>;
  if (!itemData) return null;

  const isAvailable = itemData.stock > 0;

  return (
    <div className="row">
      <div className="col-md-5">
        <img
          src={itemData.thumbnail}
          alt={itemData.title}
          className="img-fluid mb-3 rounded shadow"
        />
        <div className="d-flex flex-wrap gap-2">
          {itemData.images?.slice(0, 4).map((img) => (
            <img
              key={img}
              src={img}
              alt=""
              className="rounded"
              style={{ width: "90px", height: "90px", objectFit: "cover" }}
            />
          ))}
        </div>
      </div>

      <div className="col-md-7">
        <h3 className="text-primary fw-bold">{itemData.title}</h3>
        <p className="text-muted fst-italic">{itemData.brand}</p>
        <p className="text-secondary">{itemData.description}</p>
        <p className="fs-3 fw-bold text-warning">${itemData.price}</p>
        <p>
          <span className="badge bg-info text-dark me-2">
            {itemData.category}
          </span>
          <span
            className={
              "badge " + (isAvailable ? "bg-success" : "bg-secondary")
            }
          >
            {isAvailable ? "Available" : "Out of stock"}
          </span>
        </p>

        <button
  className="btn btn-warning text-dark fw-bold mt-3 px-4"
  disabled={!isAvailable}
  onClick={handleAddToBasket}
>
  Add to Cart
</button>

      </div>
    </div>
  );
}
