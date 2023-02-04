<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-5">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5 bg-dark text-white">
      <h2>Add Room Type</h2>
      <p>Enter The Room Type</p>
      <form method="post" enctype="multipart/form-data">
        <div>
          <div class="form-group">
            <label>Room Type:</label>
            <input type="text" name="type" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label>Capacity:</label>
            <input type="number" name="capacity" class="form-control form-control-lg" required>
          </div>
          <div class="form-group">
            <label>Price: </label>
            <input type="number" name="price" class="form-control form-control-lg" required>
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