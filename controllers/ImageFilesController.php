<?php
abstract class ImageFilesController
{
    // This function processes the images received from the user and saves them to the database
    public static function ImageFilesProcess(array $imgs, int $userId)
    {
        $secondaryImages = [];
        $primaryImage = [];

        // Loop through all images to find the primary image and any secondary images
        for ($i = 0; $i < count($imgs); $i++) {
            // Check if image is the primary image and has a valid file path
            if ($imgs[$i]["fokep"] == 1 && $imgs[$i]["eleresi-ut"] != "") {
                // If the user already has a primary image, delete it and save the new one
                if (!ImageDatabaseModel::DeletePrimaryImage($userId)) {
                    $primaryImage[] = $imgs[$i];
                } else {
                    ImageDatabaseModel::DeletePrimaryImage($userId);
                    $primaryImage[] = $imgs[$i];
                }
            }
        }

        // Loop through all images again to find secondary images
        for ($i = 0; $i < count($imgs); $i++) {
            // Check if image is a secondary image and has a valid file path
            if ($imgs[$i]["fokep"] == 0 && $imgs[$i]["eleresi-ut"] != "") {
                $secondaryImages[] = $imgs[$i];
            }
        }

        // Save the primary image to the database if it exists
        if (!empty($primaryImage)) {
            ImageDatabaseModel::SaveAllImages($userId, $primaryImage);
        }

        // Save the secondary images to the database if they exist
        if (!empty($secondaryImages)) {
            // If the user already has secondary images, delete them and save the new ones
            if (!ImageDatabaseModel::DeleteSecondaryImages($userId)) {
                ImageDatabaseModel::SaveAllImages($userId, $secondaryImages);
            } else {
                ImageDatabaseModel::DeleteSecondaryImages($userId);
                ImageDatabaseModel::SaveAllImages($userId, $secondaryImages);
            }
        }
    }
}
