<?php
    session_start();
        $username=$_SESSION['username'];
        $status = $_SESSION['status'];
        if(!isset($username)){
            header("location: login.php");    
        }
?>
<div class="panel-body body1">
    <div class="panel-heading judul">
        <label>Welcome <?php echo $status; ?></label>
    </div>
</div>