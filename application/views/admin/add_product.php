
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content-header">
        <ol class="breadcrumb">
                <li class="active"><a href="<?php echo base_url();?>admin/Dashboard"><?php echo display('deashbord');?></a></li>
            </ol>
    </section>


    <!-- Main content -->
    <section class="content">
    
        <?php
            $msg = $this->session->flashdata('message');
            if($msg){
                echo $msg;
            } 
        ?>

	    <div class="row">
	    	<div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-heading no-print">
                            <div class="btn-group"> 
                                <a class="btn btn-primary" href="<?php echo base_url()?>admin/Service/service_list"> <i class="fa fa-list"></i>  <?php echo display('service_list')?> </a>  
                            </div>
                        </div> 
                    </div>

                    <?php 
                        $att = array('name'=>'insert_invoice','class' => 'form-horizontal','id'=>'insert_invoice');
                        echo form_open('admin/Service/save_service/',$att);
                    ?>
                    
                    <div class="panel-body">
                     
                        <div class="form-group">
                            <label class="control-label col-md-3"> <?php echo display('service_name')?> </label>
                            <div class="col-md-7">
                                <input type="text" name="service_name" class="form-control"> 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-3">  <?php echo 'Price(₱)'?> </label>
                            <div class="col-md-7">
                                <input type="number" name="price" class="form-control"> 
                            </div>
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-3"> <?php echo display('description')?> </label>
                            <div class="col-md-7">
                            <textarea name="description" class="form-control" cols="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"> <?php echo 'Tax(%)'?> </label>
                            <div class="col-md-7">
                                <input type="number" name="tax" class="form-control" >
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="control-label col-md-3"><?php echo 'Service Type'?></label>
                            <div class="col-md-7">
                                <input type="text" name="model" class="form-control"> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                            </div>
                        </div>

                   <?php echo form_close();?>
                </div>
            </div>
        </div>

	    </div>  

    </section>
</div>







