<?php
  $user_id=$this->session->userdata('user_id');
  if(!$user_id){
    redirect('user/login_view');
  }
?>

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
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <tr>
              <th colspan="2"><h4 class="text-center">User Information</h3></th>
            </tr>
            <tr>
              <td>User Name</td>
              <td><?=$this->session->userdata('user_name'); ?></td>
            </tr>
            <tr>
              <td>User Email</td>
              <td><?=$this->session->userdata('user_email');  ?></td>
            </tr>
          </table>
        </div>
      </div>
    <a href="<?= base_url('user/user_logout');?>" class="btn btn-primary ">Logout</a>
    <?php if($this->session->userdata('type') == 1) :?>
        | <a href='<?=base_url('user/user_list');?>' class='btn btn-primary'>Members list</a>
    <?php endif; ?>
    </div>
  </body>
</html>
