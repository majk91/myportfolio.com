<?php 
	//Функция возвращает массив путей к файлам
	function getPictures($pathToDir){
		$pictures = [];
		if(file_exists($pathToDir)){
			$d = opendir($pathToDir);
			while (($file = readdir($d)) !== false) {
				if($file == '.' || $file == '..') continue;

				$pictures[] = $pathToDir . '/'.$file;
			}
		}
		return $pictures;
	}
	function showFile($pathToFile){
		include '/parts/pictures.par.php';
	}
	$pictures = getPictures('/file_upload/gallery_desctop');
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
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							</ol>
							<!-- Wrapper for slides desktop -->
							<div class="carousel-inner ">
								<div class="item active">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
											<div class="col-xs-4 col-md-4">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
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

							<!-- Wrapper for slides mobile -->
							<div class="carousel-inner">
								<div class="item active">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p> 
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="myWork-item">
										<div class="row">
											<div class="col-xs-12">
												<div class="myWork-item-wrap">
													<p><a href="#"><img src="image/temp/gomer-simpson-kartinka.orig.jpg" alt="mySite"></a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Controls -->
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