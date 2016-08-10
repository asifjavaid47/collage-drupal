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
    if ($f_id == 74 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 76 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 82 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 81 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 80 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 79 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 78 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 82 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 77 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 75 && ($img_w1 > $img_h1) && isset($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.07;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 74 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    }
    else if ($f_id == 76 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    }
      else if ($f_id == 82 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 

    else if ($f_id ==80 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id ==81 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 79 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 78 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 77 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } 
    else if ($f_id == 75 && ($img_w1 == $img_h1)) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1.02;
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
    if ($f_id == 74 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 75 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id ==81 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id ==82 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 80 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 79 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 78 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 77 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 76 && ($img_w2 > $img_h2) && isset($_POST['slot_2_de'])) {
        $newwidth = $img_w2 * 1.07;
        $newheight = $img_h2 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } 
    else if ($f_id == 74 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 82 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 79 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 78 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 80 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 77 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 81 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    }
    else if ($f_id == 75 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 76 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.02;
        $newheight = $img_h2 * 1.02;
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
$canvas = @imagecreatefrompng($frame_name);
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
    if ($f_id == 74 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 76 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
    else if ($f_id == 75 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
     else if ($f_id == 82 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    }
    else if ($f_id == 81 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 80 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 79 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 77 && ($img_w3 > $img_h3) && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.07;
        $newheight = $img_h3 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 75 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 82 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 79 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 76 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 81 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 80 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 77 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 78 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } 
    else if ($f_id == 74 && ($img_w3 == $img_h3)) {
        $newwidth = $img_w3 * 1.02;
        $newheight = $img_h3 * 1.02;
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
$canvas = @imagecreatefrompng($frame_name);
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
    if ($f_id == 76 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 74 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
     else if ($f_id == 82 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 80 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 81 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 77&& ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    
    else if ($f_id == 75 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 79 && ($img_w4 > $img_h4) && isset($_POST['slot_4_de'])) {
        $newwidth = $img_w4 * 1.07;
        $newheight = $img_h4 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 74 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 82 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 80 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 81 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 79 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 77 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 78 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } 
    else if ($f_id == 75 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($f_id == 76 && ($img_w4 == $img_h4)) {
        $newwidth = $img_w4 * 1.02;
        $newheight = $img_h4 * 1.02;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    }
    else if ($img_w4 < $box4_width) {
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
}
//end resize fourth image
//------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
$icon3 = imagecreatefromjpeg($new_image3);
$icon4 = imagecreatefromjpeg($new_image4);
$new_image5 = '../../sites/all/modules/frames/frames_texts/' . $f_id . '.gif';
$icon5 = imagecreatefromgif($new_image5);
// ... add more source images as needed
//Frame 74 Starts
if ($f_id == '74') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {

            $pos_h1 = 0;
            $pos_w1 = 370;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {

        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 75 Starts
if ($f_id == '75') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;

            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 76 Starts
if ($f_id == '76') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 77 Starts
if ($f_id == '77') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 78 Starts
if ($f_id == '78') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 78 Starts
if ($f_id == '79') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 80 Starts
if ($f_id == '80') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 81 Starts
if ($f_id == '81') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frame 82 Starts
if ($f_id == '82') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $slot_1_de[2] * 4.1;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 270;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 370;
            
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.75;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 4.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 270;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 370;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 * 4.1;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 0;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos3 = 270;
            $pos_h3 = $pos3;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 370;
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
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 2.8;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 4.1;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 0;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 270;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 370;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos4 = 0;
            $pos_w4 = $pos4;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
imagecopy($canvas, $icon3, $box_x3 / 2, $box_y3 / 2, $pos_w3, $pos_h3, $box_width3 / 2, $box_height3 / 2);
imagecopy($canvas, $icon4, $box_x4 / 2, $box_y4 / 2, $pos_w4, $pos_h4, $box_width4 / 2, $box_height4 / 2);
imagecopy($canvas, $icon5, 1140, 1135, 0, 0, 615, 615);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 75);
    if ($f_id == '74') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '75') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '76') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '77') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '78') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '79') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '80') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '81') {
        $img->setPosition("center", "2830");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    }
    else if ($f_id == '82') {
        $img->setPosition("center", "2830");
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
