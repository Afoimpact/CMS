<?php
if(isset ($_POST['submit'])){

    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);
    if(!$search_query){
        die("query failed". mysqli_error($connection));
    }
$count = mysqli_num_rows($search_query); //to check if the search query work. this count the number of rows returned from the search
if ($count == 0){
    echo "<h1> NO RESULT</h1>";
} else{
    echo 'SOME RESULTS FOUND';
} 

}


?>