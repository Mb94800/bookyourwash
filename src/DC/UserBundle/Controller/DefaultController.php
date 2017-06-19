<?php

namespace DC\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $this->getUser();
        var_dump($this->getUser());
        die("____");

        
        return $this->render('DCUserBundle:Default:layout.html.twig');
    }
}
