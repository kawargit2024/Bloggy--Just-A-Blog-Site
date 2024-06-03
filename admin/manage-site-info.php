<?php
ob_start();
$gInfo = mysqli_query($db_conn, "SELECT *  FROM `ginfo_table` ");

if( isset( $_GET['delete'] ) ){
    $id = $_GET['delete']; 
    //echo $id;
    $gInfo = mysqli_query($db_conn, "DELETE  FROM `ginfo_table` WHERE `id`= $id ");

    if($gInfo){ ?>
     <script>
      // alert("Id of <?php echo $id;?> data delete success");
      window.location.href = 'index.php?page=manage-site-info';
     </script>

    <?php }
} ?>

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
    </div>
</header>

<!-- Page content-->
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h1 class="m-0 font-weight-bold text-default"> Manage Site Info Page </h1>
    </div>
    <div class="card-body text-center">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th> Title       </th>
                    <th> SubTitle    </th>
                    <th> Description </th>
                    <th> Hero Banner </th>
                    <th> Status </th>
                    <th> Action      </th>
                </tr>
            </thead>
          <tbody>
            <?php while( $row = mysqli_fetch_assoc($gInfo) ){ ?>
                <tr>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo $row['subtitle'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td>
                        <img style="width:100px" src="../uploads/posts/<?php echo isset ( $row['herobanner'] ) ? 
                        $row['herobanner'] : '../assets/img/default.jpg';?>">
                    </td>
                     <td>
                        <span class="text-
                            <?php echo getStatusColor($row['status']);?>"><?php echo getStatus( $row['status']);?>
                    </td>
                    <td>
                    <a href="?page=manage-site-info&&delete=<?php echo $row['id'];?>" class="btn btn-danger"> 
                    Delete 
                    </a>
                    <a href="?page=edit-site-info&&edit=<?php echo $row['id'];?>" class="btn btn-info"> 
                    Edit 
                    </a>
                    </td>           
                </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
    </div>
</div>