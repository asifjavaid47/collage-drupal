<?php

//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";exit;
// 
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
$image->save_folder = '../../sites/all/modules/frames/frames_temp/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
    $box1_width = intval($box_width1 / 2);
    $box1_height = intval($box_height1 / 2);
     if ($img_w1 < $box1_width) {
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
//------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
// ... add more source images as needed
//Frame 95 Starts
if ($f_id == '95' || $f_id == '96' ) {
   
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 3.3;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 3.4;
            }
        }
        //height
        if ($pos_h1 >
                ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.9;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 * 2.5;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 180;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 550;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 150;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if($f_id == '95') {
        $img->setPosition("center", "1860");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } 
    else if($f_id == '96') {
        $img->setPosition("center", "1860");
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