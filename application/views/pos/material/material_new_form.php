<!--PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!--            start-->
            <div class="row">
                    <div class="col-md-8">

                        <div class="page-content-wrap">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">MATERIALS</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>
                                </div>
           <?php 
                  if (! empty($this->session->flashdata('message_name'))){?>
                  <div class="alert alert-success pull-right col-md-12"> <?php echo  $this->session->flashdata('message_name');?> </div> 
             <?php }?>
                            <div class="panel panel-body">

                                <div class="login-v1">

                                    <div class="login-box animated fadeInDown">
                                        <div class="login-body" id="loginContainer">
                                            <div class="login-title">

                                            </div>



                                            <form action="<?php echo base_url(); ?>pos/new_material" class="form-horizontal" method="POST" role="form">
                                                <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class=" no-padding-left no-padding-right">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-th-list"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="name" placeholder="Material Name "/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <div class="no-padding-left no-padding-right">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fas fa-balance-scale"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="size_id" placeholder="Material Size"/>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="form-row">
                                              <div class="form-group col-md-8">
                                                    <div class="no-padding-left no-padding-right">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-edit"></span>
                                                            </div>
                                                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
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



                                                <div class="form-group">
                                                    <div class="col-md-6 no-padding-left no-padding-right">
                                                        <button class="btn btn-info btn-lg btn-block" id="doRegisterBtn" type="submit">ADD</button>
                                                    </div>
                                                </div>
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