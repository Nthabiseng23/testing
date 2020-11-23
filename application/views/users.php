

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Profile Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  </head>
  <body>
  <br/><br/>

  <?php
  if($type != 1){
    echo '<div class="container">
            <div class="row">
                <div class="col-md-12 alert alert-danger">
                    You are not allowed to view this page.</br/>
                    <a href="/testing/user/login_user">Go Back</a>
                </div>
            </div>
        </div>';
    die();
  }
?>
 
  <h1 class="text-center">Registered users</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <tr>
              <th>User Name</th>
              <th>E-mail address</th>
            </tr>
            <?php foreach($users as $user) :?>
            <tr>
              <td><?=$user->user_name?></td>
              <td><?=$user->user_email?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    <a href="<?= base_url('user/login_user');?>" class="btn btn-primary ">Back</a>
    </div>
  </body>
</html>
