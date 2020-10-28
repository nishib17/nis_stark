<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
	
	<script src="<?php echo base_url('https://getbootstrap.com/dist/js/bootstrap.min.js'); ?>"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>Employee Add</h3>
			<hr>
			<?php
			if ($this->session->flashdata('success')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('success'); ?></p>
			<?php }
			?>
			<?php
			if ($this->session->flashdata('error')) {?>
				<p style="font-size: 18px; color: green;"><?php echo $this->session->flashdata('error'); ?></p>
			<?php }
			?>
			<?php echo validation_errors();
			$this->session->set_flashdata('errors', validation_errors());
			 ?>

			<?php echo form_open_multipart('employee/save',['name'=>'insertdata','autocomplete'=>'off']);?>
				<div class="row">
					<div class="col-md-4"><b>Employee Name</b>
						<?php echo form_input(['name'=>'emp_name','class'=>'form-control','value'=>set_value('emp_name')]); ?>
						<?php echo form_error('emp_name',"<div style='color:red'>","</div>"); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Email Address</b>
						<?php echo form_input(['name'=>'email_address','class'=>'form-control','value'=>set_value('email_address')]); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Phone</b>
						<?php echo form_input(['name'=>'phone_no','class'=>'form-control','value'=>set_value('phone_no')]); ?>
						<?php echo form_error('phone_no',"<div style='color:red'>","</div>"); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Salary</b>
						<?php echo form_input(['name'=>'salary','class'=>'form-control','value'=>set_value('salary')]); ?>
						<?php echo form_error('salary',"<div style='color:red'>","</div>"); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Department</b>
				        <br>
						<!-- <?php echo form_input(['name'=>'department','class'=>'form-control','value'=>set_value('department')]); ?> -->
						
				        <? 
				        if (isset($department) && count($department) > 0) {
				        	
					        foreach ($department as $dep) :?>
					        <!-- <input type="checkbox" name="department[]" value="<?=$dep->id?>">  -->
					        <?=form_checkbox('department_id[]', $dep->id) ?>
					        <?=$dep->name?>
					        <br />
							<? endforeach ;
						}
						?>  


					</div>
				</div>
				<div class="row">
					<div class="col-md-4" style="margin-top: 3%">
						<?php echo form_submit(['name'=>'insert','value'=>'Submit','class'=>'btn btn-primary']); ?>

						 <a href="<?php echo base_url(); ?>" name="Cancel" class="btn  btn-warning "><i class="fa fa-angle-left"></i> Cancel</a>
					</div>
					
					
				</div>

				
			<?php echo form_close();?> 
						





		</div>
		</div>
		
		
	</div>

</body>

</html>