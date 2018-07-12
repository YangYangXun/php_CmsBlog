   <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>


                            <?php 

                                $query = "select * from comments; ";
                                $select_comments = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_comments)) {

                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_content = $row['comment_content'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                   
                                
                                    echo "<tr>";
                                    echo "<td>$comment_id</td>";
                                    echo "<td>$comment_author</td>";
                                    echo "<td>$comment_content</td>";
                                    echo "<td>$comment_email</td>";
                                    echo "<td>$comment_status</td>";
                                    $query = "select * from posts where post_id = $comment_post_id";
                                    $query_select_post_id = mysqli_query($connection,$query);
                                    confirmQuery($query_select_post_id);
                                    $row = mysqli_fetch_assoc($query_select_post_id);
                                    $myResponPostTitle = $row['post_title'];
                                    $myResponPostId = $row['post_id'];
                                    echo "<td><a href='../post.php?p_id=$myResponPostId'>$myResponPostTitle</a></td>";
                                    echo "<td>$comment_date</td>";
                                    echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                                    echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                                    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                    echo " </tr>";

                                }

                             ?>


                            <?php

                                if (isset($_GET['approve'])) {
                                    $the_comment_id = $_GET['approve'];
                                    $query = "update comments set comment_status = 'approve' where comment_id = $the_comment_id ";
                                    $update_comment_status_approve = mysqli_query($connection, $query);
                                    confirmQuery($update_comment_status_approve);
                                    header("Location: comments.php");
                                } 

                                if (isset($_GET['unapprove'])) {
                                    $the_comment_id = $_GET['unapprove'];
                                    $query = "update comments set comment_status = 'unapprove' where comment_id = $the_comment_id ";
                                    $update_comment_status_unapprove = mysqli_query($connection, $query);
                                    confirmQuery($update_comment_status_unapprove);
                                    header("Location: comments.php");
                                } 

                                // for delete
                                if (isset($_GET['delete'])) {
                                    $delete_comment_id = $_GET['delete'];
                                    $query = "delete from comments where comment_id = $delete_comment_id ";
                                    $delete_query = mysqli_query($connection, $query);
                                    confirmQuery($delete_query);
                                    header("Location: comments.php");
                                } 


                            ?>
                            
                            </tbody>
                        </table>