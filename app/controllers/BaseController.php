<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	 /**
     * Show view.
     *
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return mixed
     */
    public function view($view, $data = array(), $mergeData = array())
    {
        return View::make($view, $data, $mergeData);
    }
     /**
     * Redirect to a route.
     *
     * @param $route
     * @param array $parameters
     * @param int $status
     * @param array $headers
     * @return mixed
     */
    public function redirect($route, $parameters = array(), $status = 302, $headers = array())
    {
        return Redirect::route($route, $parameters, $status, $headers);
    }

    /**
     * Get all input data.
     *
     * @return array
     */
    public function inputAll()
    {
        return Input::all();
    }

}
