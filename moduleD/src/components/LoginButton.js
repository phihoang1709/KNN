import { Link } from "react-router-dom";
const LoginButton = () => {
    return (
        <Link style={{width : '100px', height : '40px'}} to={'/login'} className="btn btn-danger">
            Login
        </Link>
    );
}

export default LoginButton;
