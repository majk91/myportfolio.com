<div class="slider" id="slider1">
	<div class="slider-content">
		<div class="slider-item">
			<img src="image/img/11111.jpg" alt="big boss">
		</div>
		<div class="slider-item">
			<img src="image/img/2222.jpg" alt="big boss">
		</div>
		<div class="slider-item">
			<img src="image/img/3333.jpg" alt="big boss">
		</div>
		<div class="slider-item">
			<img src="image/img/11111.jpg" alt="big boss">
		</div>
		<div class="slider-item">
			<img src="image/favicon1.png" alt="big boss">
		</div>
	</div>
	<button class="slider-button slider-button-prev" data-action="left"></button>
	<button class="slider-button slider-button-next" data-action="right"></button>
</div>
<!--    slidesToShow: 3, - сколько картинок выводить
	    infinite: 1 - цыкличный слайдер
	    		  0 - не цыкличный слайдер -->
<script type="text/javascript">
	var s1 = new Slider({
		sliderId: 'slider1',
		slidesToShow: 3,
		infinite: 0
	});
</script>