<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="login.php" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>

<!-- END MESSAGE BOX-->

<!-- BLUEIMP GALLERY -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- END BLUEIMP GALLERY -->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="../js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='../js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="../js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script type="text/javascript" src="../js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="../js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="../js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="../js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="../js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='../js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="../js/plugins/owl/owl.carousel.min.js"></script>

<script type="text/javascript" src="../js/plugins/moment.min.js"></script>
<script type="text/javascript" src="../js/plugins/daterangepicker/daterangepicker.js"></script>
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->

<script type="text/javascript" src="../js/plugins.js"></script>
<script type="text/javascript" src="../js/actions.js"></script>
<!-- END TEMPLATE -->

<script>
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
            link = target.src ? target.parentNode : target,
            options = {index: link, event: event,onclosed: function(){
                setTimeout(function(){
                    $("body").css("overflow","");
                },200);
            }},
            links = this.getElementsByTagName('a');
        blueimp.Gallery(links, options);
    };
</script>

<!-- END SCRIPTS -->


</body>

<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Jul 2015 06:13:57 GMT -->
</html>
