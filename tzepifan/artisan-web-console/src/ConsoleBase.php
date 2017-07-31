<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 29.07.2017
 * Time: 19:55
 */

namespace Tzepifan\ArtisanWebConsole;

use Illuminate\Support\Facades\Artisan;

class ConsoleBase
{

    public static function prepareCommand($commandString) {
        $commandString = preg_replace('/\s+/', ' ', $commandString);
        $words = explode(' ',$commandString);
        $params = [];
        if (!empty($words)) {
            $command = $words[0];
            if (count($words) > 1) {
                for ($i = 1; $i < count($words); $i++) {
                    $pair = $words[$i];
                    if (strpos($pair,'=') === false) {
                        $params[] = array(
                            $pair => true
                        );
                    } else {
                        $param_value = explode('=', $pair);
                        $params[] = array(
                            $param_value[0] => $param_value[1]
                        );
                    }
                }
            }
            return array(
                'command' => $command,
                'params'  => $params
            );
        } else {
            return $commandString;
        }

    }

    public function run($command) {
        $prepared = $this->prepareCommand($command);
        try {
            if (is_string($prepared)) {
                Artisan::call($prepared);
            } else {
                Artisan::call($prepared['command'],$prepared['params']);
            }
            return [
                'status' => 1,
                'data'   => nl2br(Artisan::output())
            ];
        } catch (\Exception $e) {
            return [
                'status' => 0,
                'data'   => $e->getMessage()
            ];
        }

    }
}