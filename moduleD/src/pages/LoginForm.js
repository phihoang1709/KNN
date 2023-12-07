import { useState } from "react";
import { useNavigate } from "react-router-dom";

const LoginForm = () => {
  const [data, setData] = useState({ lastname: "", registration_code: "" });

  const navigate = useNavigate();

  const handleLogin = (event) => {
    event.preventDefault();

    fetch("http://127.0.0.1:8000/api/v1/login", {
        method: "POST",

        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
      })
      .then((response) => response.json())
      .then((data) => {
        sessionStorage.setItem('id', JSON.stringify(data?.id));
        sessionStorage.setItem('token', JSON.stringify(data?.token).replace(/"/g, ""));
        navigate("/");
      })

  };

  const handleInputChange = (event) => {
    setData({ ...data, [event.target.name]: event.target.value });
  };

  return (
    <div className="container-fluid d-flex flex-column mt-4">
      <h2 className="d-block mx-auto">Login</h2>
      <form
        style={{ width: "400px" }}
        className="d-flex flex-column mx-auto mt-2"
        
      >
        <div className="form-group">
          <label htmlFor="name" className="form-label fs-5">
            Last Name
          </label>
          <input
            type="text"
            id="name"
            name="lastname"
            className="form-control"
            required
            value={data.lastname}
            onChange={handleInputChange}
          />
        </div>
        <div className="form-group">
          <label htmlFor="pass" className="form-label fs-5">
            Code
          </label>
          <input
            type="password"
            id="pass"
            name="registration_code"
            className="form-control"
            required
            value={data.registration_code}
            onChange={handleInputChange}
          />
        </div>
        <button type="submit" onClick={handleLogin} className="btn btn-success">
          Login
        </button>
      </form>
    </div>
  );
};

export default LoginForm;


