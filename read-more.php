<?php
include 'include/connection.php';
include 'public/header.php';







?>
<!-- START CONTENT -->
<div class="content">
    <div class="posts">

        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <?php
                    $id = $_GET['id'];
                    $query = "SELECT * FROM posts  WHERE id ='$id' ORDER BY id DESC";
                    $res = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($res);

                    ?>

                    <div class="post">
                        <div class="post-image">
                            <a href="read-more.php">
                                <img src="uploads/<?php echo $row['postImage'] ?>" alt="img-1">
                            </a>
                        </div>
                        <div class="post-title">
                            <h4><?php echo $row['postTitle'] ?></h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i><?php echo $row['postAuthor'] ?></span>
                                <span><i class="far fa-calendar"></i><?php echo $row['postDate'] ?></span>
                                <span><i class="fas fa-tag"></i><?php echo $row['postCategory'] ?></span>
                            </p>
                            <p class="postContent">
                                <?php echo
                                $row['postContent'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <!-- START CATEGORIES -->
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>

                            <?php
                            $query = "SELECT * FROM categories ORDER BY categoryDate DESC";
                            $res = mysqli_query($conn, $query);


                            while ($row = mysqli_fetch_assoc($res)) {

                            ?>

                            <li>
                                <a href="category.php?category=<?php echo $row['categoryName'] ?>">
                                    <span><i class="fas fa-tag"></i></span>
                                    <span><?php echo $row['categoryName']; ?></span>
                                </a>
                            </li>

                            <?php
                            }

                            ?>

                        </ul>
                    </div>
                    <!-- END CATEGORIES  -->
                    <!-- START LATEST POSTS -->
                    <div class="last-post">
                        <h4>أحدث المنشورات</h4>
                        <ul>
                            <?php
                            $query = "SELECT * FROM posts ORDER BY postDate DESC LIMIT 3";
                            $res = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <li>
                                <a href="read-more.php?id=<?php echo $row['id'];  ?>">
                                    <span class="span-image"><img src="uploads/<?php echo $row['postImage']  ?>"
                                            alt="img-1"></span>
                                    <p><?php echo $row['postTitle'] ?></ح>
                                </a>
                            </li>
                            <?php

                            }
                            ?>
                        </ul>
                    </div>
                    <!-- END LATEST POSTS -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->





<?php

include 'public/footer.php'


?>