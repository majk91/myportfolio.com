    <section id="review" class="one" data-number="a6">
        <a name="reviews"></a>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="all-title-wrap">
                        <h2 class="servis-title"><strong>Отзывы</strong> клиентов </h2>
                        <div class="first-line"></div>
                        <div class="second-line"></div>
                    </div><!--.all-title-wrap-->
                </div><!--.col-md-12-->
            </div><!--.row-->
            <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators slider2-indicat">
                    <?php echo getIndicators('clients_reviews') ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner comment-box">
                    <?php echo showReviewSite() ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic1" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic1" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div><!--.container-->
    </section><!--#review-->