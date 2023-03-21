<?php
// This is an abstract class for creating RESTful APIs
abstract class RestApiView
{
    // The response data
    private static array $response;

    // Sets the response data
    public static function setResponse(mixed $data)
    {
        // If the data is an array, set it directly
        if (is_array($data)) {
            self::$response = $data;
        }
        // Otherwise, put it in an array and set it
        else {
            self::$response = array($data);
        }
    }

    // Sets an error response
    public static function setError(string $message)
    {
        // Create an error response array
        $error = self::$response = array(
            "Error" => $message,
            "DateTime" => date("Y-m-d H:i:s")
        );

        // Set the response header to JSON
        header("Content-type: application/json");
        // Output the error as JSON
        echo (json_encode($error));
    }

    // Renders the response data as JSON
    public static function RenderJson()
    {
        // Set the response header to JSON
        header("Content-type: application/json");
        // Output the response data as JSON
        print_r(json_encode(self::$response));
    }
}
