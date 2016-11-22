<?php

namespace DC\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DCHomeBundle:Default:index.html.twig');
    }
}
