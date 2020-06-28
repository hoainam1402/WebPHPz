<div class="custom-top" id="custom_slider">
   <div class="container">
      <column class="position-display">
         <div>
            <!-- START REVOLUTION SLIDER  fullwidth mode -->
            <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:900px;">
               <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;max-height:900px;height:900px;">
                  <ul>
                     <!-- SLIDE  -->
                     <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="#" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="Content/img/slide-1.jpg" alt="banner-slide1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                     </li>
                     <!-- SLIDE  -->
                     <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="#" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="Content/img/slide-2.jpg" alt="banner-slide2" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                     </li>
                     <!-- SLIDE  -->
                     <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="#" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="Content/img/slide-3.jpg" alt="banner-slide3" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                     </li>
                     <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-link="#" data-saveperformance="off">
                        <!-- MAIN IMAGE -->
                        <img src="Content/img/slide-4.jpg" alt="banner-slide3" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                     </li>
                  </ul>
                  <div class="tp-bannertimer"></div>
               </div>
               <script type="text/javascript">
                  /******************************************
                    -	PREPARE PLACEHOLDER FOR SLIDER	-
                  ******************************************/


                  var setREVStartSize = function() {
                    var	tpopt = new Object();
                      tpopt.startwidth = 1920;
                      tpopt.startheight = 900;
                      tpopt.container = jQuery('#rev_slider_1_1');
                      tpopt.fullScreen = "off";
                      tpopt.forceFullWidth="on";

                    tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
                  };

                  /* CALL PLACEHOLDER */
                  setREVStartSize();


                  var tpj=jQuery;

                  var revapi1;

                  tpj(document).ready(function() {

                  if(tpj('#rev_slider_1_1').revolution == undefined)
                    revslider_showDoubleJqueryError('#rev_slider_1_1');
                  else
                     revapi1 = tpj('#rev_slider_1_1').show().revolution(
                    {
                      dottedOverlay:"none",
                      delay:5000,
                      startwidth:1920,
                      startheight:900,
                      hideThumbs:200,

                      thumbWidth:100,
                      thumbHeight:50,
                      thumbAmount:3,


                      simplifyAll:"off",

                      navigationType:"bullet",
                      navigationArrows:"solo",
                      navigationStyle:"round",

                      touchenabled:"on",
                      onHoverStop:"on",
                      nextSlideOnWindowFocus:"off",

                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      drag_block_vertical: false,



                      keyboardNavigation:"off",

                      navigationHAlign:"center",
                      navigationVAlign:"bottom",
                      navigationHOffset:0,
                      navigationVOffset:20,

                      soloArrowLeftHalign:"left",
                      soloArrowLeftValign:"center",
                      soloArrowLeftHOffset:20,
                      soloArrowLeftVOffset:0,

                      soloArrowRightHalign:"right",
                      soloArrowRightValign:"center",
                      soloArrowRightHOffset:20,
                      soloArrowRightVOffset:0,

                      shadow:0,
                      fullWidth:"on",
                      fullScreen:"off",

                      spinner:"spinner0",

                      stopLoop:"off",
                      stopAfterLoops:-1,
                      stopAtSlide:-1,

                      shuffle:"off",

                      autoHeight:"on",
                      forceFullWidth:"on",



                      hideThumbsOnMobile:"off",
                      hideNavDelayOnMobile:1500,
                      hideBulletsOnMobile:"off",
                      hideArrowsOnMobile:"off",
                      hideThumbsUnderResolution:0,

                                  hideSliderAtLimit:0,
                      hideCaptionAtLimit:0,
                      hideAllCaptionAtLilmit:0,
                      startWithSlide:0					});




                  });	/*ready*/

               </script>
            </div>
            <!-- END REVOLUTION SLIDER -->
         </div>
      </column>
   </div>
</div>
