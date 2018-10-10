<?php

/*
|--------------------------------------------------------------------------
| Custom The Application Monolog
|--------------------------------------------------------------------------
|
| Configuration daily monolog.
|
*/

$app->configureMonologUsing(function (\Monolog\Logger $logger) {
    $maxFiles = env('APP_MAX_LOG_FILE');
    $logfolder = env('LOG_DIRECTORY');
    $log_file_name = env('LOG_FILE_NAME');
    $filename = storage_path($logfolder.'/'.$log_file_name.'.log');
    $handler = new \Monolog\Handler\RotatingFileHandler($filename, $maxFiles);
    $handler->setFilenameFormat('{date}-{filename}', 'Y-m-d');
    $formatter = new \Monolog\Formatter\LineFormatter(null, null, true, true);
    $handler->setFormatter($formatter);
    $logger->pushHandler($handler);
    return $logger;
});




// Paste these line of code in your project .env file

APP_MAX_LOG_FILE=365;
LOG_DIRECTORY="/../storage/logs"; // select your project directory for storing logs
LOG_FILE_NAME="testing_log"; // file name change it according to need
