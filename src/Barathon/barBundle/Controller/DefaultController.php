<?php

namespace Barathon\barBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BarathonbarBundle:Default:index.html.twig');
    }
}
