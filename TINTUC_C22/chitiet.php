<?php
    include_once "functions.php";
    $idct=$_GET['idct'];
    $idtlq=$_GET['idtlq'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Chi Tiết</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php
        include_once('nav.php');
    ?>

    <!-- Page Content -->
    <div class="container">
    <?php
            $tinTieuDe=getTieuDeByTheLoai($idct);
            while($rowTinTieuDe=mysqli_fetch_assoc($tinTieuDe)){
         ?>
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $rowTinTieuDe['TieuDe']?></h1>
                
                <!-- Author -->
                <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p>

                <!-- Preview Image -->
                <!-- /900x300 -->
                <img width="800px" height="300px" class="HinhAnh" src="img/tintuc/<?php echo $rowTinTieuDe['Hinh']?>" alt="">

                <!-- Date/Time -->
                <?php 
                $chuoiNgay=date($rowTinTieuDe['updated_at']);

                ?>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $chuoiNgay?></p>
                <hr>
                <!-- Post Content -->
                <p class="lead"><?php echo $rowTinTieuDe['TomTat']?></p>
                <?php
                $tinTieuDe=getTieuDeByTheLoai($idct);
                while($rowTinTieuDe=mysqli_fetch_assoc($tinTieuDe)){
                ?>
                <p><?php echo $rowTinTieuDe['NoiDung']?></p>
                <?php
                }
                ?>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                    $commentByTinTuc=getCommentByTinTuc($idct);
                    while($rowCommentByTinTuc=mysqli_fetch_assoc($commentByTinTuc)){
                        $idallUsers=getAllUsers();
                        ($rowAllUsers=mysqli_fetch_assoc($idallUsers));
                        $idCommentByUsers=getCommentByUsers($rowAllUsers["id"]);
                        $rowidCommnetByUsers=mysqli_fetch_assoc($idCommentByUsers);
                ?>
                <div class="media">     
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $rowidCommnetByUsers['name']?>
                            <small><?php echo $rowCommentByTinTuc['created_at']?></small>
                        </h4>
                        <?php echo $rowCommentByTinTuc['NoiDung']?>
                    </div>  
                </div> 
                <?php
                    }  
                ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        <?php 
                            $tinLienQuan=getTinLienQuan($idct,$idtlq);
                            while($rowTinLienQuan=mysqli_fetch_assoc($tinLienQuan)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet.php?idct=<?php echo  $idct?>&idtlq=<?php echo  $idtlq?>">
                                    <img class="img-responsive" src="img/tintuc/<?php echo $rowTinLienQuan['Hinh']?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?idct=<?php echo  $idct?>&idtlq=<?php echo  $idtlq?>"><b><?php  echo $rowTinLienQuan['TieuDe']; ?></b></a>
                            </div>
                            <p><?php  echo $rowTinLienQuan['TomTat']; ?></p>
                            <div class="break"></div>
                        </div>
                        <?php 
                            }
                        ?>
                        <!-- end item -->
                        
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        <?php 
                            $tinNoiBat=getTinNoiBat($idct,$idtlq);
                            while($rowTinNoiBat=mysqli_fetch_assoc($tinNoiBat)){
                        ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet.php?idct=<?php echo  $idct?>&idtlq=<?php echo  $idtlq?>">
                                    <img class="img-responsive" src="img/tintuc/<?php  echo $rowTinNoiBat['Hinh']; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?idct=<?php echo  $idct?>&idtlq=<?php echo  $idtlq?>"><b><?php  echo $rowTinNoiBat['TieuDe']; ?></b></a>
                            </div>
                            <p><?php  echo $rowTinNoiBat['TomTat']; ?></p>
                            <div class="break"></div>
                        </div>
                        <?php 
                            }
                        ?>
                        <!-- end item -->

                    </div>
                </div>
                
            </div>
        
            <?php
            }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <?php
        include_once('footer.php');
    ?>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

</body>
</html>
