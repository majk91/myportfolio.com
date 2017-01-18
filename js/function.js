$( document ).ready(function() {
    setMarginSlider()
	// вешаю событие на кнопку формы
	$('#send-btn').on('click', sendForm);
	$( ".bottom-down" ).on( "click", lowBottom);
	$('.my-photo-box img').mouseOver(changeBgImg);
});

$( window ).scroll(function(){
	bottomShow();
});

$( window ).resize(function(){
	bottomShow();

	
});

	new Slider({
		sliderId: 'slider1',
		slidesToShow: 3,
		infinite: 1
	});

	//мой слайдер клиентов
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
function checkSend(data){
	console.log(data);
	$(".warning-box").empty()
	$(".warning-box").append("<p class='warning'>Ошибка!</p> <p class='warning'>Все поля отмечены звездочкой должны быть заполнены</p> <p class='warning'>Проверьте правельность ввода номера</p> <p class='warning'>Проверьте правельность ввода электронной почты</p>");
}

function lowBottom(){
	var hSkroll = $("#header").height();
	$( ".bottom-down").css('display','none');
	$('body, html').scrollTop(hSkroll);
};

function bottomShow(){
	if($(window).scrollTop() == 0){
		$(".bottom-down").css('display','block');
	}
};
function changeBgImg(){

}