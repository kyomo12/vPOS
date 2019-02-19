<!--PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <!--            start-->
            <div class="row">
                    <div class="col-md-8">

                        <div class="page-content-wrap">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                    <h3 class="panel-title">Register POS</h3>
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



                                            <form id="pos_form" action="<?php echo base_url();?>pos/new_pos" class="form-horizontal" method="POST" role="form">
                                                <?php if (!empty(validation_errors())) echo '<div class="alert alert-danger">' .validation_errors().'</div>';?>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">POS Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-desktop"></span>
                                                            </div>
                                                            <input required  value="<?php echo set_value('name'); ?>" type="text" class="form-control" name="name" placeholder="POS Name "/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('name').'</span>'; ?>
                                                    
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
                                                     <label class="control-label">Till No:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-hashtag"></span>
                                                            </div>
                                                            <input required value="<?php echo set_value('till_no'); ?>" type="text" class="form-control" name="till_no" placeholder="Till No"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('till_no').'</span>'; ?>
                                                
                                                </div>
                                                <div class="form-group">
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
                                            <div class="row">
                                                <br/>
                                                <h4 class="text-info">ACTIVITIES</h4>
                                                 <hr>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                      <select id="activity" class="form-control select2"  name="" style="width: 100%;">
                                                        <option value="">--Select Activities--</option>
                                                          <?php foreach($activities as  $list):?>
                                                          <option value="<?php echo $list->id; ?>"><?php echo $list->name;?></option>
                                                          <?php endforeach; ?>
                                                      </select>
                                                       
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <div class="btn activitybtn"><button class="btn btn-primary">+Add</button></div>
                                                    </div>
                                              </div>
                                               <table class="activity_add  table" width="100%">
                                                  <thead class="thead-dark" style="background-color: #eee;">
                                                    <tr>

                                                      <th width="%">SN</th>
                                                      <th width="%">NAME</th>
                                                      
                                                    </tr> 
                                                  </thead>
                                                  <?php if (!empty(set_value('activity'))){
                                                     $act_v=$this->common->activities_array(set_value('activity'))->result();
                                                    foreach ($act_v as $list):?>
                                                        
                                                    <tr>
                                                        <td>#<input type="hidden" name="activity[]" value="<?php echo $list->id; ?>" /></td>
                                                        <td><?php echo $list->name;  ?></td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                 <?php  } ?>
                                                </table>
                                            </div>

                                               
                                            <div class="row">
                                                <br/>
                                                <h4 class="text-info">Owner's details</h4>
                                                <hr>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">First name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" value="<?php echo set_value('first_name'); ?>"  name="first_name" placeholder="First Name "/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('first_name').'</span>'; ?>
                                                
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Middle name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <input type="text" class="form-control" value="<?php echo set_value('middle_name'); ?>" name="middle_name" placeholder="Middle Name"/>
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
                                                            <input required type="text" class="form-control" name="last_name" placeholder="last Name" value="<?php echo set_value('last_name'); ?>"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('last_name').'</span>'; ?>
                                             
                                                </div>
                                                 <div class="form-group col-md-6">
                                                    <label class="control-label">Mobile</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-book"></span>
                                                            </div>
                                                            <input required type="number" class="form-control" name="mobile" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" />
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('mobile').'</span>'; ?>
                                           
                                                </div>
                                            </div>

                            
                                             <div class="row">
                                                <br/>
                                                <h4 class="text-info">Location details</h4>
                                                <hr>
                                                <div class="form-group col-md-6">
                                                <label class="control-label">Region:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-book"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo set_value('region'); ?>" class="form-control" name="region" placeholder="Region"/>
                                                        </div>
                                                         <?php echo '<span class="text-danger">'. form_error('region').'</span>'; ?>
                                                   
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">District:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card-o"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo set_value('district'); ?>" class="form-control" name="district" placeholder="District"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('district').'</span>'; ?>
                                                  
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                <label class="control-label">Village/Mtaa:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card"></span>
                                                            </div>
                                                            <input  type="text" class="form-control" value ="<?php echo set_value('village_mtaa'); ?>" name="village_mtaa" placeholder="Village Mtaa"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('village_mtaa').'</span>'; ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Ward:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card"></span>
                                                            </div>
                                                            <input  type="text" value ="<?php echo set_value('ward'); ?>" class="form-control" name="ward" placeholder="Ward"/>
                                                        </div>
                                                         <?php echo '<span class="text-danger">'. form_error('ward').'</span>'; ?>

                                                   
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                   <label class="control-label">Street:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="street" value ="<?php echo set_value('street'); ?>"  placeholder="Street"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('street').'</span>'; ?>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                     <label class="control-label">Latitude:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-bullseye"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="latitude" value ="<?php echo set_value('latitude'); ?>" placeholder="Latitude"/>
                                                        </div>
                                                          <?php echo '<span class="text-danger">'. form_error('latitude').'</span>'; ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Longtude:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-bullseye"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo set_value('longitude'); ?>" class="form-control" name="longitude" placeholder="Longitude"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('longitude').'</span>'; ?>
                                                    
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