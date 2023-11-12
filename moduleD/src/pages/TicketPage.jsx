
const TicketPage = () => {
    return (
        <div className="container-fluid d-flex d-block flex-column">
            <h1 className="mx-auto">Hội thảo kỹ năng nghề TP Hà Nội</h1>
            <form action="" className="mx-auto border border-2 p-5"> 
            <div className="d-flex ">
                <div className="d-flex d-block border border-2"> 
                    <input name="check" type="radio" className="form-check-imput m-2"/>
                    <p className="d-flex flex-column m-2">Ve thuong <span></span></p>
                    <p className="m-2">100d</p>
                </div>
                <div className="d-flex d-block border border-2 bg-secondary">
                    <input name="check" type="radio" className="form-check-imput m-2" disabled/>
                    <p className="d-flex flex-column m-2">Dat som<span>Khong san co</span></p>
                    <p className="m-2">100d</p>
                </div>
                <div className="d-flex d-block border border-2">
                    <input name="check" type="radio" className="form-check-imput m-2"/>
                    <p className="d-flex flex-column m-2">Vip <span>100 ve san co</span></p>
                    <p className="m-2">100d</p>
                </div>
            </div>
            <div className="d-flex flex-column my-3">
                <h3>Hello</h3>
                <label htmlFor="">
                    <input type="checkbox" />
                    sec 1
                </label>
                <label htmlFor="">
                    <input type="checkbox" />
                    sec 1
                </label>
                <label htmlFor="">
                    <input type="checkbox" />
                    sec 1
                </label>
            </div>
            <div className="d-flex justify-content-end my-3">
                <table>
                    <tr>
                        <td>Ve su kien</td>
                        <td>210</td>
                    </tr>
                    <tr>
                        <td>Workshop bo sung</td>
                        <td>210</td>
                    </tr>
                    <tr className="border-top">
                        <td>Tong</td>
                        <td>210</td>
                    </tr>
                </table>
                
            </div>
            <div className="d-flex justify-content-end">
                <input type="submit" value={'Mua'} className="btn btn-danger "/>
            </div>
            </form>
        </div>
    );
}

export default TicketPage;
