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
                                    <th>Edit</th>
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
                                    echo "<td>some title</td>";
                                    echo "<td>$comment_date</td>";
                                    echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Approve</a></td>";
                                    echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Unapprove</a></td>";
                                    echo "<td><a href='comments.php?delete={$comment_id}'>Edit</a></td>";
                                    echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
                                    echo " </tr>";

                                }

                             ?>

                            
                            </tbody>
                        </table>