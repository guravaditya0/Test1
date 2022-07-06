<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CodeIgniter Signup with Email Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
        body {
            background-color: #eee;
        }  

        div.scrollmenu {
                background-color: #333;
                overflow: auto;
                white-space: nowrap;
        }

        div.scrollmenu a {
                display: inline-block;
                color: white;
                text-align: center;
                padding: 14px;
                text-decoration: none;
        }

        div.scrollmenu a:hover {
                background-color: #777;
        }

        *[role="form"] {
            max-width: 530px;
            padding: 15px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 0.3em;
        }

        *[role="form"] h2 {
            margin-left: 5em;
            margin-bottom: 1em;
        }

    </style>
<body>
<div class="container">
	<h1 class="page-header text-center">CodeIgniter Signup with Email Verification</h1>
	<div class="row">
		<div class="col-sm-4">
			<?php
		    	if(validation_errors()){
		    		?>
		    		<div class="alert alert-info text-center">
		    			<?php echo validation_errors(); ?>
		    		</div>
		    		<?php
		    	}
 
				if($this->session->flashdata('message')){
					?>
					<div class="alert alert-info text-center">
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<?php
					unset($_SESSION['message']);
				}	
		    ?>
		<h3 class="text-center">Signup Form</h3>
        <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" id="uploadform" name="uploadform" method="POST" action="SITE_PATH./user/register">
      <div class="form-group">
					<label for="email">Email:</label>
					<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>">
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm Password:</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" value="<?php echo set_value('password_confirm'); ?>">
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
            </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
     $( document ).ready(function() {
          setTimeout(function() {
               $('#myModal').modal("show");
          }, 2000);

          //$('#myModal').modal("show");

          $("#btnSave").on('click', function(e){
 				e.preventDefault();

 				var formData = new FormData($("#uploadform")[0]);

 				$.ajax({
 					type: "POST",
 					url: "<?php echo SITE_PATH."User/register"?>",
 					dataType: 'json',
 					data: formData,
 					cache: false,
                         processData: false,
                         contentType: false,
 					success: function (res) {
						var dataResult = JSON.parse(JSON.stringify(res));
 						if (dataResult.status == 200) {
 							alert('User Registered Successfully');
							//window.location.replace("<?php //echo base_url(''); ?>");
 						}
 						else{
 							alert('An Error Occurred! Try again Later');
 						}
 					}
 				});
 			});
     });
</script>
</body>
</html>