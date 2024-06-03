<?php

 if(isset($_GET['edit'])){
	 $id = $_GET['edit'];

	 $result = mysqli_query($db_conn, "SELECT `name`, `slug`, `status` FROM `categories_table` WHERE `id`='$id'");
	 $row  =  mysqli_fetch_assoc($result);

	 //var_dump($row);
  }

if(isset($_POST['save'])){
  $name    =  $_POST['name'];
  $slug    =  $_POST['slug'];
  $status  =  $_POST['status'];
  $created =  $_SESSION['u_id'];

  $update_result =  mysqli_query( $db_conn,"UPDATE `categories_table` SET `name`='$name',`slug`='$slug',`status`='$status',`created_by`='$created'  WHERE `id`='$id'" );

   // data save or error massage //
    if( $update_result ){
        $dataUpdataSuccessSms = "Data Update successfully";
        header("location:index.php?page=manage-category");
    }

}

?>

<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
          <?php
             if(isset($dataUpdataSuccessSms)){
               echo '<div class="alert alert-success" role="alert">
               '.$dataUpdataSuccessSms.'
               </div>';
             } else if(isset($dataUpdateErrorSms)){
                echo '<div class="alert alert-danger" role="alert">
               '.$dataUpdateErrorSms.'
               </div>';
             }
          ?>
        </div>
        <div class="text-center my-5">
            <h1 class="fw-bolder font-weight-bold"> Updata Category Page </h1>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="post" action="" class="form-wrapper">
            <div class="mb-3">
                <label for="" class="form-label"> 
                    <strong>Type Category Name</strong>
                </label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="<?php echo $row['name'];?>">
                <span class="error">
                    <?php echo isset($error['name']) ? $error['name'] : "";?>
                </span>
                </div>
                <div class="mb-3">
                <label for="" class="form-label"> 
                    <strong> Category Slug</strong>
                </label>
                <input type="text" name="slug" id="slug" class="form-control" 
                    value="<?php echo $row['slug'];?>">
                <span class="error">
                        <?php echo isset($error['slug']) ? $error['slug'] : "";?>
                </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> 
                      <strong>Status </strong>
                    </label></br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="status" type="checkbox"  id="active" 
                    <?php echo $row['status'] == '1' ? 'checked' : '' ?> value="1">
                    <label class="form-check-label" for="active"> Active </label>
                </div>
                <div class="form-check  form-check-inline">
	                <input class="form-check-input" name="status" type="checkbox" id="inactive" 
	                 <?php echo $row['status'] == '0' ? 'checked' : '' ?> value="0"> 
	                <label class="form-check-label" for="inactive"> Inactive </label>
	                <span class="error"><?php echo isset($error['status']) ? $error['status'] : "";?></span>
                </div>
            </div>
            </br>
            <button type="submit" class="btn btn-primary" name="save"> Update Category </button>
        </form>
      </div>
    </div>
</div>


