<?php

abstract class ImageModel
{

    // Holds the profile image and all uploaded images
    private static array $profileImg;
    private static array $allImgs;

    /**
     * Getter method to retrieve all uploaded images
     *
     * @return array
     */
    public static function getAllImgs(): array
    {
        return self::$allImgs;
    }

    /**
     * Method to process uploaded profile and secondary images
     *
     * @param array $profileImage The uploaded profile image
     * @param array $secondaryImages The uploaded secondary images
     *
     * @return array Returns an array with all processed images
     */

    public static function modifiedProfileAndSecondaryImages(array $profileImage, array $secondaryImages): array
    {
        // Reset the profile and all images arrays
        self::$profileImg = array();
        self::$allImgs = array();


        //White list image type
        $types = array("image/jpeg", "image/png", "image/jpg");

        // Process primary image
        if (isset($profileImage) && !empty($profileImage) && $profileImage['error'] == 0) {

            $tmp = $profileImage["tmp_name"];

            //Check mime type
            $mime = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $tmp);

            if (in_array($mime, $types)) {

                $randomName = uniqid(rand(), true);
                $fileType = pathinfo($profileImage['name'], PATHINFO_EXTENSION);
                $newName = $randomName . "." . $fileType;
                $profileImage["name"] = $newName;
                $savePath = "./images/";

                //Save..
                move_uploaded_file($tmp, $savePath . $newName);

                //Check is Save?
                if (is_dir($savePath) && file_exists($savePath . $newName)) {

                    $path = $savePath . $newName;

                    GDImageProcessor::ImageProcessing($path, 350, 350);
                } else {
                    echo "Nem létezik a mappában az elsődleges kép hibakezelés.";
                }
            } else {
                $_SESSION["err-img-type"] = true;
            }
        }

        // Process secondary images
        $transformSecondaryImages = self::transformSecondaryImages($secondaryImages);
        if (count($transformSecondaryImages) <= 3) {

            $secondaryImagesArray = array();

            // Iterate over secondary images
            foreach ($transformSecondaryImages as $key => $name) {

                // Check if image is not empty or null
                if (!empty($name) && isset($name)) {

                    $errCheck = $transformSecondaryImages[$key]["error"];
                    $tmpCheck = $transformSecondaryImages[$key]["tmp_name"];

                    // Check if image is uploaded
                    if (isset($tmpCheck) && is_uploaded_file($tmpCheck)) {

                        //mime check
                        $mimeCheck = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $tmpCheck);

                        if (in_array($mimeCheck, $types) && $errCheck == 0) {

                            // Generate unique name for image and path az pathinfo
                            $randName = uniqid(rand(), true);
                            $savepathSecondary  = "./images/secondary";
                            $secondaryImageType = pathinfo($name['name'], PATHINFO_EXTENSION);
                            $newSecondaryImagesName = $randName . "." . $secondaryImageType;

                            move_uploaded_file($tmpCheck, $savepathSecondary . "/" . $newSecondaryImagesName);

                            // Check if uploaded image exists in the directory
                            if (is_dir($savepathSecondary) && file_exists($savepathSecondary . "/" .  $newSecondaryImagesName)) {

                                $secondaryPath = $savepathSecondary . "/" .  $newSecondaryImagesName;

                                // Process image using GDImageProcessor class
                                GDImageProcessor::ImageProcessing($secondaryPath, 100, 100);

                                // Add image data to array of all images
                                self::$allImgs[] = array(
                                    "eleresi-ut" => (isset($secondaryPath)) ? $secondaryPath : "",
                                    "cim" => (isset($newSecondaryImagesName)) ? $newSecondaryImagesName : "",
                                    "fokep" => 0
                                );
                                array_push($secondaryImagesArray, self::$allImgs);
                            } else {
                                echo ("Nem léteznek a mappában a feltöltött képek");
                            }
                        } else {
                            $_SESSION["err-img-type"] = true;
                        }
                    }
                }
            }
        } else {
            $_SESSION["err-img-max"] = true;
        }

        self::$allImgs[] = array(
            "eleresi-ut" => (isset($path)) ? $path : "",
            "cim" => (isset($newName)) ? $newName : "",
            "fokep" => 1,
        );

        // Return array of all images
        return self::$allImgs;
    }

    // This function transforms an array of secondary images, received from a file input, 
    //into an array of individual images.
    // It takes an array of $secondaryImages as input and loops through 
    //each individual image array.
    public static function transformSecondaryImages(array $secondaryImages): array
    {

        $imgs = [];

        foreach ($secondaryImages['name'] as $key => $name) {

            $img = [
                'name' => $name,
                'type' => $secondaryImages['type'][$key],
                'tmp_name' => $secondaryImages['tmp_name'][$key],
                'size' => $secondaryImages['size'][$key],
                'error' => $secondaryImages['error'][$key],
            ];
            array_push($imgs, $img);
        }

        return $imgs;
    }
}