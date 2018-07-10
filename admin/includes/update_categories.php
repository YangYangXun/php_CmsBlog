   
                         <form method="post">
                                <div class="form-group">
                                    <label >Edit Category</label>
                                     <?php
                                        //«ö¤Uedit
                                        if (isset($_GET['edit'])) {
                                            $the_cat_id = $_GET['edit'];
                                            $query = "select * from category where cat_id = {$the_cat_id} ";
                                            $select_categories_id = mysqli_query($connection, $query);
                                            while ($row = mysqli_fetch_assoc($select_categories_id)) {

                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                     ?>
                                        <input type="text" value="<?php if(isset($cat_title)){echo $cat_title;}?>" name="cat_title" class="form-control"  placeholder="Edit categories" />


                                    <?php }//while
                                    }//if?>
                                </div>
                                <button type="submit" class="btn btn-primary" name="edit">Update categroy</button>
                           <?php
                                //for update
                            if (isset($_POST['edit'])) {
                                $cat_title = $_POST['cat_title'];

                                if ($cat_title == "" || empty($cat_title)) {
                                    echo "<p class='text-warning'>this can't be empty</p>";
                                } else {
                                    $query = "update category set cat_title = '{$cat_title}' ";
                                    $query .= "where cat_id = {$cat_id} ";
                                    $update_query = mysqli_query($connection, $query);
                                    if (!$update_query) {
                                        die('Query failed' . mysqli_error($connection));
                                    }

                                }

                            } //block if(isset($_POST['submit']))
                            ?>
                        </form>
                        