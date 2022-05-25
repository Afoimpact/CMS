<?php

if(isset($_GET['p_id'])){

$the_post_id = $_GET['p_id'];



}
 $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
 $select_posts_by_id = mysqli_query($connection, $query);
 
 
 // attempt to fetch the exact data with the post id to be edited
 while($row = mysqli_fetch_assoc($select_posts_by_id)){
 $post_id = $row['post_id'];
 $post_author = $row['post_author'];
 $post_title = $row['post_title'];
 $post_image = $row['post_image'];
 
 $post_status = $row['post_status'];
 $post_date = $row['post_date'];
 $post_tags = $row['post_tags'];
 $post_content = $row['post_content'];
 $post_category_id = $row['post_category_id'];
 $post_comment_count = $row['post_comment_count'];
 }

if(isset($_POST['update_post'])){
    echo "good";
    $post_id = $_POST['post_id'];
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    
    $post_status = $_POST['post_status'];
    //$post_date = ();
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_category_id = $_POST['post_category'];

    var_dump($post_id);
    

    move_uploaded_file( $post_image_temp, "../images/ $post_image"); //to move images from temporary location to the assigned variale/location



    $query = 'UPDATE posts 
                SET 
                    post_category_id = $post_category_id, 
                    post_title = "{$post_title}", 
                    post_date = "2022-05-12", 
                    post_author = "{$post_author}", 
                    post_status = "{$post_status}", 
                    post_tags = "{$post_tags}", 
                    post_content = "{$post_content}", 
                    post_image = "{$post_image}" 
                WHERE 
                    post_id = $post_id';
   
   // $query .= "post_category_id = {$post_category_id}, ";
   

    $update_post = mysqli_query($connection, $query);
    if(!$update_post){
        die("QUERY FAILED". mysqli_error($connection));
    }
}
 

?>





<form action="" enctype="multipart/form-data" method="post" >
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input value="<?php echo $post_title; ?>"class="form-control" type="text" name="post_title">
                            </div>

                            <div class="form-group">
                                <select name="post_category" id="post_category" >
                                    <?php 
                                    $query = "SELECT * FROM categories";
                                    $select_categories = mysqli_query($connection, $query);
                                    
                                    if(!$select_categories){
                                        die("QUERY FAILED". mysqli_error($connection));
                                    }
                                    
                                    while($row = mysqli_fetch_assoc($select_categories)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
    
                                    
                                    ?>

                               </select>
                            </div>

                            <input type="text" value="<?php echo $post_id; ?>" name="post_id" hidden >
                            <div class="form-group">
                                <label for="post_category_id">Post Author</label>
                                <input value="<?php echo $post_author; ?>" class="form-control" type="text" name="post_author">
                            </div>

                            <div class="form-group">
                               
                                <label for="post_status">Post Status</label>
                                <input value="<?php echo $post_status; ?>"  class="form-control" type="text" name="post_status">
                            </div>

                            <div class="form-group">
                            <img src="../images/<?php echo $post_image;?>" width = "100" alt ="">
                                <label for="image">Post Image</label>
                                <input value="<?php echo $post_image; ?>" class="form-control" type="file" name="image">
                            </div>

                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
                                <input value="<?php echo $post_tags; ?>"class="form-control" type="text" name="post_tags">
                            </div>

                            <div class="form-group">
                                <label for="post_content">Post Content</label>
                                <textarea class="form-control" type="text" name="post_content" id="" cols="30" rows="10">"<?php echo $post_content; ?>"</textarea> 
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_post" value ="Update Post">
                            </div>

                            



                    </form>