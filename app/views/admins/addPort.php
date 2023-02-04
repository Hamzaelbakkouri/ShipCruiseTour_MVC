<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-5 ">
  <div class="col-md-6 mx-auto ">
    <div class="card card-body bg-light mt-5 bg-dark text-white">
      <h2>Add Port</h2>
      <p>Enter The Ship Details</p>
      <form method="post" enctype="multipart/form-data">
        <div>
          <div class="form-group">
            <label>Port Name:</label>
            <input type="text" name="portname" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label>Country:</label>
            <input type="text" name="country" class="form-control form-control-lg" required>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <input type="submit" value="Submit" class="btn btn-primary btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>