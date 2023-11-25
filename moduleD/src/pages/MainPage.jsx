import LoginButton from '../components/LoginButton';
import EventParrent from '../components/EventParrent';
import Event from '../components/Event';
import { useEffect, useState } from 'react';
const MainPage = () => {

    let [events, setEvents] = useState();
    useEffect(
        function(){
         async function getData(){
                let res = await fetch('http://127.0.0.1:8000/api/v1/events');
                let data = await res.json();
                setEvents(data);
                
            }
            getData();
        },[]);
        console.log(events);
    return (
        <div className='container-fluid'>
            <div className="d-flex mt-3 border-bottom border-2 ">
                <h1 className="me-auto">Nền tảng đặt sự kiện</h1>
                <LoginButton className=""/>
            </div>
            <EventParrent className="">
                
                {events.map((event) =>{
                    return (<Event key={event.id} id={event.id} title={event.name} time={event.date} slug={event.slug}/>);
                })}
            </EventParrent>
        </div>
    );
}

export default MainPage;
