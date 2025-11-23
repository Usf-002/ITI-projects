export default function PageNotFound() {
  return (
    <div className="text-center py-5">
      <h1 className="display-1 text-primary fw-bold">404</h1>
      <h3 className="text-muted mb-3">Oops! Page Not Found</h3>
      <p className="text-secondary">The page you're looking for doesn't exist or has been moved.</p>
      <a href="/products" className="btn btn-warning text-dark mt-3">
        Go Back Home
      </a>
    </div>
  );
}
