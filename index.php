<?php
include 'include/connection.php';
include 'public/header.php';


?>








<!-- START CONTENT -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <?php
                $query = "SELECT * FROM posts ORDER BY id DESC";
                $res = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="post">
                    <div class="post-image">
                        <img src="uploads/<?php echo $row['postImage'] ?>" alt="img-1">
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
                        <p class="postContent"></p>
                        <button class="btn btn-custom">إقرأ المزيد</button>
                    </div>
                </div>

                <?php
                }

                ?>




            </div>
            <div class="col-md-3">
                <!-- START CATEGORIES -->
                <div class="categories">
                    <h4>التصنيفات</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-tag"></i></span>
                                <span>بلوجر</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-tag"></i></span>
                                <span>يوتيوب</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-tag"></i></span>
                                <span>دورات</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-tag"></i></span>
                                <span>بلوجر</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span><i class="fas fa-tag"></i></span>
                                <span>أندرويد</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END CATEGORIES  -->
                <!-- START LATEST POSTS -->
                <div class="last-post">
                    <h4>أحدث المنشورات</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <span class="span-image"><img src="images/img-1.png" alt="img-1"></span>
                                <span> هذا النص هو مثال لنص يمكن إستبداله فى نفس المساحة</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="span-image"><img src="images/img-2.png" alt="img-2"></span>
                                <span> هذا النص هو مثال لنص يمكن إستبداله فى نفس المساحة</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="span-image"><img src="images/img-3.png" alt="img-3"></span>
                                <span> هذا النص هو مثال لنص يمكن إستبداله فى نفس المساحة</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END LATEST POSTS -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->



<?php

include 'public/footer.php'


?>