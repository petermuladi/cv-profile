<?php
//Router
abstract class CoreController
{
    //protected property
    protected static mixed $url = "";
    protected static mixed $path = "";
    protected static int $apiUserId = 0;
    protected static int $userId = 0;
    protected static array $allUserId = [];
    protected static array $allId = [];


    //Default Init to protected property
    public static function Init()
    {

        // Store the current URL and path
        self::$url = $_SERVER["REQUEST_URI"];
        self::$path = parse_url(self::$url, PHP_URL_PATH);

        // Get the user ID from the URL, if present
        self::$apiUserId = isset(explode('/', self::$url)[3]) ? (int)explode("/", self::$url)[3] : 0;
        self::$userId = isset(explode('/', self::$url)[2]) ? (int)explode("/", self::$url)[2] : 0;

        // Get all user IDs from the database
        self::$allId = UserDatabaseModel::FetchAllUserId();

        // Add all user IDs to the array of IDs
        foreach (self::$allUserId as $user) {
            array_push(self::$allId, (int)$user["id"]);
        }
    }


    //Router static method
    public static function Router()
    {
        // Get the HTTP method
        $method = $_SERVER["REQUEST_METHOD"];

        //static property-s initialization
        self::Init();

        
        // Define the routing table
        $router = [

            "GET" => [
                "/" => "HomeHandler",
                "/login" => "LoginHandler",
                "/signup" => "SignUpHandler",
                "/dashboard" => "DashboardHandler",
                "/user/" . self::$userId => "OneUserHandler",
                "/api/user/" . self::$apiUserId => "RestApiOneUserHandler"
            ],
            "POST" => [
                "/registration" => "RegistrationHandler",
                "/logout" => "LogOutHandler",
                "/user-login" => "UserLoginHandler",
                "/modified-profile" => "ModifiedProfileHandler",
                "/update-school" => "UpdateSchoolHandler",
                "/update-job" => "UpdateJobHandler"
            ]

        ];

        // Get the appropriate handler for the current URL and method, or use the NotFoundHandler
        $handler = $router[$method][self::$path] ?? "NotFoundHandler";
        
        // Call the appropriate handler method
        $handler::$method();
    }
}
