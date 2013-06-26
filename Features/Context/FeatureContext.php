<?php

namespace Knp\RadBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext;

class FeatureContext extends MinkContext
{
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }
}
