<?php

/*
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";exit;
 */
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
    $image->new_width = $box_width1 / 2;
} else {
    $image->new_height = $box_height1 / 2;
}
$image->image_to_resize = $filename1; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '1' . $image_name1;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
   
    
    $box1_width = intval($box_width1 / 2);
    $box1_height = intval($box_height1 / 2);
    if ($f_id == 83 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 84 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 89 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 89 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 90 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 90 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 91 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 91 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 93 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 93 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 86 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 85 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.02;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 87 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 87 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 88 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 88 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 89 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 92 && ($img_w1 == $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 92 && ($img_w1 > $img_h1) && !empty($_POST['slot_1_de'])) {
        $newwidth = $img_w1 * 1.03;
        $newheight = $img_h1 * 1;
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
    }
    
    else if ($img_h1 < $box1_height) {
       
        $diff = $box1_height - $img_h1;
        $newheight = $box_height1 / 2;
        $newwidth = $img_w1 + ($diff /  2);
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
    $image->new_width = $box_width2 / 2;
} else {
    $image->new_height = $box_height2 / 2;
}
$image->image_to_resize = $filename2; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "2" . $image_name2;
$image->save_folder = '../frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image2 = $process['new_file_path'];
    list($img_w2, $img_h2) = getimagesize($new_image2);
    $box2_width = intval($box_width2 / 2);
    $box2_height = intval($box_height2 / 2);
    if ($f_id == 68 && ($img_w2 < $img_h2) && isset($_POST['slot_2_de'])) {

        $newwidth = $img_w2 * 1;
        $newheight = $img_h2 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 69 && ($img_w2 < $img_h2) && isset($_POST['slot_2_de'])) {

        $newwidth = $img_w2 * 1;
        $newheight = $img_h2 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 68 && ($img_w2 == $img_h2)) {
        $newwidth = $img_w2 * 1.54;
        $newheight = $img_h2 * 1.54;
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
    }
    else if ($img_h2 < $box2_height) {
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
//    else if ($img_h2 > $box2_height) {
//        $diff = $box2_height - $img_h2;
//        $newheight = $box_height2 / 1.8;
//        $newwidth = $img_w2 + ($diff / 1.8);
//        // Load
//        $thumb = imagecreatetruecolor($newwidth, $newheight);
//        $source = imagecreatefromjpeg($new_image2);
//        // Resize
//        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
//        // Output
//        imagejpeg($thumb, '../frames_resize/' . $new_image2);
//    }
}
//end resize second image
//------------------------------------------------------------------------------------------------------------
//finally save file
$icon1 = imagecreatefromjpeg($new_image1);
$icon2 = imagecreatefromjpeg($new_image2);
// ... add more source images as needed
//Frame 83 Starts
if ($f_id == '83') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 0;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            
//            if($img_h2 > $box2_height){
//               $pos_w2 = 0;
//                $pos_h2 = 18;
//            }
//            else{
                $pos_w2 = 0;
                $pos_h2 = 0;
//            }
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 84 Starts
if ($f_id == '84') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 85 Starts
if ($f_id == '85') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 86 Starts
if ($f_id == '86') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 87 Starts
if ($f_id == '87') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 88 Starts
if ($f_id == '88') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 89 Starts
if ($f_id == '89') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 85;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 89 Starts
if ($f_id == '89') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 90 Starts
if ($f_id == '90') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 91 Starts
if ($f_id == '91') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 92 Starts
if ($f_id == '92') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 93 Starts
if ($f_id == '93') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frame 94 Starts
if ($f_id == '94') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.6;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $slot_1_de[2] * 3.1;
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
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 460;
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
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.6;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 2.81;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 3.1;
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
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 460;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 150;
        }
    }
}
//Frames End Here
imagecopy($canvas, $icon1, $box_x1 / 2, $box_y1 / 2, $pos_w1, $pos_h1, $box_width1 / 2, $box_height1 / 2);
imagecopy($canvas, $icon2, $box_x2 / 2, $box_y2 / 2, $pos_w2, $pos_h2, $box_width2 / 2, $box_height2 / 2);
// ... copy additional source images to the canvas as needed
$path_to_save = '../frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../fonts/arial.ttf', 75);
    if ($f_id == '83') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '84') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '85') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '86') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '87') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '88') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '89') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '90') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '91') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '92') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '93') {
        $img->setPosition("center", "1590");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '94') {
        $img->setPosition("center", "1590");
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
