import { useEffect, useState } from "react";
import ItemCard from "../components/ProductCard.jsx";
import PageNav from "../components/Pagination.jsx";

const ITEMS_PER_PAGE = 10; 

export default function ItemsGallery() {
  const [itemsList, setItemsList] = useState([]);
  const [totalCount, setTotalCount] = useState(0);
  const [currentPage, setCurrentPage] = useState(1);
  const [isLoading, setIsLoading] = useState(false);
  const [errorMsg, setErrorMsg] = useState("");

  useEffect(() => {
    const loadItems = async () => {
      setIsLoading(true);
      setErrorMsg("");

      const skipCount = (currentPage - 1) * ITEMS_PER_PAGE;

      try {
        const response = await fetch(
          `https://dummyjson.com/products?limit=${ITEMS_PER_PAGE}&skip=${skipCount}`
        );
        const jsonData = await response.json();
        setItemsList(jsonData.products || []);
        setTotalCount(jsonData.total || 0);
      } catch (err) {
        setErrorMsg("Failed to load items");
      } finally {
        setIsLoading(false);
      }
    };

    loadItems();
  }, [currentPage]);

  return (
    <div>
      <h2 className="mb-4 text-primary fw-bold">Our Items Collection</h2>
      {isLoading && <p className="text-info">Loading items...</p>}
      {errorMsg && <p className="text-danger">{errorMsg}</p>}

      <div className="row">
        {!isLoading &&
          itemsList.map((item) => <ItemCard key={item.id} item={item} />)}
      </div>

      <PageNav
        currentPage={currentPage}
        totalItems={totalCount}
        itemsPerPage={ITEMS_PER_PAGE}
        onNavigate={setCurrentPage}
      />
    </div>
  );
}
