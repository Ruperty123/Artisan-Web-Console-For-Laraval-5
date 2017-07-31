<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.07.2017
 * Time: 15:27
 */

namespace Tzepifan\ArtisanWebConsole\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Tzepifan\ArtisanWebConsole\ConsoleBase;
use Tzepifan\ArtisanWebConsole\Http\Controllers\BaseController;


class AjaxRunner extends BaseController
{
    protected $console;

    public function __construct(ConsoleBase $console) {
        parent::__construct();
        $this->console = $console;
    }

    protected function validator($data) {
        return Validator::make($data,[
            'command' => 'required'
        ]);
    }

    private function renderSuccess($message){
        return view('console::parts.success',compact('message'))->render();
    }

    private function renderError($message){
        return view('console::parts.error',compact('message'))->render();
    }


    public function postRun(Request $request){

        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response()->json([
                'html' => $this->renderError($validator->errors()->all())
            ],500);
        }

        $output = $this->console->run($request->input('command'));

        if ($output['status'] === 0) {
            return response()->json([
                'html' => $this->renderError($output['data'])
            ],500);
        } elseif ($output['status'] === 1) {
            return response()->json([
                'html' => $this->renderSuccess($output['data'])
            ],200);
        }

        return response()->json([
            'html' => $this->renderError('Sorry, Unknown error...')
        ],500);

    }

}