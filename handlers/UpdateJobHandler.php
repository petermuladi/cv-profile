<?php
/**
 * This class represents the handler for updating a job in the system.
 * It extends the CoreController class and implements the POST method.
 */
abstract class UpdateJobHandler extends CoreController
{
    /**
     * Handles the POST request and updates the job if the input data is valid.
     * If the job is updated successfully, redirects to the dashboard page.
     */
    public static function POST()
    {
        if (JobController::ModifiedJob()) {
            header("Location: /dashboard");
            return;
        }
    }
}

