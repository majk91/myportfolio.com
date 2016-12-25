$( document ).ready(function() {
    setMarginSlider()
	// вешаю событие на кнопку формы
	$('#send-btn').on('click', sendForm);
});


//настройка margin у слайдера
function setMarginSlider(){
	var parent = $('.myWork-item');
	if(parent.eq(0).find(".myWork-item-wrap").width()<=$('.carousel-inner').width()/4){

		console.log(parent.eq(0).find(".myWork-item-wrap"));
		for (var i = 0; i <=parent.length ; i++) {
			parent.eq(i);
			for(var j = 8; i<=parent.eq(0).find(".myWork-item-wrap").length; i++){
				parent.eq(0).find(".myWork-item-wrap").eq(j).css("margin-bottom", 0);
			}	
			
		}
	}
}

//отправка формы на сервер
//сервер получает все поля формы
function sendForm(){
	//отключаем событие браузера
	event.preventDefault();
	$.post(
		"../php/form-check.php",
		$('#form').serialize(),
		checkSend
	);
}	
function checkSend(data){
	console.log(data);
	$(".warning-box").empty()
	$(".warning-box").append("<p class='warning'>Ошибка!</p> <p class='warning'>Все поля отмечены звездочкой должны быть заполнены</p> <p class='warning'>Проверьте правельность ввода номера</p> <p class='warning'>Проверьте правельность ввода электронной почты</p>");
}

