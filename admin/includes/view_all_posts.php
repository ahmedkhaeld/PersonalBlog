
<?php 
if(isset($_POST['checkBoxArray'])){
    foreach($_POST['checkBoxArray'] as $postVauleId){
        $bulk_options=$_POST['bulk_options'];
        switch($bulk_options){
            case 'published': 
                $query= "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id={$postVauleId} ";
                $upate_to_published_status= mysqli_query($connection, $query);
                confirmQuery($upate_to_published_status);
                break;

                case 'draft': 
                    $query= "UPDATE posts SET post_status= '{$bulk_options}' WHERE post_id={$postVauleId} ";
                    $draft_to_published_status= mysqli_query($connection, $query);
                    confirmQuery($draft_to_published_status);
                    break;

                    case 'delete': 
                        $query= "DELETE  FROM posts WHERE post_id={$postVauleId} ";
                        $upate_to_delete_status= mysqli_query($connection, $query);
                        confirmQuery($upate_to_delete_status);
                        break;
                    case 'clone':
                        $query="SELECT * FROM posts WHERE post_id='{$postVauleId}'";
                        $select_post_query=mysqli_query($connection, $query);

                        while($row=mysqli_fetch_array($select_post_query)){
                            $post_title=$row['post_title'];
                            $post_category_id=$row['post_category_id'];
                            $post_date=$row['post_date'];
                            $post_author = $row ['post_author'];
                            $post_status = $row ['post_status'];
                            $post_image = $row ['post_image'];
                            $post_tags = $row ['post_tags'];
                            $post_content = $row ['post_content'];
                        }

                        $query= " INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, 
                        post_tags, post_status)";
                        $query.= "VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}',  
                        '{$post_content}', '{$post_tags}', '{$post_status}')";
                        $copy_query=mysqli_query($connection, $query);
                        if(! $copy_query){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                      break;
       

        }

    }
 
}

?>


<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionContainer" class="col-xs-4" style="padding:0px;">
        <select name="bulk_options" id="" class="form-control">
        <option value=""> Selecet Options</option>
        <option value="published"> Publish</option>
        <option value="draft"> Draft</option>
        <option value="delete"> Delete</option>
        <option value="clone"> Clone</option>
        </select>
        </div>

        <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="./posts.php?source=add_post">Add New</a>
        </div>

            <thead>
                <tr>
                    <th> <input id="selectAllBoxes " type="checkbox"></th>
                    <th>Id </th>
                    <th>User</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>View Post</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Views</th>
                </tr>
            </thead>

        <tbody>
            <?php      
                $query = "SELECT * FROM posts ORDER  BY post_id DESC ";
                $select_posts= mysqli_query($connection, $query);
            
                // loop for all posts
                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $post_id = $row ['post_id'];
                    $post_author = $row ['post_author'];
                    $post_user = $row ['post_user'];
                    $post_title = $row ['post_title'];
                    $post_category_id= $row ['post_category_id'];
                    $post_status = $row ['post_status'];
                    $post_image = $row ['post_image'];
                    $post_tags = $row ['post_tags'];
                    $post_comment_count= $row ['post_comment_count'];
                    $post_date = $row ['post_date'];
                    $post_views_count = $row ['post_views_count']; 
                    
                echo "<tr>";
                    ?>
                    <!-- All 9 columns for each row (post) attached to id checkbox and 3 links for edit delete view post-->
                    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' 
                    value='<?php echo  $post_id   ?>'></td>

                    <?php
                    echo"<td>$post_id </td> " ;
                    if(!empty($post_author)){
                        echo  "<td> $post_author</td>";
                    }elseif(!empty($post_user)){
                        echo  "<td> $post_user</td>"; 
                    }

                   
                    
                    echo  "<td>$post_title</td>";

                    // fetch the post category from the category table compare the post_id and its category 
                    $query = "SELECT * FROM categories WHERE cat_id= {$post_category_id} ";
                    $select_categories_id= mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo  "<td> {$cat_title}</td>"  ;
                    } 
                    
                
                    echo  "<td> $post_status</td>";
                    echo  "<td><img width='100' src='../images/$post_image' alt='image' </td>";
                    echo  "<td> $post_tags</td>";

                    $query="SELECT * FROM comments WHERE comment_post_id =$post_id";
                    $send_comment_query=mysqli_query($connection, $query);
                    $row=mysqli_fetch_array($send_comment_query);
                    $comment_id=$row['comment_id'];
                    $count_comments=mysqli_num_rows($send_comment_query);
                    echo  "<td> <a href='post_comments.php?comment_id=$post_id'>$count_comments</a></td>";

                    echo " <td>$post_date </td>";
                    // link to direct the admin to view the updated post 
                    echo "<td> <a href='../post.php?p_id={$post_id}'> View post  </a></td>";
                    // link to direct user to edit post
                    echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}'> Edit </a></td>";
                    //link with js confirmation function to delete post
                    echo "<td> <a onClick=\"javascript: return confirm('Are you sure you want to delete');\" 
                    href='posts.php?delete={$post_id}'> DELETE</a></td>";
                    echo  "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
                    echo"</tr>";
                
                    

                    
                }
            ?>

                
            </tr>
        </tbody>
    </table> 
</form>

<?php 
// query when user click at delete link it deletes post that has the clicked id from the database 
if (isset($_GET['delete'])) {
    $the_post_id=$_GET['delete'];
    $query="DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query= mysqli_query($connection, $query);
    // refresh the page quickly
    header("Location: posts.php");

}

if (isset($_GET['reset'])) {
    $the_post_id=$_GET['reset'];
    $query="UPDATE posts SET post_views_count=0 WHERE post_id = ".mysqli_real_escape_string($connection,$_GET['reset'])."";
    $reset_query= mysqli_query($connection, $query);
    // refresh the page quickly
    header("Location: posts.php");

}



?>

