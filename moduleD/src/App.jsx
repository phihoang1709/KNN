import { BrowserRouter, Route, Routes } from 'react-router-dom';
import MainPage from './pages/MainPage';
import LoginForm from './pages/LoginForm';
import EventPage from './pages/EventPage';
import TicketPage from './pages/TicketPage';

function App() {

  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path='/' element={<MainPage/>}/>
          <Route path='/login' element={<LoginForm/>}/>
          <Route path='/events/:slug' element={<EventPage/>}/>
          <Route path='/tickets/:id' element={<TicketPage/>}/>
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
