<?php 
abstract class RestApiController
{
    // Retrieve data of a user by id
    public static function restAction($id)
    {
        $oneUserAllData = UserDatabaseModel::FetchOneUserByIdAllData($id);
        RestApiView::setResponse($oneUserAllData);
        echo(RestApiView::RenderJson());
    }
}
