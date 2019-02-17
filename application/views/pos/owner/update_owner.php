<!--PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!--            start-->
            <div class="row">
                    <div class="col-md-8">

                        <div class="page-content-wrap">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">Update POS Owner</h3>
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



                                            <form action="<?php echo base_url(); ?>pos/update_owner" class="form-horizontal" method="POST" role="form">
                                                <?php foreach ($lists as $list ):?>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">First name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <input type="hidden" name="id" value="<?php echo $list->id;?>">
                                                            <input required type="text" class="form-control" value="<?php if (!empty(set_value('first_name'))) echo set_value('first_name'); else echo $list->first_name; ?>"  name="first_name" placeholder="First Name "/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('first_name').'</span>'; ?>
                                                
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Middle name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php if (!empty(set_value('middle_name'))) echo set_value('middle_name'); else echo $list->middle_name; ?>" name="middle_name" placeholder="Middle Name"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('middle_name').'</span>'; ?>
                                                    </div>
                                               
                                            </div>

                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Last name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="last_name" placeholder="last Name" value="<?php if (!empty(set_value('last_name'))) echo set_value('last_name'); else echo $list->last_name; ?>"  />
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('last_name').'</span>'; ?>
                                             
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">Email</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fas fa-at"></span>
                                                            </div>
                                                            <input required type="email" class="form-control" name="email" placeholder="Email" value="<?php if (!empty(set_value('email'))) echo set_value('email'); else echo $list->email; ?>"  />
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('email').'</span>'; ?>
                                                    
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Mobile</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-book"></span>
                                                            </div>
                                                            <input required type="number" class="form-control" name="mobile" placeholder="Mobile" value="<?php if (!empty(set_value('mobile'))) echo set_value('mobile'); else echo $list->mobile; ?>" />
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('mobile').'</span>'; ?>
                                           
                                                </div>
                                                
                                            </div>
                                        <?php endforeach;?>

                                             
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



                                                <div class="form-group col-md-6">
                                                    
                                                        <button class="btn btn-info btn-lg btn-block" id="doRegisterBtn" type="submit">SAVE</button>
                                                  
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