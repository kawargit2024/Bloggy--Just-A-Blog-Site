<?php
require_once '../config/dbcon.php';
$gInfo = mysqli_query ( $db_conn, "SELECT * FROM `ginfo_table` WHERE `status` = 1");

	if(isset($_POST['save'])){
	$title = $_POST['title'];
	$stitle = $_POST['stitle'];
	$desc = $_POST['desc'];
    $status = $_POST['status'];
	// $hero_banner = $_POST['image'];

	if(isset($_FILES["image"]["name"])){

		$hbanfile = $_FILES["image"]["name"];
		$file_sep = explode('.', $hbanfile );
		$file_end = end($file_sep);
		$hero_banner = date("Ydmhis.").$file_end;

	} else {
        echo $hero_banner = '../assets/img/profile.png';
    }

	$result = mysqli_query( $db_conn, "INSERT INTO `ginfo_table`( `title`, `subtitle`, `description`,`herobanner`,`status`) VALUES ( '$title','$stitle','$desc','$hero_banner', '$status')");

	if($result){
		move_uploaded_file($_FILES["image"]["tmp_name"], '../uploads/posts/'. $hero_banner);
		$dataSuccessSms = "Data saved successfully";
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
            <h1 class="fw-bolder font-weight-bold"> Site General Info  </h1>
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
                    value="<?php echo isset ( $_POST['title']) ? $_POST['title'] : '';?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Site Sub Title </strong>
                    </label>
                    <input type="text" name="stitle" id="stitle" class="form-control" 
                    value="<?php echo isset ( $_POST['stitle']) ? $_POST['stitle'] : '';?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                        <strong> Site Description </strong>
                    </label>
                    <input type="text" name="desc" id="desc" rows="10" class="form-control" 
                    value="<?php echo isset ($_POST['desc']) ? $_POST['desc'] : '';?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> <strong> Site Hero Banner </strong></label>
                </br>
                    <input type="file" name="image" id="image" class="" 
                    value="<?php echo isset ( $hero_banner ) ? $hero_banner : '../assets/img/default.jpg';?>">
                </div>
                <div class="mb-3 mb-2">
                    <label for="" class="form-label"> 
                      <strong>Status </strong>
                    </label></br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="status" type="checkbox"  value="1" id="active">
                        <label class="form-check-label" for="active"> Active </label>
                    </div>  
                    <div class="form-check  form-check-inline">
                        <input class="form-check-input" name="status" type="checkbox" value="0" id="inactive"> 
                        <label class="form-check-label" for="inactive"> Inactive </label>
                    </div>
                </div>
                </br>
                <button type="submit" class="btn btn-primary mb-4" name="save"> Save Info </button>
           </form>
      </div>
    </div>
</div>
