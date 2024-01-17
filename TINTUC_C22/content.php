 <?php
    include_once "functions.php";
    $results=getSliders();
    // $theloais=getAllTheLoai();
 ?>
 <!-- Page Content -->
<div class="p-3 mb-2 bg-secondary text-white container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                        while($rowSlider = mysqli_fetch_assoc($results)){
                            $active=$rowSlider["id"]==1 ? "active":"";
                    ?>
                    <div class="item <?php echo $active ?>">
                        <img class="slide-image" src="img/slide/<?php echo $rowSlider['Hinh'];?>" alt="">
                    </div>
                    <?php
                        }
                    ?>
                
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left container">
        <?php
            include_once "leftmenu.php";
        ?>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                    <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    <?php 
                        $theloais=getAllTheLoai();
                        while($rowTheLoai=mysqli_fetch_assoc($theloais)){
                            $loaiTinByTheLoai = getLoaiTinByTheLoai($rowTheLoai["id"]);
                            if(mysqli_num_rows($loaiTinByTheLoai)>0){
                    ?>
                    <div class="row-item row">  
                        <h3>
                            <a href="loaitin.php?idlt=<?php echo $rowLoaiTin["id"]?>&idtl=<?php echo $rowTheLoai["id"]?>"><?php echo $rowTheLoai['Ten']; ?></a> |
                            <?php
                            $loaiTinByTheLoai = getLoaiTinByTheLoai($rowTheLoai["id"]);
                            while ($rowLoaiTin = mysqli_fetch_assoc($loaiTinByTheLoai)){
                            ?>
                            <small><a href="loaitin.php?idlt=<?php echo $rowLoaiTin["id"]?>&idtl=<?php echo $rowTheLoai["id"]?>"><i><?php echo $rowLoaiTin["Ten"]?></i></a>/</small>
                    <?php
                        }
                    
                    ?>
                        </h3>
                        <?php 
                        $tinNoiBat=getTinNoiBatByTheLoai($rowTheLoai["id"]);
                        $rowTinNoiBat=mysqli_fetch_assoc($tinNoiBat);
                        $truyenLoaiTin=getLoaiTinByTheLoai($rowTheLoai["id"]);
                        $rowTruyenLoaiTin=mysqli_fetch_assoc($truyenLoaiTin);
                        ?>
                        <div class="col-md-12 border-right">
                            <div class="col-md-3">
                                <a href="chitiet.php?idct=<?php echo $rowTinNoiBat["id"]?>&idtlq=<?php echo $rowTruyenLoaiTin["id"]?>">
                                    <img class="img-responsive" src="img/tintuc/<?php echo $rowTinNoiBat['Hinh'];?>" alt="">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3><?php echo $rowTinNoiBat['TieuDe'];?></h3>
                                <p><?php echo $rowTinNoiBat['TomTat'];?></p>
                                <a class="btn btn-primary" href="chitiet.php?idct=<?php echo $rowTinNoiBat["id"]?>&idtlq=<?php echo $rowTruyenLoaiTin["id"]?>">Xem Chi Tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>

                        </div>
                        <?php
                        
                        ?>
                        <div class="break"></div>
                    </div>
                    <?php
                        }
                    }
                    ?>
                    <!-- end item -->
                </div>
            </div>
        </div>
    </div>
<!-- /.row -->
</div>
<!-- end Page Content -->   