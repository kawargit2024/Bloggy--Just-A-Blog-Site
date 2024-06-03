<?php
ob_start();
if( isset( $_GET['edit'] ) ){
    $id = $_GET['edit']; 
  $gInfo = mysqli_query($db_conn, "SELECT * FROM `ginfo_table`"); 

  //var_dump($gInfo); 
  $row = mysqli_fetch_assoc($gInfo);

} 


if(isset($_POST['update'])){
    $title = $_POST['title'];
    $stitle = $_POST['stitle'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];
    if(isset($_FILES["image"]["name"])){
        $hbanfile = $_FILES["image"]["name"];
        $file_sep = explode('.', $hbanfile );
        $file_end = end($file_sep);
        $hero_banner = date("Ydmhis.").$file_end;

    } 

    // data save or error massage /
    $result = mysqli_query( $db_conn, "UPDATE `ginfo_table` SET `title`='$title',`subtitle`='$stitle',
        `description`='$desc',`status`='$status',`herobanner`='$hero_banner'  WHERE id = $id" );

    if($result){
       move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/'. $hero_banner);
        $dataSuccessSms = "Data saved successfully";
        header("location:index.php?page=manage-site-info");
    } else {
         $dataFailSms = "Data saved Falied";
    }

}

?>



<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">

        <?php
	        if(isset($dataSuccessSms)){
	        	echo '<div class="alert alert-success" role="alert">' .$dataSuccessSms.' </div>';
	        } else if(isset($dataFailSms)){
	        	echo '<div class="alert alert-success" role="alert">' .$dataFailSms.' </div>';
	        }
        ?>
         
        </div>
        <div class="text-center my-5">
            <h1 class="fw-bolder font-weight-bold"> Update Site Info  </h1>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
            <form method="post" enctype="multipart/form-data" class="form-wrapper  mb-4">
             <div class="mb-3 mb-2">
                <label for="" class="form-label"> 
                    <strong> Site Title </strong>
                </label>
                <input type="text" name="title" id="title" class="form-control" 
                    value="<?php echo isset( $row['title']) ? $row['title'] : ''?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Site Sub Title </strong>
                    </label>
                    <input type="text" name="stitle" id="stitle" class="form-control" 
                    value="<?php echo isset( $row['subtitle']) ? $row['subtitle'] : '';?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Site Description </strong>
                    </label>
                    <input type="text" name="desc" id="desc" rows="10" class="form-control" 
                    value="<?php echo isset( $row['description']) ? $row['description'] : '';?>">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="status" type="checkbox"  id="active" 
                    <?php echo $row['status'] == '1' ? 'checked' : '' ?> value="1">
                    <label class="form-check-label" for="active"> Active </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" name="status" type="checkbox"  id="inactive" 
                    <?php echo $row['status'] == '0' ? 'checked' : '' ?> value="0">
                    <label class="form-check-label" for="inactive"> InActive </label>
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> <strong> Site Hero Banner </strong></label>
                </br>
                    <input type="file" name="image" id="image" class="" 
                    value="<?php echo isset( $row['herobanner']) ? $row['herobanner'] : '';?>">
                </div>
                </br>
                <button type="submit" class="btn btn-primary mb-4" name="update"> Update Info </button>
           </form>
      </div>
    </div>
</div>