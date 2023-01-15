<?php require APPROOT . '/views/inc/headregi.php'; ?>
<div class="mt-5">
    kk
</div>
<form action="<?php echo URLROOT; ?>/Ports/addport" method="post">
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">

            <div class="col-md-6">


                <div class="card px-5 py-5">
                    <h2>add port</h2>

                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="add port" name="pays" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="place" name="nom" required>

                    </div>
                    <button class="btn btn-primary mt-4 signup " name="submit_port">add</button>



                </div>



            </div>

        </div>
    </div>

</form>