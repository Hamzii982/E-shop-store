
<div class="container">
    <div class="main">
      <center>
    <div class="card maind" style="text-align:center; width:450px; margin-top:50px; margin-bottom:50px;">
  <div class="card-body">
    <h3 class="card-title">User Login</h3><hr>
        <form method='post' action="<?=base_url('LoginController/getuser');?>">
        <div style="padding-top:70px;">
        <h5 style='text-align:left;'>Email:</h5>
        <input type='text' style=" width:420px;" name='Email'  placeholder='Enter your Email' required><br>
</div>
        <div style="padding-top:20px;">
        <h5 style='text-align:left;'>Password:</h5>
        <input type='password' style=" width:420px;" name='Password' placeholder='Enter your Password' required><br>
        </div>
        <div style="padding-top:40px;">
        <input type='submit' class="btn btn-primary" name='Submit' value='Login'>
        </div>
        <div style="margin-top:20px;">
            <h6>Or Get Your self <a href="<?=base_url('LoginController/register')?>">Register</a></h6>
        </div>
        </form>
</div>
</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

