<?php
echo '合成します';
$file1 = "fream.jpg";
$file2 = "qr.jpg";
$newfile = "FreamQR.jpg";

// コピー先画像作成
$dst_image = imagecreatefromjpeg($file1);

// コピー先画像のサイズ取得
$imagesize = getimagesize($file1);
$dst_w = $imagesize[0];
$dst_h = $imagesize[1];


// コピー元画像読み込み
$src_image = imagecreatefromjpeg($file2);

// コピー元画像のサイズ取得
$imagesize = getimagesize($file2);
$src_w = $imagesize[0];
$src_h = $imagesize[1];

// コピー元画像の配置後のサイズ計算
$resize_w = $dst_w / 2;
$resize_h = $src_h / ($src_w / $resize_w);

// リサイズしてコピー
imagecopyresampled(
    $dst_image, // コピー先の画像
    $src_image, // コピー元の画像
    110,         // コピー先の x 座標
    45,         // コピー先の y 座標。
    0,          // コピー元の x 座標
    0,          // コピー元の y 座標
    $resize_w,  // コピー先の幅
    $resize_h,  // コピー先の高さ
    $src_w,     // コピー元の幅
    $src_h
);    // コピー元の高さ

imagejpeg($dst_image, $newfile);
// imagedestroy($dst_image);
echo "<img src = 'FreamQR.jpg'>";
