<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>لوحة التحكم</title>
</head>

<body>

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
                        <ul class="collaspe" id="menu">
                            <li>
                                <a href="#">
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
                                <span><i class="fas fa-tag"></i></span>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At repellat rem,
                    impedit sequi provident iusto! Id voluptates consequuntur sequi voluptas praesentium quae incidunt
                    amet, aliquam, nesciunt, rem nostrum quidem fuga?</div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->








    <!-- JQUERY  -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/44c61da6d8.js" crossorigin="anonymous"></script>
    <!-- BOOSTRAP JS -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>