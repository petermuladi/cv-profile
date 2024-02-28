<?php
abstract class UpdateSchoolHandler extends CoreController
{
    // This method handles the form submission for modifying school data.
    public static function POST()
    {
        // If the form data is valid and the modification is successful, redirect to the dashboard.
        if (SchoolController::ModifiedSchool()) {
            header("Location: /dashboard");
        }
    }
}