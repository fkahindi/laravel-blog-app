<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data = null;

    /**
     * @param $title
     * @param $subTitle
     */
    protected function setPageTitle($title, $subTitle){
        view()->share(['pageTitle'=>$title, 'subTitle'=>$subTitle]);
    }
}
