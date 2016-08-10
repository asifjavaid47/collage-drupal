<?php
ob_start();
include 'includes/connection.php';
if (isset($_FILES['files'])) {
    $id=0;
    $ua = getBrowser();
    $yourbrowser = $ua['name'];
    $ip = $_SERVER['REMOTE_ADDR'];
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        //Get the temp file path
        $tmpFilePath = $_FILES['files']['tmp_name'][$i];
        $picname = time() . '-' . $_FILES['files']['name'][$i];
        //Make sure we have a filepath
        if ($tmpFilePath != "") {
            //Setup our new file path
                $newFilePath = "../../sites/all/modules/frames/frames_temp/" . $picname;
            //Upload the file into the temp dir
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
               $sql = "INSERT INTO frame_temp (ip_address, image_name, web_browser)
VALUES ('$ip', '$picname', '$yourbrowser')";
               mysql_query($sql);
                $id =  mysql_insert_id();
              $sql = "SELECT * From frame_temp where temp_id='".$id."'";

            $result = mysql_query($sql);
            $row = mysql_fetch_row($result);
            $res[0] = $row[2];
            $res[1]=$id;
            }
    }
    echo json_encode($res);
}
}
if (isset($_POST['user_file'])) {
    $json_my = $_POST['user_file'];
    $json_decoded = json_decode($json_my, TRUE);
    print_r($json_decoded);
}
if (isset($_POST["delete"])) {

    $sq = "SELECT image_name  from frame_temp where temp_id='" . $_POST["delete"] . "'";
    $result = mysql_query($sq);
    $row = mysql_fetch_row($result);
    $picaddress = "../../sites/all/modules/frames/frames_temp/" . $row[0];
    unlink($picaddress);
    $sql = "DELETE  from frame_temp where temp_id='" . $_POST["delete"] . "'";
    if (mysql_query($sql)) {
        echo "success";
    } else {
        echo mysql_error();
    }
}

function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }
    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }
    return array(
        'userAgent' => $u_agent,
        'name' => $bname,
        'version' => $version,
        'platform' => $platform,
        'pattern' => $pattern
    );
}
