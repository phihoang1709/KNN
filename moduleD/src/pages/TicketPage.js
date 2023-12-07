import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
const TicketPage = () => {
    let navigate = useNavigate();
    const [tickets, setTickets] = useState();
    const { id } = useParams();
    const [ticketId, setTicketId] = useState(0);
    const [otherTicketId, setOtherTicketId] = useState(0);
    const [ticketPrice, setTicketPrice] = useState(0);
    const [ticketPriceExtra, setTicketPriceExtra] = useState(0);
    const [otherTickets, setOtherTickets] = useState();

    function handleChange(e) {
        setTicketId(e.target.id);
        setTicketPrice(e.target.value);
    }
    function handleOtherTicket(e) {
        setOtherTicketId(e.target.id);
        setTicketPriceExtra(e.target.value);
    }
    function buyTicket() {
        if (!sessionStorage.getItem('id')) {
            alert("Bạn cần đăng nhập để đăng ký vé");
            navigate("/login");
        }
        console.log("hello");
        fetch("http://127.0.0.1:8000/api/v1/tickets", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                "attendee_id": sessionStorage.getItem('id'),
                "ticket_id": ticketId
            })
        },

        )
            .then((res) => res.json())
            .then((data) => {
                fetch("http://127.0.0.1:8000/api/v1/orthertickets", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        "registration_id": JSON.stringify(data?.id),
                        "session_id": otherTicketId
                    })
                },

                )
            })
            .catch(err => console.error(err))
        alert("Đăng ký thành công")
        navigate("/")
    }
    useEffect(function () {
        fetch(`http://127.0.0.1:8000/api/v1/tickets/${id}`)
            .then((res) => res.json())
            .then((data) => setTickets(data));
    }, []);
    useEffect(function () {
        fetch(`http://127.0.0.1:8000/api/v1/events/tickets/${id}`)
            .then(res => res.json())
            .then(data => setOtherTickets(data))
    }, []);
    console.log(ticketId + " - " + otherTicketId);
    return (
        <div className="container-fluid d-flex d-block flex-column">
            <h1 className="mx-auto">Hội thảo kỹ năng nghề TP Hà Nội</h1>
            <form action="" className="mx-auto border border-2 p-5" onSubmit={buyTicket}>
                <div className="d-flex ">
                    {tickets?.map((ticket) => (
                        ((ticket?.special_validity) != null) ? (
                            <div className="d-flex d-block border border-2">
                                <input id={ticket?.id} onChange={handleChange} value={ticket?.cost} name="check" type="radio" className="form-check-imput m-2" />
                                <p className="d-flex flex-column m-2">{ticket?.name}<span></span></p>
                                <p className="m-2">{ticket?.cost}</p>
                            </div>
                        ) : (
                            <div className="d-flex d-block border border-2 bg-secondary">
                                <input name="check" type="radio" className="form-check-imput m-2" disabled />
                                <p className="d-flex flex-column m-2">{ticket?.name}<span> Không sẵn có</span></p>
                                <p className="m-2">{ticket?.cost}</p>
                            </div>
                        )

                    ))}

                </div>
                <div className="d-flex flex-column my-3">
                    <h3>Lựa chọn workshop bổ sung</h3>
                    {otherTickets?.map((otherTicket) => (
                        <label htmlFor="">
                            <input id={otherTicket?.id} onChange={handleOtherTicket} name="otherTicket" type="radio" value={(otherTicket?.cost == null) ? 0 : otherTicket?.cost} />
                            {otherTicket?.title}
                        </label>
                    ))}


                </div>
                <div className="d-flex justify-content-end my-3">
                    <table>
                        <tr>
                            <td>Vé sự kiện</td>
                            <td>{ticketPrice}</td>
                        </tr>
                        <tr>
                            <td>Workshop bổ sung</td>
                            <td>{ticketPriceExtra}</td>
                        </tr>
                        <tr className="border-top">
                            <td>Tổng</td>
                            <td>{+ticketPriceExtra + +ticketPrice}</td>
                        </tr>
                    </table>

                </div>
                <div className="d-flex justify-content-end">
                    {(ticketPrice === 0) ? (
                        <input disabled type="submit" value={'Mua'} className="btn btn-danger " />
                    ) : (
                        <input type="submit" value={'Mua'} className="btn btn-danger " />
                    )}
                </div>
            </form>
        </div>
    );
}

export default TicketPage;
