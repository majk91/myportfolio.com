		<section id="contact" class="two">
			<a name="contact"></a>
			<div class="container">
                <div class="row">
                    <div class="col-xs-8 col-md-8 col-xs-offset-2 col-md-offset-2">
                        <div class="all-title-wrap">
                            <h2 class="servis-title">Со мной можно <strong>связаться</strong></h2>
                            <div class="first-line"></div>
                            <div class="second-line"></div>
                            <p class="hidden-xs"><?php echo selectItem("articles", "contact") ?></p>
                        </div>
                    </div><!--.col-md-8 .col-md-offset-2-->
                    <div class="col-xs-10 col-md-8 col-xs-offset-1 col-md-offset-2">
                        <div class="form-wrap">
                        	<form id="form_qestions" class="input-box" method="POST" >
                        		<div class="row">
                        			<input type='hidden' name='sessid' value='<?=$_SESSION['sessid']?>'>
	                        		<div class="col-xs-12 col-md-6">
	                        			<label for="inputName" class="control-label">ФИО: <sup>*</sup></label>
										<input type="text" class="form-item" name="name" placeholder="Иванов Иван" id="inputName" data-rule ="required">
										<div class="worning-wraper">
											<div class="warning"></div>
										</div>
	                        		</div>
	                        		<div class="col-xs-12 col-md-6">
	                        			<label for="inputName" class="control-label">Телефон: <sup>*</sup></label>
										<input type="tel" name="tel" placeholder="+380123456789" data-rule ="required phone">
										<div class="worning-wraper">
											<div class="warning"></div>
										</div>
	                        		</div>
	                        		<div class="col-xs-12 col-md-6">
	                        			<label for="inputName" class="control-label">E-mail: <sup>*</sup></label>
										<input type="text" class="form-item" name="email" placeholder="abcd@example.com" data-rule ="required email">
										<div class="worning-wraper">
											<div class="warning"></div>
										</div>
	                        		</div>
	                        		<div class="col-xs-12 col-md-6">
	              		          		<div class="warning-box">
	              		          			<?php getClient() ?>
	              		          		</div><!--.warning-box-->
	                        		</div><!--.col-md-6-->
	                        		<div class="col-xs-12 col-md-12">
		                        		<label for="inputName" class="control-label">Дополнительная информация (не больше 300 символов):</label>
										<textarea name="massege" class="form-item" rows="5" data-rule ="max"></textarea>
										<div class="worning-wraper">
											<div class="warning"></div>
										</div>
	                        		</div>
                        		</div><!--.row-->
								<button id="send-btn" formmethod="post" name="send-btn" value="send-btn" >Отправить</button>
							</form><!--.input-box-->
                        </div><!--.form-wrap-->
                    </div>
                </div><!--.row-->
            </div><!--.container-->

            
        </section>