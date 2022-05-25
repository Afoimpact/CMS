
<?php include "includes/admin_header.php" ?>
<?php include "functions.php" ?>
    <div id="wrapper">



        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                            See All Posts
                            <small>Author 1</small>
                        </h1>

<?php
if(isset($_GET['source'])){
$source = $_GET['source'];

}   else {
    $source = '';
}                     
  switch ($source){             //code to display the table at all times


    case 'add_posts';
    include "includes/add_posts.php";
    break;

    case 'edit_post';
    include "includes/edit_post.php";
    break;

    case '34';
    echo "NICE";
    break;

    default:
    include "includes/view_all_posts.php";
    break;

  }                      
                                            
                        
?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>