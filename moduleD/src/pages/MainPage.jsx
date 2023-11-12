import LoginButton from '../components/LoginButton';
import EventParrent from '../components/EventParrent';
import Event from '../components/Event';
const MainPage = () => {
    let date = new Date();
    return (
        <div className='container-fluid'>
            <div className="d-flex mt-3 border-bottom border-2 ">
                <h1 className="me-auto">Events</h1>
                <LoginButton className=""/>
            </div>
            <EventParrent className="">
                <Event id="1" title="Event 1" time={date.toUTCString()}/>
                <Event id="2" title="Event 2" time={date.toUTCString()}/>
            </EventParrent>
        </div>
    );
}

export default MainPage;
