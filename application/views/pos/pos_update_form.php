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




                                  <!--   <h2>Create Proxy</h2> -->



                                <div class="login-v1">

                                    <div class="login-box animated fadeInDown">
                                        <div class="login-body" id="loginContainer">
                                            <div class="login-title">

                                            </div>



                                            <form action="#" class="form-horizontal" method="POST" role="form">
                                                <?php foreach($lists as $key): ?>
                                                <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">POS Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-desktop"></span>
                                                            </div>
                                                            <input required  value="<?php echo $key->name; ?>" type="text" class="form-control" name="name" placeholder="POS Name "/>
                                                            <input type="hidden" name="id" value="<?php echo $key->id; ?>">
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('name').'</span>'; ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                     <label class="control-label">Owner</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-user"></span>
                                                            </div>
                                                            <select class="form-control" required name="owner_id">
                                                                <option value="">Select Owner</option>
                                                                <?php foreach ($owners as $list): ?>
                                                                    <option value="<?php echo $list->id; ?>" <?php if ($key->owner_id==$list->id) echo 'selected';?> ><?php echo $list->first_name.' '.$list->last_name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('owner_id').'</span>'; ?>
                                                
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Category</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-desktop"></span>
                                                            </div>
                                                            <select class="form-control" required name="category_id">
                                                                <option value="">Select category</option>
                                                                <?php foreach ($catlist as $list): ?>
                                                                    <option value="<?php echo $list->id; ?>" <?php if ($key->category_id==$list->id) echo 'selected';?> ><?php echo $list->name; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('category_id').'</span>'; ?>
                                                   
                                                </div>
                                                <div class="form-group">
                                                     <label class="control-label">Till No:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-hashtag"></span>
                                                            </div>
                                                            <input required value="<?php echo $key->till_no; ?>" type="text" class="form-control" name="till_no" placeholder="Till No"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('till_no').'</span>'; ?>
                                                
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="form-group col-md-6">
                                                <label class="control-label">Region:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-book"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo $key->region; ?>" class="form-control" name="region" placeholder="Region"/>
                                                        </div>
                                                         <?php echo '<span class="text-danger">'. form_error('region').'</span>'; ?>
                                                   
                                                </div>
                                                <div class="form-group">
                                                   <label class="control-label">District:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card-o"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo $key->district; ?>" class="form-control" name="district" placeholder="District"/>
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
                                                            <input  type="text" class="form-control" value ="<?php echo $key->Village_mtaa; ?>" name="village_mtaa" placeholder="Village Mtaa"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('village_mtaa').'</span>'; ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Ward:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-address-card"></span>
                                                            </div>
                                                            <input  type="text" value ="<?php echo $key->ward; ?>" class="form-control" name="ward" placeholder="Ward"/>
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
                                                            <input required type="text" class="form-control" name="street" value ="<?php echo $key->street; ?>"  placeholder="Street"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('street').'</span>'; ?>
                                                    
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
                                                                
                                                            </select>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('name').'</span>'; ?>
                                               
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                     <label class="control-label">Latitude:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-bullseye"></span>
                                                            </div>
                                                            <input required type="text" class="form-control" name="latitude" value ="<?php echo $key->latitude; ?>" placeholder="Latitude"/>
                                                        </div>
                                                          <?php echo '<span class="text-danger">'. form_error('latitude').'</span>'; ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Longtude:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-bullseye"></span>
                                                            </div>
                                                            <input required type="text" value ="<?php echo $key->longtude; ?>" class="form-control" name="longitude" placeholder="Longitude"/>
                                                        </div>
                                                        <?php echo '<span class="text-danger">'. form_error('longitude').'</span>'; ?>
                                                    
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                             
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
                                                   
                                                        <button class="btn btn-primary btn-lg btn-block" id="doRegisterBtn" type="submit">ADD</button>
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