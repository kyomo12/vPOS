<!-- PAGE TITLE -->
                <!--<div class="page-title">                    -->
                    <!--<h2><span class="fa fa-users"></span> Vodacom POS</h2>-->
                <!--</div>-->
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">POS</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                         <table class="table pos datatable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAME</th>
                                                    <th>OWNER</th>
                                                    <th>MOBILE</th>
                                                    <th>TILL NO</th>
                                                    <th>CATEGORY</th>
                                                    <th>STATUS</th>
                                                  <!--   <th>REGION</th> -->
                                                    <th>DISTRICT</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($lists as $list ) {?>
                                
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo strtoupper($list->name); ?></td>
                                                    <td><?php echo strtoupper($list->first_name.' '.$list->last_name); ?></td>
                                                    <td><?php echo strtoupper($list->mobile); ?></td>
                                                    <td><?php echo strtoupper($list->till_no); ?></td>
                                                    <td><?php echo $list->cat_name; ?></td>
                                                    <td><?php echo $list->pos_status; ?></td>
                                                    <!-- <td><?php echo $list->region; ?></td> -->
                                                    <td><?php echo $list->district; ?></td>
                                                    
                                                    <td>
                                                        <div class="btn-group-">
                                                            <a  href="<?php echo base_url(); ?>pos/update_pos/<?php echo $list->id; ?>" class="btn btn-primary"  title="Edit" data-toggle="tooltip">Edit</a>
                                                            <a style="margin-right: 5px" class="btn btn-danger pull-left-"  title="Delete" data-toggle="tooltip">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++;} ?>
                                            </tbody>
                                        </table>
                                    </div>
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
