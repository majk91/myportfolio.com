<?php 

?>

		<section id="myWorks" class="two" data-number="a5">
		    <a name="myWorks"></a>
			<div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="all-title-wrap">
                                <h2 class="servis-title">Примеры последних <strong>работ</strong></h2>
                                <div class="first-line"></div>
                                <div class="second-line"></div>
                                <p class="hidden-xs"><?php echo selectItem("articles", "works_example") ?></p>
                        </div><!--.all-title-wrap-->
                    </div>
                    <div class="col-xs-12 col-md-12">
                    	<!--<div class="row filter-wrap">
                    		<div class="col-xs-12 col-md-1">
                    			<div class="filter-title">ФИЛЬТР:</div>
                    		</div>
                    		<div class="col-xs-12 col-md-11 filter-menu-box">
	                    		<ul class="filter-nav">
	                    			<li class="activ"><p>Все</p></li>
	                    			<li><p>Визитки</p></li>
	                    			<li><p>Сайты</p></li>
	                    			<li><p>Cтраницы посадки</p></li>
	                    			<li><p>Магазины</p></li>
	                    		</ul>
	                    	</div>
                    	</div>-->
                    </div>
				<div class="col-xs-12 col-md-12">

						<div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
							<!-- Indicators desktop-->
							<ol class="carousel-indicators hidden-xs">
								<?php getIndicators(); ?>
							</ol>
							<!-- Wrapper for slides desktop -->
							<div class="carousel-inner ">
							<?php echo showPictures('big_photo', 'domen', 1) ?>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							  <span class="but-work-right">
							  	<img src="image/button-work-left-BG.png" alt="">
							  </span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							  <span class="but-work-left">
							  	<img src="image/button-work-right-BG.png" width="100%" alt="">
							  </span>
							</a>
						</div><!--#carousel-example-generic-->




						<div id="carousel-example-generic-mobile" class="carousel slide visible-xs" data-ride="carousel">
							<div class="carousel-inner">
							<?php  echo showPictures('big_photo', 'domen', 0) ?>

							<a class="left carousel-control" href="#carousel-example-generic-mobile" data-slide="prev">
							  <span class="but-work-right">
							  	<img src="image/button-work-left-BG.png" alt="">
							  </span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic-mobile" data-slide="next">
							  <span class="but-work-left">
							  	<img src="image/button-work-right-BG.png" width="100%" alt="">
							  </span>
							</a>
						</div><!--#carousel-example-generic-mobile-->
                    </div><!--.col-xs-3 col-md-12-->
                </div>
            </div>
		</section><!--#myWorks-->