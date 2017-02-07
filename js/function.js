$( document ).ready(function() {
    setMarginSlider()
	// вешаю событие на кнопку формы
	$('#send-btn').on('click', sendForm );

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

//Функции обработки сообщений от клиентов AJAX - методом		
	$('#messages .but-show').on('click', function(){
		checkingClientMess(1, $(this));
	});
	$('#messages .but-del').on('click', function(){
		checkingClientMess(0, $(this));
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
	function sendForm(){
	//	event.preventDefault();
		return true;
	}
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
	if($(this).parent().find('input').length>=3){
		return;
	};
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
	if($(this).parent().find('input').length>=3){
		$(this).addClass("block");
	};
}
	function addInput(a) {
		$className =a.parent().find('input').eq('0').attr('name');
		$placehol =a.parent().find('input').eq('0').attr('placeholder');
		$appendName = $className+$("."+$className).length;
		a.parent().append("<br><input type='text' name='"+$appendName+"' class='"+$className+" form-control' placeholder='"+$placehol+"'>");
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
	if($(this).parent().find('input').length!=3){
		$(this).parent().find('.add').removeClass('block');
	};
}
	function dellInput(a) {
		$colectionLenght =a.parent().find('input').length;
		$colectionBrLenght =a.parent().find('br').length;
		if($colectionLenght>1){
			$delElemInput=$colectionLenght-1;
			$delElemBr=$colectionBrLenght-1;
			a.parent().find('input').eq($delElemInput).remove();
			a.parent().find('br').eq($delElemBr).remove();
		}
	}

	//Пагинация для отображения работ в админ панели
	function showPaginatePage(){
		$('#pagination li.active').removeClass('active');
		$('#page-navigator>div.active').removeClass('active');
		if($(this).attr('rel')){
			$(this).parent('li').addClass('active');
			$('#' + $(this).attr('rel')).addClass('active');
		}else{
			if($(this).attr('data-target')=='first'){
				$('[rel = page-1]').parent('li').addClass('active');
				$('#' + $('[rel = page-1]').attr('rel')).addClass('active');
			}else{
				$('#pagination').find('li').eq($('#pagination').find('li').length-2).addClass('active');
				$('#page-navigator').find('div').eq($('#page-navigator').find('div').length-1).addClass('active');
			}
			
		}
		return false;
	}
	$('#pagination a').on('click', showPaginatePage );


	function showModal() {
		$index = $(this).attr("data-target");
		 	$("#dialog-"+$index).dialog({
		 	  modal: true,
		 	  buttons: {
		 	  	Ok: function() {
		 	  		$( this ).dialog( "close" );
		 	  	}
		 	  }
		 	});
		$('[role = dialog]').css({
			'height': '94vh',
			'width': '94vw',
			'top': '3vh',
			'left': '3vw'
		})
		};
	$('.magnifier').on('click', showModal );
	
	function delWorkItem(){
		
	}
	$('.cross').on('click', delWorkItem );

//------------------------------------AJAX  (start)---------------//
//функция для обработки сообщений от клиентов
		function checkingClientMess(setting, thisItem){
			if(setting){
				gatherPattern('Вы действительно просмотрели сообщение клиента и хотите сохранить его в базе данных? Обращаю внимание, что после сохранения данные клиента будут доступны только напрямую с базы данных.');
				$('.messeges-but-ok').on('click', function(){
					pullAjax(setting, thisItem);
					$("#messeges-show-modal").css("display","none").html( " " );
				});
				$('.messeges-but-cancel').on('click', function(){
					$("#messeges-show-modal").css("display","none").html( " " );
				});
				$('.messeges-exit').on('click', function(){
					$("#messeges-show-modal").css("display","none").html( " " );
				});
			}else{
				gatherPattern('Вы действительно хотите безвозвратно удалить данные полученные от клиента?');
				$('.messeges-but-ok').on('click', function(){
					pullAjax(setting, thisItem);
					$("#messeges-show-modal").css("display","none").html( " " );
				});
				$('.messeges-but-cancel').on('click', function(){
					$("#messeges-show-modal").css("display","none").html( " " );
				});
				$('.messeges-exit').on('click', function(){
					$("#messeges-show-modal").css("display","none").html( " " );
				});
			}
		};
		function pullAjax(setting, thisItem){
			var menuId = thisItem.first().attr("data-check_mess");
				deletMessege(thisItem);
				changeCouneter();
			var request = $.ajax({
			  url: "../functionAJAX.php",
			  type: "POST",
			  data: {id : menuId,
			  		set : setting,
			  		},
			  success: ifSuccess
			});
			 
			function ifSuccess(data){
				$("#messeges-show-informer").css({"height": '90px', "transition": "all ease 2.15s"}).html('<p>'+data+'</p>');

				setTimeout(function(){
					$("#messeges-show-informer").css({
						"height": '0px',
						"transition": "all .3s ease 2.15s"
					});
					
				}, 3000);
				//$("#messages span").html( data );
			}
			
		}
		function changeCouneter(){
			$count = $(".nav-tabs .active span").html();
			$reg = /\d+/;
			$result = $count.match($reg);
			$("#clientMess span").html('('+($result[0] - 1)+')');
			
		};
		function deletMessege(btn){
			btn.parent().remove();
		};

		function gatherPattern(data){
			$string = "";
			$string += '<div class="messeges-show-wrap"><div class="messeges-show-titl"><p>Предупреждение</p></div><div class="messeges-show-content"><p>'+data;
			$string += '</p></div><div class="messeges-show-boxes"><div class="messeges-but-ok">Да, все верно.</div>';
			$string += '<div class="messeges-but-cancel">Нет! Вернуться</div></div><div class="messeges-exit"></div></div>';
			$("#messeges-show-modal").css("display","block").html( $string );
		}
					
			

//------------------------------------AJAX  (end)---------------//
//------------------------------------admin functions  (end)---------------//
	