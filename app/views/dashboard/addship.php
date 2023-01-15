<?php require APPROOT . '/views/inc/headregi.php'; ?>
<div class="mt-5">
    k
</div>
<form action="<?php echo URLROOT; ?>/Navire/addship" method="post">
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">

            <div class="col-md-6">


                <div class="card px-5 py-5">
                    <h2>add ship</h2>

                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="name" name="name_ship" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="number" class="form-control" placeholder="ROOM" name="num_room" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="number" class="form-control" placeholder="NUM PLACE" name="num_place" required>

                    </div>
                    <button class="btn btn-primary mt-4 signup" name="">add</button>



                </div>



            </div>

        </div>
    </div>

</form>