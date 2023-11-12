import { Link, useParams } from "react-router-dom";
const EventPage = () => {
    let { id } = useParams();
    return (
        <div className="container-fluid d-flex flex-column p-3">
            <div className="d-flex mt-3 border-bottom border-2 mb-3 pb-3">
                <h1 className="me-auto">Hội thảo kỹ năng nghề TP Hà Nội 2023</h1>
                <Link to={`/tickets/${id}`} className="btn btn-warning">Đăng ký sự kiện này</Link>
            </div>
            <table className="table table-striped mt-5">
                <thead>
                    <tr className="row">
                        <td className="col" style={{ width: "10%" }}></td>
                        <td className="col" style={{ width: "10%" }}></td>
                        <tr style={{ width: "80%" }} className="d-flex">
                            <tr className="col">9:00</tr>
                            <tr className="col">11:00</tr>
                            <tr className="col">13:00</tr>
                            <tr className="col">15:00</tr>
                        </tr>
                    </tr>
                </thead>
                <tbody>
                    <tr className="row" style={{height:'85px'}} >
                        <td className="col" style={{ width: "10%" }}>
                            Lo trinh dinh huong xa hoi
                        </td>
                        <td className="col" style={{ width: "10%" }}>
                            Dia diem
                        </td>
                        <tr style={{ width: "80%" }} className="">
                            <tr>
                                <td className="border border-2 position-absolute border-success">
                                    Event 1
                                </td>
                                <td style={{marginLeft : '20%'}} className="border border-2 position-absolute border-success">
                                    Event 112
                                </td>
                            </tr>
                            <tr className="position-absolute flex-wrap" style={{width: "100%",marginTop : '40px'}}>
                                <td className="border border-2 position-absolute border-success">
                                    Event333
                                </td>
                                <td style={{marginLeft : '20%'}} className="border border-2 position-absolute border-success">
                                    Event112
                                </td>
                            </tr>
                        </tr>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    );
};

export default EventPage;
