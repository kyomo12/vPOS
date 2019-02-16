<body>
<!-- START PAGE CONTAINER -->
<div class="page-container">

    <!-- START PAGE SIDEBAR -->
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation x-navigation-hover">
            <li class="xn-logo">
                <a href="index.html">POS</a>
                <a href="#" class="x-navigation-control"></a>
            </li>

            <li class="xn-title">POINT OF SALE</li>
            <li class="show-menu-arrow">
                <a href="index.html"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboard</span></a>
            </li>
            <!--<li class="show-menu-arrow active">-->
                <!--<a href="manage_shareholder.html"><span class="fa fa-group"></span> <span class="xn-text">POS</span></a>-->
            <!--</li>-->
            <li class="xn-openable">
                <a href="#"><span class="fa fa-desktop"></span> <span class="xn-text">POS</span></a>
                <ul>
                    <li><a href="register_proxy.html"><span class="fa fa-users"></span>Registration</a></li>
                    <li><a href="manage_shareholder.html"><span class="fa fa-sort-amount-asc"></span>POS List</a></li>
                </ul>
            </li>
            
            <li class="xn-openable">
                <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Settings</span></a>
                <ul>
                    <li><a href="#"><span class="fa fa-users"></span>User Management</a></li>
                    <li><a href="#"><span class="fa fa-sort-amount-asc"></span>Previleges</a></li>
                     <li><a href="<?php echo base_url();?>pos/activities"><span class="fa fa-sort-amount-asc"></span>Activity</a></li>
                     <li><a href="<?php echo base_url();?>pos/pos_categories"><span class="fa fa-sort-amount-asc"></span>Categories</a></li>


                </ul>
            </li>


        </ul>
        <!-- END X-NAVIGATION -->
    </div>