$( document ).ready(function() {
    setMarginSlider()
	// вешаю событие на кнопку формы
	$('#send-btn').on('click', sendForm);

	$( ".bottom-down" ).on( "click", hideTopBtn);

//	$('.my-photo-box img').mouseOver(changeBgImg);
	$('.button-up').on('click', hideUpBut);

	//Удаляем или добавляем текстовые  поля
	$('.contact-send-box .add').on('click', addContaktInput);
	$('.contact-send-box .dell').on('click', dellContaktInput);

	$( "#header li a"  ).click(function(event) {
		event.preventDefault();
		var data = $( this ).attr('data-name');
		var value = $("#"+data).position()['top'];
	 	animatedUpOrDown(value);
	});

	$( window ).scroll(function(){
		bottomUpDown();
	});

	$( window ).resize(function(){
		bottomUpDown();
	});

	new Slider({
		sliderId: 'slider1',
		slidesToShow: 3,
		infinite: 1
	});
});

	//мой слайдер клиентов для вывода клиентов
	function Slider(settings) {
		var slider = $('#' & settings.sliderId);
		var sliderContent = $('.slider-content').eq(0);
		var sliderItems = $('.slider-item');
		var sliderWidth = sliderContent.width();
		var singleSlideWidth = 0;
		var sliderButtons = $('.slider-button');
		var self = this;

		var showSlides = function(a){
			for(var i = 0; i < sliderItems.length; i++){
				if(sliderItems.eq(i).css('left') !== "auto"){
					var current = parseFloat(sliderItems.eq(i).css("left"));
					sliderItems.eq(i).css("left", (current + (singleSlideWidth * a)) + 'px');
				}else{
					sliderItems.eq(i).css("width", singleSlideWidth + 'px');
					sliderItems.eq(i).css("left", (singleSlideWidth * i) + 'px');
				}
			}

		}

		this.move_left = function(){	
			showSlides(1);
		}
		this.move_right = function(){
			showSlides(-1);
		}

		//ПРОВЕРКА НА ПОСЛЕДНИЙ ЭЛЕМЕНТ КОЛЕКЦИИ
		//если элемент последний то кнопка блокируется и добавляеться оформление
		function inspectLast(){
			for(var i = 0; i < sliderButtons.length; i++){
				sliderButtons.eq(i).attr('disabled', false);
				sliderButtons.eq(i).removeClass("no-activ-left").removeClass("no-activ-right");
			}
			if($(event.target).attr('data-action') == "left"){
				if(parseFloat(sliderItems.eq(0).css('left')) >= 0 - singleSlideWidth){
					$(event.target).attr('disabled', true);
					$(event.target).addClass("no-activ-left");
				}
			}else{
				if(parseFloat(sliderItems.eq(sliderItems.length - 1).css('left')) < sliderWidth){
					$(event.target).attr('disabled', true);
					$(event.target).addClass("no-activ-right");
				}
			}
		}
		
		//Функция запускает прокрутку в слайдере
		function reiteration() {
			for(var i = 0; i < sliderItems.length; i++){
				if(parseFloat(sliderItems.eq(i).css('left')).toFixed(1) == (singleSlideWidth * (sliderItems.length)).toFixed(1)){
					sliderItems.eq(i).css('left', 0 + "px");
				};
				if(parseFloat(sliderItems.eq(i).css('left')).toFixed(1) == (singleSlideWidth * (settings.slidesToShow-sliderItems.length)).toFixed(1)){
					sliderItems.eq(i).css('left', (singleSlideWidth * (settings.slidesToShow)) + "px");
				};
			}
		}

		var init = function (){
			if(!settings.slidesToShow || isNaN(+settings.slidesToShow)){
				settings.slidesToShow = 1;
			}
			//задает 1 слайд при малом расширении экрана
			if($(window).width() <= '767'){
				settings.slidesToShow = 1;
			}

			singleSlideWidth = sliderWidth/settings.slidesToShow;

			showSlides(1);

			if(settings.infinite == 0){
				$(".slider-button-prev").attr('disabled', true);
				$(".slider-button-prev").addClass("no-activ-left");
			}

			for(var i = 0; i < sliderButtons.length; i++){
				sliderButtons.eq(i).on('click', function(){
					self['move_' + $(this).attr('data-action')]();
					if(settings.infinite == 0){
						inspectLast();
					}else{
						reiteration();
					}
				});
			}
		}
		init();
	}


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
//Функция выводит ошибки формы обратной связи
function checkSend(data){
	console.log(data);
	$(".warning-box").empty()
	$(".warning-box").append("<p class='warning'>Ошибка!</p> <p class='warning'>Все поля отмечены звездочкой должны быть заполнены</p> <p class='warning'>Проверьте правельность ввода номера</p> <p class='warning'>Проверьте правельность ввода электронной почты</p>");
}

//для кнопки опускает прокрутку ниже с главной
function hideTopBtn(){
	var hSkroll = $("#header").height()*2;
	animatedUpOrDown(hSkroll);
	$( ".bottom-down").css('display','none');
};

//показывает либо скрывает кнопки переходов "в верх", "в низ"
function bottomUpDown(){
	if($(window).scrollTop() == 0){
		$(".bottom-down").css('display','block');
	}else if($(window).scrollTop() >= $("#header").height()*2){
		$(".button-up").css('display','block');
		$(".bottom-down").css('display','none');
	}else{
		$(".button-up").css('display','none');
	};
};

//---------------обеденить
//анимация для перемещения по сайту с помощью кнопок
function animatedUpOrDown(scrollPosition) {
	$("html, body").animate({ scrollTop: scrollPosition }, 500);
}



function hideUpBut(){
	$(".button-up").css('display','none');
	animatedUpOrDown(0);
}

//подключаю вкладки для админки
$('#myTab a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
})


//------------------------------------admin functions  (start)---------------//
function addContaktInput() {
	switch($(this).attr("id")){
	case 'add-phone':
		$elem=$(this);
		addInput($elem);
	break;
	case 'add-viber':
		$elem=$(this);
		addInput($elem);
	break;
	case 'add-viber':
		$elem=$(this);
		addInput($elem);
	break;
	case 'add-skype':
		$elem=$(this);
		addInput($elem);
	break;
	case 'add-e-mail':
		$elem=$(this);
		addInput($elem);
	break;
	}
}
	function addInput(a) {
		$className =a.parent().find('input').eq('0').attr('name');
		$placehol =a.parent().find('input').eq('0').attr('placeholder');
		$appendName = $className+$("."+$className).length;
		a.parent().append("<br><input type='text' name='"+$appendName+"' class='"+$className+"' placeholder='"+$placehol+"'>");
	}

function dellContaktInput() {
	switch($(this).attr("id")){
	case 'del-phone':
		$elem=$(this);
		dellInput($elem);
		break;
	case 'del-viber':
		$elem=$(this);
		dellInput($elem);
		break;
	case 'del-viber':
		$elem=$(this);
		dellInput($elem);
		break;
	case 'del-skype':
		$elem=$(this);
		dellInput($elem);
		break;
	case 'del-e-mail':
		$elem=$(this);
		dellInput($elem);
		break;
	}
}
	function dellInput(a) {
		$colectionLenght =a.parent().find('input').length;
		if($colectionLenght>1){
			$delElem=$colectionLenght-1;
			console.log($colectionLenght);
			console.log(a.parent().eq($delElem));
			a.parent().find('input').eq($delElem).remove();
			a.parent().find('br').remove();
		}
	}