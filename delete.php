<?php include 'header.php'; ?>
<?php 
    include 'classes/Register.php';

   
    if( isset($_GET['id']) ){
        $id = $_GET['id'];
        $re = new Register();
        $del = $re->delStudent($id);
        showdata($del);
    }

    header('Location: index.php');
    
?>