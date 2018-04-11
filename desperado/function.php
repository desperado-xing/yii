<?php
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);
    /**
    *格式化输出数组内容 
	* [dump description]
	* @param  [type]  $var   [description]
	* @param  boolean $echo  [description]
	* @param  [type]  $label [description]
    * @param  [type]  $flags [description]
	* @return [type]         [description]
	*/
	function dump($var, $echo = true, $label = null, $flags = ENT_SUBSTITUTE)
    {
        $label = (null === $label) ? '' : rtrim($label) . ':';
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
        if (IS_CLI) {
            $output = PHP_EOL . $label . $output . PHP_EOL;
        } else {
        	
            if (!extension_loaded('xdebug')) {
                $output = htmlspecialchars($output, $flags);
            }
            $output = '<pre>' . $label . $output . '</pre>';
        }
        if ($echo) {
            echo($output);
            return;
        } else {
            return $output;
        }
    }


?>