import { useState } from "react";
import { useNavigate} from 'react-router-dom';
const LoginForm = (props) => {

    const [data, setData] = useState();
    async function login(e){
        e.preventDefault();
        const user = {
            "name" : e.target.name.value,
            "registration_code" : e.target.pass.value 
        };
        try {
            let res = await fetch('http://127.0.0.1:8000/api/v1/login', {
                method : "POST",
                headers : {
                    "Content-Type" : "application/json"
                },
                body : JSON.stringify(user)
            });
            let values = await res.json();
            
            setData(values);
            console.log(values);
        } catch (error) {
            console.log(error);
        }
    }
    return (
        <div className="container-fluid d-flex flex-column mt-4">
            <h2 className="d-block mx-auto">Login</h2>
            <form style={{width : '400px'}} action={`/?token=${data}`} className="d-flex flex-column mx-auto mt-2" onSubmit={login}>
                <label htmlFor="" className="form-label fs-5">
                    Name
                    <input type="text" name="name" className="form-control w-100 mt-2 p-2"/>
                </label>
                <label htmlFor="" className="form-label fs-5">
                    Password
                    <input type="password" name="pass" className="form-control w-100 mt-2 p-2"/>
                </label>
                <input type="submit" className="btn btn-success" value={'Login'}/>
            </form>
        </div>
    );
}

export default LoginForm;

