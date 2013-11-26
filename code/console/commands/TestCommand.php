<?php
class TestCommand extends CConsoleCommand
{
    public function actionIndex($args) 
    {
        echo 'test' . PHP_EOL;
    }
}