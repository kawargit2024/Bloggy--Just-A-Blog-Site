<?php
if( isset($_POST['save'] ) ){
    $name    =  $_POST['name'];
    $slug    =  $_POST['slug'];
    $status  =  $_POST['status'];
    $created =  $_SESSION['u_id'];
          
    // inset category data in database into category_table // 
    $result = mysqli_query( $db_conn,"INSERT INTO `categories_table`(`name`, `slug`, `status`, `created_by`) 
            VALUES ('$name','$slug','$status','$created')" );

    // data save or error massage //
    if( $result ){
            $dataSuccessSms = "Data saved successfully";
        } else {
            $dataErrorSms = "Data failed to save";
    }
}

?>


<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
          <?php
             if(isset($dataSuccessSms)){
               echo '<div class="alert alert-success" role="alert">
               '.$dataSuccessSms.'
               </div>';
             } else if(isset($dataErrorSms)){
                echo '<div class="alert alert-danger" role="alert">
               '.$dataErrorSms.'
               </div>';
             }
          ?>
        </div>
        <div class="text-center my-5">
            <h1 class="fw-bolder font-weight-bold"> Add Category Page </h1>
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
                    value="<?php echo isset($name) ? $name : '';?>">
                <span class="error">
                    <?php echo isset($error['name']) ? $error['name'] : "";?>
                </span>
                </div>
                <div class="mb-3">
                <label for="" class="form-label"> 
                    <strong> Category Slug</strong>
                </label>
                <input type="text" name="slug" id="slug" class="form-control" 
                    value="<?php echo isset($slug) ? $slug : '';?>">
                <span class="error">
                        <?php echo isset($error['slug']) ? $error['slug'] : "";?>
                </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label"> 
                      <strong>Status </strong>
                    </label></br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="activecheckbox">
                    <label class="form-check-label" for="activecheckbox">
                        Active
                    </label>
                </div>
                <div class="form-check  form-check-inline">
                <input class="form-check-input" name="status" type="checkbox" value="0" id="inactivecheckbox">
                <label class="form-check-label" for="inactivecheckbox">
                        Inactive
                </label>
                <span class="error"> 
                        <?php echo isset($error['status']) ? $error['status'] : "";?>
                </span>
                </div>
            </div>
            </br>
            <button type="submit" class="btn btn-primary" name="save"> 
                    Add Category 
            </button>
        </form>
      </div>
    </div>
</div>


