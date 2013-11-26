<?php
require __DIR__.'/../../common/config/define.php';
require __DIR__.'/define.php';
require __DIR__.'/../../common/vendors/zTester/tester/tester.php';

abstract class TestCase extends ZTestCase
{

}

new Tester(__DIR__);
