<?php require APPROOT . '/views/inc/headregi.php'; ?>
<div class="mt-5">
  k
</div>
<form action="<?php echo URLROOT; ?>/users/register" method="post">
<div class="container mt-5 mb-5">

  <div class="row d-flex align-items-center justify-content-center">

    <div class="col-md-6">


      <div class="card px-5 py-5">
        <h2>sign up</h2>


        <div class="form-input">


          <i class="fa fa-envelope"></i>
          <input type="text" class="form-control" placeholder="Email address" name="emailregi" required>

        </div>

        <div class="form-input">

          <i class="fa fa-user"></i>
          <input type="text" class="form-control" placeholder="User name" name="nameregi" required>

        </div>


        <div class="form-input">

          <i class="fa fa-lock"></i>
          <input type="password" class="form-control" placeholder="password" name="passregi" required>

        </div>


        <button class="btn btn-primary mt-4 signup" name="submit">submit</button>

      </div>



    </div>

  </div>

</div>
</form>