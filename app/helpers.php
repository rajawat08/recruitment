<?php



if ( ! function_exists('pagination_links'))
{
    /**
     * @param $data
     * @param null $view
     * @return mixed
     */
    function pagination_links($data, $view = null)
    {
        if ($query = Request::query())
        {
            $request = array_except($query, 'page');
            return $data->appends($request)->links($view);
        }
        return $data->links($view);
    }
}

if ( ! function_exists('modal_popup'))
{
    /**
     * @param $url
     * @param $title
     * @param $message
     * @return mixed
     */
    function modal_popup($url, $title, $message)
    {
        return View::make('admin::partials.popup', compact('url', 'title', 'message'))->render();
    }
}



if ( ! function_exists('style'))
{
    /**
     * @param $url
     * @param array $attributes
     * @param bool $secure
     * @return mixed
     */
    function style($url, $attributes = array(), $secure = false)
    {
        return HTML::style($url, $attributes, $secure);
    }
}

if ( ! function_exists('script'))
{
    /**
     * @param $url
     * @param array $attributes
     * @param bool $secure
     * @return mixed
     */
    function script($url, $attributes = array(), $secure = false)
    {
        return HTML::script($url, $attributes, $secure);
    }
}

if ( ! function_exists('session_check'))
{
    function session_check()
    {
        if ( ! getenv('TESTING')) session_start();
    }
}

if ( ! function_exists('db_is'))
{
    function db_is($driver)
    {
        return Config::get('database.default') == $driver;
    }
}