<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../app/Views/images/logo.png" type="image/x-icon">
    <title>Luxury Gems</title>
    <link rel="stylesheet" href="../app/Views/css/bootstrap.css">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="../app/Views/css/style.css" rel="stylesheet" />
    <script src="../app/Views/bootstrap-5.2.2-dist/js/bootstrap.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav style="background-color:black; display:flex; justify-content:space-between; margin-bottom: 10px; padding-left:25%;" class="res navbar navbar-expand-lg bg-dark">
      <form style="width: 65%;" class="d-flex" role="search" method="POST">
        <input class="form-control me-3" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <a style="background-color: rgba(248, 181, 58, 1) ; color:white; margin:5px; margin-right:30px; width:120px;" href="disconnect" class="disconnect">disconnect</a>
</nav>
<div>
    <a href="addNew" class="btn btn-outline-warning mb-3">ADD PRODUCT</a>
    
</div>
<table class="table table-light table-striped table-hover text-center">
  <thead class="table-light">
    <tr>
      <th scope="col">Action</th>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">PRICE</th>
      <th scope="col">QUANTITE</th>
      <th scope="col">CATEGORY</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
    while($row = mysqli_fetch_assoc($resultat)){

?>
<tr><td>
        <a href="editpage?id-product=<?php echo $row['id-product'] ?>" class="link-warning"><i class="fa-solid fa-pen-to-square fs-6 me-3"></i></a>
      
        <a href="delete?id-product=<?php echo $row['id-product'] ?>" class="link-warning"><i class="fa-solid fa-trash fs-6 me-3"></i></a>
      </td>
      
      <td><?php echo $row['id-product'] ?></td>
      <td><?php echo $row['label'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
       <td> <?php
                $cat=$row['id-category'];
                $ret=$test->aff($cat);
                foreach ($ret->fetch_all(MYSQLI_ASSOC) as $row) {
                ?>
                      <?php echo $row['label']; ?>
                <?php } ?></td>
     
    
      
    </tr>
<?php
   }
?>
    
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2
.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>