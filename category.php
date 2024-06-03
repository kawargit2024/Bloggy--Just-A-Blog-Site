<?php 
require_once 'header.php';

if(isset($_GET['category'])){
 //echo $_GET['category'];
$slug = $_GET['category'];
//echo $slug;
 $result = mysqli_query($db_conn, "SELECT `id`,`name` FROM `categories_table` WHERE `slug`= '$slug'");
 $row = mysqli_fetch_row($result);
 // echo "<pre>";
 // var_dump($row);
 // echo "</pre>";
 $id = $row['0'];
 //echo $id;
 $posts = mysqli_query($db_conn ,"SELECT  `posts_table`.*,`user_table`.`name` 
    FROM `posts_table`,`user_table` 
    WHERE `posts_table`.`user_id` = `user_table`.`id`  AND `posts_table`.`cat_id`= '$id' AND 
 	`posts_table`.`status` = '1' 
    ORDER BY `posts_table`.`id` ASC ");
}

//var_dump($posts);
//$num_rows = mysqli_fetch_assoc($posts);
//var_dump($num_rows['image']);


?>

<section class="page-header py-5" 
   style="background-color:#222222 ;">
    <div class="container py-5">
        <div class="row py-5">
             <div class="col-md-12 py-5 text-center">
           <h1 style="font-size:5rem;" class="fw-bolder mb-1"><?php echo 'Category: '. $row['1']?></h1>
            </div>
        <div>
    <div>
   </section>

        <!-- Page content-->
        <div class="container py-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php foreach($posts as $post){ ?>
                        <div class="card mb-4">
                            <a href="post.php?post=<?php echo $post['slug'];?>">
                                <img class="card-img-top" src="uploads/posts/<?php echo $post['image'] == '' ? 'default.jpg' : $post['image'] ;?>" 
                                alt="" /></a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <strong><?php echo date('M d, Y', strtotime($post['created_at']));?></strong></div>
                                    <h2 class="card-title"><?php echo $post['title'];?></h2>
                                <p class="card-text mb-4"><?php echo substr($post['content'], 0,200);?>...</p>
                                <a class="btn btn-default" href="post.php?post=<?php echo $post['slug'];?>">Read more →</a>

                            </div>
                        </div>
                    <?php } ?>
                    <?php 
                       if(mysqli_num_rows($posts) == 0){
                             echo "<h1> No Post Found </h1>";
                       } 
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <?php require_once 'sidebar.php';?>
                </div>
            </div>
        </div>
        
        <?php require_once 'footer.php';?>
