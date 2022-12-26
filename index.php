<?php 

function exec_draw_image($path) {
    $img = imagecreatefrompng($path);

    imagesetthickness($img, 7);
    drawRect($img, 30,445,480,1105);
    drawRect($img, 451, 179, 1023, 1107);
    drawRect($img, 353,415,1063,1438);
    drawRect($img, 750,1050,961,1241);
    drawRect($img, 889,1282,1081,1440);

    # if you want to generate a picture showing on the browser
    // header('Content-Type: image/png');
    // imagepng($img);

    # if you want to save this image as a file
    imagepng($img, './generate.png');

    imagedestroy($img);
}

function drawRect($img, $x1, $y1, $x2, $y2) 
{
    $color = imagecolorallocate($img, 159, 159, 255);

    imagerectangle($img, $x1, $y1, $x2, $y2, $color);
}

function drawLine($img, $x1, $y1, $x2, $y2) 
{
    $color = imagecolorallocate($img, 255, 159, 159);

    imageline($img, $x1, $y1, $x2, $y2, $color);
}

function record_timer($start, $end)
{
    $filename = "timer.txt";

    $content = ($end - $start) / 1000000000 . "\n";

    $fp = fopen($filename, 'a');

    fwrite($fp, $content);

    fclose($fp);
}

// drawing
$img_path = "./image.png";

if (file_exists($img_path)) {
    // start a timer
    $start_timer = hrtime(true);

    exec_draw_image($img_path);

    // stop timer
    $end_timer = hrtime(true);

    record_timer($start_timer, $end_timer);
}

?>