function Slider(settings) {
	var slider = $('#' & settings.sliderId);
	var sliderContent = $('.slider-content').eq(0);
	var sliderItems = $('.slider-item');
	var sliderWidth = sliderContent.width();
	var singleSlideWidth = sliderWidth/settings.slidersToShow;

	for(var i = 0; i < sliderItems.length; i++){
		sliderItems[i].style.width= singleSlideWidth + 'px';
		sliderItems[i].style.left =(singleSlideWidth*i)+ 'px';
	}
}