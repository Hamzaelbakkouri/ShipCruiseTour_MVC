<?php require APPROOT . '/views/inc/header2.php'; ?>
<?php require APPROOT . '/views/inc/pagination.php'; ?>
<h1 class="text-light row d-flex justify-content-center">port</h1>
<div class="mt-5 text-light">
    <?php
// var_dump($data);
    ?>
</div>
<a class="btn btn-primary" href="<?php echo URLROOT; ?> /dashboard/addport">+</a>
<table class="table table-dark mt-5 ">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">place</th>
            <th scope="col">pays</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $id = 0;
    foreach($data as $datas){
        $id += 1;
    ?>
        <tr>
            <th scope="row"><?php echo $id ?></th>
            <td><?php echo $datas['nom'] ?></td>
            <td><?php echo $datas['pays'] ?></td>
            <td>
                <!-- <a href="" class="link-danger"><i class="bi bi-pencil-square"></i></a> -->
                <a href="<?php echo URLROOT; ?> /Ports/deleteport" class="link-danger"><i
                        class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>

</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>