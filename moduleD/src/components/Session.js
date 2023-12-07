import React from 'react';

const Session = (props) => {
    const sessions = Array.from(Object.values(props?.sessions));
    return (
        <tr>
        {sessions.map(session =>(
            
                <td className='border border-3 border-success'>{session?.title}</td>
                                 
        ))}
        </tr>
    );
}

export default Session;
