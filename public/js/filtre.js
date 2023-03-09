// document.
const traject = (id) => {
    $.ajax({
        type: "POST",
        url: `http://localhost/ShipCruiseTourMVC/cruiseController/getTraject/${id}`,
        data: {
            'action': 'detail',
            'value': id
        }
        ,
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (data) {
            result = data.places;
            const div = document.getElementById('trajet');
            result.forEach((item) => {
                div.appendChild(`<div value="${item.id}">${item.name}</div>`);
            })
        }
    })
}
