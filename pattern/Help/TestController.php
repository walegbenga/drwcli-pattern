<?php

namespace Pattern\Command\Help;

use Drwcli\Command\CommandController;

class TestController extends CommandController
{
    public function handle()
    {
        $name = $this->hasParam('user') ? $this->getParam('user') : 'World';
        $this->getPrinter()->display(sprintf("Hello, %s!", $name));

        print_r($this->getParams());
    }
}