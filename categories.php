<?php

include 'include/connection.php';
include 'include/header.php';






if (isset($_POST['add'])) {
    $cName = $_POST['category'];
    $cAdd = $_POST['add'];



    if (empty($cName)) {
        echo "برجاء كتابة اسم التصنيف";
    } elseif (strlen($cName) > 100) {
        echo "برجاء كتابة عدد حروف لا تزيد عن 100 حرف";
    } else {
        $query = "INSERT INTO categories (categoryName) VALUES ('$cName')";

        mysqli_query($conn, $query);
        echo "تمت إضافة التصنيف بنجاح";
    }
}






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
                            <a href="#">
                                <span><i class="fa fa-th-large"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                    </ul>
                    <li>
                        <a href="#">
                            <span><i class="fas fa-tag"></i></span>
                            <span>عرض الموقع</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span><i class="fa fa-sign-out"></i></span>
                            <span>تسجيل الخروج</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10" id="main-area">
                <div class="add-category">
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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>رقم الفئة</th>
                                <th>إسم الفئة</th>
                                <th>تاريخ الإضافة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
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



<?php include 'include/footer.php'; ?>