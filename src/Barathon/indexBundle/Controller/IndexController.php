<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 14/01/17
 * Time: 14:20
 */

namespace Barathon\indexBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

// N'oubliez pas ce use :

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction(){
        return $this->render('BarathonindexBundle:Index:index.html.twig');
    }
}