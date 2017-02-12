$( document ).ready(function() {
	servisWidth();
	$( window ).resize(function(){
		servisWidth();
	});	
	$(".servis-item").hover(servisSize, servisWidth);
	
		
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
		$messege = 'Вы действительно просмотрели сообщение клиента и хотите сохранить его в базе данных? Обращаю внимание, что после сохранения данные клиента будут доступны только напрямую с базы данных.';
		checkingClientMess(1, $(this) , $messege, '#messeges-show-modal', '#messeges-show-informer');
	});
	$('#messages .but-del').on('click', function(){
		$messege = 'Вы действительно хотите безвозвратно удалить данные полученные от клиента?';
		checkingClientMess(0, $(this) , $messege, '#messeges-show-modal', '#messeges-show-informer');
	});
//изменение ролей пользователей	
	$('#settings .save').on('click', function(){
		$messege = 'Вы действительно хотите предоставить пользователю доступ в админпанель? (Уведомить пользователя)';
		checkingClientMess(1, $(this), $messege, '#settings-show-modal', '#settings-show-informer');
	});
	$('#settings .del').on('click', function(){
		$messege = 'Вы пытаетесь безвозвратно удалить пользователя из БД. Вы действительно хотите этого?'
		checkingClientMess(0, $(this), $messege, '#settings-show-modal', '#settings-show-informer');
	});
//изменить сервис
	$('#settings .servis-save').on('click', function(){
		$messege = 'Приступить к редактированию?';
		checkingClientMess(1, $(this) , $messege, '#settings-show-modal', '#settings-show-informer');
	});
	$('#settings .servis-del').on('click', function(){
		$messege = 'Вы действительно хотите безвозвратно удалить этот сервис из перечня?';
		checkingClientMess(0, $(this) , $messege, '#settings-show-modal', '#settings-show-informer');
	});
//удалить работу
	$('#main-content .trash').on('click', function(){
		$messege = 'Вы действительно хотите безвозвратно удалить пример работы?';
		checkingClientMess(0, $(this) , $messege, '#main-content-show-modal', '#main-content-show-informer');
	});
//удалить логотип клиента
	$('#slider-content .del').on('click', function(){
		$messege = 'Вы действительно хотите безвозвратно удалить логотип клиента из БД?'
		checkingClientMess(0, $(this), $messege, '#slider-show-modal', '#slider-show-informer');
	});
//удалить логотип клиента
	$('#slider-content .review-del').on('click', function(){
		$messege = 'Вы действительно хотите безвозвратно удалить отзыв клиента из БД?'
		checkingClientMess(0, $(this), $messege, '#slider-show-modal', '#slider-show-informer');
	});
	$('#slider-content .rewiev-update').on('click', function(){
		$messege = 'Вы действительно хотите изменить отзыв клиента?'
		checkingClientMess(1, $(this), $messege, '#slider-show-modal', '#slider-show-informer');
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

	$( "body" ).on('click', hideMess);
	$( window ).scroll(hideMess);
	$( window ).resize(hideMess);
	function hideMess(){
		$('#massege-box').empty();
	};
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

function servisWidth(){
		$elList = $('.servis-item');
		$length = $elList.length;
		$width = parseInt($('.servis-item-wrap').width());
	if(parseInt($(window).width())>=768){
		$elList.attr('style', '');
		$elList.find('.item-text').attr('style', '');
		$elList.css({
			width : (100-$length)/$length+"%",
			'padding': '0 1%'
		});
		$elList.eq(0).css({
			'margin-left': '0'
		});
	}else{
		$elList.attr('style', '');
	}
}
function servisSize(){
	if(parseInt($(window).width())>=768){
		$(this).css({
						padding : 0,
						background : '#c7c7c7',
						overflow : 'hidden',
						"transition": "all ease 0.8s"
					});
		$(this).find('.item-text').css({
											height: '100%',
											padding: '0 4%',
											"transition": "all ease 0.8s"
										})
	}
}

//------------------------------------validator  (start)----------------------//
//$('input').bind('focus blur', function(e) {
//		var borderVal = e.type == "focus" ? "medium solid green" : "";
//        $(this).css("border", borderVal);
//	});
$('form').find('input, textarea, select').blur(function(event) {
	$this = $(this).closest('form');
	validator($this);
});

$('form').find('input, textarea, select').focus(function( event ) {
	$this = $(this).removeClass('error');
});

$('form').submit(function( event ) {
	$this = $(this);
	if($this.attr('id')=='form_qestions'){
		validator($this);
	}
});
$rules = {
	required: function($el){
		if($el.value != ''){
			return true;
		}
		return false;
	},
	email: function($el){
		$reg = /^\w+(\.?\w+|)@\w+\.{1}\w{1,10}$/;
		return $reg.test($el.value);
	},
	phone: function($el){
		$reg = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;//-----------------------------------------------------------------------------
		return $reg.test($el.value);
	},
	max: function($el){
		if($el.value.length < '300'){
			return true;
		}
		return false;
	},

}
$rulesDescripts = {
	required: 'Поле должно быть заполнено!',
	email: 'Введите коректные данные!',
	phone: 'Введите коректные данные!',
	max: 'Количество символов больше 300!'
}
function showErrors($arr){
	$('.warning').empty();
	for (var $i = 0; $i < $arr.length; $i++) {
		if($( "input[name~='"+$arr[$i]['name']+"']").attr('name')){
			$el=$( "input[name~='"+$arr[$i]['name']+"']");
		}else if($("textarea[name~='"+$arr[$i]['name']+"']").attr('name')){
			$el=$("textarea[name~='"+$arr[$i]['name']+"']");
			console.log($el);
		}else if($("select[name~='"+$arr[$i]['name']+"']").attr('name')){
			$el=$("select[name~='"+$arr[$i]['name']+"']");
		}
		$rulMess = $rulesDescripts[$arr[$i]['error']];
		$el.parent().find('.warning').append("<div>"+$rulMess+"</div>");
		if($('.warning').html()){
			$el.addClass("error");
		}
	}
}
function validator($this){
	$errors = [];
	$inputs = $this.find('input, textarea, select');
	for($i = 0; $i < $inputs.length; $i++){
		$rulesList = $inputs[$i].dataset.rule;
		$rulesList = $rulesList.split(' ');
		for ($j = 0; $j < $rulesList.length; $j++) {
			if($rulesList[$j] in $rules){
				if(!$rules[$rulesList[$j]]($inputs[$i])){
					$errors.push({
						name: $inputs[$i].name,
						error: $rulesList[$j]
					});
				}
			}
		}
	}
	if($errors.length > 0){
		event.preventDefault();
		showErrors($errors);
	}
}

//------------------------------------validator  (end)------------------------//

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
				$('#page-navigator > div').eq($('#page-navigator > div').length-1).addClass('active');
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
			'width': '70vw',
			'top': '3vh',
			'left': '15vw'
		})
		};
	$('.magnifier').on('click', showModal );
	
	function delWorkItem(){
		
	}

	$('.cross').on('click', delWorkItem );



//------------------------------------admin functions  (end)---------------//
//------------------------------------AJAX  (start)---------------//
//функция для обработки сообщений от клиентов
		function checkingClientMess(setting, thisItem, mess, idModal, idInformer){
			gatherPattern(mess, idModal);
			//if(setting){
				$('.messeges-but-ok').on('click', function(){
					pullAjax(setting, thisItem, idModal, idInformer);
					$(idModal).css("display","none").html( " " );
				});
				$('.messeges-but-cancel').on('click', function(){
					$(idModal).css("display","none").html( " " );
				});
				$('.messeges-exit').on('click', function(){
					$(idModal).css("display","none").html( " " );
				});
			//}else{
			/*	$('.messeges-but-ok').on('click', function(){
					pullAjax(setting, thisItem, idModal, idInformer);
					$(idModal).css("display","none").html( " " );
				});
				$('.messeges-but-cancel').on('click', function(){
					$(idModal).css("display","none").html( " " );
				});
				$('.messeges-exit').on('click', function(){
					$(idModal).css("display","none").html( " " );
					return true;
				});*/
			//}
		};
		function pullAjax(setting, thisItem, idModal, idInformer){
			var menuId = thisItem.attr("data-check_mess");
			if(idModal == "#messeges-show-modal"){
				thisItem.parent().remove();
					deletMessege(thisItem);
					changeCouneter();
				var request = $.ajax({
				  url: "../functionAJAX.php",
				  type: "POST",
				  data: {id : menuId,
				  		set : setting,
				  		idModal: idModal
				  		},
				  success: ifSuccess
				});
			}else if(idModal == "#settings-show-modal"){
				thisItem.parent().parent().parent().parent().remove();
				if(thisItem.attr('class').split(' ')[0] =='servis-save'){
					addDialog(thisItem);
				}else if(thisItem.attr('class')=='servis-del'){
					var request = $.ajax({
						url: "../functionAJAX.php",
						type: "POST",
						data: {
							id : menuId,
							set : setting,
							idModal: idModal,
							param : thisItem.attr('class'),
						},
						success: ifSuccessSettongs
					});
				}else{
					var request = $.ajax({
						url: "../functionAJAX.php",
						type: "POST",
						data: {
							id : menuId,
							set : setting,
							idModal: idModal,
							param : thisItem.parent().parent().find('select').val(),
						},
						success: ifSuccessSettongs
					});
				}
			}else if(idModal == "#main-content-show-modal"){/*--------------------изменения то что было перенес в конец файла---------------------------*/
				thisItem.parent().remove();
				var request = $.ajax({
					url: "../functionAJAX.php",
					type: "POST",
					data: {							
						id : menuId,
						idModal: idModal,
				},
					success: ifSuccessSettongSlider
				});
			}else if(idModal == "#slider-show-modal"){
				if(thisItem.attr('class').split(' ')[0]=='del'){
					console.log('bggfgfgf');
					thisItem.closest('.review-box').remove();
					var request = $.ajax({
						url: "../functionAJAX.php",
						type: "POST",
						data: {							
							id : menuId,
							idModal: idModal,
							thisItem: thisItem.attr('class')
					},
						success: ifSuccess
					});
				}else{
					if(setting){
						addDialogReview(thisItem);
					}else{
						console.log('bggfgfgf');
						thisItem.closest('.review-box').remove();
						var request = $.ajax({
							url: "../functionAJAX.php",
							type: "POST",
							data: {							
								id : menuId,
								idModal: idModal,
								thisItem: thisItem.attr('class')
						},
							success: ifSuccess
						});
					}
				}
			}
		 
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
			function ifSuccessSettongs(data){
				$("#settings-show-informer").css({"height": '90px', "transition": "all ease 2.15s"}).html('<p>'+data+'</p>');

				setTimeout(function(){
					$("#settings-show-informer").css({
						"height": '0px',
						"transition": "all .3s ease 2.15s"
					});
					
				}, 3000);
			}
			function ifSuccessSettongSlider(data){
				$("#main-content-show-informer").css({"height": '90px', "transition": "all ease 2.15s"}).html('<p>'+data+'</p>');

				setTimeout(function(){
					$("#main-content-show-informer").css({
						"height": '0px',
						"transition": "all .3s ease 2.15s"
					});
					
				}, 3000);
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

		function gatherPattern(data, idModal){
			$string = "";
			$string += '<div class="messeges-show-wrap"><div class="messeges-show-titl"><p>Предупреждение</p></div><div class="messeges-show-content"><p>'+data;
			$string += '</p></div><div class="messeges-show-boxes"><div class="messeges-but-ok">Да, все верно.</div>';
			$string += '<div class="messeges-but-cancel">Нет! Вернуться</div></div><div class="messeges-exit"></div></div>';
			$(idModal).css("display","block").html( $string );
		}

		function addDialog($this){
			$idItem= $this.attr('data-check_mess');
			$el=$this.parent().parent().parent().parent();
			$glyphicon= $el.find('.glyphicon').attr('class').split(" ");
			$title = $el.find('.admin-article-title').html();
			$textarea = $el.find('.admin-article-text').html();
	$sourse ='<div id="form-add-wrap">\n';
  		$sourse +='<form class="admin-add-wrap" method="POST" enctype="multipart/form-data">\n';
  			$sourse +='<div class="row">\n';
                $sourse +='<div class="col-xs-6 col-xs-offset-3">\n';
	                $sourse +='<div class="form-group">\n';
	                	$sourse +='<h4>Вы можете изменить информацию о существующей услуге:</h4>\n';
	                	$sourse +='<input type="hidden" name="id-item" value="'+$idItem+'">\n';
						$sourse +='<label for="set_glificon">Изменить картинку (glyphicon - Bootstrap):</label>\n';
						$sourse +='<input type="text" id="set_glificon-update" class="form-control" name="set_glificon-update" placeholder="glyphicon-envelope" value="'+$glyphicon[1]+'">\n';
		                $sourse +='<label for="set_photo_smoll">Изменить название:</label>\n';
		                $sourse +='<input type="text" id="set_servis_item-update" class="form-control" name="set_servis_item-update" placeholder="предоставляемая услуга" value="'+$title+'">\n';
		                $sourse +='<label for="set_photo_smoll">Изменить описание</label>\n';
		                $sourse +='<textarea id="set_servis_text-update" class="form-control" name="set_servis_text-update" rows="10" style="width: 100%" value="">'+$textarea+'</textarea>\n';
					$sourse +='</div>\n';
					$sourse +='<button id="send-settings" formmethod="post" name="send-settings" value="send-settings" class="btn btn-success">Сохранить изменения</button>\n';
  					$sourse +='<div class="messeges-exit"></div>\n';
                $sourse +='</div>\n';
            $sourse +='</div>\n';
  		$sourse +='</form>\n';
  	$sourse +='</div>\n';
			$('#settings').append( $sourse ).find('#form-add-wrap').css("display","block");
			$('.messeges-exit').on('click', function(){
				$('#form-add-wrap').remove();
			});
		};
		function addDialogReview($this){
			$idItem= $this.attr('data-check_mess');
			$el=$this.parent().parent();
			$fio= $el.find('.review-fio').html();
			$position = $el.find('.review-position').html();
			$company = $el.find('.review-company').html();
			$text = $el.find('.review-text').html();
	$sourse ='<div id="form-update-review-wrap">\n';
  		$sourse +='<form class="form-update-review" method="POST" enctype="multipart/form-data">\n';
  			$sourse +='<div class="row">\n';
                $sourse +='<div class="col-xs-6 col-xs-offset-3">\n';
	                $sourse +='<div class="form-group">\n';
	                	$sourse +='<h4>Вы можете изменить отзыв:</h4>\n';
	                	$sourse +='<input type="hidden" name="id-item" value="'+$idItem+'">\n';
						$sourse +='<label for="set_fio">Изменить имя:</label>\n';
						$sourse +='<input type="text" id="set_fio" class="form-control" name="set_fio" placeholder="Jon Dou" value="'+$fio+'">\n';
		                $sourse +='<label for="set_position">Изменить должность:</label>\n';
		                $sourse +='<input type="text" id="set_position" class="form-control" name="set_position" placeholder="Директор" value="'+$position+'">\n';
		                $sourse +='<label for="set_company">Изменить название:</label>\n';
		                $sourse +='<input type="text" id="set_company" class="form-control" name="set_company" placeholder="Компания" value="'+$company+'">\n';
		                $sourse +='<label for="review-text">Изменить тозыв</label>\n';
		                $sourse +='<textarea id="review-text" class="form-control" name="review-text" rows="10" style="width: 100%" value="">'+$text+'</textarea>\n';
					$sourse +='</div>\n';
					$sourse +='<button id="send-review" formmethod="post" name="send-review" value="send-review" class="btn btn-success">Сохранить изменения</button>\n';
  					$sourse +='<div class="messeges-exit"></div>\n';
                $sourse +='</div>\n';
            $sourse +='</div>\n';
  		$sourse +='</form>\n';
  	$sourse +='</div>\n';
			$('#slider-content').append( $sourse ).find('#form-update-review-wrap').css("display","block");
			$('.messeges-exit').on('click', function(){
				$('#form-update-review-wrap').remove();
			});
		};
					

//------------------------------------AJAX  (end)---------------//
	