<?php

$gInfo = mysqli_query($db_conn, "SELECT * FROM `ginfo_table`");
$row = mysqli_fetch_assoc($gInfo);

?>


<header style="background-image:url('<?php echo 'uploads/posts/'. $row["herobanner"]; ?>');" class="site-hero py-5 bg-light mb-4">
    <div class="container py-5">
        <div class="text-center my-5 py-5">
            <h1 class="fw-bolder bh-size">
                <?php echo isset( $row["title"] ) ? $row["title"] : 'Add Site Title' ;?>
            </h1>
            <?php if ( isset( $row["title"] )){ ?>
            <hr class="hborder">
           <?php } ?>
            <h4 class="sh-size fw-bolder">
                <?php echo isset( $row["subtitle"] ) ? $row["subtitle"] : 'Add Site Subtitle';?>
            </h4>
            <p class="lead mb-0 p-size">
                <?php echo isset( $row["description"] ) ? $row["description"] : 'Add Site Description';?>    
            </p>
        </div>
    </div>
</header>


