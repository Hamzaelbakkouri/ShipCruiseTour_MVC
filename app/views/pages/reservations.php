<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="container mt-5">
      <?php
          foreach ($data['product'] as $key) {
          ?>
      <div class="card text-end mt-5">
        <div class="card-header text-center">
          Featured
        </div>
        <div class="card-body d-flex">
          <img style="width:40%; height:auto" src="<?php echo URLROOT?>/uploads/<?= $key->image ?>" alt="">
          <div class="d-flex flex-column justify-content-center align-items-start">
            <h5 class="card-title"><?= $key->title ?></h5>
            <p class="card-text">Itinerary: <?= $key->itinerary ?></p>
            <p class="card-text">Departure Date: <?= $key->departuredate ?></p>
            <p class="card-text">Departure Port: <?= $key->name?> | <?= $key->country?></p>
            <p class="card-text">Destination: <?= $key->destination ?></p>
            <p class="card-text">Duration: <?= $key->duration ?></p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  See Plans
</button>
          </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form  action="">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Type:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div lass="form-group text-start">
              <label><sup</sup></label>
              <select class="form-control form-control-lg" name="reservation">
              <?php
                foreach ($data['roomType'] as $key) {
              ?>
                <option value="<?= $key->idtype ?>">Type: <?= $key->type ?> | Capacity: <?= $key->capacity?> | Price: <?= $key->price?></option>
              <?php } ?>
              </select>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
              </div>
              </form>
            </div>
          </div>
        </div>



        <!-- <div class="card-footer text-muted">
          2 days ago
        </div> -->
      </div>
      <?php } ?>

      
  </div>



<?php require APPROOT . '/views/inc/footer.php'; ?>