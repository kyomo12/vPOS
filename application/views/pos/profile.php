        <!-- START BREADCRUMB -->
     <!--    <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Shareholders</li>
        </ul> -->
        <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h3><span class="fa fa-users"></span><?php  echo strtoupper(pos_name($id)); ?>/<?php if (pos_status($id)=='ACTIVE') { ?> <span class="label label-success"><?php echo strtoupper(pos_status($id));?></span><?php } else {?><span class="label label-warning"><?php echo strtoupper(pos_status($id));?></span><?php  } ?></h3>
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title"></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                               <!--  <div class="panel-body">
                                    <div class="table-responsive">
                                        
                                    </div>
                                </div> -->
                <div class="col-md-8">
                    <div class="page-title">                    
                    <h5><span class="fa fa-th-list"></span>Basic Info </h5>
                    </div>
                        <div class="col-md-12">
                        <div class="well profile">
                        <div class="col-sm-12">
                            <?php foreach ($detail as $key):?>
                          
                            <div class="col-xs-12 col-sm-8">
                                <h2><?php echo ucfirst($key->name);?></h2>
                                <p><strong>Category: </strong><?php echo strtoupper($key->cat_name);?> </p>
                                <p><strong>Till No: </strong><?php echo ucfirst($key->till_no);?> </p>
                                <p><strong>Owner: </strong><?php echo ucfirst($key->first_name).' '.ucfirst($key->last_name);?> </p>
                                <p><strong>Mobile: </strong><?php echo ucfirst($key->mobile);?> </p>
                                <p><strong>Location: </strong><?php echo ucfirst($key->region.'/'.$key->district);?> </p>
                                <p><strong>Longt: </strong><?php echo ucfirst($key->mobile);?> </p>
                               
                                <p><strong>Activities: </strong>
                                    <?php foreach ($activities as $act):?>
                                       
                                    <span class="tags"><?php echo strtoupper($act->name); ?></span>
                                <?php endforeach; ?>
                                </p>
                            </div>             
                            <div class="col-xs-12 col-sm-4 text-center">
                                <figure>
                                    <img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
                                    <figcaption class="ratings">
                                        <p>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                            <span class="fa fa-star"></span>
                                        </a>
                                        <a href="#">
                                             <span class="fa fa-star-o"></span>
                                        </a> 
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>            
                        <div class="col-xs-12 divider text-center">
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong> 2 </strong></h2>                    
                                <p><small>Materials</small></p>
                                <button class="btn btn-success btn-block"><span class="fa fa-th"></span> </button>
                            </div>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>20cm squres</strong></h2>                    
                                <p><small>Material Area</small></p>
                                <button class="btn btn-info btn-block"><span class="    fa fa-table"></span>  </button>
                            </div>
                            <div class="col-xs-12 col-sm-4 emphasis">
                                <h2><strong>TZS 12000</strong></h2>                    
                                <p><small>TAX/YEAR</small></p>
                                <div class="btn-group dropup btn-block">
                                  <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> ACTIONS </button>
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu text-left" role="menu">
                                    <li> <a href="javascript:;"  title="Edit" onclick="showAjaxModal('<?php echo base_url();?>user/send2agent/<?php echo $key->id;?>');"><span class="fa fa-envelope pull-right"></span> Send SMS note to Sales Agent </a></li>
                                    <li><a href="javascript:;"  title="Edit" onclick="showAjaxModal('<?php echo base_url();?>user/send2owner/<?php echo $key->id;?>');"><span class="fa fa-list pull-right"></span> Send SMS Note to Owner  </a></li>
                                    <li class="divider"></li>
                                    
                                  </ul>
                                </div>
                            </div>
                        </div>
                     </div>  
                     <?php endforeach;?>                
                                               
                  </div>
            </div>
            <div class="col-md-4">
                <div class="page-title">                    
                    <h5><span class="fa fa-th-list"></span>MATERIALS </h5>
                    </div>
                    <hr>
                <?php if(!empty($material)){ $id=1;foreach ($material as $mat): 
                    ?>
                <div class="col-md-12">
                    <?php echo strtoupper($mat->name).'<br/>'; ?>
                    <?php echo $mat->width.' X '.$mat->height.'<br/>' ; ?>
                    <?php echo $mat->width.' X '.$mat->status ; ?>
                    <img src="<?php echo base_url(); ?>img/mpesa.jpg" />
                </div>
            <?php endforeach;} else { ?>
                <div class="col-md-12">
                     <?php echo 'Material1 <br/>'; ?>
                    <?php echo 'Size 70 x 40 <br/>'; ?>
                    <?php echo 'Good'; ?>
                    <img src="<?php echo base_url(); ?>img/mpesa1.jpg" align="right" height="180" width="180" />
                </div><br/>
                <div class="col-md-12">
                    <?php echo 'Material1 <br/>'; ?>
                    <?php echo 'Size 40 x 40 <br/>'; ?>
                    <?php echo 'Good'; ?>
                    <img src="<?php echo base_url(); ?>img/vodacom1.jpg" align="right" height="180" width="180" />
                </div>
            <?php }?>
            </div>
                            <!-- END DEFAULT DATATABLE -->

                            <!-- START SIMPLE DATATABLE -->
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>                                
                    
                </div>
                <!-- PAGE CONTENT WRAPPER -->
                <style type="text/css">
                    @import url(http://fonts.googleapis.com/css?family=Lato:400,700);
body
{
    font-family: 'Lato', 'sans-serif';
    }
.profile 
{
    min-height: 355px;
    display: inline-block;
    }
    .profile {
    width: 100%;
    float: left;
    padding: 15px 10px;
    position: relative;
   background: none;
}
.well{
    background-color: none;
    border:none;
}
figcaption.ratings
{
    margin-top:20px;
    }
figcaption.ratings a
{
    color:#f1c40f;
    font-size:11px;
    }
figcaption.ratings a:hover
{
    color:#f39c12;
    text-decoration:none;
    }
.divider 
{
    border-top:1px solid rgba(0,0,0,0.1);
    }
.emphasis 
{
    border-top: 4px solid transparent;
    }
.emphasis:hover 
{
    border-top: 4px solid #1abc9c;
    }
.emphasis h2
{
    margin-bottom:0;
    }
span.tags 
{
    background: #1abc9c;
    border-radius: 2px;
    color: #f5f5f5;
    font-weight: bold;
    padding: 2px 4px;
    }
.dropdown-menu 
{
    background-color: #34495e;    
    box-shadow: none;
    -webkit-box-shadow: none;
    width: 250px;
    margin-left: -125px;
    left: 50%;
    }
.dropdown-menu .divider 
{
    background:none;    
    }
.dropdown-menu>li>a
{
    color:#f5f5f5;
    }
.dropup .dropdown-menu 
{
    margin-bottom:10px;
    }
.dropup .dropdown-menu:before 
{
    content: "";
    border-top: 10px solid #34495e;
    border-right: 10px solid transparent;
    border-left: 10px solid transparent;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    z-index: 10;
    }
                </style>