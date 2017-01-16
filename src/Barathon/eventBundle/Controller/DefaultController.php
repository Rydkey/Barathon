<?php

namespace Barathon\eventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BarathoneventBundle:Default:index.html.twig');
    }
}
