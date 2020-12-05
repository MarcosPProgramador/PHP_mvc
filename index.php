<?php

include './config.php';
class simpleTasks
{
    public function createfactoryClass($class)
    {
        new $class;
    }
    public function getPageUrl(){

        $resource = $_GET['url'] ?? 'signup';
        $resource = '/'. strtolower($resource);
        return $resource;

    }
}
$task = new simpleTasks();

$task->createfactoryClass('routeController');

switch ($task->getPageUrl()) {
    case '/signin':
        $task->createfactoryClass('signInController');
        break;
    case '/signup':
        $task->createfactoryClass('signUpController');
        break;
}