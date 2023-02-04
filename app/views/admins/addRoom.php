<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Add Room</h2>
        <p>Enter Room Details</p>
        <form method="post" enctype="multipart/form-data">
        <div>
            <div lass="form-group">
              <label>Ship Name: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="ship" name="shipname">
              <?php
                foreach ($data['product'] as $key) {
              ?>
                <option value="<?= $key->idship ?>"><?= $key->name ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Room number: <sup>*</sup></label>
              <input type="number" name="roomnumber" class="form-control form-control-lg" required>
            </div>
            <div lass="form-group">
              <label>Room Type: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="type" name="roomtype">
              <?php
                foreach ($data['type'] as $key) {
              ?>
                <option value="<?= $key->idtype ?>"><?= $key->type ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Price: <sup>*</sup></label>
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