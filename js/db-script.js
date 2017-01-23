$(document).ready(function(){
    $("#send-my-main").on('click', start());
});

function start(){
    // запрос на сервер
    $.post(
        "php/save-db.php",
        ifSuccess
    );
}
function ifSuccess(data){
    console.log(data);
}
