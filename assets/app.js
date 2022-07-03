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

document.querySelector("#csv_create").onclick = function () {
    var fileInput = document.querySelector('[name="csv"]');
    var formdata = new FormData();
    formdata.append("csv", fileInput.files[0], "/C:/Users/Wallrus/Desktop/слова.csv");

    var requestOptions = {
        method: 'POST',
        body: formdata,
        redirect: 'follow'
    };

    fetch("http://trans/word/from-csv", requestOptions)
        .then((response) => {
            console.log(response)
            if (response.ok) {
                alert("Сохранено")
                console.log("SASAT")
            } else {
                alert("Смерть")
                console.log("NO_SASAT")
            }
        })
}

