export default function PageNav({ currentPage, totalItems, itemsPerPage, onNavigate }) {
  const totalPageCount = Math.ceil(totalItems / itemsPerPage);

  if (totalPageCount <= 1) return null;

  const goToPrevious = () => {
    if (currentPage > 1) onNavigate(currentPage - 1);
  };

  const goToNext = () => {
    if (currentPage < totalPageCount) onNavigate(currentPage + 1);
  };

  return (
    <nav aria-label="Items navigation">
      <ul className="pagination justify-content-center">
        <li className={`page-item ${currentPage === 1 ? "disabled" : ""}`}>
          <button className="page-link text-primary" onClick={goToPrevious}>
            « Prev
          </button>
        </li>

        <li className="page-item disabled">
          <span className="page-link bg-light">
            {currentPage} / {totalPageCount}
          </span>
        </li>

        <li className={`page-item ${currentPage === totalPageCount ? "disabled" : ""}`}>
          <button className="page-link text-primary" onClick={goToNext}>
            Next »
          </button>
        </li>
      </ul>
    </nav>
  );
}
