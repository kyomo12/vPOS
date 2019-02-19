<style type="text/css">
   .mod {
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #28a745;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 8px;
     border-top-right-radius: 9px;
 }
</style>

    <script type="text/javascript">

    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'false',keyboard: false});


        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {

                jQuery('#modal_ajax .modal-body').html(response);
                closeOnEscape: false;
                backdrop: 'static';

            dialogClass: "noclose";
            }
        });
    }
        function showAjaxModal3(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax2').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'false'});


        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {

                jQuery('#modal_ajax .modal-body').html(response);
                closeOnEscape: false;
                backdrop: 'static';

            dialogClass: "noclose";
            }
        });
    }
    function showAjaxModal2(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax2 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/images/preloader.gif" /></div>');

        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax2').modal('show', {backdrop: 'false',keyboard: false});


        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {

                jQuery('#modal_ajax2 .modal-body2').html(response);
                closeOnEscape: false;
                backdrop: 'static';

            dialogClass: "noclose";
            }
        });
    }
</script>


    <!-- (Ajax Modal)-->
    <div class="modal fade" id="modal_ajax" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" style="width:600px;">
            <div class="modal-content" ">

                <div class="modal-header mod modal-header-success" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <!-- <h4 class="modal-title"><?php echo 'M-CRM'; ?> </h4> -->
                </div>

                <div class="modal-body" style="margin:0px;">



                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="modal_ajax2" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" style="width:800px;">
            <div class="modal-content" ">

                <div class="modal-header mod" style="text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo 'M-CRM'; ?> </h4>
                </div>

                <div class="modal-body" style="margin:0px;">



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        function not_checked()
    {
        jQuery('#not_checked').modal('show', {backdrop: 'static'});
    }
   function confirm_check()
    {
        jQuery('#check_confirm').modal('show', {backdrop: 'static'});
    }
    function confirm_action(url)
    {
        jQuery('#modal-action').modal('show', {backdrop: 'static'});
        document.getElementById('url').setAttribute('href' , url);
    }
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
        function confirm_remove(delete_url)
    {
        jQuery('#modal-rm').modal('show', {backdrop: 'static'});
        document.getElementById('rm_link').setAttribute('href' , delete_url);
    }
   function ConfirmYearChange(url)
   {
       jQuery('#modal-yearchange').modal('show', {backdrop: 'static'});
       document.getElementById('modal-yearchange_id').setAttribute('href' , url);
   }


    function confirm_deactivate(deactivate_link)
    {
        jQuery('#modal-deactivate').modal('show', {backdrop: 'static'});
        document.getElementById('deactivate_link').setAttribute('href' , deactivate_link);
    }


    </script>

    <!-- (Normal Modal)-->
        <div class="modal fade" id="modal-yearchange">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;"><span style="color:orange;">Note!!!!!</span><br/><span style="text-align:left;"> Changing the year will move <b>FORM FIVE</b> to <b>FORM SIX</b> and <b>FORM SIX</b> to <b>COMPLETED STATUS</b><br/><span> Do you still want to change?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-primary" id="modal-yearchange_id"><?php echo 'Change';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal"><?php echo 'NO';?></a>
                </div>
            </div>
        </div>
    </div>
        <div class="modal fade" id="modal-action">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure,want to perform this ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-info" id="url"><?php echo 'YES';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" id="confirm_link"><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-accept">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to to accept the request ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="acc_link"><?php echo 'Accept';?></a>
                    <a href="#" class="btn btn-success" data-dismiss="modal" id="confirm_link"><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">

                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-info" id="delete_link"><?php echo 'delete';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" id="confirm_link"><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="modal-review">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Have you reviewed this ?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="review_link"><?php echo 'YES';?></a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" ><?php echo 'NO';?></a>
                    <!--<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'cancel';?></button>-->
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-deactivate">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">

                    <h4 class="modal-title" style="text-align:center;">Deactivate  this?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-info pull-left" id="deactivate_link"><?php echo 'YES';?></a>
                     <a href="#" class="btn btn-danger pull-right" data-dismiss="modal" ><?php echo 'NO';?></a>

                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="modal-rm">
        <div class="modal-dialog" >
            <div class="modal-content" style="margin-top:100px;">

                <div class="modal-header">

                    <h4 class="modal-title" style="text-align:center;">Remove   this?</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-info pull-left" id="rm_link"><?php echo 'YES';?></a>
                     <a href="#" class="btn btn-danger pull-right" data-dismiss="modal" ><?php echo 'NO';?></a>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="not_checked">
        <div class="modal-dialog" >
            <div class="modal-content panel-warning" style="margin-top:100px;">

                <div class="modal-header panel-headingpanel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:red;">No checked rows</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">

                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'OK';?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="check_confirm">
        <div class="modal-dialog" >
            <div class="modal-content panel-warning" style="margin-top:100px;">

                <div class="modal-header panel-headingpanel-heading">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center; color:red;">No checked rows</h4>
                </div>


                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <button type="button" class="btn btn-info"><?php echo 'OK';?></button>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'OK';?></button>
                </div>
            </div>
        </div>
    </div>




   <style type="text/css">
    .modal {
      overflow-y:auto;
    }
    .mod{
        background-color:#CE1602;
    }
    </style>
