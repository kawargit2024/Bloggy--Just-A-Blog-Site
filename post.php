<?php require_once 'header.php';
$category = mysqli_query($db_conn, "SELECT * FROM `categories_table` WHERE `status`= '1'");
if(isset($_GET['post'])){
    $slug  = $_GET['post'];
    $post = mysqli_query($db_conn, "SELECT `posts_table`.*,`user_table`.`name` FROM `posts_table` INNER JOIN `user_table` ON `posts_table`.`user_id` = `user_table`.`id` WHERE `posts_table`.`slug`= '$slug' AND `posts_table`.`status` = 1;");
    $row = mysqli_fetch_assoc($post);

     // fetch current post id with slug //
     // $result = mysqli_query($db_conn, "SELECT `id`, `title` FROM `posts_table` WHERE `slug`= '$slug' ");
     // $row_pn = mysqli_fetch_assoc($result);
    $current_post_id = $row['id'];

     // previous post result with condiiton  //
     $prev_post_result = mysqli_query($db_conn, "SELECT `slug`, `title` FROM `posts_table` WHERE `id` < '$current_post_id' ORDER BY `id` DESC ");
     // fetch previous post //
     $prev_post = mysqli_fetch_assoc($prev_post_result);

    // fetch next post result with condition //
      $next_post_result = mysqli_query($db_conn, "SELECT `slug`, `title` FROM `posts_table` WHERE `id` > '$current_post_id' ORDER BY `id` ASC ");
    // fetch next post //
    $next_post = mysqli_fetch_assoc($next_post_result);

}
?>
   
   <section class="page-header py-5" style="background-image:url(uploads/posts/<?php echo isset($row['image']) ? $row['image'] : '';?>);">
        <div class="container py-5">
            <div class="row py-5">
                <div class="col-md-10 offset-md-1 py-5">
                  <h1 style="font-size:3rem;" class="fw-bolder mb-1"><?php echo isset($row['title']) ? $row['title'] : '';?></h1>
                </div>
            </div>
        </div>
   </section>
 

        <!-- Page content-->
        <div class="container py-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-10 offset-md-1 py-5">
                     <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        
                        <header class="mb-4">
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on 
                                <?php 
                                 echo date('M d, Y', strtotime( isset ( $row['created_at'] ) ? $row['created_at'] : ''));
                                ?> 
                                by <?php echo isset ( $row['name'] ) ? $row['name'] : '';
                                ?>
                            </div>
                            <!-- Post categories-->
                            <?php foreach( $category as $c ) { ?> 
                                <a class="badge bg-secondary text-decoration-none link-light" 
                                href="category.php?category=<?php echo $c['slug']?>">
                               <?php echo isset ( $c['name'] ) ? $c['name'] : '' ?>
                               </a>
                           <?php } ?>
                        </header>
                        
                        <!-- Preview image figure-->
                        <figure class="mb-4">
                            <?php if(isset($row['image'])):?><img class="img-fluid" 
                            src="uploads/posts/<?php echo $row['image'] == '' ? 'default.jpg' : $row['image'];?>" alt="" />
                           <?php endif;?>
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">
                            <?php echo isset ( $row['content'] ) ? $row['content'] : ''; ?>
                        </p>
                        </section>
                    </article>
                    <!-- Comments section-->
                </div>
            </div>

            <!-- post navigation --->
 
            <div class="row">
                <div class="col-md-5 offset-md-1 ">
                    <ul class="list-unstyled inline-block">
                    <li class="bg-light p-4"> 
                        <?php  if(isset ( $prev_post)){ ?>
                        <a class="page-link text-black fw-bolder text-left" href="post.php?post=<?php echo $prev_post['slug'];?> ">
                             << <?php echo $prev_post['title'];?> 
                        </a>
                        <?php } else {
                            echo "Post Not Found";
                        }?>  
                    </li>
                 </ul>
                </div>
                 <div class="col-md-5">
                    <ul class="list-unstyled inline-block text-right">
                         <li class="bg-light p-4"> 
                            <?php  if(isset ( $next_post) ){ ?>
                            <a class="page-link text-black fw-bolder" href="post.php?post=<?php echo $next_post['slug'];?>">   <?php echo $next_post['title'];?> >> 
                            </a>
                            <?php } else {
                                echo "Post Not Found";
                            }?>  
                        </li>
                    </ul>
                </div>
            </div>
         </div>
        
        <?php require_once 'footer.php';?>
