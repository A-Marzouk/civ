<?php

namespace App\View\Components\Homepage;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * login button text
     *
     * @var string
     */
    public $loginBtnText;

    /**
    * login button text
    *
    * @var string
    */
    public $registerBtnText;

    /**
     * Create a new component instance.
     *
     * @param  string  $loginBtnText
     * @param  string  $registerBtnText
     *
     * @return void
     */
    public function __construct($loginBtnText, $registerBtnText)
    {
        $this->loginBtnText    = $loginBtnText ;
        $this->registerBtnText = $registerBtnText ;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.homepage.navbar');
    }
}
