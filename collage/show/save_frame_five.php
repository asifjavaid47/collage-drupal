<?php


//  error_reporting(E_ALL);
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";exit;

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
    if ($f_id == 16 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.06;
        $newheight = $img_h1 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 18 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1.07;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 20 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.45;
        $newheight = $img_h1 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 20 && ($img_w1 > $img_h1)) {
        $newwidth = $img_w1 * 1.1;
        $newheight = $img_h1 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 18 && ($img_w1 > $img_h1)) {
        $newwidth = $img_w1 * 1.06;
        $newheight = $img_h1 * 1.06;
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
    } else if ($f_id == 16 && ($img_w1 > $img_h1)) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1.04;
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
    if ($f_id == 16 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.06;
        $newheight = $img_h2 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 18 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.45;
        $newheight = $img_h2 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 18 && ($img_w2 > $img_h2)) {
        $newwidth = $img_w2 * 1.09;
        $newheight = $img_h2 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 20 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.45;
        $newheight = $img_h2 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 20 && ($img_w2 > $img_h2)) {
        $newwidth = $img_w2 * 1.1;
        $newheight = $img_h2 * 1.1;
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
    } else if ($f_id == 16 && ($img_w2 > $img_h2)) {

        $newwidth = $img_w2 * 1.06;
        $newheight = $img_h2 * 1.06;
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
    if ($f_id == 16 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.06;
        $newheight = $img_h3 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 18 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.45;
        $newheight = $img_h3 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 18 && ($img_w3 > $img_h3)) {
        $newwidth = $img_w3 * 1.09;
        $newheight = $img_h3 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 20 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.45;
        $newheight = $img_h3 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 20 && ($img_w3 > $img_h3)) {
        $newwidth = $img_w3 * 1.1;
        $newheight = $img_h3 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
    //else if ($f_id == 16 && ($img_w3 > $img_h3)) {
//        $newwidth = $img_w3 * 1.13;
//        $newheight = $img_h3 * 1.13;
//        // Load
//        $thumb = imagecreatetruecolor($newwidth, $newheight);
//        $source = imagecreatefromjpeg($new_image3);
//        // Resize
//        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
//        // Output
//        imagejpeg($thumb, '../frames_resize/' . $new_image3);
//    } 
        else if ($img_w3 < $box3_width) {
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
    } else if ($f_id == 16 && ($img_w3 <= $img_h3)) {
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
$image->new_image_name = '3' . $image_name4;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image4 = $process['new_file_path'];
    list($img_w4, $img_h4) = getimagesize($new_image4);
    $box4_width = intval($box_width4 / 2);
    $box4_height = intval($box_height4 / 2);
    if ($f_id == 16 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.06;
        $newheight = $img_h4 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 18 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.45;
        $newheight = $img_h4 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 18 && ($img_w4 > $img_h4)) {
        $newwidth = $img_w4 * 1.09;
        $newheight = $img_h4 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 20 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.45;
        $newheight = $img_h4 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 20 && ($img_w4 > $img_h4)) {
        $newwidth = $img_w4 * 1.1;
        $newheight = $img_h4 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 16 && ($img_w4 > $img_h4)) {
        $newwidth = $img_w4 * 1.13;
        $newheight = $img_h4 * 1.13;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($img_w4 < $box4_width) {
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
    } else if ($f_id == 16 && ($img_w4 <= $img_h4)) {
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
}//end resize FIFTH image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image fourth start here
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
    if ($f_id == 16 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.06;
        $newheight = $img_h5 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 18 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.45;
        $newheight = $img_h5 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 18 && ($img_w5 > $img_h5)) {
        $newwidth = $img_w5 * 1.09;
        $newheight = $img_h5 * 1.09;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 20 && ($img_w5 == $img_h5)) {
        $newwidth = $img_w5 * 1.45;
        $newheight = $img_h5 * 1.45;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 20 && ($img_w5 > $img_h5)) {
        $newwidth = $img_w5 * 1.1;
        $newheight = $img_h5 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 16 && ($img_w5 > $img_h5)) {
        $newwidth = $img_w5 * 1.13;
        $newheight = $img_h5 * 1.13;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($img_w5 < $box5_width) {
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
    } else if ($f_id == 16 && ($img_w5 <= $img_h5)) {
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
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
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
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
$icon4 = imagecreatefromjpeg($new_image4);
$icon5 = imagecreatefromjpeg($new_image5);
// ... add more source images as needed
//Frame 1 Starts
if ($f_id == '16') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.7;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 50;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 370;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 310;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 70;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.7;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        } else if ($pos_h2 == ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3.6;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 == $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 50;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 370;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 310;
        } else if ($image_w2 == $image_h2) {

            $pos_h2 = 70;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3.25;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.7;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        } else if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = 70;
            $pos_w3 = 0;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 50;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 650;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 70;
            $pos_w3 = 250;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3.25;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        } else if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.7;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        } else if ($pos_h4 == ($pos_h4 / 2)) {
            $pos_h4 = 70;
            $pos_w4 = 0;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 50;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 650;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 70;
            $pos_w4 = 250;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
           $pos_w5 = $slot_5_de[0] * 2.9;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        } else if ($pos_h5 > ($pos_h5 / 2)) {
           $pos_h5 = $slot_5_de[2] * 4.7;
        } else if ($pos_h5 < ($pos_h5 / 2)) {
           $pos_h5 = $slot_5_de[2] * 3;
        } else if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = 50;
            $pos_w5 = 0;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 50;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 650;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 70;
            $pos_w5 = 250;
        }
    }
    //frame 18 starts here
} else if ($f_id == '18') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {
            if ($pos_w1 > ($pos_w1 / 2)) {
                $pos_w1 = $slot_1_de[0] * 4.2;
            }
        } else if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4.2;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        } else if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 5;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 90;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 600;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 240;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0];
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.5;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        } else if ($pos_h2 == ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3.6;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 == $image_w2) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 510;
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
            $pos_w3 = $slot_3_de[0];
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.5;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        } else if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3.6;
        }
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 == $image_w3) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 510;
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
            $pos_w4 = $slot_4_de[0];
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        } else if ($pos_w4 == ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 2;
        } else if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.5;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        } else if ($pos_h4 == ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3.6;
        }
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 == $image_w4) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 510;
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
            $pos_w5 = $slot_5_de[0];
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        } else if ($pos_w5 == 0 && $pos_h5 == 0) {

//zoom
//            $newwidth = $img_w5 * 5;
//            $newheight = $img_h5 * 5;
//            // Load
//            $thumb = imagecreatetruecolor($newwidth, $newheight);
//            $source = imagecreatefromjpeg($new_image5);
//            // Resize
//            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
//            // Output
//            imagejpeg($thumb, '../frames_resize/' . $new_image5);
//            $pos_w5 = 20;
        } else if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 4.5;
        } else if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        } else if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3.6;
        }
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 == $image_w5) {
            $pos_h5 = $slot_5_de[2] * 3;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 510;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 200;
            $pos_w5 = 0;
        }
    }
}//Frame 19 Starts
else if ($f_id == '19') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.9;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.7;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 50;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 50;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 400;
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
            $pos_w2 = $slot_2_de[0] * 2.9;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.7;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        } else if ($pos_h2 == ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3.6;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 == $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 50;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 50;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 400;
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
            $pos_w3 = $slot_3_de[0] * 2.9;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.7;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        } else if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 50;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 400;
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
            $pos_w4 = $slot_4_de[0] * 2.9;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        } else if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.7;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        } else if ($pos_h4 == ($pos_h4 / 2)) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 50;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 400;
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
            $pos_w5 = $slot_5_de[0] * 2.9;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        } else if ($pos_w5 == ($pos_w5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 2;
        } else if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 4.7;
        } else if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        } else if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = 50;
            $pos_w5 = 0;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 50;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 400;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        }
    }
} //Frame 20 Starts
else if ($f_id == '20') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        } else if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.6;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 450;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 10;
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

            $pos_w2 = $slot_2_de[0] * 2;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.6;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 == $image_w1) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 450;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 10;
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
            $pos_w3 = $slot_3_de[0] * 2;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.6;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
        list($image_w3, $image_h3) = getimagesize($new_image1);
        if ($image_h3 == $image_w3) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 450;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 10;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 150;
            $pos_w3 = 0;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {

            $pos_w4 = $slot_4_de[0] * 2;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        } else if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.6;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
        list($image_w4, $image_h4) = getimagesize($new_image1);
        if ($image_h4 == $image_w4) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 450;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 10;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 150;
            $pos_w4 = 0;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 2.9;
        } else if ($pos_w5 < ($pos_w5 / 2)) {
            $pos_w5 = $slot_5_de[0] * 3;
        } else if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 4.7;
        } else if ($pos_h5 < ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2] * 3;
        } else if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = 50;
            $pos_w5 = 0;
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 450;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 10;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 150;
            $pos_w5 = 0;
        }
    }
//    Frame 22 start here
} else if ($f_id == '22') {
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
            $pos_w1 = $slot_1_de[0] * 2.5;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.3;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 250;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 180;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = $slot_2_de[0] * 2.7;
        }
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 2.80;
        }if ($pos_w2 == ($pos_w2 / 2)) {
            $pos_w2 = 70;
            $pos_h2 = 0;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 70;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 530;
        } else if ($image_w2 == $image_h2) {

            $pos_h2 = 0;
            $pos_w2 = 310;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0]*1.15;
        } 
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2]*2.1;
        }
        if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2]*3;
        }
         list($image_w3, $image_h3) = getimagesize($new_image3);
         if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
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
            $pos_w4 = $slot_4_de[0]*1.15;
        } 
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2]*2.1;
        }
        if ($pos_h4 == ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2]*3;
        }
         list($image_w4, $image_h4) = getimagesize($new_image4);
         if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
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
            $pos_w5 = $slot_5_de[0]*1.15;
        } 
        if ($pos_h5 > ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2]*2.1;
        }
        if ($pos_h5 == ($pos_h5 / 2)) {
            $pos_h5 = $slot_5_de[2]*3;
        }
         list($image_w5, $image_h5) = getimagesize($new_image5);
         if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
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
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
imagecopy($canvas, $icon3, $box_x3 / 2, $box_y3 / 2, $pos_w3, $pos_h3, $box_width3 / 2, $box_height3 / 2);
imagecopy($canvas, $icon4, $box_x4 / 2, $box_y4 / 2, $pos_w4, $pos_h4, $box_width4 / 2, $box_height4 / 2);
imagecopy($canvas, $icon5, $box_x5 / 2, $box_y5 / 2, $pos_w5, $pos_h5, $box_width5 / 2, $box_height5 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if ($f_id == '16') {
        $img->setPosition("center", "2940");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '18') {
        $img->setPosition("center", "3080");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '19') {
        $img->setPosition("center", "1620");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '20') {
        $img->setPosition("center", "4900");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '22') {
        $img->setPosition("center", "2260");
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
