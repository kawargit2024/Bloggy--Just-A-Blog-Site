<?php
 // add category from database in category_table for post
 $categories  = mysqli_query($db_conn,"SELECT `id`,`name` FROM `categories_table` WHERE `status` = 1");

if( isset($_POST['save'] ) ){

    $cat_id   =  $_POST['cat_id'];
    $title    =  $_POST['title'];
    $slug     =  $_POST['slug'];
    $content  =  $_POST['content'];
    $status   =  $_POST['status'];
    $user_id  =  $_SESSION['u_id'];

  if(isset($_FILES["image"]["name"])){
    $file = $_FILES["image"]["name"];
    $fileSep = explode('.', $file); // separate file //
    $file_ext = end($fileSep); // get file extension ( png or jgp ) //
    $file_name = date('Ydmhis.').$file_ext; // current file name //
  } else {
    echo $file_name = 'add image';
  }
 
  
  
    // insert data from database for post_table //
    $result = mysqli_query($db_conn,"INSERT INTO `posts_table`(`cat_id`, `title`, `slug`, `content`, `image`, `status`,`user_id`) VALUES ('$cat_id','$title','$slug','$content','$file_name','$status','$user_id')");

    // data save or error massage //
    if( $result ){
        move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/'.$file_name);
        $dataSuccessSms = "Data saved successfully";
    } else {
        $dataErrorSms = "Data failed to save";
    }
}


// echo $file_name;
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
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
            <h1 class="fw-bolder font-weight-bold"> Add Post Page </h1>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container mb-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <form method="post" action="" class="form-wrapper" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cat_id" class="form-label"> 
                    <strong> Select Category </strong>
                </label>
                <select name="cat_id" id="cat_id" class="form-control" required>
                  <option value="">Select Category</option>
                    <?php foreach($categories  as $category) { ?>
                    <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                    <?php } ?>
                </select>	
                <span class="error">
                    <?php echo isset($error['cat_id']) ? $error['cat_id'] : "";?>
                </span>
            </div>
			<div class="mb-3">
                <label for="" class="form-label"> 
                    <strong>Type Post Title</strong>
                </label>
                <input type="text" name="title" id="title" class="form-control" 
                    value="<?php echo isset($title) ? $title : '';?>">
                <span class="error">
                    <?php echo isset($error['title']) ? $error['title'] : "";?>
                </span>
             </div>
            <div class="mb-3">
            <label for="" class="form-label"> <strong> Post Slug</strong></label>
            <input type="text" name="slug" id="slug" class="form-control" value="<?php echo isset($slug) ? $slug : '';?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> <strong> Insert Image</strong></label>
            </br>
                <input type="file" name="image" id="image" class="">
            </div>
             <div class="mb-3">
            <label for="" class="form-label"> <strong> Type Post Description</strong></label>
            </br>
            <textarea class="content form-control" name="content" id="editor" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"> <strong>Status </strong></label></br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="status" type="checkbox" value="1" id="activecheckbox">
                    <label class="form-check-label" for="activecheckbox"> Active </label>
                </div>
                <div class="form-check  form-check-inline">
	                <input class="form-check-input" name="status" type="checkbox" value="0" id="inactivecheckbox">
	                <label class="form-check-label" for="inactivecheckbox"> Inactive </label>
	                <span class="error"> <?php echo isset($error['status']) ? $error['status'] : "";?> </span>
                </div>
            </div>
            </br>
            <button type="submit" class="btn btn-primary" name="save"> Add Post </button>
        </form>
      </div>
    </div>
</div>





