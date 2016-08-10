<?php

// echo "<pre>";
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
    if ($img_w1 < $box1_width) {
        if ($f_id == 6 && ($img_w1 == $img_h1)) {
            $newwidth = $img_w1 * 2.2;
            $newheight = $img_h1 * 2.2;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else if ($f_id == 15 && ($img_w1 == $img_h1)) {
            $newwidth = $img_w1 * 1.51;
            $newheight = $img_h1 * 1.51;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else if ($f_id == 15 && ($img_w1 > $img_h1)) {
            $newwidth = $img_w1 * 1.1;
            $newheight = $img_h1 * 1.1;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image1);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image1);
        } else {
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
        }
    } else if ($f_id == 4 && ($img_w1 > $img_h1)) {
        $newwidth = $img_w1 * 1.05;
        $newheight = $img_h1 * 1.05;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 17 && ($img_w1 < $img_h1)) {
        $newwidth = $img_w1 * 1.08;
        $newheight = $img_h1 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 17 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.08;
        $newheight = $img_h1 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames/frames_resize/' . $new_image1);
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
        imagejpeg($thumb, '../frames/frames_resize/' . $new_image1);
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
        if ($img_w2 == $img_h2 && $f_id == '12') {

            $newwidth = $img_w2 * 1.5;
            $newheight = $img_h2 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames/frames_resize/' . $new_image2);
        } else {
            // asif search
            $diff = $box2_width - $img_w2;
            $newwidth = $box_width2 / 2;
            $newheight = $img_h2 + ($diff / 2);
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image2);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
            // Output
            imagejpeg($thumb, '../frames/frames_resize/' . $new_image2);
        }
    } else if ($f_id == 15 && ($img_w2 == $img_h2)) {

        $newwidth = $img_w2 * 1.06;
        $newheight = $img_h2 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 15 && ($img_w2 > $img_h2)) {

        $newwidth = $img_w2 * 1.1;
        $newheight = $img_h2 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 17 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.08;
        $newheight = $img_h2 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 17 && ($img_w2 < $img_h2)) {
        $newwidth = $img_w2 * 1.08;
        $newheight = $img_h2 * 1.08;
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
    if ($img_w3 < $box3_width) {
        if ($img_w3 == $img_h3 && $f_id == '12') {
            $newwidth = $img_w3 * 1.5;
            $newheight = $img_h3 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else if ($img_w3 == $img_h3 && $f_id == '7') {
            $newwidth = $img_w3 * 2.2;
            //asif search
            $newheight = $img_h3 * 2.2;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else if ($f_id == 15 && ($img_w3 > $img_h2)) {
            $newwidth = $img_w2 * 1.1;
            $newheight = $img_h2 * 1.1;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image3);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image3);
        } else {
            if ($f_id == 5) {
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
            } else {
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
            }
        }
    } else if ($f_id == 15 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.06;
        $newheight = $img_h3 * 1.06;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 17 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.08;
        $newheight = $img_h3 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 17 && ($img_w3 < $img_h3)) {
        $newwidth = $img_w3 * 1.08;
        $newheight = $img_h3 * 1.08;
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
    if ($img_w4 < $box4_width) {
        if ($img_w4 == $img_h4 && $f_id == '12') {
            $newwidth = $img_w4 * 1.5;
            $newheight = $img_h4 * 1.5;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image4);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image4);
        } else if ($img_w4 == $img_h4 && $f_id == '7') {
            $newwidth = $img_w4 * 1.1;
            $newheight = $img_h4 * 1.1;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image4);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image4);
        } else if ($img_w4 == $img_h4 && $f_id == '15') {
            $newwidth = $img_w4 * 1.51;
            $newheight = $img_h4 * 1.51;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image4);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image4);
        } else if ($img_w4 > $img_h4 && $f_id == '15') {
            $newwidth = $img_w4 * 1.1;
            $newheight = $img_h4 * 1.11;
            // Load
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            $source = imagecreatefromjpeg($new_image4);
            // Resize
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
            // Output
            imagejpeg($thumb, '../frames_resize/' . $new_image4);
        } else {
            if ($f_id == '5') {
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
            } else {
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
        }
    } else if ($f_id == 17 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.08;
        $newheight = $img_h4 * 1.08;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 17 && ($img_w4 < $img_h4)) {
        $newwidth = $img_w4 * 1.08;
        $newheight = $img_h4 * 1.08;
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
}//end resize fourth image
//---------------------------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
$icon4 = imagecreatefromjpeg($new_image4);
// ... add more source images as needed
//Frame 1 Starts
if ($f_id == '4') {
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
            $pos_h1 = $slot_1_de[2] * 4.1;
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
            $pos1 = 0;
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos1 = 0;
            $pos_w1 = $pos1;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 2.8;
        } else if ($pos_w2 < ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.1;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = ($box_width2 / 6);
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 2.8;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.1;
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
            $pos_w3 = 300;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos3 = 0;
            $pos_w3 = $pos3;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 2.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.1;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos4 = ($box_width4 / 6);
            $pos_h4 = $pos4;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 5 Starts
else if ($f_id == '5') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];

        if ($pos_w1 > ($pos_w1 / 2)) {

            $pos_w1 = $slot_1_de[0] - $slot_1_de[0];
        } else if ($pos_w1 < ($pos_w1 / 2)) {

            $pos_w1 = $slot_1_de[0] * 3;
        } else if ($pos_w1 == ($pos_w1 / 2)) {

            $pos_w1 = 0;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 5.2;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {

        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {

            $pos_w1 = 0;
            $pos1 = ($box_width1 / 5);
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = 0;
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 400;
            $pos1 = 0;
            $pos_w1 = $pos1;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {

            $pos_w1 = $slot_2_de[0] - $slot_2_de[0];
        } else if ($pos_w2 < ($pos_w2 / 2)) {

            $pos_w2 = $slot_2_de[0] * 3;
        } else if ($pos_w2 == ($pos_w2 / 2)) {

            $pos_w2 = 0;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {

            $pos_h2 = $slot_2_de[2] * 5.2;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos2 = ($box_width2 / 5);
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_w3 == ($pos_w3 / 2)) {
            $pos_w3 = 0;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.8;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = ($box_width3 / 5);
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = 0;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {

            $pos_h3 = 0;
            $pos3 = 100;
            $pos_w3 = $pos3;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];

        if ($pos_w4 > ($pos_w4 / 2)) {

            $pos_w4 = $slot_4_de[0] - $slot_4_de[0];
        } else if ($pos_w4 < ($pos_w4 / 2)) {

            $pos_w4 = $slot_4_de[0] * 3;
        } else if ($pos_w4 == ($pos_w4 / 2)) {

            $pos_w2 = 4;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.8;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos4 = ($box_width4 / 5);
            $pos_h4 = $pos4;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}//Frame 6 Starts
else if ($f_id == '6') {
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
            $pos_h1 = $slot_1_de[2] * 10;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 < $image_w1) {
            $pos_w1 = 0;
            $pos1 = 200;
            $pos_h1 = $pos1;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = 1400;
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 170;

            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 660;
            $pos_w1 = 0;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 2.8;
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
            $pos2 = 0;
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 530;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 180;
            $pos_w2 = $pos2;
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
            $pos3 = 0;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos3 = 530;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos3 = 180;
            $pos_w3 = $pos3;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];

        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 2.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image2);
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
            $pos4 = 0;
            $pos_h4 = $pos4;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos4 = 530;
            $pos_w4 = $pos4;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 180;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 7 Starts
else if ($f_id == '7') {
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
            $pos_w1 = $slot_1_de[0] * 2.8;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 4.5;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos1 = 250;
            $pos_h1 = $pos1;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos1 = 250;
            $pos_w1 = $pos1;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos1 = 0;
            $pos_w1 = $pos1;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 0;
            $pos_w2 = $pos2;
        }
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 2.80;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 70;
            $pos2 = 0;
            $pos_h2 = $pos2;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos2 = 600;
            $pos_w2 = $pos2;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos2 = 300;
            $pos_w2 = $pos2;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];

        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 2.80;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3.5;
        } else if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 2.9;
        } else if ($pos_w3 == $pos_h3) {
            $pos_h3 = 110;
            $pos3 = 0;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 600;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 110;
            $pos3 = 0;
            $pos_w3 = $pos3;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 355;
            $pos3 = 0;
            $pos_w3 = $pos3;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if (($pos_w4 / 2) >= $pos_w4) {
            $pos_w4 = $slot_4_de[0] * 4;
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
            $pos4 = 170;
            $pos_h4 = $pos4;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos4 = 100;
            $pos_w4 = $pos4;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}//Frame 12 Starts
else if ($f_id == '12') {
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
            $pos_h1 = $slot_1_de[2] * 4.5;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_w1 == $image_h1) {
            $pos_w1 = $slot_1_de[0] * 3.5;
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
            $pos_h1 = 0;
            $pos_w1 = 330;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] - $slot_2_de[0];
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        } if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 320;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 100;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        } if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 320;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 100;
            $pos_w3 = 0;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] - $slot_4_de[0];
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        } if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 320;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 110;
            $pos_w4 = 0;
        }
    }
}//Frame 13 Starts
else if ($f_id == '13') {
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
            $pos_h1 = $slot_1_de[2];
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
            $pos_w1 = 450;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 200;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 2.8;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {

            $pos_h2 = $slot_2_de[2];
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
            $pos_w2 = 450;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 200;
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
            $pos_h3 = $slot_3_de[2];
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
            $pos_w3 = 450;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 200;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 2.8;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2];
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
            $pos_w4 = 450;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 200;
        }
    }
}
//Frame 14 start here 
else if ($f_id == '14') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 4.05;
        } else if ($pos_w1 < ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 3;
        }
        if ($pos_h1 > ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2];
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
            $pos_w1 = 720;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 290;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 4.05;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2];
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
            $pos_w2 = 720;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 290;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 4.05;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2];
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
            $pos_w3 = 720;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 200;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 4.05;
        } else if ($pos_w4 < ($pos_w4 / 2)) {
            $pos_w4 = $slot_4_de[0] * 3;
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2];
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
            $pos_w4 = 720;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 200;
        }
    }
}//Frame 15 start here 
else if ($f_id == '15') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            $pos_w1 = $slot_1_de[0] * 2.1;
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
            $pos_h1 = 690;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 300;
            $pos_w1 = 100;
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
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 6.3;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 < $image_w2) {
            $pos_w2 = $slot_2_de[0] * 2.65;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 200;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        } else if ($pos_w3 < ($pos_w3 / 2)) {
            $pos_w3 = $slot_3_de[0] * 3;
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 6.3;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 3;
        }
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 < $image_w3) {
            $pos_w3 = $slot_3_de[0] * 2.65;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 0;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 460;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 200;
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
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.3;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 690;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 300;
            $pos_w4 = 100;
        }
    }
}//Frame 17 start here 
else if ($f_id == '17') {
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
            $pos_h1 = $slot_1_de[2] * 4.3;
        } else if ($pos_h1 < ($pos_h1 / 2)) {
            $pos_h1 = $slot_1_de[2] * 3;
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 290;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 250;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 70;
            $pos_w1 = 70;
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
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.3;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
        if ($pos_w2 > ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 2.1;
        } else if ($pos_w2 < ($pos_w2 / 2)) {
            $pos_w2 = $slot_2_de[0] * 3;
        }
        if ($pos_h2 > ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 4.3;
        } else if ($pos_h2 < ($pos_h2 / 2)) {
            $pos_h2 = $slot_2_de[2] * 3;
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 290;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 250;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 70;
            $pos_w2 = 70;
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
        }
        if ($pos_h3 > ($pos_h3 / 2)) {
            $pos_h3 = $slot_3_de[2] * 4.3;
        } else if ($pos_h3 < ($pos_h3 / 2)) {
            $pos_h1 = $slot_3_de[2] * 3;
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 290;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 250;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 70;
            $pos_w3 = 70;
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
        }
        if ($pos_h4 > ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 4.3;
        } else if ($pos_h4 < ($pos_h4 / 2)) {
            $pos_h4 = $slot_4_de[2] * 3;
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 290;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 250;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 70;
            $pos_w4 = 70;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
imagecopy($canvas, $icon3, $box_x3 / 2, $box_y3 / 2, $pos_w3, $pos_h3, $box_width3 / 2, $box_height3 / 2);
imagecopy($canvas, $icon4, $box_x4 / 2, $box_y4 / 2, $pos_w4, $pos_h4, $box_width4 / 2, $box_height4 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if ($f_id == '4') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '5') {
        $img->setPosition("center", "4000");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '6') {
        $img->setPosition("center", "2950");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '7') {
        $img->setPosition("center", "2300");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '12') {
        $img->setPosition("center", "2100");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '13') {
        $img->setPosition("center", "1630");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '14') {
        $img->setPosition("center", "4000");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '15') {
        $img->setPosition("center", "2920");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '17') {
        $img->setPosition("center", "2820");
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
