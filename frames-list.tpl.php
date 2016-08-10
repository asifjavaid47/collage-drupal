   <?php
   error_reporting(0);
   $link = $GLOBALS['base_url'];
   define('image_path',"$link/sites/all/modules/frames/frames_images/");
   define('file_path',"$link/frames/show/");
   ?>  
<?php 
drupal_add_css(drupal_get_path('module', 'frames') . '/css/collage-style.css');
drupal_add_css(drupal_get_path('module', 'frames') . '/css/bootstrap.css');
?>
<!--        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style111.css" rel="stylesheet" type="text/css"/>-->
        <!---------header start------>
        <div class=" container continrbg" style="width:100%;">
            
            <div class="col-xs-12 col-sm-12  ">
                <div class="contentinr col-md-12">
                    <label class="col-md-12" style="text-align: center;">Photo Collages - Select Your Layout</label>
                    <p class="col-md-12" style="text-align: center;">We offer a large collection of photo collages with upto 20 apertures in various shapes and sizes.<br />Simply select a layout, Upload your photos then select a frame in our design studio.</p>
                </div>
            </div>
            <!--<div class="col-xs-12 col-sm-12   "> <img src="images/imgpobar.png" width="100%" class="img-responsive"/> </div>-->
            <div class="col-xs-12 col-sm-4  col-md-3" style="padding-right:0;">
                <div class="collage-layout-filter cf">
                    <h2 style="background-color: #2d2d37; color: #fff; margin-bottom: 20px;">Frames Available</h2>
                    <ul data-c-format="r">
                        <li data-filter-slots="3"><a href="<?php echo $link; ?>/frames/">All Frames</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/1">3 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/2">4 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/3">5 Apertures</a></li>
                        <li  class="selected"><a href="<?php echo $link; ?>/frames/4">6 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/5">7 Apertures</a></li>
                        <li><a href="<?php echo $link; ?>/frames/6">8 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/7">9 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/8">10 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/9">11 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/10">12 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/11">13 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/12">14 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/13">16 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/14">18 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/15">20 Apertures</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/16">Babies</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/17">Wedding Anniversaries</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/18">Family And Pets</a></li>
                        <li class="selected"><a href="<?php echo $link; ?>/frames/19">Remembrance</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-9 ">
                <div class="col-xs-12 col-sm-12  shopsecmain" style="border:0px;">
                    <div class="row">
                        <!--Loop Starts Here-->
                        <?php
                        if ($data > 0) {
                           foreach($data as $v)
{
                                ?>
                                <div class="col-xs-12 col-sm-6 shopsec clgfrmbox" style="border: 1px solid #e4e4e4;">
                                    <div class="col-xs-12 col-sm-12 ">
                                        <label class="catgryimgtitle">&nbsp;</label>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 form-group">
                                        <a href="<?php echo file_path.$v->frame_id ;?>"><img class="img_shadow img-responsive catgrysecimg clgfrmboximg" src="<?php echo image_path. $v->frame_id ; ?>.png"></a>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 form-group">
                                        <a class="btn btn-green btn-small pull-right" href="<?php echo file_path.$v->frame_id ; ?>" data-original-title="" title="">Create a Collage</a> 
                                    </div>
                                </div>
                                <?php } ?>
                            <?php } else { ?>
                            <label class="col-md-12" style="text-align: center;">Sorry - No Frame Found</label>
							<?php } ?>
                        <!--Loop Starts Here-->
                    </div>
                </div>
            </div>
        </div>
    