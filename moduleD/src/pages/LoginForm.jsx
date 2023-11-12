
const LoginForm = () => {
    return (
        <div className="container-fluid d-flex flex-column mt-4">
            <h2 className="d-block mx-auto">Login</h2>
            <form style={{width : '400px'}} action="" className="d-flex flex-column mx-auto mt-2">
                <label htmlFor="" className="form-label fs-5">
                    Email
                    <input type="email" className="form-control w-100 mt-2 p-2"/>
                </label>
                <label htmlFor="" className="form-label fs-5">
                    Password
                    <input type="password" className="form-control w-100 mt-2 p-2"/>
                </label>
                <input type="submit" className="btn btn-success" value={'Login'}/>
            </form>
        </div>
    );
}

export default LoginForm;
