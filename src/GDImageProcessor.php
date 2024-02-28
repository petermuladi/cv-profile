<?php
abstract class GDImageProcessor
{
    // This function resizes an image, given its file path and new dimensions.
    // It first checks the MIME type of the image to create the appropriate image object.
    // Then, it calculates the new dimensions of the image and creates a new canvas with those dimensions.
    // Finally, it copies the original image onto the new canvas and saves the new image.
    public static function imageProcessing(string $file, int $x = null, int $y = null)
    {

        $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file);

        $pics = null;

        //Mime-type Router
        switch ($mime) {
            case 'image/jpeg':
                $pics = imagecreatefromjpeg($file);
                break;
            case 'image/png':
                $pics = imagecreatefrompng($file);
                break;
            case 'image/jpg':
                $pics = imagecreatefromjpeg($file);
                break;
        }

        //check img
        if ($pics != null) {

            $canvas = null;

            $imageX = imagesx($pics);
            $imageY = imagesy($pics);

            if ($x == null && $y > 0) {
                $ratio = $imageX / $imageY;
                $x = $y * $ratio;
            }

            if ($x > 0 && $y == null) {
                $ratio = $imageX / $imageY;
                $y = $x * $ratio;
            }

            if ($x > 0 && $y > 0) {

                $canvas = imagecreatetruecolor($x, $y);
                imagecopyresampled($canvas, $pics, 0, 0, 0, 0, $x, $y, $imageX, $imageY);

                //Delete old img
                unset($pics);

                switch ($mime) {
                    case 'image/jpeg':
                        imagejpeg($canvas, $file);
                        break;
                    case 'image/png':
                        imagepng($canvas, $file);
                        break;
                    case 'image/jpg':
                        imagejpeg($canvas, $file);
                        break;
                }
            } else {
                echo "Hibakezelés Nem támogatott formátum";
            }
        } else {
            echo "GD image feldolgozás során a típusok nem egyeztek meg";
        }
    }
}