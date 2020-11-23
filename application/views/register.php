<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration-CI</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

  </head>
  <body>
  <br/><br/>

  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h1 class="panel-title" style="font-size: 25px ! important;">Registration</h1>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>

                      <form form="myForm" method="post">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Name" id = "user_name" name="user_name" type="text" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" id="user_email" name="user_email" type="email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" id="user_password" name="user_password" type="password" value="">
                              </div>

                              <a class="btn btn-lg btn-success btn-block" id="submit" name="submit" >Register</a>
                                <br/>
                              <a class="btn btn-lg btn-info btn-block" href="<?php echo base_url('user/login_view'); ?>">Login here</a>
                          </fieldset>
                      </form>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
  </body>
</html>

<script type="text/javascript">
	
	$("#submit").click(function(e){
		
        var name = $('#user_name').val();
        var email_address = $('#user_email').val();
        var password = $('#user_password').val();
        
		if(name == ""){
			bootbox.alert("<strong>Error!</strong> Please enter your name.");
			return;
		}

		if(email_address == ""){
			bootbox.alert("<strong>Error!</strong> Please enter your email-address.");
			return;
		}

		if(email_address != "" && !(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email_address))){
			bootbox.alert("You have entered an invalid email address!");
			return;
		}

        if(password == ""){
			bootbox.alert("<strong>Error!</strong> Please enter your password.");
			return;
		}

		$.post("<?=base_url('/index.php/user/register_user')?>",
		{
            name: name,
            email_address: email_address,
			password: password
		});

        window.location.href = "<?=base_url('/index.php/user/login_view')?>";

	});

</script>