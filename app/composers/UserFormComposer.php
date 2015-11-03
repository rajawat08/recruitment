<?php namespace composers



class UserFormComposer {

    public function compose($view)
    {
        $roles = Role::lists('name', 'id');

        $view->with(compact('roles'));
    }

}