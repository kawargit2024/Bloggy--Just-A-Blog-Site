<?php 
require_once 'header.php';
require_once 'template-parts/hero.php';

$tot_rows = mysqli_query( $db_conn ,"SELECT `posts_table`.*,`user_table`.`name` FROM `posts_table` INNER JOIN `user_table` ON `posts_table`.`user_id` = `user_table`.`id` WHERE `posts_table`.`status` = 1 ORDER BY `posts_table`.`id`" );

// var_dump($tot_rows);

$num_of_posts = mysqli_num_rows($tot_rows);
$posts_per_page  = 3;
$total_num_pages = ceil( $num_of_posts/$posts_per_page );

if( isset( $_GET['page'] ) ){
  $page  = $_GET['page'];
} else {
  $page = 1;
}

// var_dump($total_num_pages);

$limit = ( $page - 1 ) * $posts_per_page;

//echo $page;

$posts = mysqli_query( $db_conn ,"
    SELECT `posts_table`.*,`user_table`.`name` FROM `posts_table` INNER JOIN `user_table` ON `posts_table`.`user_id` = `user_table`.`id` WHERE `posts_table`.`status` = 1 ORDER BY `posts_table`.`id` LIMIT $limit , $posts_per_page " 
);

//$posts = mysqli_query( $db_conn ,"SELECT * FROM `posts_table` LIMIT $limit,$posts_per_page");
//var_dump($posts);

?>
        <!-- Page content-->
        <div class="container py-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php foreach($posts as $post){ ?>
                        <div class="card blog-card mb-4">
                            <a href="post.php?post=<?php echo $post['slug'];?>">
                                <img class="card-img-top" src="uploads/posts/<?php echo $post['image'] == '' ? 'default.jpg' : $post['image'] ;?>" alt="" /></a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <strong><?php echo date('M d, Y', strtotime($post['created_at']));?></strong>
                                </div>
                                <h2 class="card-title"><?php echo $post['title'];?></h2>
                                <p class="card-text mb-4"><?php echo substr($post['content'], 0,200);?>...</p>
                                <a class="btn btn-default" href="post.php?post=<?php echo $post['slug'];?>"> Read more →
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php 
                       if( mysqli_num_rows($posts) == 0 ){
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

                <div class="col-lg-12">

                    <!-- Pagination -->
                     <nav aria-label="Page navigation example py-2">
                      <ul class="pagination py-5">
                        
                        <?php if ( $page > 1 ){ ?>
                             <li class="page-item">
                               <a class="page-link bg-gradient-success" href="index.php?page=<?php echo $page-1;?>">Prev </a>
                             </li>
                        <?php } else{ ?>
                             <li class="page-item disable">
                               <span class="page-link bg-gradient-secondary text-secondary" href="javascript:avoid(0)"> Prev </span>
                            </li>
                         <?php } ?>
                        <?php for( $i = 1; $i <=$total_num_pages; $i++ ){ ?> 
                        <li class="page-item">
                            <a class="page-link <?php echo $page == $i ? 'active' : ''?>" 
                                href="index.php?page=<?php echo $i;?>"><?php echo $i;?>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="page-item">
                        <?php if ( ( $i > $page ) && ($page < $total_num_pages)){ ?>
                            <a class="page-link bg-gradient-success" href="index.php?page=<?php echo $page+1;?>">Next
                            </a>
                        </li>
                         <?php } else { ?>
                        <li class="page-item disable">
                            <span class="page-link bg-gradient-secondary  text-secondary" href="javascript:avoid(0)"> Next </span>
                         <?php } ?>
                        </li>
                      </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <?php require_once 'footer.php';?>
