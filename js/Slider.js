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
		showSlides(-1);
	}
	this.move_right = function(){
		showSlides(1);
	}


//ПРОВЕРКА НА ПОСЛЕДНИЙ ЭЛЕМЕНТ КОЛЕКЦИИ
//если после элемент последний то кнопка блокируется и добавляеться оформление
	function inspectLast(){
		for(var i = 0; i < sliderButtons.length; i++){
			sliderButtons.eq(i).attr('disabled', false);
		}
		if($(event.target).attr('data-action') == "left"){
			if(parseFloat(sliderItems.eq(sliderItems.length - 1).css('left')) < sliderWidth){
				$(event.target).attr('disabled', true);
			}
		}else{
			if(parseFloat(sliderItems.eq(0).css('left')) >= 0 - singleSlideWidth){
				$(event.target).attr('disabled', true);
			}
		}
	}

//Функция запускает прокрутку в слайдере
	function reiteration() {
		for(var i = 0; i < sliderItems.length; i++){
			if(parseFloat(sliderItems.eq(i).css('left')).toFixed(1) == (singleSlideWidth * (sliderItems.length)).toFixed(1)){
				console.log(22);
				sliderItems.eq(i).css('left', 0 + "px");
			};
			if(parseFloat(sliderItems.eq(i).css('left')).toFixed(1) == (singleSlideWidth * (settings.slidesToShow-sliderItems.length)).toFixed(1)){
				console.log(21);

				sliderItems.eq(i).css('left', (singleSlideWidth * (settings.slidesToShow)) + "px");
			};

		}
	}

	var init = function (){
		if(!settings.slidesToShow || isNaN(+settings.slidesToShow)){
			settings.slidesToShow = 1;
		}
		singleSlideWidth = sliderWidth/settings.slidesToShow;

		showSlides(1);

	//	if(settings.infinite == 0){
	//		$(".slider-button-next").attr('disabled', true);
	//	}
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