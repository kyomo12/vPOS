<!--PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!--            start-->
            <div class="row">
                    <div class="col-md-8">

                        <div class="page-content-wrap">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">TAX RATES</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>
                                </div>
                            <div class="panel panel-body">




                                  <!--   <h2>Create Proxy</h2> -->



                                <div class="login-v1">

                                    <div class="login-box animated fadeInDown">
                                        <div class="login-body" id="loginContainer">
                                            <div class="login-title">

                                            </div>



                                            <form action="<?php echo base_url(); ?>pos/new_rate" class="form-horizontal" method="POST" role="form">
                                              
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                        <div class="form-group">
                                                            <label for="height">Council</label>
                                                            <input required type="text" class="form-control" value="<?php echo set_value('council'); ?>" name="council" placeholder="Council"/>
                                                        </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                        <div class="form-group">
                                                            <label for="width">Rate/Area[cm square]</label>
                                                            <input required type="text" class="form-control" value="<?php echo set_value('rate_per_area'); ?>" name="rate_per_area" placeholder="Rate"/>
                                                        </div>
                                                </div>
                                            </div>

                                           

                                            </div>



                                                    <div class="form-group">
                                                        <!-- <div class="col-md-12 no-padding-left no-padding-right">
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <span class="fa fa-envelope"></span>
                                                                </div>
                                                                <input required type="text" class="form-control" name="ic_number" placeholder="Unique number"/>
                                                            </div>
                                                        </div> -->
                                                    </div>

                                

                                                <div class="form-group col-md-4">
                                                        <button class="btn btn-primary btn-lg btn-block" id="doRegisterBtn" type="submit">SAVE</button>
                                                </div>



                                            </form>
                                        </div>

                                    </div>

                                </div>

                        </div>

                    </div>
                </div>




            </div>
            <!--            end-->


        </div>
        <!--end row-->


    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER