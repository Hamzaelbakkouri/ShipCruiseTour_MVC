<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row mb-5">
    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Add Cruise</h2>
        <p>Enter The Cruise Details</p>
        <form method="post" enctype="multipart/form-data">
        <div>
            <div class="form-group">
              <label>Image: <sup>*</sup></label>
              <input type="file" name="image" class="form-control form-control-lg" required>
            </div>
            <div class="form-group">
              <label>Title: <sup>*</sup></label>
              <input type="text" name="title" class="form-control form-control-lg" required>
            </div>

            <div lass="form-group">
              <label>Ship: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="ship" name="ship">
              <?php
                foreach ($data['ship'] as $key) {
              ?>
                <option value="<?= $key->idship ?>"><?= $key->name ?></option>
              <?php } ?>
              </select>
            </div>
            
            <div class="form-group">
              <label>Departure Date:<sup>*</sup></label>
              <input type="date" name="departuredate" class="form-control form-control-lg" required>
            </div>
            <!-- <div class="form-group">
              <label>Departure Port: <sup>*</sup></label>
              <input type="text" name="departureport" class="form-control form-control-lg" required>
            </div> -->


            <div lass="form-group">
              <label>Departure Port: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="departureport" name="departureport">
              <?php
                foreach ($data['product'] as $key) {
              ?>
                <option value="<?= $key->idport ?>"><?= $key->name ?> | <?= $key->country ?></option>
              <?php } ?>
              </select>
            </div>
            <div lass="form-group">
              <label>Destination: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="destination" name="destination">
              <?php
                foreach ($data['product'] as $key) {
              ?>
                <option value="<?= $key->name ?> | <?= $key->country ?>"><?= $key->name ?> | <?= $key->country ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Duration: <sup>*</sup></label>
              <input type="text" name="duration" class="form-control form-control-lg" required>
            </div>
            <div lass="form-group">
              <label>Itinerary: <sup>*</sup></label>
              <select class="form-control form-control-lg" id="itinerary" name="itinerary[]" type="checkbox" multiple>
              <?php
                foreach ($data['product'] as $key) {
              ?>
                <option value="<?= $key->name ?> | <?= $key->country ?>"><?= $key->name ?> | <?= $key->country ?></option>
              <?php } ?>
              </select>
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