<?php

namespace mvc\core;

/**
 * The router class, manages the routes of our website
 * based on the user request.
 * 
 */
class Router
{

    /**
     * The constructor of our router.
     * 
     * @param request is the user request to our website
     * @param response is the response for our user request
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * Get method handles the get requests to our website.
     * 
     * @param callback is the function to be executed when the router engages
     */
    public function get($callback)
    {

    }

    /**
     * Post method handles the post requests to our website.
     * 
     * @param callback is the function to be executed when the router engages
     */
    public function post($callback)
    {

    }

    /**
     * Render view gets a callback with parameters, and renders the pages 
     * for us.
     * 
     * @param callback is the function to be executed
     * @param params is the parameters of the request
     */
    public function renderView($callback, $params = [])
    {

    }
}

?>