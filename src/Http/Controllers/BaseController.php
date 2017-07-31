<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30.07.2017
 * Time: 12:36
 */

namespace Tzepifan\ArtisanWebConsole\Http\Controllers;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function __construct() {
        $middlewareArray = config('artisan-web-console.middleware');
        if ($middlewareArray && is_array($middlewareArray) && !empty($middlewareArray)) {
            $this->middleware($middlewareArray);
        }
    }

    public function index () {
        return view('console::index');
    }

}