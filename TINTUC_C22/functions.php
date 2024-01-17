<?php
function ketNoiDB(){
    return mysqli_connect('localhost','root','','tintuc_c22');
}

function dongKetNoi($conn){
    mysqli_close($conn);
}

// lấy danh sách các slider trong CSDL
function getSliders(){
    $conn=ketNoiDB();
    $sql="SELECT * FROM slide";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}

// lấy danh sách các the loại
function getAllTheLoai(){
    $conn=ketNoiDB();
    // $sql="SELECT * FROM theloai";
    $sql="SELECT theloai.* FROM theloai INNER JOIN loaitin ON theloai.id=loaitin.idtheloai GROUP BY theloai.id";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}

// lấy danh sách các thể loại tin theo id the loại truyền vào
function getLoaiTinByTheLoai($idtl){
    $conn=ketNoiDB();
    $sql="SELECT * FROM loaitin WHERE idTheLoai=$idtl";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}

// lấy một tin nổi bật thuộc thể loại với idTL truyền vào
function getTinNoiBatByTheLoai($idtl){
    $conn=ketNoiDB();
    $sql="SELECT tintuc.*FROM loaitin INNER JOIN tintuc ON loaitin.id=tintuc.idLoaiTin
    WHERE idTheLoai=$idtl AND tintuc.NoiBat=1
    LIMIT 0,1";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}

// lấy danh sách tin theo trang truyền vào $from(mẫu tin bắt đâu), $st1t(số tin 1 trang)
function getSoTinTheoTrang($from, $st1t, $idlt){
    $conn=ketNoiDB();
    $sql="SELECT *FROM tintuc WHERE idLoaiTin=$idlt LIMIT $from,$st1t";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
// Lấy tổng số mẫu tin thep loai tin ($idlt) trong table tintuc
function getAllTinByLoaiTin($idlt){
    $conn=ketNoiDB();
    $sql="SELECT *FROM tintuc WHERE idLoaiTin=$idlt ";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getTenTheLoaiByLoaiTin($idtl){
    $conn=ketNoiDB();
    $sql="SELECT *FROM theloai WHERE id=$idtl ";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getTenLoaiTinByTheloai($idlt){
    $conn=ketNoiDB();
    $sql="SELECT *FROM loaitin WHERE id=$idlt";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getTieuDeByTheLoai($idct){
    $conn=ketNoiDB();
    $sql="SELECT *FROM tintuc WHERE id=$idct";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getCommentByTinTuc($idct){
    $conn=ketNoiDB();
    $sql="SELECT *FROM comment WHERE idtintuc=$idct";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getAllUsers(){
    $conn=ketNoiDB();
    $sql="SELECT*FROM users";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getCommentByUsers($idusers){
    $conn=ketNoiDB();
    $sql="SELECT users.*FROM users INNER JOIN comment ON users.id=comment.idUser
    WHERE idUser=$idusers";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getTinLienQuan($idct,$idtlq){
    $conn=ketNoiDB();
    $sql="SELECT *FROM tintuc WHERE id!=$idct AND idloaitin=$idtlq
    LIMIT 3,3";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
function getTinNoiBat($idct,$idtlq){
    $conn=ketNoiDB();
    $sql="SELECT *FROM tintuc WHERE id!=$idct AND idloaitin=$idtlq AND NoiBat=1
    LIMIT 0,3";
    $rs = mysqli_query($conn,$sql);
    dongKetNoi($conn);
    return $rs;
}
?>
