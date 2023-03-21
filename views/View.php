<?php
// View class is responsible for rendering the given template within the provided layout.
// It takes the layout name in the constructor and the template name as a parameter in the Template method.
// Additionally, it extracts the variables passed in the $params array and includes the layout file.
class View
{
    private string $layout;
    public function __construct($layout)
    {
        $this->layout = $layout;
    }
    public function Template($template, array $params = [])
    {
        extract($params);
        include("templates/" . $this->layout . ".php");
    }
}
