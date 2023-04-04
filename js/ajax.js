//Всплывающие подсказки


function sendForm() {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', document.forms.form.action);
    xhr.responseType = 'json';
    xhr.onload = () => {
        if (xhr.status !== 200) {
            return;
        }
        const response = xhr.response;
        console.log(response);
        if(response.flag == "error") {
            document.querySelector('#result').innerHTML =
                `<div class="alert alert-${response.type}" role="alert">
                    ${response.message} <b>${response.field ? response.field : ""}</b>
                </div>`;
        }
        if(response.flag == "output") {
            document.querySelector('#result').innerHTML = getStr(response);
        }
    }
    xhr.send(new FormData(document.forms.form));
}

document.forms.form.addEventListener('submit', (e) => {
    e.preventDefault();
    sendForm();
});


function getStr(response) {
var str = "";
    response.goods.forEach(function(good){
        str += `<hr className="my-4">
                <ul><li>Наименование: <b>${good.name}\t&nbsp;</b>
                </li><li>Остаток на складе: <b>${good.stock}\t&nbsp;</b>
                </li><li>Текущая цена: <b>${good.price}\t&nbsp;</b>
               </ul>`;
    });
    return str + '<hr className="my-4">';
}

