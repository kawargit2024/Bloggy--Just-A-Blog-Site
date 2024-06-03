<?php
 $result = mysqli_query($db_conn, "SELECT `posts_table`.*,`user_table`.`name`,`categories_table`.`name` AS `cat_name` FROM `posts_table` 
 	   INNER JOIN `user_table` ON `posts_table`.`user_id` = `user_table`.`id` 
 	   INNER JOIN `categories_table` ON `posts_table`.`cat_id` = `categories_table`.`id` 
 	");

 if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $result = mysqli_query($db_conn, "DELETE FROM `posts_table` WHERE `id`= '$id'");

   if($result){ ?>
   <script>
      alert('Post Delete Success');
      window.location.href = 'index.php?page=manage-post';
   </script>
   <?php }
 }
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h1 class="m-0 font-weight-bold text-default"> Manage Posts Page</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th> Post Name </th>
                        <th> Category Name </th>
                        <th> Slug </th>
                        <th> Post Content </th>
                        <th> Post Image </th>
                        <th> Status </th>
                        <th> Author </th>
                        <th> Post Date&Time </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                  <td><?php echo $row["title"];?></td>
                  <td><?php echo $row["cat_name"];?></td>
                  <td><?php echo $row["slug"];?></td>
                  <td><?php echo $row["content"];?></td>
                  <td><img width="100px" height="auto" src="../uploads/posts/<?php echo $row["image"] ? $row["image"] : '';?>"></td>
                  <td class="text-center font-weight-bold">
                  <span class="text-<?php echo getStatusColor($row["status"]);?>">
                  <?php echo getStatus($row["status"]);?>
                  </td>
                  <td><?php echo $row["name"];?></td> 
                   <td><?php echo $row["created_at"];?></td> 
                  <td>
                  <a href="?page=manage-post&&delete=<?php echo $row["id"]?>" class="btn btn-danger"> DeletePost </a>
                  </hr>
                  <a href="?page=edit-post&&edit=<?php echo $row["id"]?>" class="btn btn-info"> 
                    Edit  Post
                  </a>
                  </td>                               
                </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
