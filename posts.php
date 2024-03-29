<?php
include 'include/connection.php';
include 'include/header.php';



$id = $_GET['id'] ?? null;




?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-area">
                <h4>لوحة التحكم</h4>
                <ul>
                    <li>
                        <a href="categories.php">
                            <span><i class="fas fa-tag"></i></span>
                            <span>التصنيفات</span>
                        </a>
                    </li>
                    <!-- ARTICLES -->
                    <li data-toggle="collapse" data-target="#menu">
                        <a href="#">
                            <span><i class="fas fa-newspaper"></i></span>
                            <span>المقالات</span>
                        </a>
                    </li>
                    <ul class="collapse" id="menu">
                        <li>
                            <a href="new-post.php">
                                <span><i class="fas fa-edit"></i></span>
                                <span>مقال جديد</span>
                            </a>
                        </li>
                        <li>
                            <a href="posts.php" target="_blank">
                                <span><i class="fa fa-th-large"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="index.php">
                            <span><i class="fas fa-tag"></i></span>
                            <span>عرض الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span><i class="fa fa-sign-out"></i></span>
                            <span>تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">
                <!-- DISPLAY ALL POSTS -->
                <div class="display-posts mt-4">
                    <?php
                    if (isset($id)) {
                        $query = "DELETE FROM posts WHERE id = '$id'";
                        $delete = mysqli_query($conn, $query);

                        if (isset($delete)) {
                            echo "<div class='alert alert-success text-center mt-4'>" . "تم حذف المقال بنجاح" . "</div>";
                        } else {
                            echo "<div class='alert alert-danger text-center mt-4'>" . "حدث خطأ ما" . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>رقم المقال</th>
                                <th>عنوان المقال</th>
                                <th>كاتب المقال</th>
                                <th>صورة المقال</th>
                                <th>تاريخ المقال</th>
                                <th>حذف المقال</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM posts  ORDER BY id DESC";

                            $res = mysqli_query($conn, $query);

                            $num = 0;

                            while ($row = mysqli_fetch_assoc($res)) {
                                $num++
                            ?>

                            <tr>
                                <td><?php echo $num ?></td>
                                <td><?php echo $row['postTitle']  ?></td>
                                <td><?php echo $row['postAuthor']  ?></td>
                                <td class="text-center"><img src="uploads/<?php echo $row['postImage'] ?>"
                                        alt="post-img" style="width:100px;height:70px"></td>
                                <td><?php echo $row['postDate']  ?></td>
                                <td><a href="posts.php?id=<?php echo $row['id'] ?>">
                                        <button class="btn btn-custom">حذف المقال</button></a></td>

                            </tr>

                            <?php

                            }

                            ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
</div>
















<?php include 'include/footer.php'; ?>