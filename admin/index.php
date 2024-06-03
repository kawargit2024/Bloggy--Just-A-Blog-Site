<?php
ob_start();
require_once('../config/dbcon.php');
require_once('../config/functions.php');

if(!isset($_SESSION['email'])){
  header("location:login.php");
}

if(isset($_GET['page'])){
    $page = $_GET['page'] . ".php";
  } else {
    $page = 'dashboard.php';
}

$gInfo = mysqli_query($db_conn, "SELECT * FROM `ginfo_table`");
$row = mysqli_fetch_assoc($gInfo);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>
            <?php echo isset( $row["title"] ) ? $row["title"] : '' ;?> - <?php echo isset( $row["subtitle"] ) ? $row["subtitle"] : '';?>   
        </title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Blog</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $page =='dashboard.php' ? 'active' : '' ?>">
                <a class="nav-link" href="index.php?page=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> Dashboard </span></a>
            </li>

             <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo $page =='add-site-info.php' ? 'active' : '' ?>
            <?php echo $page =='add-site-info.php'  ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#siteInfo"
                    aria-expanded="true" aria-controls="siteInfo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Site General Info </span>
                </a>
                <div id="siteInfo" class="collapse <?php echo $page =='add-site-info.php' ? 'show' : '' ?>
                <?php echo $page =='add-site-info.php' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?php echo $page =='add-site-info.php' ? 'active' : '' ?>" 
                      href="index.php?page=add-site-info"> Add Site  Info 
                    </a>
                    <a class="collapse-item <?php echo $page =='manage-site-info.php' ? 'active' : '' ?>" 
                      href="index.php?page=manage-site-info"> Manage Site Info 
                    </a>
                  </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo $page =='add-category.php' ? 'active' : '' ?>
            <?php echo $page =='manage-category.php'  ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category"
                    aria-expanded="true" aria-controls="category">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> All Categories </span>
                </a>
                <div id="category" class="collapse <?php echo $page =='add-category.php' ? 'show' : '' ?>
                <?php echo $page =='manage-category.php' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?php echo $page =='add-category.php' ? 'active' : '' ?>" 
                      href="index.php?page=add-category"> Add Category 
                    </a>
                    <a class="collapse-item <?php echo $page =='manage-category.php' ? 'active' : '' ?>" 
                      href="index.php?page=manage-category"> Manage Category 
                    </a>
                  </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php echo $page =='add-category.php' ? 'active' : '' ?>
            <?php echo $page =='manage-category.php'  ? 'active' : '' ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#post"
                    aria-expanded="true" aria-controls="post">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>All Posts</span>
                </a>
                <div id="post" class="collapse <?php echo $page =='add-post.php' ? 'show' : '' ?>
                <?php echo $page =='manage-post.php' ? 'show' : '' ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?php echo $page =='add-post.php' ? 'active' : '' ?>" 
                      href="index.php?page=add-post"> Add Post 
                    </a>
                    <a class="collapse-item <?php echo $page =='manage-post.php' ? 'active' : '' ?>" 
                      href="index.php?page=manage-post"> Manage Post 
                    </a>
                  </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> 
                                  <strong> <?php echo strtoupper(( $_SESSION['name'] ));?> </strong></span>
                                <img class="img-profile rounded-circle" src="../assets/img/profile.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <?php 
                   // check if file exists or not //
                    if(file_exists($page)){
                        require_once $page;
                    } else {
                        require_once "404.php";
                    }
                  ?>
                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website <?php echo date("Y");?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <!-- Page level custom scripts -->
   
    <script src="../js/demo/script.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <script>
       ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
   </script>

</body>
</html>