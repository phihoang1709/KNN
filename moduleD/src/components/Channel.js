import Session from "./Session";
import { useState } from "react";
const Channel = (props) => {
    const channel = props.channel;
    const [rooms, setRooms] = useState(Array.from(Object.values(channel?.rooms)));
    console.log(rooms);
    return (
        <tr className="row">
          <td className="col" style={{ width: "10%" }}>
            {channel.name}
          </td>
          <td className="col" style={{ width: "10%" }}>
            {rooms.map((room) => 
            (<tr>{room.name}</tr>))}
          </td>
          <td style={{ width: "80%" }} > 
          {rooms?.map((room)=>(
            <Session key={room.id} sessions={room?.sessions}/>
          ))}

          </td>
        </tr>
    );
}

export default Channel;
