<!-- PAGE TITLE -->
                <!--<div class="page-title">                    -->
                    <!--<h2><span class="fa fa-users"></span> Vodacom POS</h2>-->
                <!--</div>-->
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-8">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">RATES</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>
                                </div>
                                <?php 
                                      if (! empty($this->session->flashdata('message_name'))){?>
                                      <div class="alert alert-success pull-right col-md-12"> <?php echo  $this->session->flashdata('message_name');?> </div> 
                                 <?php }?>
                                <div class="panel-body">
                                 <!--    <div class="table-responsive"> -->
                                         <table class="table  table-hover rate" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>COUNCIL</th>
                                                    <th>RATE/CM SQUARE(TZS)</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($lists as $list ) {?>
                                
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo strtoupper($list->council); ?></td>
                                                    <td><?php echo strtoupper($list->rate_per_area); ?></td>
                                                    <td>
                                                        <div class="btn-group-">
                                                            <a  href="<?php echo base_url(); ?>pos/edit_rate/<?php echo $list->id; ?>" class="btn btn-primary"  title="Edit" data-toggle="tooltip">Edit</a>
                                                          <!--   <a style="margin-right: 5px" class="btn btn-danger pull-left-"  title="Delete" data-toggle="tooltip">Delete</a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                            <!-- START SIMPLE DATATABLE -->
                            <!-- END SIMPLE DATATABLE -->

                        </div>
                    </div>

                </div>
                <!-- PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
