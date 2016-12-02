<?php

namespace DC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DCAdminBundle:Default:index.html.twig');
    }

    public function logInAction(){
        return new Response("Hello");
    }
}
