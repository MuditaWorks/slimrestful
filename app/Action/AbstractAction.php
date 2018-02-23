<?php

namespace App\Action;

abstract class AbstractAction {

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }
}