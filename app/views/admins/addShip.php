<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Add Ship</h2>
        <p>Enter The Ship Details</p>
        <form method="post" enctype="multipart/form-data">
        <div>
            <div class="form-group">
              <label>Title: <sup>*</sup></label>
              <input type="text" name="name" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label>Rooms:<sup>*</sup></label>
              <input type="number" name="rooms" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label>Places: <sup>*</sup></label>
              <input type="number" name="places" class="form-control form-control-lg" required>
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