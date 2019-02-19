<!--PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!--            start-->
            <div class="row">
                    <div class="col-md-8">

                        <div class="page-content-wrap">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">POS REPORT DISTRICT BASED</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>
                                </div>
                                
                            <div class="panel panel-body">
                                <div class="login-v1">

                                    <div class="login-box animated fadeInDown">
                                        <div class="login-body" id="loginContainer">
                                            <div class="login-title">

                                            </div>



                                            <form id="" action="<?php echo base_url();?>report/pos" class="form-horizontal" method="POST" role="form">
                                                
                                                <div class="row">
                  <div class="form-group col-md-6">
                        <label class="control-label">Council</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-desktop"></span>
                                </div>
                                <select class="form-control" required name="council">
                                    <option value="">Select districts</option>
                                    <?php foreach ($districts as $list1): ?>
                                        <option value="<?php echo $list1->district; ?>"><?php echo $list1->district; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                
                            </div>
                            <?php echo '<span class="text-danger">'. form_error('council').'</span>'; ?>
                       
                    </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Category</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-desktop"></span>
                                                            </div>
                                                            <select class="form-control" required name="category_id">
                                                                <option value="">Select category</option>
                                                                <?php foreach ($catlist as $list): ?>
                                                                    <option value="<?php echo $list->id; ?>" <?php if ((set_value('category_id'))==$list->id) echo 'selected';?> ><?php echo $list->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('category_id').'</span>'; ?>
                                                   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">POS Status:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-bullseye"></span>
                                                            </div>
                                                            <select name="status" class="form-control">
                                                                <option value="">Select status</option>
                                                                <option value="Active">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                                <option value="Unknown">Unknown</option>
                                                                
                                                            </select>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('name').'</span>'; ?>
                                               
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



                                                <div class="form-group col-md-6">
                                                   
                                                        <button class="btn btn-primary btn-lg btn-block" id="doRegisterBtn" type="submit">Fetch Report</button>
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