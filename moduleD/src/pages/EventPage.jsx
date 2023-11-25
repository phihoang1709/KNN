import { Link, useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import EventDetail from "../components/EventDetail";
const EventPage = () => {
    let { slug } = useParams();
    let [event, setEvent] = useState();
    useEffect(
        function(){
         async function getData(){
                let res = await fetch(`http://127.0.0.1:8000/api/v1/organizers/demo1/events/${slug}`);
                let data = await res.json();
                setEvent(data);
                
            }
            getData();
        },[]);
        console.log(event);
    return (
        <div className="container-fluid d-flex flex-column p-3">
            <div className="d-flex mt-3 border-bottom border-2 mb-3 pb-3">
                <h1 className="me-auto">{event.name}</h1>
                <Link to={`/tickets/${event.id}`} className="btn btn-warning">Đăng ký sự kiện này</Link>
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
                    <EventDetail name="Name 1" address="Address"/>
                </tbody>
            </table>
        </div>
    );
};

export default EventPage;
