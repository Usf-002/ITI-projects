import { useState } from "react";
import { useNavigate } from "react-router-dom";

export default function RegisterPage() {
  const navigate = useNavigate();
  const [formData, setFormData] = useState({
    email: "",
    name: "",
    username: "",
    password: "",
    confirmPassword: "",
  });

  const [errors, setErrors] = useState({});
  const [showErrors, setShowErrors] = useState(false);

  const validateEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  };

  const validatePassword = (password) => {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
    return passwordRegex.test(password);
  };

  const validateForm = () => {
    const newErrors = {};

    if (!formData.email) {
      newErrors.email = "Email is required";
    } else if (!validateEmail(formData.email)) {
      newErrors.email = "Please enter a valid email format";
    }

    if (!formData.name) {
      newErrors.name = "Name is required";
    }

    if (!formData.username) {
      newErrors.username = "Username is required";
    } else if (formData.username.includes(" ")) {
      newErrors.username = "Username cannot contain spaces";
    }

    if (!formData.password) {
      newErrors.password = "Password is required";
    } else if (!validatePassword(formData.password)) {
      newErrors.password =
        "Password must be at least 8 characters, contain at least one lowercase letter, one uppercase letter, one digit, and a special character (example: @%$#!)";
    }

    if (!formData.confirmPassword) {
      newErrors.confirmPassword = "Please confirm your password";
    } else if (formData.password !== formData.confirmPassword) {
      newErrors.confirmPassword = "Passwords do not match";
    }

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));

    if (showErrors) {
      validateForm();
    }
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    setShowErrors(true);

    if (validateForm()) {
      console.log("Form Data:", formData);
      alert("Registration successful!");
      navigate("/products");
    }
  };

  return (
    <div className="row justify-content-center">
      <div className="col-md-6">
        <div className="card shadow-sm border-0">
          <div className="card-body p-4">
            <h2 className="text-primary fw-bold mb-4 text-center">Register Form</h2>
            
            <form onSubmit={handleSubmit} noValidate>
              <div className="mb-3">
                <label htmlFor="name" className="form-label fw-bold">
                  Name <span className="text-danger">*</span>
                </label>
                <input
                  type="text"
                  className={`form-control ${showErrors && errors.name ? "is-invalid" : ""}`}
                  id="name"
                  name="name"
                  value={formData.name}
                  onChange={handleChange}
                  placeholder="Enter your name"
                />
                {showErrors && errors.name && (
                  <div className="invalid-feedback">{errors.name}</div>
                )}
              </div>

              <div className="mb-3">
                <label htmlFor="email" className="form-label fw-bold">
                  Email <span className="text-danger">*</span>
                </label>
                <input
                  type="email"
                  className={`form-control ${showErrors && errors.email ? "is-invalid" : ""}`}
                  id="email"
                  name="email"
                  value={formData.email}
                  onChange={handleChange}
                  placeholder="Enter your email"
                />
                {showErrors && errors.email && (
                  <div className="invalid-feedback">{errors.email}</div>
                )}
              </div>

              <div className="mb-3">
                <label htmlFor="username" className="form-label fw-bold">
                  User Name <span className="text-danger">*</span>
                </label>
                <input
                  type="text"
                  className={`form-control ${showErrors && errors.username ? "is-invalid" : ""}`}
                  id="username"
                  name="username"
                  value={formData.username}
                  onChange={handleChange}
                  placeholder="Enter username (no spaces)"
                />
                {showErrors && errors.username && (
                  <div className="invalid-feedback">{errors.username}</div>
                )}
              </div>

              <div className="mb-3">
                <label htmlFor="password" className="form-label fw-bold">
                  Password <span className="text-danger">*</span>
                </label>
                <input
                  type="password"
                  className={`form-control ${showErrors && errors.password ? "is-invalid" : ""}`}
                  id="password"
                  name="password"
                  value={formData.password}
                  onChange={handleChange}
                  placeholder="Enter password"
                />
                {showErrors && errors.password && (
                  <div className="invalid-feedback">{errors.password}</div>
                )}
                <small className="text-muted">
                  Example: P@ssword1234
                </small>
              </div>

              <div className="mb-3">
                <label htmlFor="confirmPassword" className="form-label fw-bold">
                  Confirm Password <span className="text-danger">*</span>
                </label>
                <input
                  type="password"
                  className={`form-control ${showErrors && errors.confirmPassword ? "is-invalid" : ""}`}
                  id="confirmPassword"
                  name="confirmPassword"
                  value={formData.confirmPassword}
                  onChange={handleChange}
                  placeholder="Confirm your password"
                />
                {showErrors && errors.confirmPassword && (
                  <div className="invalid-feedback">{errors.confirmPassword}</div>
                )}
              </div>

              <button type="submit" className="btn btn-success w-100 fw-bold">
                Register
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}
