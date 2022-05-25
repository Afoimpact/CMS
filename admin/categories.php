
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
                            Welcome
                            <small>Author 1</small>
                        </h1>

                        <div class="col-xs-6">  <!--div with class that occupies half of the screen -->


<?php insert_categories(); ?>



                        <form action="" method="post" >
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" placeholder="add category" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value ="add category">
                            </div>



                        </form> 
                        
                        
                      <?php
                      
                      if(isset($_GET['edit'])){
                          $cat_id =$_GET['edit'];
                          include "includes/update_categories.php";
                      }
                      ?>
                        </div>
                        <div class="col-xs-6"></div>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php //find all categories query
 FindAllCategories();               
?>
<?php DeleteCategories(); ?>


                            
                                </tbody>
                            </table>

                        <div class="col-xs-6">


                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>