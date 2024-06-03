<?php 
    require_once 'config/dbcon.php';

    $posts = mysqli_query( 
        $db_conn ,"SELECT `posts_table`.*,`user_table`.`name` FROM `posts_table` INNER JOIN `user_table` 
        ON `posts_table`.`user_id` = `user_table`.`id` WHERE `posts_table`.`status` = 1 
        ORDER BY 'ASC' LIMIT 0 , 5" 
    );

    $categories = mysqli_query( $db_conn, "SELECT * FROM `categories_table` WHERE `status`= '1'" );

    $gInfo = mysqli_query($db_conn, "SELECT * FROM `ginfo_table`");
    $row = mysqli_fetch_assoc($gInfo);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php echo isset( $row["title"] ) ? $row["title"] : '' ;?> - <?php echo isset( $row["subtitle"] ) ? $row["subtitle"] : '';?>   
        </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
            <div class="container">
            <a class="navbar-brand" href="index.php">
                <strong>
                <?php echo isset( $row["title"] ) ? $row["title"] : '' ; ?>
                </strong>
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Posts
                              </a>
                               <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php foreach($posts as $post){ ?>
                                <li class="dropdown-item"> 
                                    <a class="nav-link" href="post.php?post=<?php echo $post['slug'];?>">
                                        <?php echo $post['title'];?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Catgories
                              </a>
                               <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php foreach($categories as $cat){ ?>
                               <li class="nav-item">
                                <a class="dropdown-item" href="category.php?category=<?php echo $cat['slug'];?>">
                                    <?php echo $cat['name'];?>                                       
                                </a>
                            </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>




