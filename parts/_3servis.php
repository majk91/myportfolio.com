        <section id="servis" class="two" data-number="a3">
            <a name="servis"></a>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 height-max">
                        <div class="servis-wrap">
                            <div class="all-title-wrap">
                                <h2 class="servis-title">Обратите внимание на мои <strong>услуги</strong></h2>
                                <div class="first-line"></div>
                                <div class="second-line"></div>
                                <p class="hidden-xs"><?php echo selectItem("articles", "services") ?></p>
                            </div><!--.all-title-wrap-->
                            <div class="servis-item-wrap">
                                <?php echo showServises()?>
                            </div><!--.servis-item-wrap-->
                        </div><!--.servis-wrap-->
                    </div>
                </div><!--.row-->
            </div><!--.container-->
        </section><!--section#servis-->