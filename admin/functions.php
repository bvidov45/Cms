<?php 

    function confirmQuery($result){
        global $conn;
         if(!$result){
        echo 'Query Failed'. mysqli_error($conn);
    }
    }



     function insert_categories(){
         
         global $conn;
         
        if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        $query = "INSERT INTO categories (cat_title)VALUES ('$cat_title')";

        if (empty($cat_title)) {
            echo "This field cannot be empty";
        } else {
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Query Failed" . mysqli_error($conn));
            }
        }
    }
}

    function delete_categories(){
        global $conn;
        if(isset($_GET['delete'])){
        $delete = $_GET{'delete'};
        $sql = "DELETE FROM categories WHERE id = '$delete'";
        $del_query = mysqli_query($conn, $sql);
        header("Location: categories.php");
    }
}

?>
