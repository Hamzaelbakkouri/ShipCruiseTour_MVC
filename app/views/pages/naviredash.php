<?php require APPROOT . '/views/inc/header2.php'; ?>
<?php require APPROOT . '/views/inc/pagination.php'; ?>
<h1 class="text-light row d-flex justify-content-center">navire</h1>
<div class="mt-5">

</div>
<a class="btn btn-primary" href="<?php echo URLROOT; ?> /dashboard/addship">+</a>
<table class="table table-dark mt-5 ">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>ite</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
      <a href="" class="link-danger"><i class="bi bi-pencil-square"></i></a>
      <a href="" class="link-danger"><i class="bi bi-trash-fill"></i></a>
      </td>
    </tr>
  </tbody>
 
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>