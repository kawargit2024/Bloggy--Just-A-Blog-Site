<?php

$category = mysqli_query($db_conn, "SELECT * FROM `categories_table` WHERE `status`= '1'");
//var_dump($category);

// foreach($category as $cat){
//   echo "<pre>";
//   var_dump($cat);
//   echo "</pre>";
// }

?>


                <div class="card mb-4">
                     <form action="search.php">
                        <div class="card-body">
                            <div class="input-group">                                    
                                <input class="form-control" type="text" name="search" placeholder="Enter search " aria-label="Enter search " aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                            </div>
                        </div>
                         </form>
                    </div>
                     <div class="card mb-4">
                        <div class="card-header"><strong> CATEGORIES </strong></div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($category as $cat):?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="category.php?category=<?php echo $cat["slug"]?>">
                                                <?php echo $cat["name"]?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <!-- Side widget-->
                    <div class="card lp-box mb-4">
                        <div class="card-header"><strong> LATEST POST </strong></div>
                        <!-- <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div> -->
                        <ul class="list-unstyled mb-0">
                            <?php foreach($posts as $post){ ?>
                                <li>
                                    <a href="post.php?post=<?php echo $post["slug"]?>">
                                        → <?php echo $post["title"]?>
                                    </a>
                                </li>
                             <?php  } ?>
                        </ul>
                    </div>