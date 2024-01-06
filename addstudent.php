<?php include 'header.php'; ?>
<?php 
    include 'classes/Register.php';
    $re = new Register();

    if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $register = $re->addRegister($_POST,$_FILES);
    }
?>
<?php 
    if (isset($register)){
        ?>
            <div class="alert alert-<?= $register['class'];?>" role="alert">
             <?php echo $register['msg'];?>
            </div>
        <?php 
    }
?>
<a href="index.php" class="btn btn-primary" >All Student</a>
<form action="" method="post"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone </label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
<?php include 'footer.php'; ?>
