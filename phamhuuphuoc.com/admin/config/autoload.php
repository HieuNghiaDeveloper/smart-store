<?php

/**----------------------------------------------------------------------
 * AUTOLOADER các file khi khởi động hệ thống
 * -- Lib
 *      -- $autoload['lib'] = array('database', 'email')
 * -- Helper
 *      -- $autoload['helper'] = array('number', 'array')
 * ----------------------------------------------------------------------
 */

$autoload['lib'] = array('globalModel', 'session', 'cookie');


$autoload['helper'] = array('data', 'number', 'url', 'time', 'string');
