
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <!--  form area -->
        <div class="col-sm-12">

            <?php 
                $mag = $this->session->flashdata('exception');
              if($mag !=''){
                    echo '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                         <strong>'.$mag.'</strong>
                    </div>';
                }
            ?>


            <div  class="panel panel-bd panel-form">
                <div class="panel-heading">
                    <div ><a href="<?php echo base_url();?>create_new_patient" class="btn btn-success pull-right">Create New Patient</a></div>
                    <div class="panel-title" >
                        <h4>Create Appointment </h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="portlet-body form">

                    
                    <?php 
                        $attributes = array('class' => 'form-horizontal','target'=>'_blank','name'=>'p_info');
                        echo form_open('admin/Appointment_controller/save_appointment', $attributes);                
                    ?>

                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label"> Phone </label>
                                <div class="col-md-5">
                                    <input type="text" onkeyup="loadName()" name="phone" id="phone" class="form-control" required autofocus> 
                                    <span class="error-msg patient_name"> </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo display('date')?> :</label>
                                <div class="col-md-5">
                                   <input type="text" id="date" value="<?php echo set_value('date'); ?>" name="date" class="form-control datepicker3"  placeholder="<?php echo display('date_placeholder')?>" autocomplete="off" required>
                                    <span class="error-msg"><?php echo form_error('date'); ?> </span>
                                 </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label "> Reciever/Midwife </label>
                                <div class="col-md-5">
                                    <select class="form-control doctor_id" id="doctor_id" onchange="loadSchedul(this.value);" name="doctor_id"  required>
                                        <option value="">--Select Midwife--</option>
                                        <?php foreach ($doctor as $value) {
                                            echo '<option value="'.$value->doctor_id.'">'.$value->doctor_name.'</option>';
                                        }?>
                                    </select>
                                    <span class="error-msg"><?php echo form_error('doctor_id'); ?> </span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label"><?php echo 'Select Schedule'?> :</label>
                                <div class="col-md-5 schedul"> </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Note:</label>
                                <div class="col-md-5">
                                     <textarea name="problem" class="form-control" rows="3">
                                     </textarea>
                                      <!-- <span class="error-msg"><?php echo form_error('problem'); ?> </span> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                    <button type="submit" disabled class="btn btn-success"><?php echo display('appointment')?></button>
                                </div>
                            </div>
                          </div>  
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>            
    </section>
</div>

<style type="text/css">
    .p_name{
        color:red;
    }
</style>


<!-- E CHANGE OG FALSE ANG LAST CONDITION(132) ARUN MA FIX ANG BUTTON THEN CHANGE OG SUBMIT ANG TYPE BELOW SA FIRST RESET(91) -->
<script>
    // load patient name
    function loadName(){          
        var phone = document.getElementById('phone').value;

        if (phone!='') {

            $('button[type=submit]').prop('disabled', true);

            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/get_patinet_name/'+phone.trim(),
                'type': 'GET', //the way you want to send data to your URL
                'data': {'phone': phone },
                'success': function(data) { 
                    var container = $(".patient_name");
                    if(data==0){
                        container.html("<?php echo display('patient_name_load_msg')?>");
                    }else{ 
                        container.html(data);
                        $('button[type=submit]').prop('disabled', false);
                    }
                }
            });
        };
    }

// load load schedul
    function loadSchedul(){
        var doctor_id = $('#doctor_id').val();
        var date     = $('#date').val();
        
        if (doctor_id!='') {
            $.ajax({ 
                // 'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/get_schedul/'+doctor_id.trim(),
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/get_schedul/'+doctor_id+'/'+date,
                'type': 'GET', //the way you want to send data to your URL
                'data': {'doctor_id': doctor_id },
                'success': function(data) {
                    var container = $(".schedul");
                    container.html(data);
                }
                });
            };
        }

// sequence uncion
    function myBooking(data){
        var id = $("#t_" + data).text();
       document.getElementById("msg_c").innerHTML = "<div style=' color:green; font-size:20px;'><?php echo display('book_sequence')?> " +id +"</div>";
       document.getElementById('serial_no').value = id;        
    }     

</script>