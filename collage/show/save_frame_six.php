<?php

/*
  error_reporting(E_ALL);
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";exit;
 */
include('includes/connection.php');
require('includes/class.php');
require('includes/class-fontsize.php');
header('Content-Type: image/png');
$f_id = $_POST['frame'];
$frame_name = '../../sites/all/modules/frames/frames_orignal/' . $f_id . ".png";
$data = explode(',', $_POST['frame_id']);
$box1 = $_POST['slot_1_details'];
$box2 = $_POST['slot_2_details'];
$box3 = $_POST['slot_3_details'];
$box4 = $_POST['slot_4_details'];
$box5 = $_POST['slot_5_details'];
$box6 = $_POST['slot_6_details'];
//resize the image first start here
$query_temp1 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_1'] . '"');
$row_temp1 = mysql_fetch_array($query_temp1);
$query_box1 = mysql_query('select * from box_detail where box_id="' . $box1 . '"');
$row_box1 = mysql_fetch_array($query_box1);
$image_name1 = $row_temp1['image_name'];
$box_x1 = $row_box1['box_x'];
$box_y1 = $row_box1['box_y'];
$box_width1 = $row_box1['box_width'];
$box_height1 = $row_box1['box_height'];
// Get new sizes
$canvas = @imagecreatefrompng($frame_name);
$filename1 = '../../sites/all/modules/frames/frames_temp/' . $image_name1;
$image = new Resize_Image;
list($width1, $height1) = getimagesize($filename1);
if ($width1 < $height1) {
    $image->new_width = $box_width1 / 2;
} else {
    $image->new_height = $box_height1 / 2;
}
$image->image_to_resize = $filename1; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '1' . $image_name1;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
    $box1_width = intval($box_width1 / 2);
    $box1_height = intval($box_height1 / 2);
    if ($f_id == 21 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.55;
        $newheight = $img_h1 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 25 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 23 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.7;
        $newheight = $img_h1 * 1.7;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 24 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.08;
        $newheight = $img_h1 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 27 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.09;
        $newheight = $img_h1 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 26 && ($img_w1 > $img_h1)) {
        $newwidth = $img_w1 * 1.08;
        $newheight = $img_h1 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 26 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.6;
        $newheight = $img_h1 * 1.6;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 23 && ($img_w1 < $img_h1)) {
        $newwidth = $img_w1 * 1.1;
        $newheight = $img_h1 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 25 && ($img_w1 < $img_h1)) {
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1.07;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($img_w1 < $box1_width) {
        $diff = $box1_width - $img_w1;
        $newwidth = $box_width1 / 2;
        $newheight = $img_h1 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($img_h1 < $box1_height) {
        $diff = $box1_height - $img_h1;
        $newheight = $box_height1 / 2;
        $newwidth = $img_w1 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    }
}
//end resize first image
//--------------------------------------------------------------------------------------------------------------------------
//resize the image second start here
$query_temp2 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_2'] . '"');
$row_temp2 = mysql_fetch_array($query_temp2);
$query_box2 = mysql_query('select * from box_detail where box_id="' . $box2 . '"');
$row_box2 = mysql_fetch_array($query_box2);
$image_name2 = $row_temp2['image_name'];
$box_x2 = $row_box2['box_x'];
$box_y2 = $row_box2['box_y'];
$box_width2 = $row_box2['box_width'];
$box_height2 = $row_box2['box_height'];
// Get new sizes
$filename2 = '../../sites/all/modules/frames/frames_temp/' . $image_name2;
$image = new Resize_Image;
list($width2, $height2) = getimagesize($filename2);
if ($width2 < $height2) {
    $image->new_width = $box_width2 / 2;
} else {
    $image->new_height = $box_height2 / 2;
}
$image->image_to_resize = $filename2; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "2" . $image_name2;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image2 = $process['new_file_path'];
    list($img_w2, $img_h2) = getimagesize($new_image2);
    $box2_width = intval($box_width2 / 2);
    $box2_height = intval($box_height2 / 2);
    if ($f_id == 21 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.55;
        $newheight = $img_h2 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 25 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 27 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.09;
        $newheight = $img_h2 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 26 && ($img_w2 > $img_h2)) {
        $newwidth = $img_w2 * 1.08;
        $newheight = $img_h2 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 26 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.6;
        $newheight = $img_h2 * 1.6;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 25 && ($img_w2 < $img_h2)) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1.07;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 24 && ($img_w2 < $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 24 && ($img_w2 < $img_h2)) {
        $newwidth = $img_w2 * 1.2;
        $newheight = $img_h2 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 24 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.8;
        $newheight = $img_h2 * 1.8;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($img_w2 < $box2_width) {
        $diff = $box2_width - $img_w2;
        $newwidth = $box_width2 / 2;
        $newheight = $img_h2 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($img_h2 < $box2_height) {
        $diff = $box2_height - $img_h2;
        $newheight = $box_height2 / 2;
        $newwidth = $img_w2 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
}
//end resize second image
//--------------------------------------------------------------------------------------------------------------------------
//resize the image third start here
$query_temp3 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_3'] . '"');
$row_temp3 = mysql_fetch_array($query_temp3);
$query_box3 = mysql_query('select * from box_detail where box_id="' . $box3 . '"');
$row_box3 = mysql_fetch_array($query_box3);
$image_name3 = $row_temp3['image_name'];
$box_x3 = $row_box3['box_x'];
$box_y3 = $row_box3['box_y'];
$box_width3 = $row_box3['box_width'];
$box_height3 = $row_box3['box_height'];
// Get new sizes
$filename3 = '../../sites/all/modules/frames/frames_temp/' . $image_name3;
$image = new Resize_Image;
list($width3, $height3) = getimagesize($filename3);
if ($width3 < $height3) {
    $image->new_width = $box_width3 / 2;
} else {
    $image->new_height = $box_height3 / 2;
}
$image->image_to_resize = $filename3; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '3' . $image_name3;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image3 = $process['new_file_path'];
    list($img_w3, $img_h3) = getimagesize($new_image3);
    $box3_width = intval($box_width3 / 2);
    $box3_height = intval($box_height3 / 2);
    if ($f_id == 21 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.55;
        $newheight = $img_h3 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 25 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 26 && ($img_w3 > $img_h3)) {
        $newwidth = $img_w3 * 1.08;
        $newheight = $img_h3 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 26 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.6;
        $newheight = $img_h3 * 1.6;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 27 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.09;
        $newheight = $img_h3 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 25 && ($img_w3 < $img_h3)) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1.07;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 24 && ($img_w3 < $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 24 && ($img_w3 < $img_h3)) {
        $newwidth = $img_w3 * 1.2;
        $newheight = $img_h3 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 24 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.8;
        $newheight = $img_h3 * 1.8;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($img_w3 < $box3_width) {
        $diff = $box3_width - $img_w3;
        $newwidth = $box_width3 / 2;
        $newheight = $img_h3 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($img_h3 < $box3_height) {
        $diff = $box3_height - $img_h3;
        $newheight = $box_height3 / 2;
        $newwidth = $img_w3 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
}
//end resize third image
//---------------------------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------
//resize the image fourth start here
$query_temp4 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_4'] . '"');
$row_temp4 = mysql_fetch_array($query_temp4);
$query_box4 = mysql_query('select * from box_detail where box_id="' . $box4 . '"');
$row_box4 = mysql_fetch_array($query_box4);
$image_name4 = $row_temp4['image_name'];
$box_x4 = $row_box4['box_x'];
$box_y4 = $row_box4['box_y'];
$box_width4 = $row_box4['box_width'];
$box_height4 = $row_box4['box_height'];
// Get new sizes
$filename4 = '../../sites/all/modules/frames/frames_temp/' . $image_name4;
$image = new Resize_Image;
list($width4, $height4) = getimagesize($filename4);
if ($width4 < $height4) {
    $image->new_width = $box_width4 / 2;
} else {
    $image->new_height = $box_height4 / 2;
}
$image->image_to_resize = $filename4; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '4' . $image_name4;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image4 = $process['new_file_path'];
    list($img_w4, $img_h4) = getimagesize($new_image4);
    $box4_width = intval($box_width4 / 2);
    $box4_height = intval($box_height4 / 2);
    if ($f_id == 21 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.55;
        $newheight = $img_h4 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 24 && ($img_w4 < $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 24 && ($img_w4 < $img_h4)) {
        $newwidth = $img_w4 * 1.2;
        $newheight = $img_h4 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 25 && ($img_w4 < $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.03;
        $newheight = $img_h4 * 1.03;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 25 && ($img_w4 < $img_h4)) {
        $newwidth = $img_w4 * 1.2;
        $newheight = $img_h4 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 25 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.52;
        $newheight = $img_h4 * 1.52;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }  else if ($f_id == 26 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.12;
        $newheight = $img_h4 * 1.12;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 27 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.09;
        $newheight = $img_h4 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 24 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.8;
        $newheight = $img_h4 * 1.8;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($img_w4 < $box4_width) {
        $diff = $box4_width - $img_w4;
        $newwidth = $box_width4 / 2;
        $newheight = $img_h4 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($img_h4 < $box4_height) {
        $diff = $box4_height - $img_h4;
        $newheight = $box_height4 / 2;
        $newwidth = $img_w4 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
}//end resize FOURTH image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image FIFTH start here
$query_temp5 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_5'] . '"');
$row_temp5 = mysql_fetch_array($query_temp5);
$query_box5 = mysql_query('select * from box_detail where box_id="' . $box5 . '"');
$row_box5 = mysql_fetch_array($query_box5);
$image_name5 = $row_temp5['image_name'];
$box_x5 = $row_box5['box_x'];
$box_y5 = $row_box5['box_y'];
$box_width5 = $row_box5['box_width'];
$box_height5 = $row_box5['box_height'];
// Get new sizes
$filename5 = '../../sites/all/modules/frames/frames_temp/' . $image_name5;
$image = new Resize_Image;
list($width5, $height5) = getimagesize($filename5);
if ($width5 < $height5) {
    $image->new_width = $box_width5 / 2;
} else {
    $image->new_height = $box_height5 / 2;
}
$image->image_to_resize = $filename5; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '5' . $image_name5;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image5 = $process['new_file_path'];
    list($img_w5, $img_h5) = getimagesize($new_image5);
    $box5_width = intval($box_width5 / 2);
    $box5_height = intval($box_height5 / 2);
    if ($f_id == 21 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.55;
        $newheight = $img_h5 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 26 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.1;
        $newheight = $img_h5 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 25 && ($img_w5 < $img_h5)) {
        $newwidth = $img_w5 * 1.3;
        $newheight = $img_h5 * 1.3;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 27 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.09;
        $newheight = $img_h5 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 25 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.35;
        $newheight = $img_h5 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 24 && ($img_w5 < $img_h5)) {
        $newwidth = $img_w5 * 1.25;
        $newheight = $img_h5 * 1.25;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 24 && ($img_w5 == $img_h5) && isset($_POST['slot_5_de'])) {
        $newwidth = $img_w5 * 1.35;
        $newheight = $img_h5 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 24 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.25;
        $newheight = $img_h5 * 1.25;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($img_w5 < $box5_width) {
        $diff = $box5_width - $img_w5;
        $newwidth = $box_width5 / 2;
        $newheight = $img_h5 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($img_h5 < $box5_height) {
        $diff = $box5_height - $img_h5;
        $newheight = $box_height5 / 2;
        $newwidth = $img_w5 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    }
}//end resize FIFTH image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image SIXTH start here
$query_temp6 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_6'] . '"');
$row_temp6 = mysql_fetch_array($query_temp6);
$query_box6 = mysql_query('select * from box_detail where box_id="' . $box6 . '"');
$row_box6 = mysql_fetch_array($query_box6);
$image_name6 = $row_temp6['image_name'];
$box_x6 = $row_box6['box_x'];
$box_y6 = $row_box6['box_y'];
$box_width6 = $row_box6['box_width'];
$box_height6 = $row_box6['box_height'];
// Get new sizes
$filename6 = '../../sites/all/modules/frames/frames_temp/' . $image_name6;
$image = new Resize_Image;
list($width6, $height6) = getimagesize($filename6);
if ($width6 < $height6) {
    $image->new_width = $box_width6 / 2;
} else {
    $image->new_height = $box_height6 / 2;
}
$image->image_to_resize = $filename6; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '6' . $image_name6;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image6 = $process['new_file_path'];
    list($img_w6, $img_h6) = getimagesize($new_image6);
    $box6_width = intval($box_width6 / 2);
    $box6_height = intval($box_height6 / 2);
    if ($f_id == 21 && ($img_w6 == $img_h6)) {
        $newwidth = $img_w6 * 1.55;
        $newheight = $img_h6 * 1.55;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 25 && ($img_w6 < $img_h6)) {
        $newwidth = $img_w6 * 1.3;
        $newheight = $img_h6 * 1.3;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 26 && ($img_w6 == $img_h6)) {
        $newwidth = $img_w6 * 1.1;
        $newheight = $img_h6 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 27 && ($img_w6 == $img_h6)) {
        $newwidth = $img_w6 * 1.09;
        $newheight = $img_h6 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 25 && ($img_w6 == $img_h6)) {
        $newwidth = $img_w6 * 1.35;
        $newheight = $img_h6 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 24 && ($img_w6 < $img_h6)) {
        $newwidth = $img_w6 * 1.25;
        $newheight = $img_h6 * 1.25;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 24 && ($img_w6 == $img_h6) && isset($_POST['slot_6_de'])) {
        $newwidth = $img_w6 * 1.35;
        $newheight = $img_h6 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 24 && ($img_w6 == $img_h6)) {
        $newwidth = $img_w6 * 1.25;
        $newheight = $img_h6 * 1.25;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($img_w6 < $box6_width) {
        $diff = $box6_width - $img_w6;
        $newwidth = $box_width6 / 2;
        $newheight = $img_h6 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($img_h6 < $box6_height) {
        $diff = $box6_height - $img_h6;
        $newheight = $box_height6 / 2;
        $newwidth = $img_w6 + ($diff / 2);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    }
}//end resize SIXTH image
//---------------------------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
$icon4 = imagecreatefromjpeg($new_image4);
$icon5 = imagecreatefromjpeg($new_image5);
$icon6 = imagecreatefromjpeg($new_image6);
// ... add more source images as needed
//Frame 21 Starts
if ($f_id == '21') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3.8;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 6;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_w1 == $image_h1) {
            if ($pos_w1 > ($pos_w1 / 2)) {
                $pos_w1 = $slot_1_de[0] * 3.5;
            } else if ($pos_h1 > ($pos_h1 / 2)) {
                $pos_h1 = $slot_1_de[2] * 2.9;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 500;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 200;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3.8;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h1 = $slot_2_de[2] * 6;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_w2 == $image_h2) {
            if ($pos_w2 > ($pos_w2 / 2)) {
                $pos_w2 = $slot_2_de[0] * 3.5;
            } else if ($pos_h2 > ($pos_h2 / 2)) {
                $pos_h2 = $slot_2_de[2] * 2.9;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 500;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {

            $pos_h2 = 200;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3.8;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 6;
        }
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_w3 == $image_h3) {
            if ($pos_w3 > ($pos_w3 / 2)) {
                $pos_w3 = $slot_3_de[0] * 3.5;
            } else if ($pos_h3 > ($pos_h3 / 2)) {
                $pos_h3 = $slot_3_de[2] * 2.9;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 500;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 200;
            $pos_w3 = 0;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 6;
        }
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_w4 == $image_h4) {
            if ($pos_w4 > ($pos_w4 / 2)) {
                $pos_w4 = $slot_4_de[0] * 3.5;
            } else if ($pos_h4 > ($pos_h4 / 2)) {
                $pos_h4 = $slot_4_de[2] * 2.6;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 500;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 200;
            $pos_w4 = 0;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3.8;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 4;
        } else if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 6;
        }
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_w5 == $image_h5) {
            if ($pos_w5 > ($pos_w5 / 2)) {
                $pos_w5 = $slot_5_de[0] * 3.5;
            } else if ($pos_h5 > ($pos_h5 / 2)) {
                $pos_h5 = $slot_5_de[2] * 2.6;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 500;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 200;
            $pos_w5 = 0;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3.8;
        } else if ($pos_w6 < ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] * 4;
        } else if ($pos_h6 < ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] * 6;
        }
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_w6 == $image_h6) {
            if ($pos_w6 > ($pos_w6 / 2)) {
                $pos_w6 = $slot_6_de[0] * 3.5;
            } else if ($pos_h6 > ($pos_h6 / 2)) {
                $pos_h6 = $slot_6_de[2] * 2.6;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 500;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 200;
            $pos_w6 = 0;
        }
    }
    //Frame 23 Starts
} else if ($f_id == '23') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.8;
        }if ($pos_w1 == $pos_h1) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 < $image_w1) {
                $pos_w1 = 0;
                $pos1 = 200;
                $pos_h1 = $pos1;
            }
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 6.5;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {

            $pos_h1 = $slot_1_de[2] * 4.2;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 870;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 400;
            $pos_w1 = 100;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 1.8;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 > $image_w2) {

                $pos_h2 = $slot_2_de[2] * 2.5;
            } else {
                $pos_h2 = $slot_2_de[2] * 6.2;
            }
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 300;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 1.8;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 > $image_w3) {

                $pos_h3 = $slot_3_de[2] * 2.5;
            } else {
                $pos_h3 = $slot_3_de[2] * 6.2;
            }
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 0;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 300;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 150;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 1.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 > $image_w4) {
                $pos_h4 = $slot_4_de[2] * 2.5;
            } else {
                $pos_h4 = $slot_4_de[2] * 6.2;
            }
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 300;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 150;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 1.9;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 > $image_w5) {
                $pos_h5 = $slot_5_de[2] * 2.8;
            } else {
                $pos_h5 = $slot_5_de[2] * 6.2;
            }
        } else if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 220;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 150;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 1.9;
        } else if ($pos_w6 < ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 > $image_w6) {

                $pos_h6 = $slot_6_de[2] * 2.8;
            } else {
                $pos_h6 = $slot_6_de[2] * 6.2;
            }
        } else if ($pos_h6 < ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] * 3;
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 220;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 150;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        }
    }
} // Freame 24 start here
else if ($f_id == '24') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];

        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4;
        }if ($pos_w1 == $pos_h1) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 < $image_w1) {
                $pos_w1 = 0;
                $pos1 = 200;
                $pos_h1 = $pos1;
            }
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] - $slot_1_de[2]  ;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {

            $pos_w1 = $slot_1_de[0] * 4;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 700;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 70;
            $pos_w1 = 350;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 1.8;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_h2 = $slot_2_de[2] * 2;
            } if ($image_h2 > $image_w2) {
                $pos_h2 = $slot_2_de[2] * 3.1;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 100;
            $pos_h2 = 500;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 250;
            $pos_w2 = 100;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 1.8;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_h3 = $slot_3_de[2] * 2;
            } if ($image_h3 > $image_w3) {
                $pos_h3 = $slot_3_de[2] * 3.1;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 100;
            $pos_h3 = 500;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 250;
            $pos_w3 = 100;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 1.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_h4 = $slot_4_de[2] * 2.05;
            } if ($image_h4 > $image_w4) {
                $pos_h4 = $slot_4_de[2] * 3.1;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 100;
            $pos_h4 = 500;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 250;
            $pos_w4 = 100;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            
			if ($image_h5 == $image_w5) {
				$pos_h5 = $slot_5_de[2] * 2;
            }
        } if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        } else if ($pos_h5 > ($pos_h5 / 2)) {
			$pos_h5 = $slot_5_de[2] * 3.7;
			$pos_w5 = 100;

		}
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 100;
            $pos_h5 = 370;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 200;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 100;
            $pos_w5 = 50;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_h6 = $slot_6_de[2] * 2;
            }
        } if ($pos_h6 < ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] * 3;
        } else if ($pos_h6 > ($pos_h6 / 2)) {
			$pos_h6 = $slot_6_de[2] * 3.7;
			$pos_w6 = 100;
		}
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 100;
            $pos_h6 = 370;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 200;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 100;
            $pos_w6 = 150;
        }
    }
}// Freame 25 start here
else if ($f_id == '25') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 1.9;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2];
            } else {
                $pos_h1 = $slot_1_de[2] * 6.2;
            }
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 310;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 150;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 1.9;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 > $image_w2) {

                $pos_h2 = $slot_2_de[2];
            } else {
                $pos_h2 = $slot_2_de[2] * 6.2;
            }
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 310;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 1.9;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 > $image_w3) {
				$pos_h3 = $slot_3_de[2];
            } else {
                $pos_h3 = $slot_3_de[2] * 6.2;
            }
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 0;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 310;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 150;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] - $slot_4_de[0] ;
        }if ($pos_w4 == $pos_h4) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 < $image_w4) {
                $pos_w4 = 0;
                $pos4 = 200;
                $pos_h4 = $pos4;
            }
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 6.7;
        }
		
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 == $image_w4) {
            $pos_h4 = $slot_4_de[2] * 3.9;
        }
		
		if($pos_w4==$pos_h4){
		    $pos_h4 = $slot_4_de[2] - 120;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 150;
            $pos_h4 = 1012;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 250;
            $pos_w4 = 0;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 2;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = 150;
                $pos_h5 = $slot_5_de[2] * 2.7;
            }
            if ($image_h5 > $image_w5) {
                $pos_w5 = 160;
                $pos_h5 = $slot_5_de[2] * 3.7;
            }
            if ($pos_h5 < ($pos_h5 / 2)) {
                $pos_h5 = $slot_5_de[2] * 3;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 120;
            $pos_h5 = 400;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 180;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 150;
            $pos_w5 = 150;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 2;
        } else if ($pos_w6 < ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = 150;
                $pos_h6 = $slot_6_de[2] * 2.7;
            }
            if ($image_h6 > $image_w6) {
                $pos_w6 = 160;
                $pos_h6 = $slot_6_de[2] * 3.7;
            }
            if ($pos_h6 < ($pos_h6 / 2)) {
                $pos_h6 = $slot_6_de[2] * 3;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 120;
            $pos_h6 = 400;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 180;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 150;
            $pos_w6 = 150;
        }
    }
}// Freame 26 start here
else if ($f_id == '26') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        
		if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 1.9;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        
		if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_h1 = $slot_1_de[2] * 1.9;
            }
			
			if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 2.9;
            }
        }
		if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 2;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 370;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 20;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 150;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 1.9;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_h2 = $slot_2_de[2] * 1.9;
            }
			
			if ($image_h2 > $image_w2) {
                $pos_h2 = $slot_2_de[2] * 2.9;
            }
        } 
		
		if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 2;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 370;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 20;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 150;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 1.9;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_h3 = $slot_3_de[2] * 1.9;
            }
			
			if ($image_h3 > $image_w3) {
                $pos_h3 = $slot_3_de[2] * 2.9;
            }
        }
		if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 2;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 370;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 20;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 150;
            $pos_w3 = 0;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($pos_w4 > ($pos_w4 / 2)) {
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 4.1;
            }
			
			if ($image_h4 > $image_w4) {
                $pos_w4 = 0;
                $pos_h4 = 0;
            }
			
			if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 3.3;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 750;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 50;
            $pos_w4 = 400;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($pos_w5 > ($pos_w5 / 2)) {
            if ($image_h5 == $image_w5) {
                $pos_w5 = 100;
                $pos_h5 = $slot_5_de[2] * 3.8;
            }
			
			if ($image_h5 > $image_w5) {
                $pos_w5 = $slot_5_de[0] * 3.8;
            }
			
			if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.9;
            }
        }

		if ($pos_h5 > ($pos_h5 / 2)) {
            if ($image_h5 > $image_w5) {
                $pos_h5 = $slot_5_de[2] * 2.9;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 250;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 150;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 50;
            $pos_w5 = 50;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($pos_w6 > ($pos_w6 / 2)) {
            if ($image_h6 == $image_w6) {
                $pos_w6 = 100;
                $pos_h6 = $slot_6_de[2] * 3.8;
            }
			
			if ($image_h6 > $image_w6) {
                $pos_w6 = $slot_6_de[0] * 3.8;
            }
			
			if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.9;
            }
        } if ($pos_h6 > ($pos_h6 / 2)) {
            if ($image_h6 > $image_w6) {
                $pos_h6 = $slot_6_de[2] * 2.9;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 250;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 150;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 50;
            $pos_w6 = 50;
        }
    }
}// Freame 27 start here
else if ($f_id == '27') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.5;
            }
        } if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] - $slot_1_de[2];
        }
        if ($pos_h1 == ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] - $slot_1_de[2];
        }if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 50;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 550;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 50;
            $pos_w1 = 250;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.5;
            }
        } if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] - $slot_2_de[2];
        }
        if ($pos_h2 == ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] - $slot_2_de[2];
        }if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 50;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 550;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 50;
            $pos_w2 = 250;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.5;
            }
        } if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] - $slot_3_de[2];
        }
        if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] - $slot_3_de[2];
        }if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 50;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 550;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 50;
            $pos_w3 = 250;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.5;
            }
        } if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] - $slot_4_de[2];
        }
        if ($pos_h4 == ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] - $slot_4_de[2];
        }if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 50;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 550;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 50;
            $pos_w4 = 250;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = $slot_5_de[0] * 2.8;
            }
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 2.5;
            }
        } if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] - $slot_5_de[2];
        }
        if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] - $slot_5_de[2];
        }if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 50;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 550;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 50;
            $pos_w5 = 250;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 2.8;
            }
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 2.5;
            }
        } if ($pos_w6 < ($pos_w6 / 2)) {
            $pos_w6 = $slot_6_de[0] * 3;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] - $slot_6_de[2];
        }
        if ($pos_h6 == ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] - $slot_6_de[2];
        }if ($pos_h6 < ($pos_h6 / 2)) {
            $pos_h6 = $slot_6_de[2] * 3;
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 50;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 550;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 50;
            $pos_w6 = 250;
        }
    }
}// Freame 28 start here
else if ($f_id == '28') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos1 = 0;
            $pos_w1 = $pos1;
        }
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.6;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.4;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 300;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 200;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_4_de[0] * 3.8;
            }if ($image_h2 > $image_w2) {
                $pos_w2 = $slot_4_de[0] * 3.8;
            }
        } else if (($pos_w2 / 2) < $pos_w2) {
            $pos_w2 = $slot_2_de[0] * 1.5;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $pos_h2 * 2.1;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 150;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 100;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 3.8;
            }if ($image_h3 > $image_w3) {
                $pos_w3 = $slot_3_de[0] * 3.8;
            }
        } else if (($pos_w3 / 2) < $pos_w3) {
            $pos_w2 = $slot_2_de[0] * 1.5;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $pos_h3 * 2.1;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 150;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 100;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 3.8;
            }if ($image_h4 > $image_w4) {
                $pos_w4 = $slot_4_de[0] * 3.8;
            }
        } else if (($pos_w4 / 2) < $pos_w4) {
            $pos_w4 = $slot_4_de[0] * 1.5;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $pos_h4 * 2.1;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 150;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 100;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = $slot_5_de[0] * 3.8;
            }if ($image_h5 > $image_w5) {
                $pos_w5 = $slot_5_de[0] * 3.8;
            }
        } else if (($pos_w5 / 2) < $pos_w5) {
            $pos_w5 = $slot_5_de[0] * 1.5;
        }
        if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $pos_h5 * 2.1;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 150;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 100;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 3.8;
            }if ($image_h6 > $image_w6) {
                $pos_w6 = $slot_6_de[0] * 3.8;
            }
        } else if (($pos_w6 / 2) < $pos_w6) {
            $pos_w6 = $slot_6_de[0] * 1.5;
        }
        if ($pos_h6 > ($pos_h6 / 2)) {
            $pos_h6 = $pos_h6 * 2.1;
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 150;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 100;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
imagecopy($canvas, $icon3, $box_x3 / 2, $box_y3 / 2, $pos_w3, $pos_h3, $box_width3 / 2, $box_height3 / 2);
imagecopy($canvas, $icon4, $box_x4 / 2, $box_y4 / 2, $pos_w4, $pos_h4, $box_width4 / 2, $box_height4 / 2);
imagecopy($canvas, $icon5, $box_x5 / 2, $box_y5 / 2, $pos_w5, $pos_h5, $box_width5 / 2, $box_height5 / 2);
imagecopy($canvas, $icon6, $box_x6 / 2, $box_y6 / 2, $pos_w6, $pos_h6, $box_width6 / 2, $box_height6 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if ($f_id == '21') {
        $img->setPosition("center", "3070");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '23') {
        $img->setPosition("center", "3280");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '24') {
        $img->setPosition("center", "2100");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '25') {
        $img->setPosition("center", "3280");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '26') {
        $img->setPosition("center", "2100");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '27') {
        $img->setPosition("center", "2920");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '28') {
        $img->setPosition("center", "2280");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    $img->show($path_to_save);
    $canvas = @imagecreatefrompng($path_to_save);
    imagepng($canvas);
} else {
    imagepng($canvas);
}
?>
