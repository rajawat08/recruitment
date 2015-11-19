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


if ( ! function_exists('hyphenize'))
{
    function hyphenize($string) {
        $string = str_replace(array('[\', \']'), '', $string);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        return strtolower(trim($string, '-'));
    }

}

if(!function_exists('gen_uuid')){

    function gen_uuid() {
        return strtoupper(sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        ));
    }

}