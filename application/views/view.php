<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<?php echo link_tag('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css'); ?>

	<script src="<?php echo base_url('https://code.jquery.com/jquery-1.11.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'); ?>"></script>
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

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<h3>Employee Add</h3>
			<hr>
			<form method="POST" action="<?=base_url()?>employee/save" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-4"><b>Employee Name</b>
						<?php echo form_input(['name'=>'emp_name','class'=>'form-control','value'=>set_value('emp_name')]); ?>
						<?php echo form_error('emp_name',"<div style='color:red'>","</div>"); ?>
					</div>
				</div>
			
				<div class="row">
					<div class="col-md-4"><b>Email</b>
						<?php echo form_input(['name'=>'email_address','class'=>'form-control','value'=>set_value('email_address')]); ?>


					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Phone</b>
						<?php echo form_input(['name'=>'phone_no','class'=>'form-control','value'=>set_value('phone_no')]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Salary </b>
						<?php echo form_input(['name'=>'salary','class'=>'form-control','value'=>set_value('salary')]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"><b>Department</b>
						                 

					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<?php echo form_submit(['name'=>'insert','value'=>'Submit']); ?>
					</div>
				</div>

				
			</form>
						





		</div>
		</div>
		
		
	</div>

</body>
<script type="text/javascript">
	$(function() {
	 	$( "#datepicker" ).datepicker();
	}
</script>
</html>