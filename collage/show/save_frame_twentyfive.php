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
$box11 = $_POST['slot_11_details'];
$box12 = $_POST['slot_12_details'];
$box13 = $_POST['slot_13_details'];
$box14 = $_POST['slot_14_details'];
$box15 = $_POST['slot_15_details'];
$box16 = $_POST['slot_16_details'];
$box17 = $_POST['slot_17_details'];
$box18 = $_POST['slot_18_details'];
$box19 = $_POST['slot_19_details'];
$box20 = $_POST['slot_20_details'];
$box21 = $_POST['slot_21_details'];
$box22 = $_POST['slot_22_details'];
$box23 = $_POST['slot_23_details'];
$box24 = $_POST['slot_24_details'];
$box25 = $_POST['slot_25_details'];

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
    
      if ($img_w1 < $box1_width) {
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
     if ($img_w2 < $box2_width) {
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
     if ($img_w3 < $box3_width) {
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
    if ($img_w4 < $box4_width) {
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
     if ($img_h9 < $box9_height) {
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
    if ($img_w10 < $box10_width) {
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
$filename11 = '../../sites/all/modules/frames/frames_temp/' . $image_name11;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
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
$filename12 = '../../sites/all/modules/frames/frames_temp/' . $image_name12;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
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
$filename13 = '../../sites/all/modules/frames/frames_temp/' . $image_name13;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
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
$filename14 = '../../sites/all/modules/frames/frames_temp/' . $image_name14;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
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
$filename15 = '../../sites/all/modules/frames/frames_temp/' . $image_name15;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image15 = $process['new_file_path'];
    list($img_w15, $img_h15) = getimagesize($new_image15);
    $box15_width = intval($box_width15 / 4);
    $box15_height = intval($box_height15 / 4);
     if ($img_w15 < $box15_width) {
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
$filename16 = '../../sites/all/modules/frames/frames_temp/' . $image_name16;
$image = new Resize_Image;
list($width16, $height16) = getimagesize($filename16);
if ($width16 < $height16) {
    $image->new_width = $box_width16 / 4;
} else {
    $image->new_height = $box_height16 / 4;
}
$image->image_to_resize = $filename16; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '16' . $image_name16;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image16 = $process['new_file_path'];
    list($img_w16, $img_h16) = getimagesize($new_image16);
    $box16_width = intval($box_width16 / 4);
    $box16_height = intval($box_height16 / 4);
     if ($img_w16 < $box16_width) {
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
    } else if ($img_h1 < $box16_height) {
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
$filename17 = '../../sites/all/modules/frames/frames_temp/' . $image_name17;
$image = new Resize_Image;
list($width17, $height17) = getimagesize($filename17);
if ($width17 < $height17) {
    $image->new_width = $box_width17 / 4;
} else {
    $image->new_height = $box_height17 / 4;
}
$image->image_to_resize = $filename17; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '17' . $image_name17;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image17 = $process['new_file_path'];
    list($img_w17, $img_h17) = getimagesize($new_image17);
    $box17_width = intval($box_width17 / 4);
    $box17_height = intval($box_height17 / 4);
    if ($f_id == 68 && ($img_w17 == $img_h17)) {

        $newwidth = $img_w17 * 1.54;
        $newheight = $img_h17 * 1.54;
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
    } else if ($img_h1 < $box17_height) {
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
    //resize the image thirteen start here
}
//resize the image eighteen start here
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
$filename18 = '../../sites/all/modules/frames/frames_temp/' . $image_name18;
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
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image18 = $process['new_file_path'];
    list($img_w18, $img_h18) = getimagesize($new_image18);
    $box18_width = intval($box_width18 / 4);
    $box18_height = intval($box_height18 / 4);
    if ($img_w18 < $box18_width) {
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
    } else if ($img_h1 < $box18_height) {
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
//resize the image nineteen start here
$query_temp19 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_19'] . '"');
$row_temp19 = mysql_fetch_array($query_temp19);
$query_box19 = mysql_query('select * from box_detail where box_id="' . $box19 . '"');
$row_box19 = mysql_fetch_array($query_box19);
$image_name19 = $row_temp19['image_name'];
$box_x19 = $row_box19['box_x'];
$box_y19 = $row_box19['box_y'];
$box_width19 = $row_box19['box_width'];
$box_height19 = $row_box19['box_height'];
// Get new sizes
$filename19 = '../../sites/all/modules/frames/frames_temp/' . $image_name19;
$image = new Resize_Image;
list($width19, $height19) = getimagesize($filename19);
if ($width19 < $height19) {
    $image->new_width = $box_width19 / 4;
} else {
    $image->new_height = $box_height19 / 4;
}
$image->image_to_resize = $filename19; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '19' . $image_name19;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image19 = $process['new_file_path'];
    list($img_w19, $img_h19) = getimagesize($new_image19);
    $box19_width = intval($box_width19 / 4);
    $box19_height = intval($box_height19 / 4);
     if ($f_id == 68 && ($img_w19 == $img_h19)) {

        $newwidth = $img_w19 * 1.54;
        $newheight = $img_h19 * 1.54;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image19);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w19, $img_h19);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image19);
    }
   else  if ($img_w19 < $box19_width) {
        $diff = $box19_width - $img_w19;
        $newwidth = $box_width19 / 4;
        $newheight = $img_h19 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image19);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w19, $img_h19);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image19);
    } else if ($img_h1 < $box19_height) {
        $diff = $box19_height - $img_h19;
        $newheight = $box_height19 / 4;
        $newwidth = $img_w19 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image19);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w19, $img_h19);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image19);
    }
    //resize the image thirteen start here
}
//resize the image twenty start here
$query_temp20 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_20'] . '"');
$row_temp20 = mysql_fetch_array($query_temp20);
$query_box20 = mysql_query('select * from box_detail where box_id="' . $box20 . '"');
$row_box20 = mysql_fetch_array($query_box20);
$image_name20 = $row_temp20['image_name'];
$box_x20 = $row_box20['box_x'];
$box_y20 = $row_box20['box_y'];
$box_width20 = $row_box20['box_width'];
$box_height20 = $row_box20['box_height'];
// Get new sizes
$filename20 = '../../sites/all/modules/frames/frames_temp/' . $image_name20;
$image = new Resize_Image;
list($width20, $height20) = getimagesize($filename20);
if ($width20 < $height20) {
    $image->new_width = $box_width20 / 4;
} else {
    $image->new_height = $box_height20 / 4;
}
$image->image_to_resize = $filename20; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '20' . $image_name20;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image20 = $process['new_file_path'];
    list($img_w20, $img_h20) = getimagesize($new_image20);
    $box20_width = intval($box_width20 / 4);
    $box20_height = intval($box_height20 / 4);
     if ($img_w20 < $box20_width) {
        $diff = $box20_width - $img_w20;
        $newwidth = $box_width20 / 4;
        $newheight = $img_h20 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image20);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w20, $img_h20);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image20);
    } else if ($img_h1 < $box20_height) {
        $diff = $box20_height - $img_h20;
        $newheight = $box_height20 / 4;
        $newwidth = $img_w20 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image20);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w20, $img_h20);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image20);
    }
    
}
//resize the image twenty one start here
$query_temp21 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_21'] . '"');
$row_temp21 = mysql_fetch_array($query_temp21);
$query_box21 = mysql_query('select * from box_detail where box_id="' . $box21 . '"');
$row_box21 = mysql_fetch_array($query_box21);
$image_name21 = $row_temp21['image_name'];
$box_x21 = $row_box21['box_x'];
$box_y21 = $row_box21['box_y'];
$box_width21 = $row_box21['box_width'];
$box_height21 = $row_box21['box_height'];
// Get new sizes
$filename21 = '../../sites/all/modules/frames/frames_temp/' . $image_name21;
$image = new Resize_Image;
list($width21, $height21) = getimagesize($filename21);
if ($width21 < $height21) {
    $image->new_width = $box_width21 / 4;
} else {
    $image->new_height = $box_height21 / 4;
}
$image->image_to_resize = $filename21; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '21' . $image_name21;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image21 = $process['new_file_path'];
    list($img_w21, $img_h21) = getimagesize($new_image21);
    $box21_width = intval($box_width21 / 4);
    $box21_height = intval($box_height21 / 4);
     if ($img_w21 < $box21_width) {
        $diff = $box21_width - $img_w21;
        $newwidth = $box_width21 / 4;
        $newheight = $img_h21 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image21);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w21, $img_h21);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image21);
    } else if ($img_h1 < $box21_height) {
        $diff = $box21_height - $img_h21;
        $newheight = $box_height21 / 4;
        $newwidth = $img_w21 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image21);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w21, $img_h21);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image21);
    }
 
}
//resize the image twenty two start here
$query_temp22 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_22'] . '"');
$row_temp22 = mysql_fetch_array($query_temp22);
$query_box22 = mysql_query('select * from box_detail where box_id="' . $box22 . '"');
$row_box22 = mysql_fetch_array($query_box22);
$image_name22 = $row_temp22['image_name'];
$box_x22 = $row_box22['box_x'];
$box_y22 = $row_box22['box_y'];
$box_width22 = $row_box22['box_width'];
$box_height22 = $row_box22['box_height'];
// Get new sizes
$filename22 = '../../sites/all/modules/frames/frames_temp/' . $image_name22;
$image = new Resize_Image;
list($width22, $height22) = getimagesize($filename22);
if ($width22 < $height22) {
    $image->new_width = $box_width22 / 4;
} else {
    $image->new_height = $box_height22 / 4;
}
$image->image_to_resize = $filename22; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '22' . $image_name22;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image22 = $process['new_file_path'];
    list($img_w22, $img_h22) = getimagesize($new_image22);
    $box22_width = intval($box_width22 / 4);
    $box22_height = intval($box_height22 / 4);
     if ($img_w22 < $box22_width) {
        $diff = $box22_width - $img_w22;
        $newwidth = $box_width22 / 4;
        $newheight = $img_h22 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image22);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w22, $img_h22);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image22);
    } else if ($img_h1 < $box22_height) {
        $diff = $box22_height - $img_h22;
        $newheight = $box_height22 / 4;
        $newwidth = $img_w22 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image22);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w22, $img_h22);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image22);
    }
    //resize the image thirteen start here
}
//resize the image twenty three start here
$query_temp23 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_23'] . '"');
$row_temp23 = mysql_fetch_array($query_temp23);
$query_box23 = mysql_query('select * from box_detail where box_id="' . $box23 . '"');
$row_box23 = mysql_fetch_array($query_box23);
$image_name23 = $row_temp23['image_name'];
$box_x23 = $row_box23['box_x'];
$box_y23 = $row_box23['box_y'];
$box_width23 = $row_box23['box_width'];
$box_height23 = $row_box23['box_height'];
// Get new sizes
$filename23 = '../../sites/all/modules/frames/frames_temp/' . $image_name23;
$image = new Resize_Image;
list($width23, $height23) = getimagesize($filename23);
if ($width23 < $height23) {
    $image->new_width = $box_width23 / 4;
} else {
    $image->new_height = $box_height23 / 4;
}
$image->image_to_resize = $filename23; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '23' . $image_name23;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image23 = $process['new_file_path'];
    list($img_w23, $img_h23) = getimagesize($new_image23);
    $box23_width = intval($box_width23 / 4);
    $box23_height = intval($box_height23 / 4);
     if ($img_w23 < $box23_width) {
        $diff = $box23_width - $img_w23;
        $newwidth = $box_width23 / 4;
        $newheight = $img_h23 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image23);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w23, $img_h23);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image23);
    } else if ($img_h1 < $box23_height) {
        $diff = $box23_height - $img_h23;
        $newheight = $box_height23 / 4;
        $newwidth = $img_w23 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image23);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w23, $img_h23);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image23);
    }
    
}
//resize the image twenty four start here
$query_temp24 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_24'] . '"');
$row_temp24 = mysql_fetch_array($query_temp24);
$query_box24 = mysql_query('select * from box_detail where box_id="' . $box24 . '"');
$row_box24 = mysql_fetch_array($query_box24);
$image_name24 = $row_temp24['image_name'];
$box_x24 = $row_box24['box_x'];
$box_y24 = $row_box24['box_y'];
$box_width24 = $row_box24['box_width'];
$box_height24 = $row_box24['box_height'];
// Get new sizes
$filename24 = '../../sites/all/modules/frames/frames_temp/' . $image_name24;
$image = new Resize_Image;
list($width24, $height24) = getimagesize($filename24);
if ($width24 < $height24) {
    $image->new_width = $box_width24 / 4;
} else {
    $image->new_height = $box_height24 / 4;
}
$image->image_to_resize = $filename24; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '24' . $image_name24;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image24 = $process['new_file_path'];
    list($img_w24, $img_h24) = getimagesize($new_image24);
    $box24_width = intval($box_width24 / 4);
    $box24_height = intval($box_height24 / 4);
     if ($img_w24 < $box24_width) {
        $diff = $box24_width - $img_w24;
        $newwidth = $box_width24 / 4;
        $newheight = $img_h24 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image24);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w24, $img_h24);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image24);
    } else if ($img_h1 < $box24_height) {
        $diff = $box24_height - $img_h24;
        $newheight = $box_height24 / 4;
        $newwidth = $img_w24 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image24);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w24, $img_h24);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image24);
    }
   
}
//resize the image twenty five start here
$query_temp25 = mysql_query('select image_name from frame_temp where image_name="' . $_POST['slot_25'] . '"');
$row_temp25 = mysql_fetch_array($query_temp25);
$query_box25 = mysql_query('select * from box_detail where box_id="' . $box25 . '"');
$row_box25 = mysql_fetch_array($query_box25);
$image_name25 = $row_temp25['image_name'];
$box_x25 = $row_box25['box_x'];
$box_y25 = $row_box25['box_y'];
$box_width25 = $row_box25['box_width'];
$box_height25 = $row_box25['box_height'];
// Get new sizes
$filename25 = '../../sites/all/modules/frames/frames_temp/' . $image_name25;
$image = new Resize_Image;
list($width25, $height25) = getimagesize($filename25);
if ($width25 < $height25) {
    $image->new_width = $box_width25 / 4;
} else {
    $image->new_height = $box_height25 / 4;
}
$image->image_to_resize = $filename25; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = '25' . $image_name25;
$image->save_folder = '../../sites/all/modules/frames/frames_resize/';
$process = $image->resize();
if ($process['result'] && $image->save_folder) {
    $new_image25 = $process['new_file_path'];
    list($img_w25, $img_h25) = getimagesize($new_image25);
    $box25_width = intval($box_width25 / 4);
    $box25_height = intval($box_height25 / 4);
     if ($img_w25 < $box25_width) {
        $diff = $box25_width - $img_w25;
        $newwidth = $box_width25 / 4;
        $newheight = $img_h25 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image25);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w25, $img_h25);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image25);
    } else if ($img_h1 < $box25_height) {
        $diff = $box25_height - $img_h25;
        $newheight = $box_height25 / 4;
        $newwidth = $img_w25 + ($diff / 4);
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $source = imagecreatefromjpeg($new_image25);
        // Resize
        imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $img_w25, $img_h25);
        // Output
        imagejpeg($thumb, '../frames_resize/' . $new_image25);
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
$icon19 = imagecreatefromjpeg($new_image19);
$icon20 = imagecreatefromjpeg($new_image20);
$icon21 = imagecreatefromjpeg($new_image21);
$icon22 = imagecreatefromjpeg($new_image22);
$icon23 = imagecreatefromjpeg($new_image23);
$icon24 = imagecreatefromjpeg($new_image24);
$icon25 = imagecreatefromjpeg($new_image25);
// ... add more source images as needed
//Frame 72 Starts

if ($f_id == '72') {
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
                $pos_w1 = $slot_1_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h1 > ($pos_h1 / 2)) {
            list($image_w1, $image_h1) = getimagesize($new_image1);
            //graeter
            if ($image_h1 > $image_w1) {

                $pos_h1 = $pos_h1 * 1.01;
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
            $pos_h1 = 80;
        } else if ($image_w1 > $image_h1) {
            $pos_h1 = 0;
            $pos_w1 = 75;
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
                $pos_w2 = $slot_2_de[0] * 0;
            }
            //width greater
            if ($image_h2 < $image_w2) {
                $pos_w2 = $slot_2_de[0] *0.65;
            }
        }
        //height
        if ($pos_h2 > ($pos_h2 / 2)) {
            list($image_w2, $image_h2) = getimagesize($new_image2);
            //graeter
            if ($image_h2 > $image_w2) {
                $pos_h2 = $pos_h2 * 1.01;
            }
            //equal
            if ($image_h2 == $image_w2) {
                $pos_h2 = $pos_h2 * 1.01;
            }
        }
    } else {
        list($image_w2, $image_h2) = getimagesize($new_image2);
        if ($image_h2 > $image_w2) {
            $pos_w2 = 0;
            $pos_h2 = 80;
        } else if ($image_w2 > $image_h2) {
            $pos_h2 = 0;
            $pos_w2 = 75;
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
                $pos_w3 = $slot_3_de[0] * 0;
            }
            //width greater
            if ($image_h3 < $image_w3) {
                $pos_w3 = $slot_3_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h3 > ($pos_h3 / 2)) {
            list($image_w3, $image_h3) = getimagesize($new_image3);
            //graeter
            if ($image_h3 > $image_w3) {

                $pos_h3 = $pos_h3 *1.01;
            }
            //equal
            if ($image_h3 == $image_w3) {
                $pos_h3 = $pos_h3 * 1.01;
            }
        }
    } else {
        list($image_w3, $image_h3) = getimagesize($new_image3);
        if ($image_h3 > $image_w3) {
            $pos_w3 = 0;
            $pos_h3 = 80;
        } else if ($image_w3 > $image_h3) {
            $pos_h3 = 0;
            $pos_w3 = 75;
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
                $pos_w4 = $slot_4_de[0] * 0;
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
                $pos_h4 = $pos_h4 * 1.01;
            }
            //equal
            if ($image_h4 == $image_w4) {
                $pos_h4 = $pos_h4 * 1.01;
            }
        }
    } else {
        list($image_w4, $image_h4) = getimagesize($new_image4);
        if ($image_h4 > $image_w4) {
            $pos_w4 = 0;
            $pos_h4 = 80;
        } else if ($image_w4 > $image_h4) {
            $pos_h4 = 0;
            $pos_w4 = 75;
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

                $pos_w5 = $pos_w5 * 0;
            }
            //width greater
            if ($image_h5 < $image_w5) {
                $pos_w5 = $slot_5_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h5 > ($pos_h5 / 2)) {
            list($image_w5, $image_h5) = getimagesize($new_image5);
            //graeter
            if ($image_h5 > $image_w5) {

                $pos_h5 = $pos_h5 * 1.01;
            }
            //equal
            if ($image_h5 == $image_w5) {
                $pos_h5 = $pos_h5 * 1.01;
            }
        }
    } else {
        list($image_w5, $image_h5) = getimagesize($new_image5);
        if ($image_h5 > $image_w5) {
            $pos_w5 = 0;
            $pos_h5 = 80;
        } else if ($image_w5 > $image_h5) {
            $pos_h5 = 0;
            $pos_w5 = 75;
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
                $pos_w6 = $pos_w6 * 0;
            }
            //width greater
            if ($image_h6 < $image_w6) {
                $pos_w6 = $slot_6_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h6 > ($pos_h6 / 2)) {
            list($image_w6, $image_h6) = getimagesize($new_image6);
            //graeter
            if ($image_h6 > $image_w6) {
                $pos_h6 = $pos_h6 * 1.01;
            }
            //equal
            if ($image_h6 == $image_w6) {
                $pos_h6 = $pos_h6 *1.01;
            }
        }
    } else {
        list($image_w6, $image_h6) = getimagesize($new_image6);
        if ($image_h6 > $image_w6) {
            $pos_w6 = 0;
            $pos_h6 = 80;
        } else if ($image_w6 > $image_h6) {
            $pos_h6 = 0;
            $pos_w6 = 75;
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
                $pos_w7 = $slot_7_de[0] * 0;
            }
            //width greater
            if ($image_h7 < $image_w7) {
                $pos_w7 = $slot_7_de[0] *  0.65;
            }
        }
        //height
        if ($pos_h7 > ($pos_h7 / 2)) {
            list($image_w7, $image_h7) = getimagesize($new_image7);
            //graeter
            if ($image_h7 > $image_w7) {
                $pos_h7 = $pos_h7 * 1.01;
            }
            //equal
            if ($image_h7 == $image_w7) {
                $pos_h7 = $pos_h7 * 1.01;
            }
        }
    } else {
        list($image_w7, $image_h7) = getimagesize($new_image7);
        if ($image_h7 > $image_w7) {
            $pos_w7 = 0;
            $pos_h7 = 80;
        } else if ($image_w7 > $image_h7) {
            $pos_h7 = 0;
            $pos_w7 = 75;
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
                $pos_w8 = $slot_8_de[0] * 0;
            }
            //width greater
            if ($image_h8 < $image_w8) {
                $pos_w8 = $slot_8_de[0] *  0.65;
            }
        }
        //height
        if ($pos_h8 > ($pos_h8 / 2)) {
            list($image_w8, $image_h8) = getimagesize($new_image8);
            //graeter
            if ($image_h8 > $image_w8) {
                $pos_h8 = $pos_h8 * 1.01;
            }
            //equal
            if ($image_h8 == $image_w8) {
                $pos_h8 = $pos_h8 * 1.01;
            }
        }
    } else {
        list($image_w8, $image_h8) = getimagesize($new_image8);
        if ($image_h8 > $image_w8) {
            $pos_w8 = 0;
            $pos_h8 = 80;
        } else if ($image_w8 > $image_h8) {
            $pos_h8 = 0;
            $pos_w8 = 75;
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
                $pos_w9 = $slot_9_de[0] * 0;
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
                $pos_h9 = $pos_h9 * 1.01;
            }
            //equal
            if ($image_h9 == $image_w9) {
                $pos_h9 = $pos_h9 * 1.01;
            }
        }
    } else {
        list($image_w9, $image_h9) = getimagesize($new_image9);
        if ($image_h9 > $image_w9) {
            $pos_w9 = 0;
            $pos_h9 = 80;
        } else if ($image_w9 > $image_h9) {
            $pos_h9 = 0;
            $pos_w9 = 75;
        } else if ($image_w9 == $image_h9) {
            $pos_h9 = 0;
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
                $pos_w10 = $slot_10_de[0] * 0;
            }
            //width greater
            if ($image_h10 < $image_w10) {
                $pos_w10 = $slot_10_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h10 > ($pos_h10 / 2)) {
            list($image_w10, $image_h10) = getimagesize($new_image10);
            //graeter
            if ($image_h10 > $image_w10) {
                $pos_h10 = $pos_h10 *  1.01;
            }
            //equal
            if ($image_h10 == $image_w10) {
                $pos_h10 = $pos_h10 *1.01;
            }
        }
    } else {
        list($image_w10, $image_h10) = getimagesize($new_image10);
        if ($image_h10 > $image_w10) {
            $pos_w10 = 0;
            $pos_h10 = 80;
        } else if ($image_w10 > $image_h10) {
            $pos_h10 = 0;
            $pos_w10 = 75;
        } else if ($image_w10 == $image_h10) {
            $pos_h10 = 0;
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
                $pos_w11 = $slot_11_de[0] * 0;
            }
            //width greater
            if ($image_h11 < $image_w11) {
                $pos_w11 = $slot_11_de[0] *  0.65;
            }
        }
        //height
        if ($pos_h11 > ($pos_h11 / 2)) {
            list($image_w11, $image_h11) = getimagesize($new_image11);
            //graeter
            if ($image_h11 > $image_w11) {
                $pos_h11 = $pos_h11 * 1.01;
            }
            //equal
            if ($image_h11 == $image_w11) {
                $pos_h11 = $pos_h11 * 1.01;
            }
        }
    } else {
        list($image_w11, $image_h11) = getimagesize($new_image11);
        if ($image_h11 > $image_w11) {
            $pos_w11 = 0;
            $pos_h11 = 80;
        } else if ($image_w11 > $image_h11) {
            $pos_h11 = 0;
            $pos_w11 = 75;
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
                $pos_w12 = $slot_12_de[0] * 0;
            }
            //width greater
            if ($image_h12 < $image_w12) {
                $pos_w12 = $slot_12_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h12 > ($pos_h12 / 2)) {
            list($image_w12, $image_h12) = getimagesize($new_image12);
            //graeter
            if ($image_h12 > $image_w12) {
                $pos_h12 = $pos_h12 * 1.01;
            }
            //equal
            if ($image_h12 == $image_w12) {
                $pos_h12 = $pos_h12 * 1.01;
            }
        }
    } else {
        list($image_w12, $image_h12) = getimagesize($new_image12);
        if ($image_h12 > $image_w12) {
            $pos_w12 = 0;
            $pos_h12 = 80;
        } else if ($image_w12 > $image_h12) {
            $pos_h12 = 0;
            $pos_w12 = 75;
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
                $pos_w13 = $slot_13_de[0] * 0;
            }
            //width greater
            if ($image_h13 < $image_w13) {
                    $pos_w13 = $slot_13_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h13 > ($pos_h13 / 2)) {
            list($image_w13, $image_h13) = getimagesize($new_image13);
            //graeter
            if ($image_h13 > $image_w13) {
                $pos_h13 = $pos_h13 * 1.01;
            }
            //equal
            if ($image_h13 == $image_w13) {
                $pos_h13 = $pos_h13 * 1.01;
            }
        }
    } else {
        list($image_w13, $image_h13) = getimagesize($new_image13);
        if ($image_h13 > $image_w13) {
            $pos_w13 = 0;
            $pos_h13 = 80;
        } else if ($image_w13 > $image_h13) {
            $pos_h13 = 0;
            $pos_w13 = 75;
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
                $pos_w14 = $slot_14_de[0] * 0;
            }
            //width greater
            if ($image_h14 < $image_w14) {
                $pos_w14 = $slot_14_de[0] *  0.65;
            }
        }
        //height
        if ($pos_h14 > ($pos_h14 / 2)) {
            list($image_w14, $image_h14) = getimagesize($new_image14);
            //graeter
            if ($image_h14 > $image_w14) {
                $pos_h14 = $pos_h14 * 1.01;
            }
            //equal
            if ($image_h14 == $image_w14) {
                $pos_h14 = $pos_h14 * 1.01;
            }
        }
    } else {
        list($image_w14, $image_h14) = getimagesize($new_image14);
        if ($image_h14 > $image_w14) {
            $pos_w14 = 0;
            $pos_h14 = 80;
        } else if ($image_w14 > $image_h14) {
            $pos_h14 = 0;
            $pos_w14 = 75;
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
                $pos_w15 = $slot_15_de[0] * 0;
            }
            //width greater
            if ($image_h15 < $image_w15) {
                $pos_w15 = $slot_15_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h15 > ($pos_h15 / 2)) {
            list($image_w15, $image_h15) = getimagesize($new_image15);
            //graeter
            if ($image_h15 > $image_w15) {
                $pos_h15 = $pos_h15 * 1.01;
            }
            //equal
            if ($image_h15 == $image_w15) {
                $pos_h15 = $pos_h15 *1.01;
            }
        }
    } else {
        list($image_w15, $image_h15) = getimagesize($new_image15);
        if ($image_h15 > $image_w15) {
            $pos_w15 = 0;
            $pos_h15 = 80;
        } else if ($image_w15 > $image_h15) {
            $pos_h15 = 0;
            $pos_w15 = 75;
        } else if ($image_w15 == $image_h15) {
            $pos_h15 = 0;
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
                $pos_w16 = $slot_16_de[0] * 0;
            }
            //width greater
            if ($image_h16 < $image_w16) {
                $pos_w16 = $slot_16_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h16 > ($pos_h16 / 2)) {
            list($image_w16, $image_h16) = getimagesize($new_image16);
            //graeter
            if ($image_h16 > $image_w16) {
                $pos_h16 = $pos_h16 * 1.01;
            }
            //equal
            if ($image_h16 == $image_w16) {
                $pos_h16 = $pos_h16 * 1.01;
            }
        }
    } else {
        list($image_w16, $image_h16) = getimagesize($new_image16);
        if ($image_h16 > $image_w16) {
            $pos_w16 = 0;
            $pos_h16 = 80;
        } else if ($image_w16 > $image_h16) {
            $pos_h16 = 0;
            $pos_w16 = 75;
        } else if ($image_w16 == $image_h16) {
            $pos_h16 = 0;
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
                $pos_w17 = $slot_17_de[0] * 0;
            }
            //width greater
            if ($image_h17 < $image_w17) {
                $pos_w17 = $slot_17_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h17 > ($pos_h17 / 2)) {
            list($image_w17, $image_h17) = getimagesize($new_image17);
            //graeter
            if ($image_h17 > $image_w17) {
                $pos_h17 = $pos_h17 * 1.01;
            }
            //equal
            if ($image_h17 == $image_w17) {
                $pos_h17 = $pos_h17 * 1.01;
            }
        }
    } else {
        list($image_w17, $image_h17) = getimagesize($new_image17);
        if ($image_h17 > $image_w17) {
            $pos_w17 = 0;
            $pos_h17 = 80;
        } else if ($image_w17 > $image_h17) {
            $pos_h17 = 0;
            $pos_w17 = 75;
        } else if ($image_w17 == $image_h17){
            $pos_h17 = 0;
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
                $pos_w18 = $slot_18_de[0] * 0;
            }
            //width greater
            if ($image_h18 < $image_w18) {
                $pos_w18 = $slot_18_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h18 > ($pos_h18 / 2)) {
            list($image_w18, $image_h18) = getimagesize($new_image18);
            //graeter
            if ($image_h18 > $image_w18) {
             
                $pos_h18 = $pos_h18 * 1.01;
            }
            //equal
            if ($image_h18 == $image_w18) {
                $pos_h18 = $pos_h18 * 1.01;
            }
        }
    } else {
        list($image_w18, $image_h18) = getimagesize($new_image18);
        if ($image_h18 > $image_w18) {
            $pos_w18 = 0;
            $pos_h18 = 80;
        } else if ($image_w18 > $image_h18) {
            $pos_h18 = 0;
            $pos_w18 = 75;
        } else if ($image_w18 == $image_h18) {
            $pos_h18 = 0;
            $pos_w18 = 0;
        }
    }
    if (isset($_POST['slot_19_de']) && ($_POST['slot_19_de'] != "")) {
        
        $slot_19_de = explode("_", $_POST['slot_19_de']);
        $pos_w19 = $slot_19_de[0];
        $pos_h19 = $slot_19_de[2];
        if ($pos_w19 > ($pos_w19 / 2)) {
            list($image_w19, $image_h19) = getimagesize($new_image19);
            if ($image_h19 == $image_w19) {
                $pos_w19 = $slot_19_de[0] * 0;
            }
            //width greater
            if ($image_h19 < $image_w19) {
                $pos_w19 = $slot_19_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h19 > ($pos_h19 / 2)) {
            list($image_w19, $image_h19) = getimagesize($new_image19);
            //graeter
            if ($image_h19 > $image_w19) {
             
                $pos_h19 = $pos_h19 * 1.01;
            }
            //equal
            if ($image_h19 == $image_w19) {
                $pos_h19 = $pos_h19 * 1.01;
            }
        }
    } else {
        list($image_w19, $image_h19) = getimagesize($new_image19);
        if ($image_h19 > $image_w19) {
            $pos_w19 = 0;
            $pos_h19 = 80;
        } else if ($image_w19 > $image_h19) {
            $pos_h19 = 0;
            $pos_w19 = 75;
        } else if ($image_w19 == $image_h19) {
            $pos_h19 = 0;
            $pos_w19 = 0;
        }
    }
    if (isset($_POST['slot_20_de']) && ($_POST['slot_20_de'] != "")) {
        $slot_20_de = explode("_", $_POST['slot_20_de']);
        $pos_w20 = $slot_20_de[0];
        $pos_h20 = $slot_20_de[2];
        if ($pos_w20 > ($pos_w20 / 2)) {
            list($image_w20, $image_h20) = getimagesize($new_image20);
            if ($image_h20 == $image_w20) {
                $pos_w20 = $slot_20_de[0] * 0;
            }
            //width greater
            if ($image_h20 < $image_w20) {
                $pos_w20 = $slot_20_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h20 > ($pos_h20 / 2)) {
            list($image_w20, $image_h20) = getimagesize($new_image20);
            //graeter
            if ($image_h20 > $image_w20) {
             
                $pos_h20 = $pos_h20 * 1.01;
            }
            //equal
            if ($image_h20 == $image_w20) {
                $pos_h20 = $pos_h20 * 1.01;
            }
        }
    } else {
        list($image_w20, $image_h20) = getimagesize($new_image20);
        if ($image_h20 > $image_w20) {
            $pos_w20 = 0;
            $pos_h20 = 80;
        } else if ($image_w20 > $image_h20) {
            $pos_h20 = 0;
            $pos_w20 = 75;
        } else if ($image_w20 == $image_h20) {
            $pos_h20 = 0;
            $pos_w20 = 0;
        }
    }
    if (isset($_POST['slot_21_de']) && ($_POST['slot_21_de'] != "")) {
        $slot_21_de = explode("_", $_POST['slot_21_de']);
        $pos_w21 = $slot_21_de[0];
        $pos_h21 = $slot_21_de[2];
        if ($pos_w21 > ($pos_w21 / 2)) {
            list($image_w21, $image_h21) = getimagesize($new_image21);
            if ($image_h21 == $image_w21) {
                $pos_w21 = $slot_21_de[0] * 0;
            }
            //width greater
            if ($image_h21 < $image_w21) {
                $pos_w21 = $slot_21_de[0] *0.65;
            }
        }
        //height
        if ($pos_h21 > ($pos_h21 / 2)) {
            list($image_w21, $image_h21) = getimagesize($new_image21);
            //graeter
            if ($image_h21 > $image_w21) {
             
                $pos_h21 = $pos_h21 * 1.01;
            }
            //equal
            if ($image_h21 == $image_w21) {
                $pos_h21 = $pos_h21 * 1.01;
            }
        }
    } else {
        list($image_w21, $image_h21) = getimagesize($new_image21);
        if ($image_h21 > $image_w21) {
            $pos_w21 = 0;
            $pos_h21 = 80;
        } else if ($image_w21 > $image_h21) {
            $pos_h21 = 0;
            $pos_w21 = 75;
        } else if ($image_w21 == $image_h21) {
            $pos_h21 = 0;
            $pos_w21 = 0;
        }
    }
    if (isset($_POST['slot_22_de']) && ($_POST['slot_22_de'] != "")) {
        $slot_22_de = explode("_", $_POST['slot_22_de']);
        $pos_w22 = $slot_22_de[0];
        $pos_h22 = $slot_22_de[2];
        if ($pos_w22 > ($pos_w22 / 2)) {
            list($image_w22, $image_h22) = getimagesize($new_image22);
            if ($image_h22 == $image_w22) {
                $pos_w22 = $slot_22_de[0] * 0;
            }
            //width greater
            if ($image_h22 < $image_w22) {
                $pos_w22 = $slot_22_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h22 > ($pos_h22 / 2)) {
            list($image_w22, $image_h22) = getimagesize($new_image22);
            //graeter
            if ($image_h22 > $image_w22) {
             
                $pos_h22 = $pos_h22 * 1.01;
            }
            //equal
            if ($image_h22 == $image_w22) {
                $pos_h22 = $pos_h22 * 1.01;
            }
        }
    } else {
        list($image_w22, $image_h22) = getimagesize($new_image22);
        if ($image_h22 > $image_w22) {
            $pos_w22 = 0;
            $pos_h22 = 80;
        } else if ($image_w22 > $image_h22) {
            $pos_h22 = 0;
            $pos_w22 = 75;
        } else if ($image_w22 == $image_h22) {
            $pos_h22 = 0;
            $pos_w22 = 0;
        }
    }
    if (isset($_POST['slot_23_de']) && ($_POST['slot_23_de'] != "")) {
        $slot_23_de = explode("_", $_POST['slot_23_de']);
        $pos_w23 = $slot_23_de[0];
        $pos_h23 = $slot_23_de[2];
        if ($pos_w23 > ($pos_w23 / 2)) {
            list($image_w23, $image_h23) = getimagesize($new_image23);
            if ($image_h23 == $image_w23) {
                $pos_w23 = $slot_23_de[0] * 0;
            }
            //width greater
            if ($image_h23 < $image_w23) {
                $pos_w23 = $slot_23_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h23 > ($pos_h23 / 2)) {
            list($image_w23, $image_h23) = getimagesize($new_image23);
            //graeter
            if ($image_h23 > $image_w23) {
             
                $pos_h23 = $pos_h23 * 1.01;
            }
            //equal
            if ($image_h23 == $image_w23) {
                $pos_h23 = $pos_h23 * 1.01;
            }
        }
    } else {
        list($image_w23, $image_h23) = getimagesize($new_image23);
        if ($image_h23 > $image_w23) {
            $pos_w23 = 0;
            $pos_h23 = 80;
        } else if ($image_w23 > $image_h23) {
            $pos_h23 = 0;
            $pos_w23 = 75;
        } else if ($image_w23 == $image_h23) {
            $pos_h23 = 0;
            $pos_w23 = 0;
        }
    }
    if (isset($_POST['slot_24_de']) && ($_POST['slot_24_de'] != "")) {
        $slot_24_de = explode("_", $_POST['slot_24_de']);
        $pos_w24 = $slot_24_de[0];
        $pos_h24 = $slot_24_de[2];
        if ($pos_w24 > ($pos_w24 / 2)) {
            list($image_w24, $image_h24) = getimagesize($new_image24);
            if ($image_h24 == $image_w24) {
                $pos_w24 = $slot_24_de[0] * 0;
            }
            //width greater
            if ($image_h24 < $image_w24) {
                $pos_w24 = $slot_24_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h24 > ($pos_h24 / 2)) {
            list($image_w24, $image_h24) = getimagesize($new_image24);
            //graeter
            if ($image_h24 > $image_w24) {
             
                $pos_h24 = $pos_h24 * 1.01;
            }
            //equal
            if ($image_h24 == $image_w24) {
                $pos_h24 = $pos_h24 * 1.01;
            }
        }
    } else {
        list($image_w24, $image_h24) = getimagesize($new_image24);
        if ($image_h24 > $image_w24) {
            $pos_w24 = 0;
            $pos_h24 = 80;
        } else if ($image_w24 > $image_h24) {
            $pos_h24 = 0;
            $pos_w24 = 75;
        } else if ($image_w24 == $image_h24) {
            $pos_h24 = 0;
            $pos_w24 = 0;
        }
    }
    if (isset($_POST['slot_25_de']) && ($_POST['slot_25_de'] != "")) {
        $slot_25_de = explode("_", $_POST['slot_25_de']);
        $pos_w25 = $slot_25_de[0];
        $pos_h25 = $slot_25_de[2];
        if ($pos_w25 > ($pos_w25 / 2)) {
            list($image_w25, $image_h25) = getimagesize($new_image25);
            if ($image_h25 == $image_w25) {
                $pos_w25 = $slot_25_de[0] * 0;
            }
            //width greater
            if ($image_h25 < $image_w25) {
                $pos_w25 = $slot_25_de[0] * 0.65;
            }
        }
        //height
        if ($pos_h25 > ($pos_h25 / 2)) {
            list($image_w25, $image_h25) = getimagesize($new_image25);
            //graeter
            if ($image_h25 > $image_w25) {
             
                $pos_h25 = $pos_h25 * 1.01;
            }
            //equal
            if ($image_h25 == $image_w25) {
                $pos_h25 = $pos_h25 * 1.01;
            }
        }
    } else {
        list($image_w25, $image_h25) = getimagesize($new_image25);
        if ($image_h25 > $image_w25) {
            $pos_w25 = 0;
            $pos_h25 = 80;
        } else if ($image_w25 > $image_h25) {
            $pos_h25 = 0;
            $pos_w25 = 75;
        } else if ($image_w25 == $image_h25) {
            $pos_h25 = 0;
            $pos_w25 = 0;
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
imagecopy($canvas, $icon11, $box_x11 / 4, $box_y11 / 4, $pos_w11, $pos_h11, $box_width11 / 4, $box_height11 / 4);
imagecopy($canvas, $icon12, $box_x12 / 4, $box_y12 / 4, $pos_w12, $pos_h12, $box_width12 / 4, $box_height12 / 4);
imagecopy($canvas, $icon13, $box_x13 / 4, $box_y13 / 4, $pos_w13, $pos_h13, $box_width13 / 4, $box_height13 / 4);
imagecopy($canvas, $icon14, $box_x14 / 4, $box_y14 / 4, $pos_w14, $pos_h14, $box_width14 / 4, $box_height14 / 4);
imagecopy($canvas, $icon15, $box_x15 / 4, $box_y15 / 4, $pos_w15, $pos_h15, $box_width15 / 4, $box_height15 / 4);
imagecopy($canvas, $icon16, $box_x16 / 4, $box_y16 / 4, $pos_w16, $pos_h16, $box_width16 / 4, $box_height16 / 4);
imagecopy($canvas, $icon17, $box_x17 / 4, $box_y17 / 4, $pos_w17, $pos_h17, $box_width17 / 4, $box_height17 / 4);
imagecopy($canvas, $icon18, $box_x18 / 4, $box_y18 / 4, $pos_w18, $pos_h18, $box_width18 / 4, $box_height18 / 4);
imagecopy($canvas, $icon19, $box_x19 / 4, $box_y19 / 4, $pos_w19, $pos_h19, $box_width19 / 4, $box_height19 / 4);
imagecopy($canvas, $icon20, $box_x20 / 4, $box_y20 / 4, $pos_w20, $pos_h20, $box_width20 / 4, $box_height20 / 4);
imagecopy($canvas, $icon21, $box_x21 / 4, $box_y21 / 4, $pos_w21, $pos_h21, $box_width21 / 4, $box_height21 / 4);
imagecopy($canvas, $icon22, $box_x22 / 4, $box_y22 / 4, $pos_w22, $pos_h22, $box_width22 / 4, $box_height22 / 4);
imagecopy($canvas, $icon23, $box_x23 / 4, $box_y23 / 4, $pos_w23, $pos_h23, $box_width23 / 4, $box_height23 / 4);
imagecopy($canvas, $icon24, $box_x24 / 4, $box_y24 / 4, $pos_w24, $pos_h24, $box_width24 / 4, $box_height24 / 4);
imagecopy($canvas, $icon25, $box_x25 / 4, $box_y25 / 4, $pos_w25, $pos_h25, $box_width25 / 4, $box_height25 / 4);
// ... copy additional source images to the canvas as needed
$path_to_save = '../../sites/all/modules/frames/frames_final/' . time() . '.png';
imagepng($canvas, $path_to_save);
if (isset($_POST['frame_text']) && (!empty($_POST['frame_text']))) {
    $text = $_POST['frame_text'];
    $words = strlen($text);
    $img = new textPainter($path_to_save, $text, '../../sites/all/modules/frames/fonts/arial.ttf', 60);
    if ($f_id == '72') {
        $img->setPosition("center", "1810");
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