     <?php $data['title']='Tell'; initial_view($data);?>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Dashboard</li>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">

           <!--  Dashboard widget row-->
            <div class="row">

                <!-- START WIDGETS -->
                <div class="row">
                    <div class="col-md-3">

                        <!-- START WIDGET SLIDER -->
                        <div class="widget widget-default widget-carousel">
                            <div class="owl-carousel" id="owl-example">
                                <!-- <div>
                                    <div class="widget-title">Total Shareholder</div>
                                    <div class="widget-subtitle">Present</div>
                                    <div class="widget-int">1,390</div>
                                </div> -->
                               <!--  <div>
                                    <div class="widget-title">Shareholder</div>
                                    <div class="widget-subtitle">Representative</div>
                                    <div class="widget-int">795</div>
                                </div> -->
                                <div>
                                    <div class="widget-title">TOTAL TAX 2019</div>
                                    <div class="widget-subtitle">
                                        Material Tax
                                    </div>
                                    <div class="widget-int">TZS 595</div>
                                </div>
                            </div>
                            <div class="widget-controls">
<!--                                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>-->
                            </div>
                        </div>
                        <!-- END WIDGET SLIDER -->

                    </div>
                    <div class="col-md-3">

                        <!-- START WIDGET MESSAGES -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-tag"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">238,990</div>
                                <div class="widget-title">ACTIVE POS[2019]</div>
                                <div class="widget-subtitle"></div>
                            </div>
                        </div>
                        <!-- END WIDGET MESSAGES -->

                    </div>
                    <div class="col-md-3">

                        <!-- START WIDGET REGISTRED -->
                        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-clipboard"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">987</div>
                                <div class="widget-title">BRANDING MATERIAL</div>
                                <div class="widget-subtitle">DISTRIBUTED [2019]</div>
                            </div>

                        </div>
                        <!-- END WIDGET REGISTRED -->

                    </div>
                    <div class="col-md-3">

                        <!-- START WIDGET CLOCK -->
                       
                        <!-- END WIDGET CLOCK -->
                          <div class="widget widget-danger widget-item-icon" onclick="location.href='pages-address-book.html';">
                            <div class="widget-item-left">
                                <span class="fa fa-clock-o"></span>
                            </div>
                            <div class="widget-data">
                                <div class="widget-int num-count">987</div>
                                <div class="widget-title">OVERDUE</div>
                                <div class="widget-subtitle">Overdue Notifications [2019]</div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END WIDGETS -->
            </div>
            <!--end row-->

            <div class="row" style="margin-bottom: 15px;">

            </div>


            <div class="row">

                <div class="col-md-8">

                <!-- START PROJECTS BLOCK -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title-box">
                            <h4>Best Respondent Sale Agent</h4>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body panel-body-table">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="50%">Name</th>
                                    <th width="20%">Average Response</th>
                                    <th width="30%">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><strong>Kamishon john Dar es Salam </strong></td>
                                    <td><span class="label label-success">4 hours</span></td>
                                    <td>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kambo john Mbeya</strong></td>
                                    <td><span class="label label-success">6 hrs</span></td>
                                    <td>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 59%;">59%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kamishon john Arusha</strong></td>
                                    <td><span class="label label-warning">1day</span></td>
                                    <td>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 55%;">55%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Kamishon HH Mwanza</strong></td>
                                    <td><span class="label label-danger">4days</span></td>
                                    <td>
                                        <div class="progress progress-small progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 15%;">40%</div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END PROJECTS BLOCK -->

                </div>

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Top Tax</h4>

                            <table class="table table-striped">
                                <tr>
                                    <td width="200"><strong>Dar es Salaam:</strong></td><td class="text-right">2,230,000,000</td>
                                </tr>
                                <tr>
                                    <td><strong>Mwanza :</strong></td><td class="text-right">1,703,860,000</td>
                                </tr>
                                <tr>
                                    <td><strong>Mbeya:</strong></td><td class="text-right">2,240,000,300</td>
                                </tr>
                                <tr>
                                    <td><strong>Arusha:</strong></td><td class="text-right">240,000,300</td>
                                </tr>
                                <!-- <tr class="total">
                                    <td><strong>Arusha:</strong></td><td class="text-right"><h2>100,000,000</h2></td>
                                </tr> -->
                            </table>
                        </div>
                </div>
                </div>



                </div>


            </div>
            <!--end row-->

        <div class="page-content-wrap">

            <div class="row">
                <div class="col-md-6" hidden>

                    <!-- START LINE CHART -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Line Chart</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-line-example" style="height: 300px;"></div>
                        </div>
                    </div>
                    <!-- END LINE CHART -->

                </div>

            </div>


        </div>


            </div>

        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

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
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->
<script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/rickshaw/d3.v3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/rickshaw/rickshaw.min.js"></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='<?php echo base_url(); ?>js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins/owl/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/actions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/demo_charts_morris.js"></script>
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






