<?php
// src/DC/UserBundle/DCUserBundle.php

namespace DC\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DCUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}