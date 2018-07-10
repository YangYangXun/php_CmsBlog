<?php

    function confirmQuery($result){

        global $connection;


        if (!$result) {
            die('Query failed' . mysqli_error($connection));
        }

    }
    function insert_categories(){

        global $connection;

        if (isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];

            if ($cat_title == "" || empty($cat_title)) {
                echo "<p class='text-warning'>this can't be empty</p>";
            } else {
                $query = "insert into category(cat_title) ";
                $query .= "value('{$cat_title}') ";
                $create_category_query = mysqli_query($connection, $query);
                if (!$create_category_query) {
                    die('Query failed' . mysqli_error($connection));
                }

            }

        } //block if(isset($_POST['submit']))

    }


     function findAllCategories(){
        global $connection;


        $query = "select * from category; ";
        $select_categories = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_categories)) {

            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            printf("<td><a href='#'>%s</a></td>", $cat_id);
            printf("<td><a href='#'>%s</a></td>", $cat_title);
            printf("<td><a href='categories.php?delete=%s' onclick='myFunction()' >Delete</a></td>", $cat_id);
            printf("<td><a href='categories.php?edit=%s' onclick='' >Edit</a></td>", $cat_id);
            printf("</tr>");
        }



     }

     function deleteItem(){
         global $connection;

        if (isset($_GET['delete'])) {
            $the_cat_id = $_GET['delete'];
            $query = "delete from category where cat_id = {$the_cat_id} ";
            $delete_query = mysqli_query($connection, $query);
            //按下delete 後要refresh 才會刪除
            //添加refresh
            header("Location: categories.php");
            if (!$delete_query) {
                die('Query failed' . mysqli_error($connection));
            }
        }

     }






?>