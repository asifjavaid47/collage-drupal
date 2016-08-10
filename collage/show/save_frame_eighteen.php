<?php

//  error_reporting(E_ALL);
//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";exit;
include('../includes/connection.php');
require('../includes/class.php');
require('../includes/class-fontsize.php');
header('Content-Type: image/png');
$f_id = $_POST['frame'];
$frame_name = '../frames_orignal/' . $f_id . ".png";
$data = explode(',', $_POST['frame_id']);
$box1 = $_POST['slot_1_details'];
$box2 = $_POST['slot_2_details'];
$box3 = $_POST['slot_3_details'];
$box4 = $_POST['slot_4_details'];
$box5 = $_POST['slot_5_details'];
$box6 = $_POST['slot_6_details'];
$box7 = $_POST['slot_7_details'];
$box8 = $_POST['slot_8_details'];
$box9 = $_POST['slot_9_details'];
$box10 = $_POST['slot_10_details'];
$box11 = $_POST['slot_11_details'];
$box12 = $_POST['slot_12_details'];
$box13 = $_POST['slot_13_details'];
$box14 = $_POST['slot_14_details'];
$box15 = $_POST['slot_15_details'];
$box16 = $_POST['slot_16_details'];
$box17 = $_POST['slot_17_details'];
$box18 = $_POST['slot_18_details'];
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
$filename1 = '../frames_temp/' . $image_name1;
$image = new Resize_Image;
list($width1, $height1) = getimagesize($filename1);
if ($width1 < $height1) {
    $image->new_width = $box_width1 / 4;
} else {
    $image->new_height = $box_height1 / 4;
}
$image->image_to_resize = $filename1; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '1' . $image_name1;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
    $box1_width = intval($box_width1 / 4);
    $box1_height = intval($box_height1 / 4);
    if ($f_id == 71 && ($img_w1 < $img_h1) && (!empty($_POST['slot_1_de']))) {

        $newwidth = $img_w1 * 1;
        $newheight = $img_h1 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 67 && ($img_w1 < $img_h1) && isset($_POST['slot_1_de'])) {

        $newwidth = $img_w1 * 1;
        $newheight = $img_h1 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 67 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.5;
        $newheight = $img_h1 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($img_w1 < $box1_width) {
        $diff = $box1_width - $img_w1;
        $newwidth = $box_width1 / 4;
        $newheight = $img_h1 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($img_h1 < $box1_height) {
        $diff = $box1_height - $img_h1;
        $newheight = $box_height1 / 4;
        $newwidth = $img_w1 + ($diff / 4);
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
$filename2 = '../frames_temp/' . $image_name2;
$image = new Resize_Image;
list($width2, $height2) = getimagesize($filename2);
if ($width2 < $height2) {
    $image->new_width = $box_width2 / 4;
} else {
    $image->new_height = $box_height2 / 4;
}
$image->image_to_resize = $filename2; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "2" . $image_name2;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image2 = $process['new_file_path'];
    list($img_w2, $img_h2) = getimagesize($new_image2);
    $box2_width = intval($box_width2 / 4);
    $box2_height = intval($box_height2 / 4);
   if ($f_id == 71 && ($img_w2 < $img_h2) && (!empty($_POST['slot_2_de']))) {
     
        $newwidth = $img_w2 * 1;
        $newheight = $img_h2 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 71 && ($img_w2 == $img_h2)) {
       
        $newwidth = $img_w2 * 1.5;
        $newheight = $img_h2 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($img_w2 < $box2_width) {
        $diff = $box2_width - $img_w2;
        $newwidth = $box_width2 / 4;
        $newheight = $img_h2 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($img_h2 < $box2_height) {
        $diff = $box2_height - $img_h2;
        $newheight = $box_height2 / 4;
        $newwidth = $img_w2 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
}
//end resize first image
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
$filename3 = '../frames_temp/' . $image_name3;
$image = new Resize_Image;
list($width3, $height3) = getimagesize($filename3);
if ($width3 < $height3) {
    $image->new_width = $box_width3 / 4;
} else {
    $image->new_height = $box_height3 / 4;
}
$image->image_to_resize = $filename3; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '3' . $image_name3;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image3 = $process['new_file_path'];
    list($img_w3, $img_h3) = getimagesize($new_image3);
    $box3_width = intval($box_width3 / 4);
    $box3_height = intval($box_height3 / 4);
    if ($f_id == 71 && ($img_w3 < $img_h3) && (!empty($_POST['slot_3_de']))) {

        $newwidth = $img_w3 * 1;
        $newheight = $img_h3 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 71 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.5;
        $newheight = $img_h3 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($img_w3 < $box3_width) {
        $diff = $box3_width - $img_w3;
        $newwidth = $box_width3 / 4;
        $newheight = $img_h3 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($img_h3 < $box3_height) {
        $diff = $box3_height - $img_h3;
        $newheight = $box_height3 / 4;
        $newwidth = $img_w3 + ($diff / 4);
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
$filename4 = '../frames_temp/' . $image_name4;
$image = new Resize_Image;
list($width4, $height4) = getimagesize($filename4);
if ($width4 < $height4) {
    $image->new_width = $box_width4 / 4;
} else {
    $image->new_height = $box_height4 / 4;
}
$image->image_to_resize = $filename4; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '4' . $image_name4;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image4 = $process['new_file_path'];
    list($img_w4, $img_h4) = getimagesize($new_image4);
    $box4_width = intval($box_width4 / 4);
    $box4_height = intval($box_height4 / 4);
    if ($f_id == 67 && ($img_w4 < $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1;
        $newheight = $img_h4 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 71 && ($img_w4 < $img_h4) && (!empty($_POST['slot_4_de']))) {
        $newwidth = $img_w4 * 1;
        $newheight = $img_h4 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 67 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.5;
        $newheight = $img_h4 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($img_w4 < $box4_width) {
        $diff = $box4_width - $img_w4;
        $newwidth = $box_width4 / 4;
        $newheight = $img_h4 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($img_h4 < $box4_height) {
        $diff = $box4_height - $img_h4;
        $newheight = $box_height4 / 4;
        $newwidth = $img_w4 + ($diff / 4);
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
$filename5 = '../frames_temp/' . $image_name5;
$image = new Resize_Image;
list($width5, $height5) = getimagesize($filename5);
if ($width5 < $height5) {
    $image->new_width = $box_width5 / 4;
} else {
    $image->new_height = $box_height5 / 4;
}
$image->image_to_resize = $filename5; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '5' . $image_name5;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image5 = $process['new_file_path'];
    list($img_w5, $img_h5) = getimagesize($new_image5);
    $box5_width = intval($box_width5 / 4);
    $box5_height = intval($box_height5 / 4);
    if ($img_w5 < $box5_width) {
        $diff = $box5_width - $img_w5;
        $newwidth = $box_width5 / 4;
        $newheight = $img_h5 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($img_h5 < $box5_height) {
        $diff = $box5_height - $img_h5;
        $newheight = $box_height5 / 4;
        $newwidth = $img_w5 + ($diff / 4);
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
$filename6 = '../frames_temp/' . $image_name6;
$image = new Resize_Image;
list($width6, $height6) = getimagesize($filename6);
if ($width6 < $height6) {
    $image->new_width = $box_width6 / 4;
} else {
    $image->new_height = $box_height6 / 4;
}
$image->image_to_resize = $filename6; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '6' . $image_name6;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image6 = $process['new_file_path'];
    list($img_w6, $img_h6) = getimagesize($new_image6);
    $box6_width = intval($box_width6 / 4);
    $box6_height = intval($box_height6 / 4);
    if ($img_w6 < $box6_width) {
        $diff = $box6_width - $img_w6;
        $newwidth = $box_width6 / 4;
        $newheight = $img_h6 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($img_h6 < $box6_height) {
        $diff = $box6_height - $img_h6;
        $newheight = $box_height6 / 4;
        $newwidth = $img_w6 + ($diff / 4);
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
//resize the image SEVENTH start here
$query_temp7 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_7'] . '"');
$row_temp7 = mysql_fetch_array($query_temp7);
$query_box7 = mysql_query('select * from box_detail where box_id="' . $box7 . '"');
$row_box7 = mysql_fetch_array($query_box7);
$image_name7 = $row_temp7['image_name'];
$box_x7 = $row_box7['box_x'];
$box_y7 = $row_box7['box_y'];
$box_width7 = $row_box7['box_width'];
$box_height7 = $row_box7['box_height'];
// Get new sizes
$filename7 = '../frames_temp/' . $image_name7;
$image = new Resize_Image;
list($width7, $height7) = getimagesize($filename7);
if ($width7 < $height7) {
    $image->new_width = $box_width7 / 4;
} else {
    $image->new_height = $box_height7 / 4;
}
$image->image_to_resize = $filename7; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '7' . $image_name7;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image7 = $process['new_file_path'];
    list($img_w7, $img_h7) = getimagesize($new_image7);
    $box7_width = intval($box_width7 / 4);
    $box7_height = intval($box_height7 / 4);
    if ($img_w7 < $box7_width) {
        $diff = $box7_width - $img_w7;
        $newwidth = $box_width7 / 4;
        $newheight = $img_h7 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    } else if ($img_h7 < $box7_height) {
        $diff = $box7_height - $img_h7;
        $newheight = $box_height7 / 4;
        $newwidth = $img_w7 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    }
}//end resize SEVENTH image
//---------------------------------------------------------------------------------------------------------------------------------
$query_temp8 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_8'] . '"');
$row_temp8 = mysql_fetch_array($query_temp8);
$query_box8 = mysql_query('select * from box_detail where box_id="' . $box8 . '"');
$row_box8 = mysql_fetch_array($query_box8);
$image_name8 = $row_temp8['image_name'];
$box_x8 = $row_box8['box_x'];
$box_y8 = $row_box8['box_y'];
$box_width8 = $row_box8['box_width'];
$box_height8 = $row_box8['box_height'];
// Get new sizes
$filename8 = '../frames_temp/' . $image_name8;
$image = new Resize_Image;
list($width8, $height8) = getimagesize($filename8);
if ($width8 < $height8) {
    $image->new_width = $box_width8 / 4;
} else {
    $image->new_height = $box_height8 / 4;
}
$image->image_to_resize = $filename8; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '8' . $image_name8;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image8 = $process['new_file_path'];
    list($img_w8, $img_h8) = getimagesize($new_image8);
    $box8_width = intval($box_width8 / 4);
    $box8_height = intval($box_height8 / 4);
    if ($img_w8 < $box8_width) {
        $diff = $box8_width - $img_w8;
        $newwidth = $box_width8 / 4;
        $newheight = $img_h8 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($img_h8 < $box8_height) {
        $diff = $box8_height - $img_h8;
        $newheight = $box_height8 / 4;
        $newwidth = $img_w8 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    }
}//end resize eight image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image NINE start here
$query_temp9 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_9'] . '"');
$row_temp9 = mysql_fetch_array($query_temp9);
$query_box9 = mysql_query('select * from box_detail where box_id="' . $box9 . '"');
$row_box9 = mysql_fetch_array($query_box9);
$image_name9 = $row_temp9['image_name'];
$box_x9 = $row_box9['box_x'];
$box_y9 = $row_box9['box_y'];
$box_width9 = $row_box9['box_width'];
$box_height9 = $row_box9['box_height'];
// Get new sizes
$filename9 = '../frames_temp/' . $image_name9;
$image = new Resize_Image;
list($width9, $height9) = getimagesize($filename9);
if ($width9 < $height9) {
    $image->new_width = $box_width9 / 4;
} else {
    $image->new_height = $box_height9 / 4;
}
$image->image_to_resize = $filename9; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '9' . $image_name9;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image9 = $process['new_file_path'];
    list($img_w9, $img_h9) = getimagesize($new_image9);
    $box9_width = intval($box_width9 / 4);
    $box9_height = intval($box_height9 / 4);
    if ($f_id == 67 && ($img_w9 == $img_h9)) {
        $newwidth = $img_w9 * 1.65;
        $newheight = $img_h9 * 1.65;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image9);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w9, $img_h9);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image9);
    } else if ($img_w9 < $box9_width) {
        $diff = $box9_width - $img_w9;
        $newwidth = $box_width9 / 4;
        $newheight = $img_h9 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image9);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w9, $img_h9);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image9);
    } else if ($img_h9 < $box9_height) {
        $diff = $box9_height - $img_h9;
        $newheight = $box_height9 / 4;
        $newwidth = $img_w9 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image9);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w9, $img_h9);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image9);
    }
}//end resize NINE image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image TEN start here
$query_temp10 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_10'] . '"');
$row_temp10 = mysql_fetch_array($query_temp10);
$query_box10 = mysql_query('select * from box_detail where box_id="' . $box10 . '"');
$row_box10 = mysql_fetch_array($query_box10);
$image_name10 = $row_temp10['image_name'];
$box_x10 = $row_box10['box_x'];
$box_y10 = $row_box10['box_y'];
$box_width10 = $row_box10['box_width'];
$box_height10 = $row_box10['box_height'];
// Get new sizes
$filename10 = '../frames_temp/' . $image_name10;
$image = new Resize_Image;
list($width10, $height10) = getimagesize($filename10);
if ($width10 < $height10) {
    $image->new_width = $box_width10 / 4;
} else {
    $image->new_height = $box_height10 / 4;
}
$image->image_to_resize = $filename10; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '10' . $image_name10;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image10 = $process['new_file_path'];
    list($img_w10, $img_h10) = getimagesize($new_image10);
    $box10_width = intval($box_width10 / 4);
    $box10_height = intval($box_height10 / 4);
    if ($f_id == 67 && ($img_w10 == $img_h10)) {
        $newwidth = $img_w10 * 1.65;
        $newheight = $img_h10 * 1.65;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($img_w10 < $box10_width) {
        $diff = $box10_width - $img_w10;
        $newwidth = $box_width10 / 4;
        $newheight = $img_h10 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($img_h10 < $box10_height) {
        $diff = $box10_height - $img_h10;
        $newheight = $box_height10 / 4;
        $newwidth = $img_w10 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    }
}//end resize TEN image
//resize the image eleven start here
$query_temp11 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_11'] . '"');
$row_temp11 = mysql_fetch_array($query_temp11);
$query_box11 = mysql_query('select * from box_detail where box_id="' . $box11 . '"');
$row_box11 = mysql_fetch_array($query_box11);
$image_name11 = $row_temp11['image_name'];
$box_x11 = $row_box11['box_x'];
$box_y11 = $row_box11['box_y'];
$box_width11 = $row_box11['box_width'];
$box_height11 = $row_box11['box_height'];
// Get new sizes
$filename11 = '../frames_temp/' . $image_name11;
$image = new Resize_Image;
list($width11, $height11) = getimagesize($filename11);
if ($width11 < $height11) {
    $image->new_width = $box_width11 / 4;
} else {
    $image->new_height = $box_height11 / 4;
}
$image->image_to_resize = $filename11; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '11' . $image_name11;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image11 = $process['new_file_path'];
    list($img_w11, $img_h11) = getimagesize($new_image11);
    $box11_width = intval($box_width11 / 4);
    $box11_height = intval($box_height11 / 4);
    if ($img_w11 < $box11_width) {
        $diff = $box11_width - $img_w11;
        $newwidth = $box_width11 / 4;
        $newheight = $img_h11 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image11);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w11, $img_h11);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image11);
    } else if ($img_h1 < $box11_height) {
        $diff = $box11_height - $img_h11;
        $newheight = $box_height11 / 4;
        $newwidth = $img_w11 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image11);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w11, $img_h11);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image11);
    }
}//end resize elven image
//resize the image eleven start here
$query_temp12 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_12'] . '"');
$row_temp12 = mysql_fetch_array($query_temp12);
$query_box12 = mysql_query('select * from box_detail where box_id="' . $box12 . '"');
$row_box12 = mysql_fetch_array($query_box12);
$image_name12 = $row_temp12['image_name'];
$box_x12 = $row_box12['box_x'];
$box_y12 = $row_box12['box_y'];
$box_width12 = $row_box12['box_width'];
$box_height12 = $row_box12['box_height'];
// Get new sizes
$filename12 = '../frames_temp/' . $image_name12;
$image = new Resize_Image;
list($width12, $height12) = getimagesize($filename12);
if ($width12 < $height12) {
    $image->new_width = $box_width12 / 4;
} else {
    $image->new_height = $box_height12 / 4;
}
$image->image_to_resize = $filename12; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '12' . $image_name12;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image12 = $process['new_file_path'];
    list($img_w12, $img_h12) = getimagesize($new_image12);
    $box12_width = intval($box_width12 / 4);
    $box12_height = intval($box_height12 / 4);

    if ($img_w12 < $box12_width) {
        $diff = $box12_width - $img_w12;
        $newwidth = $box_width12 / 4;
        $newheight = $img_h12 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image12);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w12, $img_h12);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image12);
    } else if ($img_h12 < $box12_height) {
        $diff = $box12_height - $img_h12;
        $newheight = $box_height12 / 4;
        $newwidth = $img_w12 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image12);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w12, $img_h12);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image12);
    }
    //resize the image thirteen start here
}
//resize the image thirteen start here
$query_temp13 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_13'] . '"');
$row_temp13 = mysql_fetch_array($query_temp13);
$query_box13 = mysql_query('select * from box_detail where box_id="' . $box13 . '"');
$row_box13 = mysql_fetch_array($query_box13);
$image_name13 = $row_temp13['image_name'];
$box_x13 = $row_box13['box_x'];
$box_y13 = $row_box13['box_y'];
$box_width13 = $row_box13['box_width'];
$box_height13 = $row_box13['box_height'];
// Get new sizes
$filename13 = '../frames_temp/' . $image_name13;
$image = new Resize_Image;
list($width13, $height13) = getimagesize($filename13);
if ($width13 < $height13) {
    $image->new_width = $box_width13 / 4;
} else {
    $image->new_height = $box_height13 / 4;
}
$image->image_to_resize = $filename13; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '13' . $image_name13;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image13 = $process['new_file_path'];
    list($img_w13, $img_h13) = getimagesize($new_image13);
    $box13_width = intval($box_width13 / 4);
    $box13_height = intval($box_height13 / 4);
    if ($img_w13 < $box13_width) {
        $diff = $box13_width - $img_w13;
        $newwidth = $box_width13 / 4;
        $newheight = $img_h13 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image13);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w13, $img_h13);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image13);
    } else if ($img_h1 < $box13_height) {
        $diff = $box13_height - $img_h13;
        $newheight = $box_height13 / 4;
        $newwidth = $img_w13 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image13);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w13, $img_h13);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image13);
    }
    //resize the image thirteen start here
}
//resize the image fourteen start here
$query_temp14 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_14'] . '"');
$row_temp14 = mysql_fetch_array($query_temp14);
$query_box14 = mysql_query('select * from box_detail where box_id="' . $box14 . '"');
$row_box14 = mysql_fetch_array($query_box14);
$image_name14 = $row_temp14['image_name'];
$box_x14 = $row_box14['box_x'];
$box_y14 = $row_box14['box_y'];
$box_width14 = $row_box14['box_width'];
$box_height14 = $row_box14['box_height'];
// Get new sizes
$filename14 = '../frames_temp/' . $image_name14;
$image = new Resize_Image;
list($width14, $height14) = getimagesize($filename14);
if ($width14 < $height14) {
    $image->new_width = $box_width14 / 4;
} else {
    $image->new_height = $box_height14 / 4;
}
$image->image_to_resize = $filename14; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '14' . $image_name14;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image14 = $process['new_file_path'];
    list($img_w14, $img_h14) = getimagesize($new_image14);
    $box14_width = intval($box_width14 / 4);
    $box14_height = intval($box_height14 / 4);
    if ($img_w14 < $box14_width) {
        $diff = $box14_width - $img_w14;
        $newwidth = $box_width14 / 4;
        $newheight = $img_h14 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image14);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w14, $img_h14);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image14);
    } else if ($img_h1 < $box14_height) {
        $diff = $box14_height - $img_h14;
        $newheight = $box_height14 / 4;
        $newwidth = $img_w14 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image14);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w14, $img_h14);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image14);
    }
    //resize the image thirteen start here
}
//resize the image fourteen start here
$query_temp15 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_15'] . '"');
$row_temp15 = mysql_fetch_array($query_temp15);
$query_box15 = mysql_query('select * from box_detail where box_id="' . $box15 . '"');
$row_box15 = mysql_fetch_array($query_box15);
$image_name15 = $row_temp15['image_name'];
$box_x15 = $row_box15['box_x'];
$box_y15 = $row_box15['box_y'];
$box_width15 = $row_box15['box_width'];
$box_height15 = $row_box15['box_height'];
// Get new sizes
$filename15 = '../frames_temp/' . $image_name15;
$image = new Resize_Image;
list($width15, $height15) = getimagesize($filename15);
if ($width15 < $height15) {
    $image->new_width = $box_width15 / 4;
} else {
    $image->new_height = $box_height15 / 4;
}
$image->image_to_resize = $filename15; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '15' . $image_name15;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image15 = $process['new_file_path'];
    list($img_w15, $img_h15) = getimagesize($new_image15);
    $box15_width = intval($box_width15 / 4);
    $box15_height = intval($box_height15 / 4);
    if ($f_id == 67 && ($img_w15 < $img_h15) && isset($_POST['slot_15_de'])) {
        $newwidth = $img_w15 * 1;
        $newheight = $img_h15 * 1.1;
                    // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image15);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w15, $img_h15);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image15);
    } else if ($f_id == 71 && ($img_w15 < $img_h15) && (!empty($_POST['slot_15_de']))) {
        $newwidth = $img_w15 * 1;
        $newheight = $img_h15 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image15);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w15, $img_h15);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image15);
    } else if ($f_id == 67 && ($img_w15 == $img_h15)) {
        $newwidth = $img_w15 * 1.5;
        $newheight = $img_h15 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image15);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w15, $img_h15);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image15);
    } else if ($img_w15 < $box15_width) {
        $diff = $box15_width - $img_w15;
        $newwidth = $box_width15 / 4;
        $newheight = $img_h15 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image15);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w15, $img_h15);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image15);
    } else if ($img_h1 < $box15_height) {
        $diff = $box15_height - $img_h15;
        $newheight = $box_height15 / 4;
        $newwidth = $img_w15 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image15);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w15, $img_h15);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image15);
    }
    //resize the image thirteen start here
}
//resize the image sixteen start here
$query_temp16 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_16'] . '"');
$row_temp16 = mysql_fetch_array($query_temp16);
$query_box16 = mysql_query('select * from box_detail where box_id="' . $box16 . '"');
$row_box16 = mysql_fetch_array($query_box16);
$image_name16 = $row_temp16['image_name'];
$box_x16 = $row_box16['box_x'];
$box_y16 = $row_box16['box_y'];
$box_width16 = $row_box16['box_width'];
$box_height16 = $row_box16['box_height'];
// Get new sizes
$filename16 = '../frames_temp/' . $image_name16;
$image = new Resize_Image;
list($width16, $height16) = getimagesize($filename16);
if ($width16 < $height16) {
    $image->new_width = $box_width16 / 4;
} else {
    $image->new_height = $box_height16 / 4;
}
$image->image_to_resize = $filename16; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "16" . $image_name16;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image16 = $process['new_file_path'];
    list($img_w16, $img_h16) = getimagesize($new_image16);
    $box16_width = intval($box_width16 / 4);
    $box16_height = intval($box_height16 / 4);
   if ($f_id == 71 && ($img_w16 < $img_h16) && (!empty($_POST['slot_16_de']))) {
     
        $newwidth = $img_w16 * 1;
        $newheight = $img_h16 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image16);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w16, $img_h16);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image16);
    }
    else if ($f_id == 71 && ($img_w16 == $img_h16)) {
       
        $newwidth = $img_w16 * 1.5;
        $newheight = $img_h16 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image16);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w16, $img_h16);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image16);
    }
    else if ($img_w16 < $box16_width) {
        $diff = $box16_width - $img_w16;
        $newwidth = $box_width16 / 4;
        $newheight = $img_h16 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image16);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w16, $img_h16);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image16);
    } else if ($img_h16 < $box16_height) {
        $diff = $box16_height - $img_h16;
        $newheight = $box_height16 / 4;
        $newwidth = $img_w16 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image16);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w16, $img_h16);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image16);
    }
}
//resize the image seventeen start here
$query_temp17 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_17'] . '"');
$row_temp17 = mysql_fetch_array($query_temp17);
$query_box17 = mysql_query('select * from box_detail where box_id="' . $box17 . '"');
$row_box17 = mysql_fetch_array($query_box17);
$image_name17 = $row_temp17['image_name'];
$box_x17 = $row_box17['box_x'];
$box_y17 = $row_box17['box_y'];
$box_width17 = $row_box17['box_width'];
$box_height17 = $row_box17['box_height'];
// Get new sizes
$filename17 = '../frames_temp/' . $image_name17;
$image = new Resize_Image;
list($width17, $height17) = getimagesize($filename17);
if ($width17 < $height17) {
    $image->new_width = $box_width17 / 4;
} else {
    $image->new_height = $box_height17 / 4;
}
$image->image_to_resize = $filename17; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "17" . $image_name17;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image17 = $process['new_file_path'];
    list($img_w17, $img_h17) = getimagesize($new_image17);
    $box17_width = intval($box_width17 / 4);
    $box17_height = intval($box_height17 / 4);
   if ($f_id == 71 && ($img_w17 < $img_h17) && (!empty($_POST['slot_17_de']))) {
     
        $newwidth = $img_w17 * 1;
        $newheight = $img_h17 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image17);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w17, $img_h17);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image17);
    }
    else if ($f_id == 71 && ($img_w17 == $img_h17)) {
       
        $newwidth = $img_w17 * 1.5;
        $newheight = $img_h17 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image17);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w17, $img_h17);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image17);
    }
    else if ($img_w17 < $box17_width) {
        $diff = $box17_width - $img_w17;
        $newwidth = $box_width17 / 4;
        $newheight = $img_h17 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image17);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w17, $img_h17);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image17);
    } else if ($img_h17 < $box17_height) {
        $diff = $box17_height - $img_h17;
        $newheight = $box_height17 / 4;
        $newwidth = $img_w17 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image17);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w17, $img_h17);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image17);
    }
}
//resize the image sixteen start here
$query_temp18 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_18'] . '"');
$row_temp18 = mysql_fetch_array($query_temp18);
$query_box18 = mysql_query('select * from box_detail where box_id="' . $box18 . '"');
$row_box18 = mysql_fetch_array($query_box18);
$image_name18 = $row_temp18['image_name'];
$box_x18 = $row_box18['box_x'];
$box_y18 = $row_box18['box_y'];
$box_width18 = $row_box18['box_width'];
$box_height18 = $row_box18['box_height'];
// Get new sizes
$filename18 = '../frames_temp/' . $image_name18;
$image = new Resize_Image;
list($width18, $height18) = getimagesize($filename18);
if ($width18 < $height18) {
    $image->new_width = $box_width18 / 4;
} else {
    $image->new_height = $box_height18 / 4;
}
$image->image_to_resize = $filename18; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '18' . $image_name18;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image18 = $process['new_file_path'];
    list($img_w18, $img_h18) = getimagesize($new_image18);
    $box18_width = intval($box_width18 / 4);
    $box18_height = intval($box_height18 / 4);

    if ($f_id == 67 && ($img_w18 < $img_h18) && isset($_POST['slot_18_de'])) {
        $newwidth = $img_w18 * 1;
        $newheight = $img_h18 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image18);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w18, $img_h18);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image18);
    } else if ($f_id == 71 && ($img_w18 < $img_h18) && (!empty($_POST['slot_18_de']))) {
        $newwidth = $img_w18 * 1;
        $newheight = $img_h18 * 1.2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image18);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w18, $img_h18);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image18);
    } else if ($f_id == 67 && ($img_w18 == $img_h18)) {
        $newwidth = $img_w18 * 1.5;
        $newheight = $img_h18 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image18);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w18, $img_h18);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image18);
    } else if ($img_w18 < $box18_width) {
        $diff = $box18_width - $img_w18;
        $newwidth = $box_width18 / 4;
        $newheight = $img_h18 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image18);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w18, $img_h18);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image18);
    } else if ($img_h18 < $box18_height) {
        $diff = $box18_height - $img_h18;
        $newheight = $box_height18 / 4;
        $newwidth = $img_w18 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image18);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w18, $img_h18);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image18);
    }
    //resize the image thirteen start here
}
//---------------------------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
$icon4 = imagecreatefromjpeg($new_image4);
$icon5 = imagecreatefromjpeg($new_image5);
$icon6 = imagecreatefromjpeg($new_image6);
$icon7 = imagecreatefromjpeg($new_image7);
$icon8 = imagecreatefromjpeg($new_image8);
$icon9 = imagecreatefromjpeg($new_image9);
$icon10 = imagecreatefromjpeg($new_image10);
$icon11 = imagecreatefromjpeg($new_image11);
$icon12 = imagecreatefromjpeg($new_image12);
$icon13 = imagecreatefromjpeg($new_image13);
$icon14 = imagecreatefromjpeg($new_image14);
$icon15 = imagecreatefromjpeg($new_image15);
$icon16 = imagecreatefromjpeg($new_image16);
$icon17 = imagecreatefromjpeg($new_image17);
$icon18 = imagecreatefromjpeg($new_image18);
// ... add more source images as needed
//Frame 67 Starts

if ($f_id == '67') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.28;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $pos_h1 * 1.7;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.12;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 210;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 55;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 80;
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
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.77;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 0.75;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 5;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 60;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0.7;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0.75;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 0.7;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0.7;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 0;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 150;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 60;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.02;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 0.7;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1.12;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 170;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 55;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 80;
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

                $pos_w5 = $pos_w5 * 1.02;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {

                $pos_h5 = $pos_h5 * 1.12;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 0;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 70;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 110;
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
                $pos_w6 = $pos_w6 * 1.02;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.12;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 0;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 70;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 110;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.02;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.12;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 0;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 70;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 110;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 2.2;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.12;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 0;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 70;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 110;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 0;
        }
    }
    if (isset($_POST['slot_9_de']) && ($_POST['slot_9_de'] != "")) {
        $slot_9_de = explode("_", $_POST['slot_9_de']);
        $pos_w9 = $slot_9_de[0];
        $pos_h9 = $slot_9_de[2];
        if ($pos_w9 > ($pos_w9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[0] * 2.2;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 2.15;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 2.3;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 1.65;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 300;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 0;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 140;
            $pos_w9 = 0;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.02;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 2.3;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1.65;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 300;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 0;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 140;
            $pos_w10 = 0;
        }
    }
    if (isset($_POST['slot_11_de']) && ($_POST['slot_11_de'] != "")) {
        $slot_11_de = explode("_", $_POST['slot_11_de']);
        $pos_w11 = $slot_11_de[0];
        $pos_h11 = $slot_11_de[2];
        if ($pos_w11 > ($pos_w11 / 2)) {
            list($image_w11, $image_h11) = getimagesize($new_image11);
            if ($image_h11 == $image_w11) {
                $pos_w11 = $slot_11_de[0] * 1.02;
            }
            //width greater
            if ($image_h11 < $image_w11) {
                $pos_w11 = $slot_11_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h11 > ($pos_h11 / 2)) {
            list($image_w11, $image_h11) = getimagesize($new_image11);
            //graeter
            if ($image_h11 > $image_w11) {
                $pos_h11 = $pos_h11 * 1.12;
            }
            //equal
            if ($image_h11 == $image_w11) {
                $pos_h11 = $pos_h11 * 0;
            }
        }
    } else {
        list($image_w11, $image_h11) = getimagesize($new_image11);
        if ($image_h11 > $image_w11) {
            $pos_w11 = 0;
            $pos_h11 = 70;
        } else if ($image_w11 > $image_h11) {
            $pos_h11 = 0;
            $pos_w11 = 110;
        } else if ($image_w11 == $image_h11) {
            $pos_h11 = 0;
            $pos_w11 = 0;
        }
    }
    if (isset($_POST['slot_12_de']) && ($_POST['slot_12_de'] != "")) {
        $slot_12_de = explode("_", $_POST['slot_12_de']);
        $pos_w12 = $slot_12_de[0];
        $pos_h12 = $slot_12_de[2];
        if ($pos_w12 > ($pos_w12 / 2)) {
            list($image_w12, $image_h12) = getimagesize($new_image12);
            if ($image_h12 == $image_w12) {
                $pos_w12 = $slot_12_de[0] * 1.02;
            }
            //width greater
            if ($image_h12 < $image_w12) {
                $pos_w12 = $slot_12_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h12 > ($pos_h12 / 2)) {
            list($image_w12, $image_h12) = getimagesize($new_image12);
            //graeter
            if ($image_h12 > $image_w12) {
                $pos_h12 = $pos_h12 * 1.12;
            }
            //equal
            if ($image_h12 == $image_w12) {
                $pos_h12 = $pos_h12 * 0;
            }
        }
    } else {
        list($image_w12, $image_h12) = getimagesize($new_image12);
        if ($image_h12 > $image_w12) {
            $pos_w12 = 0;
            $pos_h12 = 70;
        } else if ($image_w12 > $image_h12) {
            $pos_h12 = 0;
            $pos_w12 = 70;
        } else if ($image_w12 == $image_h12) {
            $pos_h12 = 0;
            $pos_w12 = 0;
        }
    }
    if (isset($_POST['slot_13_de']) && ($_POST['slot_13_de'] != "")) {
        $slot_13_de = explode("_", $_POST['slot_13_de']);
        $pos_w13 = $slot_13_de[0];
        $pos_h13 = $slot_13_de[2];
        if ($pos_w13 > ($pos_w13 / 2)) {
            list($image_w13, $image_h13) = getimagesize($new_image13);
            if ($image_h13 == $image_w13) {
                $pos_w13 = $slot_13_de[0] * 1.02;
            }
            //width greater
            if ($image_h13 < $image_w13) {
                $pos_w13 = $slot_13_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h13 > ($pos_h13 / 2)) {
            list($image_w13, $image_h13) = getimagesize($new_image13);
            //graeter
            if ($image_h13 > $image_w13) {
                $pos_h13 = $pos_h13 * 1.12;
            }
            //equal
            if ($image_h13 == $image_w13) {
                $pos_h13 = $pos_h13 * 0;
            }
        }
    } else {
        list($image_w13, $image_h13) = getimagesize($new_image13);
        if ($image_h13 > $image_w13) {
            $pos_w13 = 0;
            $pos_h13 = 70;
        } else if ($image_w13 > $image_h13) {
            $pos_h13 = 0;
            $pos_w13 = 110;
        } else if ($image_w13 == $image_h13) {
            $pos_h13 = 0;
            $pos_w13 = 0;
        }
    } if (isset($_POST['slot_14_de']) && ($_POST['slot_14_de'] != "")) {
        $slot_14_de = explode("_", $_POST['slot_14_de']);
        $pos_w14 = $slot_14_de[0];
        $pos_h14 = $slot_14_de[2];
        if ($pos_w14 > ($pos_w14 / 2)) {
            list($image_w14, $image_h14) = getimagesize($new_image14);
            if ($image_h14 == $image_w14) {
                $pos_w14 = $slot_14_de[0] * 1.28;
            }
            //width greater
            if ($image_h14 < $image_w14) {
                $pos_w14 = $slot_14_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h14 > ($pos_h14 / 2)) {
            list($image_w14, $image_h14) = getimagesize($new_image14);
            //graeter
            if ($image_h14 > $image_w14) {
                $pos_h14 = $pos_h14 * 1.12;
            }
            //equal
            if ($image_h14 == $image_w14) {
                $pos_h14 = $pos_h14 * 0;
            }
        }
    } else {
        list($image_w14, $image_h14) = getimagesize($new_image14);
        if ($image_h14 > $image_w14) {
            $pos_w14 = 0;
            $pos_h14 = 70;
        } else if ($image_w14 > $image_h14) {
            $pos_h14 = 0;
            $pos_w14 = 110;
        } else if ($image_w14 == $image_h14) {
            $pos_h14 = 0;
            $pos_w14 = 0;
        }
    }
    if (isset($_POST['slot_15_de']) && ($_POST['slot_15_de'] != "")) {
        $slot_15_de = explode("_", $_POST['slot_15_de']);
        $pos_w15 = $slot_15_de[0];
        $pos_h15 = $slot_15_de[2];
        if ($pos_w15 > ($pos_w15 / 2)) {
            list($image_w15, $image_h15) = getimagesize($new_image15);
            if ($image_h15 == $image_w15) {
                $pos_w15 = $slot_15_de[0] * 1.34;
            }
            //width greater
            if ($image_h15 < $image_w15) {
                $pos_w15 = $slot_15_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h15 > ($pos_h15 / 2)) {
            list($image_w15, $image_h15) = getimagesize($new_image15);
            //graeter
            if ($image_h15 > $image_w15) {
                $pos_h15 = $pos_h15 * 1.7;
            }
            //equal
            if ($image_h15 == $image_w15) {
                $pos_h15 = $pos_h15 * 1.12;
            }
        }
    } else {
        list($image_w15, $image_h15) = getimagesize($new_image15);
        if ($image_h15 > $image_w15) {
            $pos_w15 = 0;
            $pos_h15 = 170;
        } else if ($image_w15 > $image_h15) {
            $pos_h15 = 0;
            $pos_w15 = 55;
        } else if ($image_w15 == $image_h15) {
            $pos_h15 = 80;
            $pos_w15 = 0;
        }
    }
    if (isset($_POST['slot_16_de']) && ($_POST['slot_16_de'] != "")) {
        $slot_16_de = explode("_", $_POST['slot_16_de']);
        $pos_w16 = $slot_16_de[0];
        $pos_h16 = $slot_16_de[2];
        if ($pos_w16 > ($pos_w16 / 2)) {
            list($image_w16, $image_h16) = getimagesize($new_image16);
            if ($image_h16 == $image_w16) {
                $pos_w16 = $slot_16_de[0] * 0.75;
            }
            //width greater
            if ($image_h16 < $image_w16) {
                $pos_w16 = $slot_16_de[0] * 0.77;
            }
        }
        //height
        if ($pos_h16 > ($pos_h16 / 2)) {
            list($image_w16, $image_h16) = getimagesize($new_image16);
            //graeter
            if ($image_h16 > $image_w16) {
                $pos_h16 = $pos_h16 * 0.6;
            }
            //equal
            if ($image_h16 == $image_w16) {
                $pos_h16 = $pos_h16 * 0.7;
            }
        }
    } else {
        list($image_w16, $image_h16) = getimagesize($new_image16);
        if ($image_h16 > $image_w16) {
            $pos_w16 = 0;
            $pos_h16 = 0;
        } else if ($image_w16 > $image_h16) {
            $pos_h16 = 0;
            $pos_w16 = 150;
        } else if ($image_w16 == $image_h16) {
            $pos_h16 = 0;
            $pos_w16 = 60;
        }
    }
    if (isset($_POST['slot_17_de']) && ($_POST['slot_17_de'] != "")) {
        $slot_17_de = explode("_", $_POST['slot_17_de']);
        $pos_w17 = $slot_17_de[0];
        $pos_h17 = $slot_17_de[2];
        if ($pos_w17 > ($pos_w17 / 2)) {
            list($image_w17, $image_h17) = getimagesize($new_image17);
            if ($image_h17 == $image_w17) {
                $pos_w17 = $slot_17_de[0] * 0.75;
            }
            //width greater
            if ($image_h17 < $image_w17) {
                $pos_w17 = $slot_17_de[0] * 5;
            }
        }
        //height
        if ($pos_h17 > ($pos_h17 / 2)) {
            list($image_w17, $image_h17) = getimagesize($new_image17);
            //graeter
            if ($image_h17 > $image_w17) {
                $pos_h17 = $pos_h17 * 1.7;
            }
            //equal
            if ($image_h17 == $image_w17) {
                $pos_h17 = $pos_h17 * 0.7;
            }
        }
    } else {
        list($image_w17, $image_h17) = getimagesize($new_image17);
        if ($image_h17 > $image_w17) {
            $pos_w17 = 0;
            $pos_h17 = 0;
        } else if ($image_w17 > $image_h17) {
            $pos_h17 = 0;
            $pos_w17 = 150;
        } else if ($image_w17 == $image_h17) {
            $pos_h17 = 0;
            $pos_w17 = 60;
        }
    }
    if (isset($_POST['slot_18_de']) && ($_POST['slot_18_de'] != "")) {

        $slot_18_de = explode("_", $_POST['slot_18_de']);
        $pos_w18 = $slot_18_de[0];
        $pos_h18 = $slot_18_de[2];
        if ($pos_w18 > ($pos_w18 / 2)) {
            list($image_w18, $image_h18) = getimagesize($new_image18);
            if ($image_h18 == $image_w18) {
                $pos_w18 = $slot_18_de[0] * 1.28;
            }
            //width greater
            if ($image_h18 < $image_w18) {
                $pos_w18 = $slot_18_de[0] * 5;
            }
        }
        //height
        if ($pos_h18 > ($pos_h18 / 2)) {
            list($image_w18, $image_h18) = getimagesize($new_image18);
            //graeter
            if ($image_h18 > $image_w18) {

                $pos_h18 = $pos_h18 * 1.7;
            }
            //equal
            if ($image_h18 == $image_w18) {
                $pos_h18 = $pos_h18 * 1.12;
            }
        }
    } else {
        list($image_w18, $image_h18) = getimagesize($new_image18);
        if ($image_h18 > $image_w18) {
            $pos_w18 = 0;
            $pos_h18 = 170;
        } else if ($image_w18 > $image_h18) {
            $pos_h18 = 0;
            $pos_w18 = 55;
        } else if ($image_w18 == $image_h18) {
            $pos_h18 = 80;
            $pos_w18 = 0;
        }
    }
}
//Frames End Here
//Frame 67 Starts

if ($f_id == '71') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.28;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $pos_h1 * 1.7;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.12;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 180;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 40;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.77;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 1.3;
            }
            //equal
            if ($image_h2 == $image_w2) {

                $pos_h2 = $pos_h2 * 1;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 135;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 60;
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
                $pos_w3 = $slot_3_de[0] * 0.7;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0.75;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 1.3;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0.7;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 135;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 60;
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
                $pos_w4 = $slot_4_de[0] * 1.28;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 0.7;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1.18;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 180;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 40;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {

                $pos_w5 = $pos_w5 * 1.02;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {

                $pos_h5 = $pos_h5 * 1.10;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 0;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 80;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 90;
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
                $pos_w6 = $pos_w6 * 1.02;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.10;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 0;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 80;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 90;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.02;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.10;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 0;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 80;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 90;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 2.2;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.10;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 0;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 80;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 90;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 0;
        }
    }
    if (isset($_POST['slot_9_de']) && ($_POST['slot_9_de'] != "")) {
        $slot_9_de = explode("_", $_POST['slot_9_de']);
        $pos_w9 = $slot_9_de[0];
        $pos_h9 = $slot_9_de[2];
        if ($pos_w9 > ($pos_w9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.64;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.64;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 0;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 1.65;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 0;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 360;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 150;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.64;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.64;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 0;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1.65;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 0;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 360;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 150;
        }
    }
    if (isset($_POST['slot_11_de']) && ($_POST['slot_11_de'] != "")) {
        $slot_11_de = explode("_", $_POST['slot_11_de']);
        $pos_w11 = $slot_11_de[0];
        $pos_h11 = $slot_11_de[2];
        if ($pos_w11 > ($pos_w11 / 2)) {
            list($image_w11, $image_h11) = getimagesize($new_image11);
            if ($image_h11 == $image_w11) {
                $pos_w11 = $slot_11_de[0] * 1.02;
            }
            //width greater
            if ($image_h11 < $image_w11) {
                $pos_w11 = $slot_11_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h11 > ($pos_h11 / 2)) {
            list($image_w11, $image_h11) = getimagesize($new_image11);
            //graeter
            if ($image_h11 > $image_w11) {
                $pos_h11 = $pos_h11 * 1.10;
            }
            //equal
            if ($image_h11 == $image_w11) {
                $pos_h11 = $pos_h11 * 0;
            }
        }
    } else {
        list($image_w11, $image_h11) = getimagesize($new_image11);
        if ($image_h11 > $image_w11) {
            $pos_w11 = 0;
            $pos_h11 = 80;
        } else if ($image_w11 > $image_h11) {
            $pos_h11 = 0;
            $pos_w11 = 90;
        } else if ($image_w11 == $image_h11) {
            $pos_h11 = 0;
            $pos_w11 = 0;
        }
    }
    if (isset($_POST['slot_12_de']) && ($_POST['slot_12_de'] != "")) {
        $slot_12_de = explode("_", $_POST['slot_12_de']);
        $pos_w12 = $slot_12_de[0];
        $pos_h12 = $slot_12_de[2];
        if ($pos_w12 > ($pos_w12 / 2)) {
            list($image_w12, $image_h12) = getimagesize($new_image12);
            if ($image_h12 == $image_w12) {
                $pos_w12 = $slot_12_de[0] * 1.02;
            }
            //width greater
            if ($image_h12 < $image_w12) {
                $pos_w12 = $slot_12_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h12 > ($pos_h12 / 2)) {
            list($image_w12, $image_h12) = getimagesize($new_image12);
            //graeter
            if ($image_h12 > $image_w12) {
                $pos_h12 = $pos_h12 * 1.10;
            }
            //equal
            if ($image_h12 == $image_w12) {
                $pos_h12 = $pos_h12 * 0;
            }
        }
    } else {
        list($image_w12, $image_h12) = getimagesize($new_image12);
        if ($image_h12 > $image_w12) {
            $pos_w12 = 0;
            $pos_h12 = 80;
        } else if ($image_w12 > $image_h12) {
            $pos_h12 = 0;
            $pos_w12 = 90;
        } else if ($image_w12 == $image_h12) {
            $pos_h12 = 0;
            $pos_w12 = 0;
        }
    }
    if (isset($_POST['slot_13_de']) && ($_POST['slot_13_de'] != "")) {
        $slot_13_de = explode("_", $_POST['slot_13_de']);
        $pos_w13 = $slot_13_de[0];
        $pos_h13 = $slot_13_de[2];
        if ($pos_w13 > ($pos_w13 / 2)) {
            list($image_w13, $image_h13) = getimagesize($new_image13);
            if ($image_h13 == $image_w13) {
                $pos_w13 = $slot_13_de[0] * 1.02;
            }
            //width greater
            if ($image_h13 < $image_w13) {
                $pos_w13 = $slot_13_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h13 > ($pos_h13 / 2)) {
            list($image_w13, $image_h13) = getimagesize($new_image13);
            //graeter
            if ($image_h13 > $image_w13) {
                $pos_h13 = $pos_h13 * 1.10;
            }
            //equal
            if ($image_h13 == $image_w13) {
                $pos_h13 = $pos_h13 * 0;
            }
        }
    } else {
        list($image_w13, $image_h13) = getimagesize($new_image13);
        if ($image_h13 > $image_w13) {
            $pos_w13 = 0;
            $pos_h13 = 80;
        } else if ($image_w13 > $image_h13) {
            $pos_h13 = 0;
            $pos_w13 = 90;
        } else if ($image_w13 == $image_h13) {
            $pos_h13 = 0;
            $pos_w13 = 0;
        }
    } if (isset($_POST['slot_14_de']) && ($_POST['slot_14_de'] != "")) {
        $slot_14_de = explode("_", $_POST['slot_14_de']);
        $pos_w14 = $slot_14_de[0];
        $pos_h14 = $slot_14_de[2];
        if ($pos_w14 > ($pos_w14 / 2)) {
            list($image_w14, $image_h14) = getimagesize($new_image14);
            if ($image_h14 == $image_w14) {
                $pos_w14 = $slot_14_de[0] * 1.28;
            }
            //width greater
            if ($image_h14 < $image_w14) {
                $pos_w14 = $slot_14_de[0] * 0.8;
            }
        }
        //height
        if ($pos_h14 > ($pos_h14 / 2)) {
            list($image_w14, $image_h14) = getimagesize($new_image14);
            //graeter
            if ($image_h14 > $image_w14) {
                $pos_h14 = $pos_h14 * 1.10;
            }
            //equal
            if ($image_h14 == $image_w14) {
                $pos_h14 = $pos_h14 * 0;
            }
        }
    } else {
        list($image_w14, $image_h14) = getimagesize($new_image14);
        if ($image_h14 > $image_w14) {
            $pos_w14 = 0;
            $pos_h14 = 80;
        } else if ($image_w14 > $image_h14) {
            $pos_h14 = 0;
            $pos_w14 = 90;
        } else if ($image_w14 == $image_h14) {
            $pos_h14 = 0;
            $pos_w14 = 0;
        }
    }
    if (isset($_POST['slot_15_de']) && ($_POST['slot_15_de'] != "")) {
        $slot_15_de = explode("_", $_POST['slot_15_de']);
        $pos_w15 = $slot_15_de[0];
        $pos_h15 = $slot_15_de[2];
        if ($pos_w15 > ($pos_w15 / 2)) {
            list($image_w15, $image_h15) = getimagesize($new_image15);
            if ($image_h15 == $image_w15) {
                $pos_w15 = $slot_15_de[0] * 1.34;
            }
            //width greater
            if ($image_h15 < $image_w15) {
                $pos_w15 = $slot_15_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h15 > ($pos_h15 / 2)) {
            list($image_w15, $image_h15) = getimagesize($new_image15);
            //graeter
            if ($image_h15 > $image_w15) {
                $pos_h15 = $pos_h15 * 1.7;
            }
            //equal
            if ($image_h15 == $image_w15) {
                $pos_h15 = $pos_h15 * 1.12;
            }
        }
    } else {
        list($image_w15, $image_h15) = getimagesize($new_image15);
        if ($image_h15 > $image_w15) {
            $pos_w15 = 0;
            $pos_h15 = 0;
        } else if ($image_w15 > $image_h15) {
            $pos_h15 = 0;
            $pos_w15 = 180;
        } else if ($image_w15 == $image_h15) {
            $pos_h15 = 0;
            $pos_w15 = 40;
        }
    }
    if (isset($_POST['slot_16_de']) && ($_POST['slot_16_de'] != "")) {
        $slot_16_de = explode("_", $_POST['slot_16_de']);
        $pos_w16 = $slot_16_de[0];
        $pos_h16 = $slot_16_de[2];
        if ($pos_w16 > ($pos_w16 / 2)) {
            list($image_w16, $image_h16) = getimagesize($new_image16);
            if ($image_h16 == $image_w16) {
                $pos_w16 = $slot_16_de[0] * 0.75;
            }
            //width greater
            if ($image_h16 < $image_w16) {
                $pos_w16 = $slot_16_de[0] * 0.77;
            }
        }
        //height
        if ($pos_h16 > ($pos_h16 / 2)) {
            list($image_w16, $image_h16) = getimagesize($new_image16);
            //graeter
            if ($image_h16 > $image_w16) {
                $pos_h16 = $pos_h16 * 1.3;
            }
            //equal
            if ($image_h16 == $image_w16) {
                $pos_h16 = $pos_h16 * 0.7;
            }
        }
    } else {
        list($image_w16, $image_h16) = getimagesize($new_image16);
        if ($image_h16 > $image_w16) {
            $pos_w16 = 0;
            $pos_h16 = 135;
        } else if ($image_w16 > $image_h16) {
            $pos_h16 = 0;
            $pos_w16 = 0;
        } else if ($image_w16 == $image_h16) {
            $pos_h16 = 60;
            $pos_w16 = 0;
        }
    }
    if (isset($_POST['slot_17_de']) && ($_POST['slot_17_de'] != "")) {
        $slot_17_de = explode("_", $_POST['slot_17_de']);
        $pos_w17 = $slot_17_de[0];
        $pos_h17 = $slot_17_de[2];

        if ($pos_w17 > ($pos_w17 / 2)) {
            list($image_w17, $image_h17) = getimagesize($new_image17);
            if ($image_h17 == $image_w17) {
                $pos_w17 = $slot_17_de[0] * 0.75;
            }
            //width greater
            if ($image_h17 < $image_w17) {
                $pos_w17 = $slot_17_de[0] * 0.77;
            }
        }
        //height
        if ($pos_h17 > ($pos_h17 / 2)) {

            list($image_w17, $image_h17) = getimagesize($new_image17);
            //graeter
            if ($image_h17 > $image_w17) {
                $pos_h17 = $pos_h17 * 1.3;
            }
            //equal
            if ($image_h17 == $image_w17) {

                $pos_h17 = $pos_h17 * 1;
            }
        }
    } else {
        list($image_w17, $image_h17) = getimagesize($new_image17);
        if ($image_h17 > $image_w17) {
            $pos_w17 = 0;
            $pos_h17 = 135;
        } else if ($image_w17 > $image_h17) {
            $pos_h17 = 0;
            $pos_w17 = 0;
        } else if ($image_w17 == $image_h17) {
            $pos_h17 = 60;
            $pos_w17 = 0;
        }
    }
    if (isset($_POST['slot_18_de']) && ($_POST['slot_18_de'] != "")) {

        $slot_18_de = explode("_", $_POST['slot_18_de']);
        $pos_w18 = $slot_18_de[0];
        $pos_h18 = $slot_18_de[2];
        if ($pos_w18 > ($pos_w18 / 2)) {
            list($image_w18, $image_h18) = getimagesize($new_image18);
            if ($image_h18 == $image_w18) {
                $pos_w18 = $slot_18_de[0] * 1.28;
            }
            //width greater
            if ($image_h18 < $image_w18) {
                $pos_w18 = $slot_18_de[0] * 1.01;
            }
        }
        //height
        if ($pos_h18 > ($pos_h18 / 2)) {
            list($image_w18, $image_h18) = getimagesize($new_image18);
            //graeter
            if ($image_h18 > $image_w18) {

                $pos_h18 = $pos_h18 * 1.3;
            }
            //equal
            if ($image_h18 == $image_w18) {
                $pos_h18 = $pos_h18 * 1.12;
            }
        }
    } else {
        list($image_w18, $image_h18) = getimagesize($new_image18);
        if ($image_h18 > $image_w18) {
            $pos_w18 = 0;
            $pos_h18 = 0;
        } else if ($image_w18 > $image_h18) {
            $pos_h18 = 0;
            $pos_w18 = 180;
        } else if ($image_w18 == $image_h18) {
            $pos_h18 = 0;
            $pos_w18 = 40;
        }
    }
}
imagecopy($canvas, $icon1, $box_x1 / 4, $box_y1 / 4, $pos_w1, $pos_h1, $box_width1 / 4, $box_height1 / 4);
imagecopy($canvas, $icon2, $box_x2 / 4, $box_y2 / 4, $pos_w2, $pos_h2, $box_width2 / 4, $box_height2 / 4);
imagecopy($canvas, $icon3, $box_x3 / 4, $box_y3 / 4, $pos_w3, $pos_h3, $box_width3 / 4, $box_height3 / 4);
imagecopy($canvas, $icon4, $box_x4 / 4, $box_y4 / 4, $pos_w4, $pos_h4, $box_width4 / 4, $box_height4 / 4);
imagecopy($canvas, $icon5, $box_x5 / 4, $box_y5 / 4, $pos_w5, $pos_h5, $box_width5 / 4, $box_height5 / 4);
imagecopy($canvas, $icon6, $box_x6 / 4, $box_y6 / 4, $pos_w6, $pos_h6, $box_width6 / 4, $box_height6 / 4);
imagecopy($canvas, $icon7, $box_x7 / 4, $box_y7 / 4, $pos_w7, $pos_h7, $box_width7 / 4, $box_height7 / 4);
imagecopy($canvas, $icon8, $box_x8 / 4, $box_y8 / 4, $pos_w8, $pos_h8, $box_width8 / 4, $box_height8 / 4);
imagecopy($canvas, $icon9, $box_x9 / 4, $box_y9 / 4, $pos_w9, $pos_h9, $box_width9 / 4, $box_height9 / 4);
imagecopy($canvas, $icon10, $box_x10 / 4, $box_y10 / 4, $pos_w10, $pos_h10, $box_width10 / 4, $box_height10 / 4);
imagecopy($canvas, $icon11, $box_x11 / 4, $box_y11 / 4, $pos_w11, $pos_h11, $box_width11 / 4, $box_height11 / 4);
imagecopy($canvas, $icon12, $box_x12 / 4, $box_y12 / 4, $pos_w12, $pos_h12, $box_width12 / 4, $box_height12 / 4);
imagecopy($canvas, $icon13, $box_x13 / 4, $box_y13 / 4, $pos_w13, $pos_h13, $box_width13 / 4, $box_height13 / 4);
imagecopy($canvas, $icon14, $box_x14 / 4, $box_y14 / 4, $pos_w14, $pos_h14, $box_width14 / 4, $box_height14 / 4);
imagecopy($canvas, $icon15, $box_x15 / 4, $box_y15 / 4, $pos_w15, $pos_h15, $box_width15 / 4, $box_height15 / 4);
imagecopy($canvas, $icon16, $box_x16 / 4, $box_y16 / 4, $pos_w16, $pos_h16, $box_width16 / 4, $box_height16 / 4);
imagecopy($canvas, $icon17, $box_x17 / 4, $box_y17 / 4, $pos_w17, $pos_h17, $box_width17 / 4, $box_height17 / 4);
imagecopy($canvas, $icon18, $box_x18 / 4, $box_y18 / 4, $pos_w18, $pos_h18, $box_width18 / 4, $box_height18 / 4);
// ... copy additional source images to the canvas as needed
$path_to_save = '../frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../fonts/arial.ttf', 60);
    if ($f_id == '67') {
        $img->setPosition("center", "2050");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '71') {
        $img->setPosition("center", "1585");
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