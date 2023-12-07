
const EventDetail = (props) => {
    return (
        <tr className="row" style={{ height: '85px' }} >
            <td className="col" style={{ width: "10%" }}>

            </td>
            <td className="col" style={{ width: "10%" }}>

            </td>
            <tr style={{ width: "80%" }} className="">
                <tr>
                    <td className="border border-2 position-absolute border-success">
                        Event 1
                    </td>
                    <td style={{ marginLeft: '20%' }} className="border border-2 position-absolute border-success">
                        Event 112
                    </td>
                </tr>
                <tr className="position-absolute flex-wrap" style={{ width: "100%", marginTop: '40px' }}>
                    <td className="border border-2 position-absolute border-success">
                        Event333
                    </td>
                    <td style={{ marginLeft: '20%' }} className="border border-2 position-absolute border-success">
                        Event112
                    </td>
                </tr>
            </tr>
        </tr>
    );
}

export default EventDetail;
