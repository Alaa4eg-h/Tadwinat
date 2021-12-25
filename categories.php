<?php

session_start();
include 'include/connection.php';
include 'include/header.php';


$id = $_GET['id'] ?? null;



if (!isset($_SESSION['id'])) {
    echo "<div class='alert alert-danger'>"  . "غير مسموح لك بفتح هذه الصفحة" . "</div>";

    header('REFRESH:2;URL:login.php');
} else {





?>


<!-- START CONTENT -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" id="side-area">
                <h4>لوحة التحكم</h4>
                <ul>
                    <li>
                        <a href="#">
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
                <div class="add-category">
                    <?php
                        if (isset($_POST['add'])) {
                            $cName = $_POST['category'];
                            $cAdd = $_POST['add'];

                            if (empty($cName)) {
                                echo "<div class='alert alert-danger text-center'>" . "برجاء كتابة اسم التصنيف" . "</div>";
                            } elseif (strlen($cName) > 100) {
                                echo "<div class='alert alert-danger text-center'>" . "برجاء كتابة عدد حروف لا تزيد عن 100 حرف"
                                    . "</div>";
                            } else {
                                $query = "INSERT INTO categories (categoryName) VALUES ('$cName')";

                                mysqli_query($conn, $query);
                                echo
                                "<div class='alert alert-success text-center mt-4'>" . "تمت إضافة التصنيف بنجاح"  . "</div>";
                            }
                        }


                        ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <div class="form-group">
                            <label for="category">تصنيف جديد</label>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <button class="btn btn-custom" name="add">إضافة</button>
                    </form>
                </div>


                <!-- DISPLAY CATEGORIES -->
                <div class="disply-cat mt-5">
                    <?php
                        if (isset($id)) {


                            $query = "DELETE FROM categories WHERE id = '$id'";

                            $delete =
                                mysqli_query($conn, $query);

                            if (isset($delete)) {
                                echo "<div class='alert alert-success text-center mt-4'>" . "تم حذف التصنيف بنجاح" . "</div>";
                            } else {
                                echo "<div class='alert alert-danger text-center mt-4'>" . "حدث خطأ ما" . "</div>";
                            }
                        }

                        ?>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>رقم الفئة</th>
                                <th>إسم الفئة</th>
                                <th>تاريخ الإضافة</th>
                                <th>حذف التصنيف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM categories ORDER BY categoryDate DESC";
                                $result = mysqli_query($conn, $query);
                                $num = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $num++;
                                ?>
                            <tr>
                                <td><?php echo $num; ?></td>
                                <td><?php echo $row['categoryName']; ?></td>
                                <td><?php echo $row['categoryDate']; ?></td>
                                <td><a href="categories.php?id=<?php echo $row['id'] ?>"><button
                                            class="btn btn-custom">حذف
                                            التصنيف</button></a></td>

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
<!-- END CONTENT -->

<?php
}
?>



<?php include 'include/footer.php'; ?>