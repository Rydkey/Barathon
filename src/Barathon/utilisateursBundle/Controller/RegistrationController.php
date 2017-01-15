<?php
// src/AppBundle/Controller/RegistrationController.php

namespace Barathon\utilisateursBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends BaseController
{
    public function confirmedAction(Request $request)
    {
        $user = $this->getUser();
        $group_name = 'Consommateurs';
        $entity = $this->em->getRepository('BarathonutilisateursBundle:Group')->findOneByName($group_name); // You could do that by Id, too
        $this->user->addGroup($entity);
        $this->em->flush();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette section.');
        }
        return $this->render('FOSUserBundle:Registration:confirmed.html.twig', array(
            'user' => $user,
        ));
    }
}