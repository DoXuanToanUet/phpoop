<?php include 'header.php'; ?>
<?php 
    include 'classes/Register.php';
    $re = new Register();

    // if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $show = $re->allStudent();
        // showdata($show);
    // }
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<?php 
    if (isset($show)){
        ?>
            <div class="alert alert-<?//= $show['class'];?>" role="alert">
             <?php //echo $show['msg'];?>
            </div>
        <?php 
    }
?>

<a href="addstudent.php" class="btn btn-primary" >Add Student</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php 
            foreach ($show as $key => $student) {
                # code...
                $key++;
                ?>
                    <tr>
                        <th scope="row"><?= $key;?></th>
                        <td><?= $student['name'];?></td>
                        <td><?= $student['email'];?></td>
                        <td><?= $student['phone'];?></td>
                        <td><?= $student['address'];?></td>
                        <td>
                            <img width="100"  height="100" style="object-fit:cover" src="<?php echo $protocol . $_SERVER['HTTP_HOST'].'/'.$student['photo'] ?>" alt="">
                            <?//= $student['photo'];?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $student['id'];?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $student['id'];?>" class="btn btn-primary">Delete</a>
                        </td>
                        
                    </tr>
                <?php
            }
        ?>
  </tbody>
</table>
<?php include 'footer.php'; ?>
