        <!-- START BREADCRUMB -->
     <!--    <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Shareholders</li>
        </ul> -->
        <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <?php foreach($total_sum as $list_sum): $area=$list_sum->area;$tax=$list_sum->tax;$district=$list_sum->district; endforeach;?>
                <div class="page-title">                    
                     <h2><span class="fa fa-th-list"></span> : <?php echo strtoupper($district);?>     TAX: <?php echo $tax .'TZS';?> </h2> 
                </div>
                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Tax list in <?php echo $district; ?></h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table1 datatable">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>POS</th>
                                                    <td>Area(CM sqr)</td>
                                                    <td>TAX</td>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($lists as $list):?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $list->name; ?></td>
                                                    <td><?php echo $list->area; ?></td>
                                                    <td><?php echo $list->tax; ?></td>
                                                </tr>
                                                <?php $i++;endforeach; ?>
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