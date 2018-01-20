<?php

// Get option from user selections
// output is file name, make sure the file name correct
function getOptions($q1 = '1', $q2 = '1', $q3 = '1', $q4 = '1', $q5 = '1', $q6 = '1', $q7 = '1', $q8 = '1', $q9 = '1', $q10 = '1', $q11 = '1', $q12 = '1', $q13 = '1', $q14 = '1', $q15 = '1') {
    $gry = 0;
    $huf = 0;
    $rav = 0;
    $sly = 0;
    switch ($q1) {
        case '1':
            $gry += 5;
            $sly += 5;
            break;
        case '2':
            $huf += 10;
            break;
        case '3':
            $gry += 5;
            $rav += 5;
            break;
        case '4':
            $huf += 5;
            $rav += 10;
            break;
        case '5':
            $gry += 5;
            $huf += 5;
            $sly += 5;
            break;
        default:
            $gry += 5;
            $sly += 5;
            break;
    }

    switch ($q2) {
        case '1':
            $huf += 5;
            $rav += 5;
            break;
        case '2':
            $gry += 10;
            $sly += 5;
            break;
        case '3':
            $rav += 5;
            $sly += 10;
            break;
        case '4':
            $huf += 10;
            break;
        case '5':
            $gry += 5;
            $sly += 5;
            break;
        case '6':
            $gry += 5;
            $rav += 10;
            break;
        default:
            $huf += 5;
            $rav += 5;
            break;
    }

    switch ($q3) {
        case '1':
            $gry += 5;
            $rav += 5;
            break;
        case '2':
            $sly += 10;
            break;
        case '3':
            $gry += 5;
            break;
        case '4':
            $huf += 5;
            $rav += 5;
            break;
        default:
            $gry += 5;
            $rav += 5;
            break;
    }

    switch ($q4) {
        case '1':
            $gry += 5;
            $huf += 5;
            break;
        case '2':
            $huf += 5;
            $sly += 5;
            break;
        case '3':
            $rav += 5;
            $sly += 5;
            break;
        case '4':
            $huf += 5;
            $rav += 10;
            break;
        default:
            $gry += 5;
            $huf += 5;
            break;
    }

    switch ($q5) {
        case '1':
            $rav += 5;
            $huf += 5;
            break;
        case '2':
            $huf += 5;
            $sly += 5;
            break;
        case '3':
            $gry += 5;
            $sly += 10;
            break;
        case '4':
            $gry += 10;
            $huf += 5;
            $rav += 5;
            break;
        case '5':
            $huf += 5;
            $rav += 5;
            break;
        default:
            $rav += 5;
            $huf += 5;
            break;
    }

    switch ($q6) {
        case '1':
            $rav += 5;
            $huf += 10;
            break;
        case '2':
            $huf += 5;
            $sly += 5;
            break;
        case '3':
            $gry += 5;
            $rav += 5;
            break;
        case '4':
            $gry += 5;
            $sly += 10;
            break;
        case '5':
            $huf += 5;
            $gry += 5;
            $sly += 5;
            break;
        case '6':
            $sly += 5;
            break;
        case '7':
            $rav += 5;
            $gry += 10;
            break;
        default:
            $rav += 5;
            $huf += 10;
            break;
    }

    switch ($q7) {
        case '1':
            $gry += 5;
            $huf += 5;
            break;
        case '2':
            $huf += 10;
            $sly += 5;
            break;
        case '3':
            $gry += 5;
            $rav += 5;
            break;
        default:
            $gry += 5;
            $huf += 5;
            break;
    }

    switch ($q8) {
        case '1':
            $gry += 5;
            break;
        case '2':
            $rav += 5;
            break;
        case '3':
            $huf += 5;
            $rav += 5;
            break;
        case '4':
            $rav += 5;
            $huf += 10;
            break;
        case '5':
            $sly += 5;
            break;
        case '6':
            $gry += 5;
            $sly += 5;
            break;
        default:
            $gry += 5;
            break;
    }

    switch ($q9) {
        case '1':
            $rav += 10;
            break;
        case '2':
            $huf += 10;
            break;
        case '3':
            $sly += 10;
            $rav += 5;
            break;
        case '4':
            $rav += 5;
            $gry += 5;
            $huf += 5;
            break;
        case '5':
            $rav += 5;
            $huf += 5;
            break;
        case '6':
            $gry += 5;
            $sly += 5;
            break;
        case '7':
            $gry += 10;
            $huf += 5;
            break;
        default:
            $rav += 10;
            break;
    }

    switch ($q10) {
        case '1':
            $huf += 5;
            break;
        case '2':
            $gry += 5;
            $sly += 5;
            break;
        case '3':
            $sly += 5;
            break;
        case '4':
            $gry += 5;
            $sly += 5;
            break;
        case '5':
            $rav += 5;
            $huf += 10;
            break;
        case '6':
            $rav += 5;
            break;
        default:
            $huf += 5;
            break;
    }

    switch ($q11) {
        case '1':
            $gry += 5;
            $rav += 5;
            $sly += 5;
            break;
        case '2':
            $huf += 10;
            $rav += 5;
            break;
        case '3':
            $sly += 5;
            break;
        case '4':
            $gry += 5;
            $sly += 10;
            break;
        default:
            $gry += 5;
            $rav += 5;
            $sly += 5;
            break;
    }

    switch ($q12) {
        case '1':
            $rav += 5;
            $sly += 10;
            break;
        case '2':
            $huf += 10;
            break;
        case '3':
            $gry += 5;
            $huf += 5;
            break;
        case '4':
            $gry += 10;
            break;
        default:
            $rav += 5;
            $sly += 10;
            break;
    }

    switch ($q13) {
        case '1':
            $rav += 5;
            $sly += 5;
            break;
        case '2':
            $gry += 5;
            $sly += 5;
            break;
        case '3':
            $rav += 5;
            $gry += 10;
            $huf += 5;
            break;
        case '4':
            $rav += 10;
            $sly += 5;
            break;
        case '5':
            $gry += 5;
            break;
        case '6':
            $gry += 5;
            $rav += 5;
            $sly += 5;
            break;
        case '7':
            $sly += 10;
            $huf += 5;
            $rav += 5;
            break;
        case '8':
            $gry += 5;
            break;
        case '9':
            $huf += 10;
            break;
        default:
            $rav += 5;
            $sly += 5;
            break;
    }

    switch ($q14) {
        case '1':
            $rav += 5;
            $sly += 10;
            break;
        case '2':
            $gry += 5;
            $rav += 5;
            break;
        case '3':
            $rav += 5;
            $huf += 5;
            break;
        case '4':
            $gry += 5;
            $huf += 5;
            break;
        case '5':
            $gry += 10;
            $sly += 5;
            break;
        case '6':
            $sly += 5;
            break;
        default:
            $rav += 5;
            $sly += 10;
            break;
    }

    switch ($q15) {
        case '1':
            $gry += 5;
            $huf += 10;
            break;
        case '2':
            $gry += 5;
            $rav += 10;
            break;
        case '3':
            $gry += 10;
            break;
        case '4':
            $rav += 5;
            $huf += 5;
            $sly += 5;
            break;
        case '5':
            $rav += 5;
            $huf += 5;
            break;
        case '6':
            $huf += 10;
            $sly += 5;
            break;
        case '7':
            $sly += 10;
            break;
        default:
            $gry += 5;
            $huf += 10;
            break;
    }

    return array($gry, $huf, $rav, $sly);
}

function save_image($inPath, $outPath) { //Download images from remote server
    $in = fopen($inPath, "rb");
    $out = fopen($outPath, "wb");
    while ($chunk = fread($in, 8192)) {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

function mergeImages($filename_src, $filename_dest, $filename_result) {
    // Get dimensions for specified images
    // _src is foreground, _dest is background
    list($width_src, $height_src) = getimagesize($filename_src);
    list($width_dest, $height_dest) = getimagesize($filename_dest);
    // Create new image with desired dimensions (background image)
    $image = imagecreatetruecolor($width_dest, $height_dest);
    // Load images and then copy to destination image
    $image_x = imagecreatefrompng($filename_src);
    $image_y = imagecreatefrompng($filename_dest);
    imagecopy($image, $image_x, 0, 0, 0, 0, $width_dest, $height_dest);
    imagecopy($image, $image_y, 0, 0, 0, 0, $width_dest, $height_dest);
    // Save the resulting image to disk (as PNG)
    imagepng($image, $filename_result);
    // Clean up
    imagedestroy($image);
    imagedestroy($image_x);
    imagedestroy($image_y);
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}
?>

<?php

include 'PHPImage.php';

$folderName = 'results';

if (file_exists($folderName)) {
    foreach (new DirectoryIterator($folderName) as $fileInfo) {
        if ($fileInfo->isDot()) {
            continue;
        }
        if ($fileInfo->isFile() && time() - $fileInfo->getCTime() >= 60 * 60 * 24 * 2) {
            unlink($fileInfo->getRealPath());
        }
    }
} else {
    mkdir($folderName, 0755);
}

list($gry, $huf, $rav, $sly) = getOptions($_GET["question1"], $_GET["question2"], $_GET["question3"], $_GET["question4"], $_GET["question5"], $_GET["question6"], $_GET["question7"], $_GET["question8"], $_GET["question9"], $_GET["question10"], $_GET["question11"], $_GET["question12"], $_GET["question13"], $_GET["question14"], $_GET["question15"]);

$name = $_GET["name"];

$max = $gry;
$maxHouse = 'Gry';

if ($max < $huf) {
    $max = $huf;
    $maxHouse = "Huf";
}
if ($max < $rav) {
    $max = $rav;
    $maxHouse = "Rav";
}
if ($max < $sly) {
    $max = $sly;
    $maxHouse = "Sly";
}
//$shirt = rand(1, 9); //choose random shirt
//define the width and height of our images

define("WIDTH", 1000);
define("HEIGHT", 1000);

$dest_image = imagecreatetruecolor(WIDTH, HEIGHT);

//make sure the transparency information is saved
imagesavealpha($dest_image, true);

//create a fully transparent background (127 means fully transparent)
$trans_background = imagecolorallocatealpha($dest_image, 0, 0, 0, 127);

//fill the image with a transparent background
imagefill($dest_image, 0, 0, $trans_background);

//take create image resources out of the 3 pngs we want to merge into destination image
//Have glass
// if ($haveGlass == "yes") {
//     $glassPath = 'images/glass/glass.png';
//     $glassImg = imagecreatefrompng($glassPath);
//     imagecopy($dest_image, $glassImg, 0, 0, 0, 0, WIDTH, HEIGHT);
// }

$datetime = new DateTime();
$result = $datetime->format('Y-m-d H:i:s');
$result = str_replace(":", "", $result);
$result = str_replace(" ", "_", $result);
$path = "results/" . generateRandomString(7) . "_" . $result . ".jpg";

//Choose House background
if ($maxHouse == "Gry") {
    $background = "images/Houses/Gry.jpg";
} else if ($maxHouse == "Sly") {
    $background = "images/Houses/Sly.jpg";
} else if ($maxHouse == "Rav") {
    $background = "images/Houses/Rav.jpg";
} else if ($maxHouse == "Huf") {
    $background = "images/Houses/Huf.jpg";
}

$image = new PHPImage();
$image->setDimensionsFromImage($background);
$image->draw($background);

$fontPath = './HONEY-CREAM.ttf';
	$image->setFont($fontPath);

$textColor = array(57,31,0);

$image->setTextColor($textColor);
$image->textBox($name, array(
    'fontSize' => 72, // Desired starting font size
    'width' => 630,
    'height' => 470,
    'x' => 200,
    'y' => 420
));
$image->save($path, false, true);

//$path = "avas/" . $result . "_" . generateRandomString(7) . ".png";
//send the appropriate headers and output the image in the browser
//      $image = new PHPImage();
//     $image->draw($path);
//    $image->save($path, false, true);
//"Gry " . $gry . " - Huf " . $huf . " - Rav " . $rav . " - Sly " . $sly . 
echo ($path);
?>
