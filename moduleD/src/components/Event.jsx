/* eslint-disable react/prop-types */
import { Link } from "react-router-dom";

const Event = (props) => {
    return (
        <Link to={`/events/${props.id}`} className="d-block rounded w-100 mt-2 p-3 border border-secondary">
            <h3>{props.title}</h3>
            <p>{props.time}</p>
        </Link>
    );
}

export default Event;
