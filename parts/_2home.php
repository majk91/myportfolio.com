            <section id="home" class="one" data-number="a2">
                <div class="container">
                    <div class="row vcenter">
                        <div class="hidden-xs hidden-sm col-md-3 text-center">
                            <div class="my-photo-box">
                                <img src="<?php echo selectItem("main_settings", "my_photo") ?>" alt="Mike my-photo">
                            </div>
                        </div>
                        <div class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-5">

                            <?php require("_9g_contact-box.php") ?>

                        </div>
                        <div class="hidden-xs col-md-3 col-sm-5 text-center clock">
                            <?php// require_once("parts/apps/clock.php") ?>
                        </div>

                        <div class="col-xs-12 col-md-12 text-center my-present">
                            <p><?php echo selectItem("main_settings", "my_name") ?></p>
                            <h1><?php echo selectItem("main_settings", "profession") ?></h1>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 text-center bottom-down-box">
                                    <div class="bottom-down">
                                        <span class="arrow-box"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--.row-->
                </div><!--.container-->
            </section><!--section.home--> 
        </div><!--.home-wraper-->