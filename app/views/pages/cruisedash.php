<?php require APPROOT . '/views/inc/header2.php'; ?>
<?php require APPROOT . '/views/inc/pagination.php'; ?>
<h1 class="text-light row d-flex justify-content-center">croisiere</h1>

<a class="btn btn-primary" href="<?php echo URLROOT; ?> /dashboard/addcruise">+</a>

<table class="table table-dark mt-5 ">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">cruise name</th>
            <th scope="col">room num</th>
            <th scope="col">ship num place</th>
            <th scope="col">start </th>
        </tr>
    </thead>

    <tbody>
        <?php
        // foreach(){
        ?> <tr>
            <th scope="row">1</th>
            <td>ite</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>halzaz</td>
            <a href="" class="link-danger"><i class="bi bi-pencil-square"></i></a>
            <a href="" class="link-danger"><i class="bi bi-trash-fill"></i></a>
            </td>
        </tr>
        <?php
        // }
        ?>
    </tbody>

</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>