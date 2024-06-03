<?php

// get total post number //
$tot_rows = mysqli_query( $db_conn ,"SELECT  * FROM `posts_table` " );
$num_of_posts = mysqli_num_rows($tot_rows);
$posts_per_page  = 3;
$total_num_pages = ceil( $num_of_posts/$posts_per_page );


// total category //
$category = mysqli_query($db_conn, "SELECT * FROM `categories_table`");
$row = mysqli_num_rows($category);


// total post when status active or 1 //
$post_status_active = mysqli_query($db_conn, "SELECT * FROM `posts_table` WHERE `status`= '1'");
$status_active_posts = mysqli_num_rows($post_status_active);
$posts_per_page  = 3;
$total_pages = ceil( $num_of_posts/$posts_per_page );

// echo $status_active_posts;

// total post when status Inactive or 0 //
$post_status_inactive = mysqli_query($db_conn, "SELECT * FROM `posts_table` WHERE `status`= '0'");
$status_inactive_posts = mysqli_num_rows($post_status_inactive);
$posts_per_page  = 3;
$total_pages = ceil( $num_of_posts/$posts_per_page );

// echo $status_inactive_posts;


// total category when status active or 1 //
$cat_status_active = mysqli_query($db_conn, "SELECT * FROM `categories_table` WHERE `status`= '1'");
$status_active_cat = mysqli_num_rows($cat_status_active);
// echo $status_active_cat;

// total category when status inactive or 0 //
$cat_status_inactive = mysqli_query($db_conn, "SELECT * FROM `categories_table` WHERE `status`= '0'");
$status_inactive_cat = mysqli_num_rows($cat_status_inactive);
// echo $status_inactive_cat;


?>


                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 font-weight-bold text-gray-800"> Dashboard </h1>
<!--                         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Total Posts 
                                            </div>
                                            <div class="h4 mb-0 font-weight-bold">
                                                <?php echo 'Total : ' . $num_of_posts ." Post";?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Total Post Pages: </div>
                                            <div class="h4 mb-0 font-weight-bold">
                                                <?php echo 'Total : ' . $total_num_pages." Page";?>
                                                    
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                Active Posts ( Status == 1 ) </div>
                                            <div class="h4 mb-0 font-weight-bold">
                                                <?php echo "Active  : "  . $status_active_posts ." Post"?>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-default text-uppercase mb-1">
                                               InActive Posts ( Status == 0 ) </div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                                <?php echo "Inactive  : "  .  $status_inactive_posts ." Post"?>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                                Total Category 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h4 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo 'Total : ' .  $row ." Category"?>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                                Active Category ( Status == 1 ) </div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                                <?php echo "Active : "  .  $status_active_cat ." Category"?>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-default text-uppercase mb-1">
                                                InActive Category ( Status == 0 ) </div>
                                            <div class="h4 mb-0 font-weight-bold text-gray-800">
                                                <?php echo "InActive : "  .  $status_inactive_cat ." Category"?>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


