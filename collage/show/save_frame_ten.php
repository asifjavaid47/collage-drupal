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
$box6 = $_POST['slot_6_details'];
$box7 = $_POST['slot_7_details'];
$box8 = $_POST['slot_8_details'];
$box9 = $_POST['slot_9_details'];
$box10 = $_POST['slot_10_details'];
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
    $image->new_width = $box_width1 / 4;
} else {
    $image->new_height = $box_height1 / 4;
}
$image->image_to_resize = $filename1; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '1' . $image_name1;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image1 = $process['new_file_path'];
    list($img_w1, $img_h1) = getimagesize($new_image1);
    $box1_width = intval($box_width1 / 4);
    $box1_height = intval($box_height1 / 4);
    if ($f_id == 51 && $img_w1 > $img_h1) {
        $newwidth = $img_w1 * 1.35;
        $newheight = $img_h1 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 51 && $img_w1 == $img_h1) {
        $newwidth = $img_w1 * 2;
        $newheight = $img_h1 * 2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 47 && $img_w1 == $img_h1) {
        $newwidth = $img_w1 * 1.5;
        $newheight = $img_h1 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 48 && $img_w1 == $img_h1) {
        $newwidth = $img_w1 * 1.04;
        $newheight = $img_h1 * 1.04;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 49 && $img_w1 == $img_h1) {
        $newwidth = $img_w1 * 1.5;
        $newheight = $img_h1 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image1);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w1, $img_h1);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image1);
    } else if ($f_id == 45 && $img_w1 == $img_h1) {
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
    $image->new_width = $box_width2 / 4;
} else {
    $image->new_height = $box_height2 / 4;
}
$image->image_to_resize = $filename2; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = "2" . $image_name2;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image2 = $process['new_file_path'];
    list($img_w2, $img_h2) = getimagesize($new_image2);
    $box2_width = intval($box_width2 / 4);
    $box2_height = intval($box_height2 / 4);
    if ($f_id == 47 && $img_w2 == $img_h2) {
        $newwidth = $img_w2 * 1.5;
        $newheight = $img_h2 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 46 && $img_w2 == $img_h2) {
        $newwidth = $img_w2 * 1.5;
        $newheight = $img_h2 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($f_id == 52 && $img_w2 < $img_h2) {
        $newwidth = $img_w2 * 1.17;
        $newheight = $img_h2 * 1.33;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image2);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w2, $img_h2);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image2);
    } else if ($img_w2 < $box2_width) {
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

    if ($f_id==52 && $img_h2 < $box2_height) {
        $image->new_width = $box_width2 / 2.9;
        $image->image_to_resize = $filename2; // Full Path to the file
        $image->ratio = true; // Keep Aspect Ratio?
        $image->new_image_name = "2" . $image_name2;
        $image->save_folder = '../../sites/all/modules/frames/frames_resize/';
        $process = $image->resize();
        if ($process['result'] && $image->save_folder) {
            $new_image2 = $process['new_file_path'];
        }
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
    $image->new_width = $box_width3 / 4;
} else {
    $image->new_height = $box_height3 / 4;
}
$image->image_to_resize = $filename3; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '3' . $image_name3;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image3 = $process['new_file_path'];
    list($img_w3, $img_h3) = getimagesize($new_image3);
    $box3_width = intval($box_width3 / 4);
    $box3_height = intval($box_height3 / 4);
    if ($f_id == 51 && $img_w3 == $img_h3) {
        $newwidth = $img_w3 * 2;
        $newheight = $img_h3 * 2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 51 && $img_w3 > $img_h3) {
        $newwidth = $img_w3 * 1.35;
        $newheight = $img_h3 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 50 && $img_w3 == $img_h3) {
        $newwidth = $img_w3 * 1.4;
        $newheight = $img_h3 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 47 && $img_w3 == $img_h3) {
        $newwidth = $img_w3 * 1.5;
        $newheight = $img_h3 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 48 && $img_w3 > $img_h3 && isset($_POST['slot_3_de'])) {
        $newwidth = $img_w3 * 1.1;
        $newheight = $img_h3 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 46 && $img_w3 == $img_h3) {
        $newwidth = $img_w3 * 1.4;
        $newheight = $img_h3 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image3);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w3, $img_h3);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image3);
    } else if ($f_id == 49 && $img_w3 == $img_h3) {
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
    $image->new_width = $box_width4 / 4;
} else {
    $image->new_height = $box_height4 / 4;
}
$image->image_to_resize = $filename4; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '4' . $image_name4;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image4 = $process['new_file_path'];
    list($img_w4, $img_h4) = getimagesize($new_image4);
    $box4_width = intval($box_width4 / 4);
    $box4_height = intval($box_height4 / 4);
    if ($f_id == 47 && $img_w4 == $img_h4) {
        $newwidth = $img_w4 * 1.5;
        $newheight = $img_h4 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 48 && $img_w4 == $img_h4) {
        $newwidth = $img_w4 * 1.6;
        $newheight = $img_h4 * 1.6;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 52 && $img_w4 < $img_h4) {
        $newwidth = $img_w4 * 1.17;
        $newheight = $img_h4 * 1.33;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image4);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w4, $img_h4);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image4);
    } else if ($f_id == 49 && $img_w4 == $img_h4) {
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
    if ($f_id==52 && $img_h4 < $box4_height) {
        $image->new_width = $box_width4 / 2.9;
        $image->image_to_resize = $filename4; // Full Path to the file
        $image->ratio = true; // Keep Aspect Ratio?
        $image->new_image_name = "4" . $image_name4;
        $image->save_folder = '../../sites/all/modules/frames/frames_resize/';
        $process = $image->resize();
        if ($process['result'] && $image->save_folder) {
            $new_image4 = $process['new_file_path'];
        }
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
    $image->new_width = $box_width5 / 4;
} else {
    $image->new_height = $box_height5 / 4;
}
$image->image_to_resize = $filename5; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '5' . $image_name5;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image5 = $process['new_file_path'];
    list($img_w5, $img_h5) = getimagesize($new_image5);
    $box5_width = intval($box_width5 / 4);
    $box5_height = intval($box_height5 / 4);
    if ($f_id == 52 && $img_w5 == $img_h5) {
        $newwidth = $img_w5 * 1.4;
        $newheight = $img_h5 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 46 && $img_w5 == $img_h5) {
        $newwidth = $img_w5 * 1.4;
        $newheight = $img_h5 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 48 && $img_w5 > $img_h5 && isset($_POST['slot_5_de'])) {
        $newwidth = $img_w5 * 1.1;
        $newheight = $img_h5 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($f_id == 49 && $img_w5 == $img_h5) {
        $newwidth = $img_w5 * 1.5;
        $newheight = $img_h5 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image5);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w5, $img_h5);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image5);
    } else if ($img_w5 < $box5_width) {
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
$filename6 = '../../sites/all/modules/frames/frames_temp/' . $image_name6;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image6 = $process['new_file_path'];
    list($img_w6, $img_h6) = getimagesize($new_image6);
    $box6_width = intval($box_width6 / 4);
    $box6_height = intval($box_height6 / 4);
    if ($f_id == 52 && $img_w6 == $img_h6) {
        $newwidth = $img_w6 * 1.4;
        $newheight = $img_h6 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 46 && $img_w6 == $img_h6) {
        $newwidth = $img_w6 * 1.4;
        $newheight = $img_h6 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 48 && $img_w6 > $img_h6 && isset($_POST['slot_6_de'])) {
        $newwidth = $img_w6 * 1.1;
        $newheight = $img_h6 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($f_id == 49 && $img_w6 == $img_h6) {
        $newwidth = $img_w6 * 1.5;
        $newheight = $img_h6 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image6);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w6, $img_h6);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image6);
    } else if ($img_w6 < $box6_width) {
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
$filename7 = '../../sites/all/modules/frames/frames_temp/' . $image_name7;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image7 = $process['new_file_path'];
    list($img_w7, $img_h7) = getimagesize($new_image7);
    $box7_width = intval($box_width7 / 4);
    $box7_height = intval($box_height7 / 4);
    if ($f_id == 47 && $img_w7 == $img_h7) {
        $newwidth = $img_w7 * 1.5;
        $newheight = $img_h7 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    } else if ($f_id == 48 && $img_w7 == $img_h7) {
        $newwidth = $img_w7 * 1.6;
        $newheight = $img_h7 * 1.6;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    } else if ($f_id == 52 && $img_w7 < $img_h7) {
        $newwidth = $img_w7 * 1.17;
        $newheight = $img_h7 * 1.33;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    } else if ($f_id == 49 && $img_w7 == $img_h7) {
        $newwidth = $img_w7 * 1.5;
        $newheight = $img_h7 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image7);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w7, $img_h7);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image7);
    } else if ($img_w7 < $box7_width) {
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
    if ($f_id==52 && $img_h7 < $box7_height) {
        $image->new_width = $box_width7 / 2.9;
        $image->image_to_resize = $filename7; // Full Path to the file
        $image->ratio = true; // Keep Aspect Ratio?
        $image->new_image_name = "7" . $image_name7;
        $image->save_folder = '../../sites/all/modules/frames/frames_resize/';
        $process = $image->resize();
        if ($process['result'] && $image->save_folder) {
            $new_image7 = $process['new_file_path'];
        }
    }
}//end resize SEVENTH image
//---------------------------------------------------------------------------------------------------------------------------------
//resize the image EIGHTH start here
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
$filename8 = '../../sites/all/modules/frames/frames_temp/' . $image_name8;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image8 = $process['new_file_path'];
    list($img_w8, $img_h8) = getimagesize($new_image8);
    $box8_width = intval($box_width8 / 4);
    $box8_height = intval($box_height8 / 4);
    if ($f_id == 51 && $img_w8 == $img_h8) {
        $newwidth = $img_w8 * 2;
        $newheight = $img_h8 * 2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 51 && $img_w8 > $img_h8) {
        $newwidth = $img_w8 * 1.35;
        $newheight = $img_h8 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 50 && $img_w8 == $img_h8) {
        $newwidth = $img_w8 * 1.4;
        $newheight = $img_h8 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 47 && $img_w8 == $img_h8) {
        $newwidth = $img_w8 * 1.5;
        $newheight = $img_h8 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 46 && $img_w8 == $img_h8) {
        $newwidth = $img_w8 * 1.4;
        $newheight = $img_h8 * 1.4;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 49 && $img_w8 == $img_h8) {
        $newwidth = $img_w8 * 1.5;
        $newheight = $img_h8 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($f_id == 48 && $img_w8 > $img_h8 && isset($_POST['slot_7_de'])) {
        $newwidth = $img_w8 * 1.1;
        $newheight = $img_h8 * 1.1;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    } else if ($img_w8 < $box8_width) {
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
        $newheight = $box_height1 / 4;
        $newwidth = $img_w8 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image8);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w8, $img_h8);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image8);
    }
}//end resize EIGHTH image
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
$filename9 = '../../sites/all/modules/frames/frames_temp/' . $image_name9;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image9 = $process['new_file_path'];
    list($img_w9, $img_h9) = getimagesize($new_image9);
    $box9_width = intval($box_width9 / 4);
    $box9_height = intval($box_height9 / 4);
    if ($f_id == 46 && $img_w9 == $img_h9) {
        $newwidth = $img_w9 * 1.5;
        $newheight = $img_h9 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image9);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w9, $img_h9);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image9);
    } else if ($f_id == 52 && $img_w9 < $img_h9) {
        $newwidth = $img_w9 * 1.17;
        $newheight = $img_h9 * 1.33;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image9);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w9, $img_h9);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image9);
    } else if ($f_id == 47 && $img_w9 == $img_h9) {
        $newwidth = $img_w9 * 1.5;
        $newheight = $img_h9 * 1.5;
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
    if ($f_id==52 && $img_h9 < $box9_height) {
        $image->new_width = $box_width9 / 2.9;
        $image->image_to_resize = $filename9; // Full Path to the file
        $image->ratio = true; // Keep Aspect Ratio?
        $image->new_image_name = "9" . $image_name9;
        $image->save_folder = '../../sites/all/modules/frames/frames_resize/';
        $process = $image->resize();
        if ($process['result'] && $image->save_folder) {
            $new_image9 = $process['new_file_path'];
        }
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
$filename10 = '../../sites/all/modules/frames/frames_temp/' . $image_name10;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image10 = $process['new_file_path'];
    list($img_w10, $img_h10) = getimagesize($new_image10);
    $box10_width = intval($box_width10 / 4);
    $box10_height = intval($box_height10 / 4);
    if ($f_id == 51 && $img_w10 == $img_h10) {
        $newwidth = $img_w10 * 2;
        $newheight = $img_h10 * 2;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($f_id == 51 && $img_w10 > $img_h10) {
        $newwidth = $img_w10 * 1.35;
        $newheight = $img_h10 * 1.35;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($f_id == 45 && $img_w10 == $img_h10) {
        $newwidth = $img_w10 * 1.5;
        $newheight = $img_h10 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($f_id == 47 && $img_w10 == $img_h10) {
        $newwidth = $img_w10 * 1.5;
        $newheight = $img_h10 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($f_id == 49 && $img_w10 == $img_h10) {
        $newwidth = $img_w10 * 1.5;
        $newheight = $img_h10 * 1.5;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image10);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w10, $img_h10);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image10);
    } else if ($f_id == 48 && $img_w10 == $img_h10) {
        $newwidth = $img_w10 * 1.04;
        $newheight = $img_h10 * 1.04;
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
    } else if ($img_h9 < $box10_height) {
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
// ... add more source images as needed
//Frame 45 Starts
if ($f_id == '45') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 3.9;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 2.18;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 * 1.61;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 250;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 25;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 100;
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
                $pos_w2 = $slot_2_de[0] * 1;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 - $pos_h2;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 - $pos_h2;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 185;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 75;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 1;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 - $pos_h3;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 - $pos_h3;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 0;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 185;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 75;
        }
    }
    if (isset($_POST['slot_4_de']) && ($_POST['slot_4_de'] != "")) {
        $slot_4_de = explode("_", $_POST['slot_4_de']);
        $pos_w4 = $slot_4_de[0];
        $pos_h4 = $slot_4_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 185;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 75;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w4 > ($pos_w4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 0;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 185;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 75;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 - $pos_h6;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 - $pos_h6;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 0;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 185;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 75;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 - $pos_h7;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 - $pos_h7;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 0;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 185;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 75;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 1;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 - $pos_h8;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 - $pos_h8;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 0;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 185;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 75;
        }
    }
    if (isset($_POST['slot_9_de']) && ($_POST['slot_9_de'] != "")) {
        $slot_9_de = explode("_", $_POST['slot_9_de']);
        $pos_w9 = $slot_9_de[0];
        $pos_h9 = $slot_9_de[2];
        if ($pos_w2 > ($pos_w9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 - $pos_h9;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 - $pos_h9;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 0;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 185;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 75;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 3.9;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 2.18;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1.61;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 250;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 25;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 100;
            $pos_w10 = 0;
        }
    }
}//Frame 46 Starts
else if ($f_id == '46') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 3.9;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.3;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 1.8;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 - $pos_h1;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 140;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 140;
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
                $pos_w2 = $slot_2_de[0] * 3.9;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1;
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
                $pos_h2 = $pos_h2 * 2;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 370;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
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
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 3.9;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 1;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 2;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1.4;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 220;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 30;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 90;
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
                $pos_w4 = $slot_4_de[0] * 0.8;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0.9;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 1.62;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 210;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 90;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = $slot_5_de[0] * 3.9;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 * 2;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1.4;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 220;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 30;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 90;
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
                $pos_w6 = $slot_6_de[0] * 0.8;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 0.9;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.62;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 - $pos_h6;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 220;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 30;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 90;
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
                $pos_w7 = $slot_7_de[0] * 3.9;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.62;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 - $pos_h7;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 0;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 210;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 90;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 0.8;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 0.9;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.62;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 - $pos_h8;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 220;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 30;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 90;
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
                $pos_w9 = $slot_9_de[0] * 3.9;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 3;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 2;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 370;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 0;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 150;
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
                $pos_w10 = $slot_10_de[0] * 3.9;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.3;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 1.8;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 - $pos_h10;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 140;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 140;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 0;
        }
    }
}//Frame 47 Starts
else if ($f_id == '47') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 3.9;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 1.57;
            }
            //equal
            if ($image_h1 == $image_w1) {

                $pos_h1 = $pos_h1 * 1;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 200;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 75;
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
                $pos_w2 = $slot_2_de[0] * 3.9;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 1.57;
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
            $pos_h2 = 200;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 75;
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
                $pos_w3 = $slot_3_de[0] * 3.9;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 1;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 1.57;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 200;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 75;
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
                $pos_w4 = $slot_4_de[0] * 3.9;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 1.57;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 200;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 75;
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
                $pos_w5 = $slot_5_de[0] * 1.25;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.32;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {

                $pos_h5 = $pos_h5 * 1.85;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 - $pos_h5;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 30;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 240;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 100;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.25;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.32;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.85;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 - $pos_h6;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 30;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 240;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 100;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 3.9;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.57;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 1;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 200;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 75;
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
                $pos_w8 = $slot_8_de[0] * 1.3;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 1;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.57;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 200;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 0;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 75;
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
                $pos_w9 = $slot_9_de[0] * 1.3;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 1.57;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 1;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 200;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 0;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 75;
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
                $pos_w10 = $slot_10_de[0] * 1.3;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 1.57;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 200;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 0;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 75;
            $pos_w10 = 0;
        }
    }
}//Frame 48 Starts
else if ($f_id == '48') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.1;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 1.62;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 - $pos_h1;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 380;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 20;
            $pos_w1 = 160;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 3.9;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.35;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 2.05;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 - $pos_h2;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 150;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 160;
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
                $pos_w3 = $slot_3_de[0] * 1;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $image_h3 = 10;
                $pos_w3 = $slot_3_de[0] * 1.47;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 1.62;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 - $pos_h3;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 20;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 210;
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
                $pos_w4 = $slot_4_de[0] * 3.9;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = 0;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = 0;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1.2;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 170;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 70;
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
                $pos_w5 = $slot_5_de[0] * 1;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.47;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 * 1.62;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 - $pos_h5;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 20;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 210;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 60;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 3.9;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.62;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 - $pos_h6;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 20;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 210;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 60;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.47;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.62;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 - $pos_h7;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 170;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 70;
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
                $pos_w8 = $slot_8_de[0] * 3.9;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = 0;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.62;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 - $pos_h8;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 20;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 210;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 60;
        }
    }
    if (isset($_POST['slot_9_de']) && ($_POST['slot_9_de'] != "")) {
        $slot_9_de = explode("_", $_POST['slot_9_de']);
        $pos_w9 = $slot_9_de[0];
        $pos_h9 = $slot_9_de[2];
        if ($pos_w9 > ($pos_w9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[0] * 3.9;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.35;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 1.62;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 - $pos_h9;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);

        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 150;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 160;
        } else if ($image_w9 == $image_h9) {

            $pos_h2 = 0;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 2.1;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 2;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 1.62;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 - $pos_h10;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 0;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 180;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 20;
            $pos_w10 = 160;
        }
    }
}
//Frame 49 start
else if ($f_id == '49') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.1;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] - $slot_1_de[0];
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 1.60;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 * 1;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 190;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 78;
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
                $pos_w2 = $slot_2_de[0] * 1.35;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.40;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 2;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[2] * 1.40;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 45;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 240;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 90;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.1;
            }
            //width greater
            if ($image_h3 < $image_w3) {

                $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 1.60;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 190;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 78;
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
                $pos_w4 = $slot_4_de[0] * 2.1;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $pos_w4 - $pos_w4;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 1.6;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 190;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 0;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 78;
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
                $pos_w5 = $slot_5_de[0] * 2.1;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] - $slot_5_de[0];
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 * 1.60;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 190;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 0;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 78;
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
                $pos_w6 = $slot_6_de[0] * 2.1;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] - $slot_6_de[0];
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.62;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 1;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 190;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 0;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 78;
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
                $pos_w7 = $slot_7_de[0] * 2.1;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] - $slot_7_de[0];
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.60;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 1;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 190;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 78;
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
                $pos_w8 = $slot_8_de[0] * 2.1;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = 0;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.60;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 190;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 0;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 78;
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
                $pos_w9 = $slot_9_de[0] * 1.35;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.40;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 1.4;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 2;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 20;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 240;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 90;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 2.1;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] - $slot_10_de[0];
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 1.60;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 190;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 0;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 78;
            $pos_w10 = 0;
        }
    }
}//Frame 50 start
else if ($f_id == '50') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.04;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 - $pos_h1;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 * 1;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 0;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 200;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 75;
        }
    }
    if (isset($_POST['slot_2_de']) && ($_POST['slot_2_de'] != "")) {
        $slot_2_de = explode("_", $_POST['slot_2_de']);
        $pos_w2 = $slot_2_de[0];
        $pos_h2 = $slot_2_de[2];
        if ($pos_w2 > ($pos_w2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.04;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 - $pos_h2;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[2] * 1.40;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 0;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 200;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 75;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.1;
            }
            //width greater
            if ($image_h3 < $image_w3) {

                $pos_w3 = $slot_3_de[0] * 1.3;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 1.9;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1.4;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 220;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 30;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 90;
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
                $pos_w4 = $slot_4_de[0] * 1.04;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $pos_w4 * 1.02;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 - $pos_h4;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 0;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 200;
        } else if ($image_w4 == $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 75;
        }
    }
    if (isset($_POST['slot_5_de']) && ($_POST['slot_5_de'] != "")) {
        $slot_5_de = explode("_", $_POST['slot_5_de']);
        $pos_w5 = $slot_5_de[0];
        $pos_h5 = $slot_5_de[2];
        if ($pos_w5 > ($pos_w5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.04;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 - $pos_h5;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 0;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 200;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 75;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 2.1;
            }
            //width greater
            if ($image_h6 < $image_w6) {

                $pos_w6 = $slot_6_de[0] * 1.3;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.9;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 1.4;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 0;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 200;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 75;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.04;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.60;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 1;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 0;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 200;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 75;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 1.04;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $pos_w8 * 1.02;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 - $pos_h8;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 220;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 30;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 90;
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
                $pos_w9 = $slot_9_de[0] * 1.04;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 - $pos_h9;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 2;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 0;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 200;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 75;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.04;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 1.02;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 - $pos_h10;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 * 1;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 0;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 200;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 75;
        }
    }
}//Frame 51 start
else if ($f_id == '51') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];
        if ($pos_w1 == $pos_h1) {
            $pos_h1 = 55;
            $pos_w1 = 0;
        }
        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] * 2.1;
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] - $slot_1_de[0];
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 2.07;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_h1 = $pos_h1 * 1.35;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 300;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 55;
            $pos_w1 = 0;
        } else if ($image_w1 == $image_h1) {
            $pos_h1 = 145;
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
                $pos_w2 = $slot_2_de[0] * 1.35;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 1.02;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[2] * 1.40;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 80;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 85;
        } else if ($image_w2 == $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 0;
        }
    }
    if (isset($_POST['slot_3_de']) && ($_POST['slot_3_de'] != "")) {
        $slot_3_de = explode("_", $_POST['slot_3_de']);
        $pos_w3 = $slot_3_de[0];
        $pos_h3 = $slot_3_de[2];
        if ($pos_w1 == $pos_h1) {
            $pos_h1 = 55;
            $pos_w1 = 0;
        }
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] * 2.1;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 2.07;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1.35;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 300;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 55;
            $pos_w3 = 0;
        } else if ($image_w3 == $image_h3) {
            $pos_h3 = 145;
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
                $pos_w4 = $slot_4_de[0] * 1.35;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 1.02;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[2] * 1.40;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 80;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 85;
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
                $pos_w5 = $slot_5_de[0] * 1.2;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.33;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 * 1.60;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 35;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 240;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 70;
        }
    }
    if (isset($_POST['slot_6_de']) && ($_POST['slot_6_de'] != "")) {
        $slot_6_de = explode("_", $_POST['slot_6_de']);
        $pos_w6 = $slot_6_de[0];
        $pos_h6 = $slot_6_de[2];
        if ($pos_w6 > ($pos_w6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            if ($image_h6 == $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.2;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.33;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.60;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 1;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 35;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 240;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 70;
        }
    }
    if (isset($_POST['slot_7_de']) && ($_POST['slot_7_de'] != "")) {
        $slot_7_de = explode("_", $_POST['slot_7_de']);
        $pos_w7 = $slot_7_de[0];
        $pos_h7 = $slot_7_de[2];
        if ($pos_w7 > ($pos_w7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.35;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.02;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[2] * 1.40;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 80;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 85;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 0;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 == $pos_h8) {
            $pos_h8 = 55;
            $pos_w8 = 0;
        }
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] * 2.1;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] - $slot_8_de[0];
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 2.07;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1.35;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 300;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 55;
            $pos_w8 = 0;
        } else if ($image_w8 == $image_h8) {
            $pos_h8 = 145;
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
                $pos_w9 = $slot_9_de[0] * 1.35;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 1.02;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[2] * 1.40;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 80;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 85;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 0;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 == $pos_h10) {
            $pos_h10 = 55;
            $pos_w10 = 0;
        }
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 2.1;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] - $slot_10_de[0];
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 2.07;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h1 * 1.35;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 300;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 55;
            $pos_w10 = 0;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 145;
            $pos_w10 = 0;
        }
    }
}//Frame 52 start
else if ($f_id == '52') {
    if (isset($_POST['slot_1_de']) && ($_POST['slot_1_de'] != "")) {
        $slot_1_de = explode("_", $_POST['slot_1_de']);
        $pos_w1 = $slot_1_de[0];
        $pos_h1 = $slot_1_de[2];

        if ($pos_w1 > ($pos_w1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[0] - $slot_1_de[0];
            }
            //width greater
            if ($image_h1 < $image_w1) {
                $pos_w1 = $slot_1_de[0] * 0.61;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {
                $pos_h1 = $pos_h1 * 1.04;
            }
            //equal
            if ($image_h1 == $image_w1) {
                $pos_w1 = $slot_1_de[2] * 1.40;
            }
        }
    } else {
        list($image_w1, $image_h1) = getimagesize($new_image1);
        if ($image_h1 > $image_w1) {
            $pos_w1 = 0;
            $pos_h1 = 75;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 90;
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
                $pos_w2 = $slot_2_de[0] * 1.38;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] * 1.37;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 1.02;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_w2 = $slot_2_de[2] * 1.40;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 70;
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
        if ($pos_w1 == $pos_h1) {
            $pos_h1 = 55;
            $pos_w1 = 0;
        }
        if ($pos_w3 > ($pos_w3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            if ($image_h3 == $image_w3) {
                $pos_w3 = $slot_3_de[0] - $slot_3_de[0];
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0.61;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {
                $pos_h3 = $pos_h3 * 1.04;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1.40;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 75;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 90;
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
                $pos_w4 = $slot_4_de[0] * 1.38;
            }
            //width greater
            if ($image_h4 < $image_w4) {
                $pos_w4 = $slot_4_de[0] * 1.37;
            }
        }
        //height
        if ($pos_h4 > ($pos_h4 / 2)) {
            list($image_w4, $image_h4) = getimagesize($new_image4);
            //graeter
            if ($image_h4 > $image_w4) {
                $pos_h4 = $pos_h4 * 1.02;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_w4 = $slot_4_de[2] * 1.40;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 70;
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
            list($image_w5, $image_h5) = getimagesize($new_image5);
            if ($image_h5 == $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.2;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 1.33;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {
                $pos_h5 = $pos_h5 * 1.99;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1.43;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 220;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 30;
        } else if ($image_w5 == $image_h5) {
            $pos_h5 = 90;
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
                $pos_w6 = $slot_6_de[0] * 1.2;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 1.33;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.99;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 * 1.43;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 220;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 30;
        } else if ($image_w6 == $image_h6) {
            $pos_h6 = 90;
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
                $pos_w7 = $slot_7_de[0] * 1.38;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] * 1.37;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.02;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_w7 = $slot_7_de[2] * 1.40;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 70;
            $pos_h7 = 0;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 300;
        } else if ($image_w7 == $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 150;
        }
    }
    if (isset($_POST['slot_8_de']) && ($_POST['slot_8_de'] != "")) {
        $slot_8_de = explode("_", $_POST['slot_8_de']);
        $pos_w8 = $slot_8_de[0];
        $pos_h8 = $slot_8_de[2];
        if ($pos_w8 == $pos_h8) {
            $pos_h8 = 55;
            $pos_w8 = 0;
        }
        if ($pos_w8 > ($pos_w8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            if ($image_h8 == $image_w8) {
                $pos_w8 = $slot_8_de[0] - $slot_8_de[0];
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] * 0.61;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.04;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1.40;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 75;
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
                $pos_w9 = $slot_9_de[0] * 1.38;
            }
            //width greater
            if ($image_h9 < $image_w9) {
                $pos_w9 = $slot_9_de[0] * 1.37;
            }
        }
        //height
        if ($pos_h9 > ($pos_h9 / 2)) {
            list($image_w9, $image_h9) = getimagesize($new_image9);
            //graeter
            if ($image_h9 > $image_w9) {
                $pos_h9 = $pos_h9 * 1.02;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_w9 = $slot_9_de[2] * 1.40;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 70;
            $pos_h9 = 0;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 300;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 150;
        }
    }
    if (isset($_POST['slot_10_de']) && ($_POST['slot_10_de'] != "")) {
        $slot_10_de = explode("_", $_POST['slot_10_de']);
        $pos_w10 = $slot_10_de[0];
        $pos_h10 = $slot_10_de[2];
        if ($pos_w10 == $pos_h10) {
            $pos_h10 = 55;
            $pos_w10 = 0;
        }
        if ($pos_w10 > ($pos_w10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            if ($image_h10 == $image_w10) {
                $pos_w10 = $slot_10_de[0] * 2.1;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] - $slot_10_de[0];
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 * 1.04;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h1 * 1.40;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 75;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 90;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 0;
        }
    }
}
//Frames End Here
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
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 60);
    if ($f_id == '45') {
        $img->setPosition("center", "2070");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '46') {
        $img->setPosition("center", "2340");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '47') {
        $img->setPosition("center", "2100");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '48') {
        $img->setPosition("center", "1715");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '49') {
        $img->setPosition("center", "1150");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '50') {
        $img->setPosition("center", "1120");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '51') {
        $img->setPosition("center", "2100");
        $img->setTextColor(0, 0, 0);
        $img->setQuality(100);
    } else if ($f_id == '52') {
        $img->setPosition("center", "1120");
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