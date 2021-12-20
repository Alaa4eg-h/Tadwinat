<?php include 'include/header.php'; ?>

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
                <button class="btn btn-custom">مقال جديد</button>
                <div class="add-category">
                    <form action="">
                        <div class="form-group">
                            <label for="title">عنوان المقال</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cate">التصنيف</label>
                            <select name="" id="cate" class="form-control">
                                <option value="">بلوجر</option>
                                <option value="">php</option>
                                <option value="">برمجة</option>
                                <option value="">بلوجر</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المقال</label>
                            <input type="file" name="" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button class="btn btn-custom">نشر المقال</button>
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