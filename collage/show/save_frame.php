<?php

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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
    $box1_width = intval($box_width1 / 2);
    $box1_height = intval($box_height1 / 2);
    if ($img_w1 <= $box1_width) {
        if ($img_w1 == $img_h1 && $f_id == 8) {
            $newwidth = $img_w1 * 1.5;
            $newheight = $img_h1 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else if ($img_w1 == $img_h1 && $f_id == 10) {
            //asif search
            $newwidth = $img_w1 * 1.6;
            $newheight = $img_h1 * 1.6;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else if ($img_w1 == $img_h1 && $f_id == 2) {
            //asif search
            $newwidth = $img_w1 * 1.51;
            $newheight = $img_h1 * 1.51;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else {
            $newwidth = $box_width1 / 2;
            $newheight = $img_h1;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        }
    } else if ($img_h1 <= $box1_height) {
        $newheight = $box_height1 / 2;
        $newwidth = $img_w1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    }
    if ($f_id == 11 && ($img_w1 >= $img_h1)) {
        $newwidth = $img_w1 * 1.09;
        $newheight = $img_h1 * 1.09;
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
    if ($img_w2 < $box2_width) {
        if ($img_w2 == $img_h2 && $f_id == 1) {

            list($img_w2, $img_h2) = getimagesize($new_image2);
//            $newwidth = $width * 1;
//            $newheight = $height *1.5 ;
//
//// Load
//            $thumb = imagecreatetruecolor($newwidth, $newheight);
//            $source = imagecreatefromjpeg($new_image2);
//// Resize
//            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
//          
//          
////            // Load
////            $thumb = imagecreatetruecolor($newwidth, $newheight);
////            $source = imagecreatefromjpeg($new_image2);
////            // Resize
////            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
////            // Output
//            
//            imagejpeg($thumb, '../../sites/all/modules/frames/frames_resize/' . $new_image2);
            $newwidth = $img_w2 * 1.5;
            $newheight = $img_h2 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image2);
        } else if ($img_w2 == $img_h2 && $f_id == 8) {
            $newwidth = $img_w2 * 1.7;
            $newheight = $img_h2 * 1.7;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image2);
        } else if ($img_w2 == $img_h2 && $f_id == 9) {
            $newwidth = $img_w2 * 1.5;
            $newheight = $img_h2 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image2);
        } else if ($img_w2 == $img_h2 && $f_id == 10) {
            $newwidth = $img_w2 * 1.7;
            $newheight = $img_h2 * 1.7;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image2);
        } else if ($img_w2 == $img_h2 && $f_id == 2) {
            //asif search
            list($img_w2, $img_h2) = getimagesize($new_image2);
            $newwidth = $img_w2 * 1.51;
            $newheight = $img_h2 * 1.51;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image2);
        } else {
            $newwidth = $box_width2 / 2;
            $newheight = $img_h2;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../../sites/all/modules/frames/frames_resize/' . $new_image2);
        }
    } else if ($img_h2 < $box2_height) {
        $newheight = $box_height2 / 2;
        $newwidth = $img_w2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../../sites/all/modules/frames/frames_resize/' . $new_image2);
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
    if ($img_w3 <= $box3_width) {
        if ($img_w3 == $img_h3 && $f_id == 8) {
            $newwidth = $img_w3 * 1.7;
            $newheight = $img_h3 * 1.7;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else if ($img_w3 == $img_h3 && $f_id == 9) {
            $newwidth = $img_w3 * 1.5;
            $newheight = $img_h3 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else if ($img_w3 == $img_h3 && $f_id == 2) {
            //asif search
            $newwidth = $img_w3 * 1.51;
            $newheight = $img_h3 * 1.51;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else if ($img_w3 == $img_h3 && $f_id == 10) {
            $newwidth = $img_w3 * 1.7;
            $newheight = $img_h3 * 1.7;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else {
            $newwidth = $box_width3 / 2;
            $newheight = $img_h3;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        }
    } else if ($img_h3 <= $box3_height) {
        $newheight = $box_height3 / 2;
        $newwidth = $img_w3;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
}//end resize third image
//---------------------------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
// ... add more source images as needed
//Frame 1 Starts
if ($f_id == '1') {
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
            $pos_h1 = $slot_1_de[2] * 2.95;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = ($box_width1 / 6);
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = ($box_height1 / 8);
            $pos_w1 = $pos1;
        }
    }

    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];

        if ($pos_w2 > ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 1.2;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 5.5;
        } else if ($pos_h2 < ($pos_h2 / 2)) {

            $pos_h2 = $slot_2_de[2] * 3;
        }
//         list($image_w2, $image_h2) = getimagesize($new_image2);
//        if ($image_w2 > $image_h2) {
//             $pos_w2 = $slot_2_de[0];
//        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = ($box_width2 / 6);
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            //$pos2=($box_height2/8);
            $pos2 = 0;
            $pos_w2 = $pos2;
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
            $pos_h3 = $slot_3_de[2] * 2.95;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = ($box_width3 / 6);
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = ($box_height3 / 8);
            $pos_w3 = $pos3;
        }
    }
    //Frame 2 Starts
} else if ($f_id == '2') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 1.2;
        } else if ($pos_w1 < ($pos_w1 / 2)) {

            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {

            $pos_h1 = $slot_1_de[2] * 6.3;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = ($box_height1 / 3.5);
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = ($box_width1 / 2 - $box_width1 / 2);
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {

            $pos_h1 = 260;
            $pos1 = ($box_width1 / 2 - $box_width1 / 2);
            $pos_w1 = $pos1;
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
        }
        if ($pos_h2 > ($pos_h2 / 2)) {

            $pos_h2 = $slot_2_de[2] * 6.30;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = ($box_height2 / 3.5);
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = ($box_width2 / 2 - $box_width2 / 2);
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {

            $pos_h2 = 260;
            $pos2 = ($box_width2 / 2 - $box_width2 / 2);
            $pos_w2 = $pos2;
        }
    }

    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_2_de[0] * 1.2;
        } else if ($pos_w3 < ($pos_w3 / 2)) {

            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {

            $pos_h3 = $slot_3_de[2] * 6.30;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_2_de[2] * 3;
        }
        list($image_w3, $image_h3) = getimagesize($new_image1);
        if ($image_w3 == $image_h3) {
            $pos_h3 = 200;
            $pos3 = 0;
            $pos_w3 = $pos3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = ($box_height3 / 3.5);
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = ($box_width3 / 2 - $box_width3 / 2);
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {

            $pos_h3 = 260;
            $pos3 = ($box_width3 / 2 - $box_width3 / 2);
            $pos_w3 = $pos3;
        }
    }
    //Frame 3 Starts
} else if ($f_id == '3') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4.35;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] - $slot_1_de[2];
        }
        if ($pos_h1 == ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] - $slot_1_de[2];
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = 0;
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = 800;
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos1 = 350;
            $pos_w1 = $pos1;
        }
    }

    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];

        if ($pos_w2 > ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 4.35;
        } else if ($pos_w2 < ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {

            $pos_h2 = $slot_2_de[2] - $slot_2_de[2];
        }
        if ($pos_h2 == ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] - $slot_2_de[2];
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h1 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = 0;
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 800;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 350;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 4.35;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] - $slot_2_de[2];
        }
        if ($pos_h3 == ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] - $slot_2_de[2];
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 0;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = 800;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos3 = 350;
            $pos_w3 = $pos3;
        }
    }
} //Frame 8 Starts
else if ($f_id == '8') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.7;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.15;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_h1 = $slot_1_de[2] * 6.15;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = 750;
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = 0;
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 300;
            $pos1 = 0;
            $pos_w1 = $pos1;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 >= ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] - $slot_2_de[0];
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.15;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_h2 = $slot_2_de[2] * 3.10;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = 370;
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 150;
            $pos2 = 0;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 >= ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.15;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_h3 = $slot_3_de[2] * 3.10;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 370;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = 0;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 150;
            $pos3 = 0;
            $pos_w3 = $pos3;
        }
    }
}
//Frame 9 Starts
else if ($f_id == '9') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4.15;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = 0;
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 650;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos1 = 300;
            $pos_w1 = $pos1;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 1.15;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.7;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = 500;
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 200;
            $pos2 = 0;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 1.15;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.7;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 500;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = 0;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 200;
            $pos3 = 0;
            $pos_w3 = $pos3;
        }
    }
}
//Frame 10 Starts
else if ($f_id == '10') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.8;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
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
            $pos_h1 = 250;
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
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
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
            $pos_h2 = 250;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];

        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 2.8;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
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
            $pos_h3 = 250;
            $pos_w3 = 0;
        }
    }
}
//Frame 11 Starts
else if ($f_id == '11') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.7;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.18;
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
            $pos_w2 = $slot_2_de[0] * 2.7;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 4;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.18;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 300;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 200;
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
            $pos_w3 = $slot_3_de[0] * 2.7;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 4;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.18;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 300;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 200;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
imagecopy($canvas, $icon3, $box_x3 / 2, $box_y3 / 2, $pos_w3, $pos_h3, $box_width3 / 2, $box_height3 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if ($f_id == '1') {
        $img->setPosition("center", "1671");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '2') {
        $img->setPosition("center", "4060");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '3') {
        $img->setPosition("center", "2150");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '8') {
        $img->setPosition("center", "2150");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '9') {
        $img->setPosition("center", "2150");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '10') {
        $img->setPosition("center", "1150");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '11') {
        $img->setPosition("center", "1570");
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
