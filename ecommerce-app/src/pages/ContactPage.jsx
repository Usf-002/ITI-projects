import { useState } from "react";
import { useForm } from "react-hook-form";
import { yupResolver } from "@hookform/resolvers/yup";
import * as yup from "yup";
import PhoneInput from "react-phone-number-input";
import "react-phone-number-input/style.css";

const schema = yup.object().shape({
  firstName: yup.string().required("First name is required"),
  lastName: yup.string().required("Last name is required"),
  email: yup
    .string()
    .required("Email is required")
    .email("Please enter a valid email format"),
  message: yup
    .string()
    .required("Message is required")
    .min(10, "Message must be at least 10 characters")
    .max(500, "Message cannot exceed 500 characters"),
});

export default function ContactPage() {
  const [phoneNumber, setPhoneNumber] = useState("");
  const [isSubmitted, setIsSubmitted] = useState(false);

  const {
    register,
    handleSubmit,
    reset,
    formState: { errors },
  } = useForm({
    resolver: yupResolver(schema),
  });

  const onSubmit = (data) => {
    const formData = {
      ...data,
      phoneNumber: phoneNumber || "Not provided",
    };
    
    console.log("Contact Form Data:", formData);
    setIsSubmitted(true);
    
    setTimeout(() => {
      setIsSubmitted(false);
      reset();
      setPhoneNumber("");
    }, 3000);
  };

  return (
    <div className="row justify-content-center">
      <div className="col-md-8 col-lg-6">
        <div className="card shadow border-0">
          <div className="card-body p-5">
            <h2 className="text-primary fw-bold mb-2 text-center">Contact Us Form</h2>
            <p className="text-center text-muted mb-4">
              Please fill in the form below to get in touch with us.
            </p>

            {isSubmitted && (
              <div className="alert alert-success" role="alert">
                <i className="bi bi-check-circle-fill me-2"></i>
                Thank you for your message! We will get to you soon.
              </div>
            )}

            <form onSubmit={handleSubmit(onSubmit)}>
              <div className="row">
                <div className="col-md-6 mb-3">
                  <label htmlFor="firstName" className="form-label">
                    First name <span className="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    className={`form-control ${errors.firstName ? "is-invalid" : ""}`}
                    id="firstName"
                    placeholder="First name"
                    {...register("firstName")}
                  />
                  {errors.firstName && (
                    <div className="invalid-feedback">{errors.firstName.message}</div>
                  )}
                </div>

                <div className="col-md-6 mb-3">
                  <label htmlFor="lastName" className="form-label">
                    Last name <span className="text-danger">*</span>
                  </label>
                  <input
                    type="text"
                    className={`form-control ${errors.lastName ? "is-invalid" : ""}`}
                    id="lastName"
                    placeholder="Last name"
                    {...register("lastName")}
                  />
                  {errors.lastName && (
                    <div className="invalid-feedback">{errors.lastName.message}</div>
                  )}
                </div>
              </div>

              <div className="row">
                <div className="col-md-6 mb-3">
                  <label htmlFor="email" className="form-label">
                    Email address <span className="text-danger">*</span>
                  </label>
                  <input
                    type="email"
                    className={`form-control ${errors.email ? "is-invalid" : ""}`}
                    id="email"
                    placeholder="Email address"
                    {...register("email")}
                  />
                  {errors.email && (
                    <div className="invalid-feedback">{errors.email.message}</div>
                  )}
                </div>

                <div className="col-md-6 mb-3">
                  <label htmlFor="phoneNumber" className="form-label">
                    Phone Number <small className="text-muted">(Optional)</small>
                  </label>
                  <PhoneInput
                    international
                    defaultCountry="EG"
                    value={phoneNumber}
                    onChange={setPhoneNumber}
                    className="form-control"
                    placeholder="Enter phone number"
                  />
                </div>
              </div>

              <div className="mb-3">
                <label htmlFor="message" className="form-label">
                  Message <span className="text-danger">*</span>
                </label>
                <textarea
                  className={`form-control ${errors.message ? "is-invalid" : ""}`}
                  id="message"
                  rows="5"
                  placeholder="Your message (min 10 characters, max 500)"
                  {...register("message")}
                ></textarea>
                {errors.message && (
                  <div className="invalid-feedback">{errors.message.message}</div>
                )}
              </div>

              <div className="mb-3 form-check">
                <input
                  type="checkbox"
                  className="form-check-input"
                  id="termsCheck"
                  required
                />
                <label className="form-check-label" htmlFor="termsCheck">
                  I've read and agree with{" "}
                  <a href="#" className="text-primary">
                    Terms of Service
                  </a>{" "}
                  and{" "}
                  <a href="#" className="text-primary">
                    Privacy Policy
                  </a>
                </label>
              </div>

              <button type="submit" className="btn btn-dark w-100 fw-bold py-2">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
}
