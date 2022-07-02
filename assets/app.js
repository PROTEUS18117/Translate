import './styles/app.css';

// start the Stimulus application
import './bootstrap';

const $ = require('jquery');
require('bootstrap');


document.querySelector("#button_create").onclick = function () {
    const eng = document.querySelector('[name="eng"]').value,
        rus = document.querySelector('[name="rus"]').value;
    fetch("/create", {
        method: 'POST',
        body: JSON.stringify({
            eng: eng,
            rus: rus
        }),
        headers: {
            'Accept': 'application/json; charset=UTF-8',
            'Content-type': 'application/json; charset=UTF-8'
        },

    })


        .then((response) => {
            console.log(response)
            if (response.ok) {
                alert("Сохранено")
                document.getElementById("eng").value = "";
                document.getElementById("rus").value = "";
                console.log("SASAT")
            } else {
                alert("Смерть")
                document.getElementById("eng").value = "";
                document.getElementById("rus").value = "";
                console.log("NO_SASAT")
            }
        })
}
