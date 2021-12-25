<?php
include 'include/connection.php';
include 'include/header.php';






?>

<!-- START CONTENT -->
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
                            <a href="posts.php">
                                <span><i class="fa fa-th-large"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="index.php" target="_blank">
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
                <button class="btn btn-custom">مقال جديد</button>
                <div class="add-category">

                    <?php


                    if (isset($_POST['add'])) {
                        //  VARIABLES
                        $pTitle = $_POST['title'];
                        $pCategory = $_POST['cate'];
                        $pContent = $_POST['content'];
                        $pAuthor = "علاء توفيق إبراهيم";
                        $pAdd = $_POST['add'];


                        // images
                        $imageName = $_FILES['postImage']['name'];
                        $imageTmp = $_FILES['postImage']['tmp_name'];


                        if (empty($pTitle) || empty($pContent)) {
                            echo "<div class='alert alert-danger'>" .  "برجاء ملئ الحقول أدناه" . "</div>";
                        } elseif (strlen($pContent) > 10000) {
                            echo "<div class='alert alert-danger'>" .  "لقد تجاوزت عدد الحروف المسموح للنشر" . "</div>";
                        } else {
                            $postImage = rand(0, 1000) . "_" . $imageName;
                            move_uploaded_file($imageTmp, "uploads\\$postImage");

                            $query =
                                "INSERT INTO posts (postTitle,postCategory,postImage,postContent,postAuthor) 
                                VALUES ('$pTitle','$pCategory','$postImage','$pContent','$pAuthor') ";

                            $res = mysqli_query($conn, $query);

                            if (isset($res)) {
                                echo "<div class='alert alert-success'>" . "تمت إضافة المقال بنجاح" . "</div>";
                            } else {
                                echo "<div class='alert alert-danger'>" . "حدث خطأ ما" . "</div>";
                            }
                        }
                    }

                    ?>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">عنوان المقال</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cate">التصنيف</label>
                            <select name="cate" id="cate" class="form-control">
                                <?php
                                $query = "SELECT * FROM categories";
                                $res = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($res)) {

                                ?>
                                <option value="<?Php echo $row['categoryName'] ?>">
                                    <?Php echo $row['categoryName'] ?>
                                </option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المقال</label>
                            <input type="file" name="postImage" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-custom" name="add">نشر المقال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<?php include 'include/footer.php'; ?>





















<!-- JQUERY  -->
<script src="js/jquery-3.6.0.min.js"></script>
<!-- FONT AWESOME -->
<script src="https://kit.fontawesome.com/44c61da6d8.js" crossorigin="anonymous"></script>
<!-- BOOSTRAP JS -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>