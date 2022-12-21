<?php 

function exec_draw_image($path) {
    $img = imagecreatefrompng($path);

    imagesetthickness($img, 7);
    drawRect($img, 30,445,480,1105);
    drawRect($img, 451, 179, 1023, 1107);
    drawRect($img, 353,415,1063,1438);
    drawRect($img, 750,1050,961,1241);
    drawRect($img, 889,1282,1081,1440);

    header('Content-Type: image/png');
    imagepng($img);
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

// start a timer
$start_timer = hrtime(true);

// drawing
$img_path = "./image.png";

exec_draw_image($img_path);

// stop timer
$end_timer = hrtime(true);

record_timer($start_timer, $end_timer);

?>