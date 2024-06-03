<?php
 if(isset($_GET['edit'])){
	 $id = $_GET['edit'];

	 $result = mysqli_query($db_conn, "SELECT `title`, `slug`, `content`,`image`,`status` FROM `posts_table` WHERE `id`='$id'");
	 $row  =  mysqli_fetch_assoc($result);

	 //var_dump($row);
  }

if(isset($_POST['save'])){
    $title    =  $_POST['title'];
    $slug     =  $_POST['slug'];
    $content  =  $_POST['content'];
    $file     =  $_POST['image'];
    $status   =  $_POST['status'];
    $user_id  =  $_SESSION['u_id'];

    $update_result =  mysqli_query( $db_conn,"UPDATE `posts_table` SET `title`='$title',`slug`='$slug',
    `content`='$content',`image`='$file',`status`='$status',`user_id`='$user_id' WHERE `id`='$id'" );


   // data save or error massage //
    if( $update_result ){
        $dataUpdataSuccessSms = "Post Update successfully";
        header("location:index.php?page=manage-post");
    }

}

?>

<header class="py-5 bg-lightmb-4">
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
            <h1 class="fw-bolder font-weight-bold border-bottom"> Updata Post Page </h1>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <form method="post" class="form-wrapper  mb-4" enctype="multipart/form-data">
            <div class="mb-3 mb-2">
                <label for="" class="form-label"> 
                    <strong>Type Post Title</strong>
                </label>
                <input type="text" name="title" id="title" class="form-control" 
                    value="<?php echo $row['title'];?>">
                <span class="error">
                    <?php echo isset($error['title']) ? $error['title'] : "";?>
                </span>
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Category Slug</strong>
                    </label>
                    <input type="text" name="slug" id="slug" class="form-control" 
                        value="<?php echo $row['slug'];?>">
                    <span class="error">
                            <?php echo isset($error['slug']) ? $error['slug'] : "";?>
                    </span>
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Post Content</strong>
                    </label>
                    <input type="text" name="content" id="content" class="form-control" 
                        value="<?php echo $row['content'];?>">
                    <span class="error">
                            <?php echo isset($error['content']) ? $error['content'] : "";?>
                    </span>
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> <strong> Insert Image </strong></label>
                    <input type="file" name="image" id="image" class="" 
                        value="<?php echo $row['image'];?>">
                        <span class="error"><?php echo isset($error['image']) ? $error['image'] : "";?>
                    </span>
                </div>
                <div class="mb-3 mb-2">
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
            <button type="submit" class="btn btn-primary mb-4" name="save"> Update Post </button>
        </form>
      </div>
    </div>
</div>


