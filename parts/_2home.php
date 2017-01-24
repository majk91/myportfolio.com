            <section id="home" class="one" data-number="a2">
                <div class="container">
                    <div class="row vcenter">
                        <div class="hidden-xs hidden-sm col-md-3 text-center">
                            <div class="my-photo-box">
                                <img src="image/<?php echo getSetInf(main_settings, my_photo) ?>" alt="Mike my-photo">
                            </div>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2 col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-3">

                            <?php require("_9g_contact-box.php") ?>

                        </div>
                        <div class="hidden-xs col-md-3 col-sm-5 text-center clock">
                            <?php require_once("parts/apps/clock.php") ?>
                        </div>

                        <div class="col-xs-12 col-md-12 text-center my-present">
                            <p><?php echo getSetInf(main_settings, my_name) ?></p>
                            <h1><?php echo getSetInf(main_settings, profession) ?></h1>
                        </div>
                        <div class="col-xs-12 col-md-12 text-center bottom-down-box">
                            <div class="bottom-down">
                                <span class="arrow-box"></span>
                            </div>
                        </div>
                    </div> <!--.row-->
                </div><!--.container-->
            </section><!--section.home--> 
        </div><!--.home-wraper-->