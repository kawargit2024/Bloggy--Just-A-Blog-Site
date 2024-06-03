<?php
 $result = mysqli_query($db_conn, "SELECT `cat_table`.`id`, `cat_table`.`name` AS cat_name, `cat_table`.`slug`, 
    `cat_table`.`status`,`user_table`.`name` 
    FROM `categories_table` cat_table 
    LEFT JOIN `user_table` ON `cat_table`.`created_by` = `user_table`.`id`"
);

if( isset( $_GET['delete'] ) ){
   $id = $_GET['delete'];
   $result = mysqli_query($db_conn, "DELETE FROM `categories_table` WHERE `id`= '$id'");

   if( $result ){ ?>
   <script>
    alert('Data Delete Success');
    window.location.href = 'index.php?page=manage-category';
   </script>
   <?php }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h1 class="m-0 font-weight-bold text-default"> Manage Category Page</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row["cat_name"];?></td>
                    <td><?php echo $row["slug"];?></td>
                    <td class="text-center font-weight-bold">
                    <span class="text-<?php echo getStatusColor($row["status"]);?>">
                    <?php echo getStatus($row["status"]);?>
                    </td>
                    <td><?php echo $row["name"];?></td> 
                    <td>
                        <a href="?page=manage-category&&delete=<?php echo $row["id"]?>" class="btn btn-danger"> Delete </a>
                        <a href="?page=edit-category&&edit=<?php echo $row["id"]?>" class="btn btn-info sm"> Edit </a>
                    </td>                               
                </tr>
                    <?php } ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
