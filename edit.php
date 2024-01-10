<?php include 'header.php'; ?>
<?php 
    include 'classes/Register.php';
    
    if( isset($_GET['id']) ){
        $id = $_GET['id'];
      
        // showdata($edit);
    }
    $re = new Register();
    $edit = $re->getStdById($id);
    if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $register = $re->updateStudent($_POST,$_FILES,$id);
    }
   
    
    

    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
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
            <input type="text" class="form-control" name="name"  value="<?php echo $edit['name']?>" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="text" name="email" class="form-control"   value="<?php echo $edit['email']?>"id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone </label>
            <input type="text" name="phone" class="form-control"  value="<?php echo $edit['phone']?>" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Photo</label>
            <input type="file" name="photo" class="form-control"  value="<?php echo $edit['photo']?>" id="exampleInputPassword1">
            <img width="100"  height="100" style="object-fit:cover"  src="<?php echo $protocol . $_SERVER['HTTP_HOST'].'/'.$edit['photo'] ?>"/>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" name="address" class="form-control"  value="<?php echo $edit['address']?>" id="exampleInputPassword1">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
<?php include 'footer.php'; ?>
