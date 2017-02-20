<?php

namespace Barathon\eventBundle\Controller;

use Barathon\eventBundle\Entity\Event;
use Barathon\utilisateursBundle\BarathonutilisateursBundle;
use Barathon\utilisateursBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Event controller.
 *
 */
class EventController extends Controller
{
    /**
     * Lists all event entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('BarathoneventBundle:Event')->findAll();

        return $this->render('BarathoneventBundle:event:index.html.twig', array(
            'events' => $events,
        ));
    }

    /**
     * Creates a new event entity.
     *
     */
    public function newAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm('Barathon\eventBundle\Form\EventType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush($event);

            return $this->redirectToRoute('event_show', array('id' => $event->getId()));
        }

        return $this->render('BarathoneventBundle:event:new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a event entity.
     *
     */
    public function showAction(Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);

        return $this->render('BarathoneventBundle:event:show.html.twig', array(
            'event' => $event,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     */
    public function editAction(Request $request, Event $event)
    {
        $deleteForm = $this->createDeleteForm($event);
        $editForm = $this->createForm('Barathon\eventBundle\Form\EventType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('event_edit', array('id' => $event->getId()));
        }

        return $this->render('BarathoneventBundle:event:edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     */
    public function deleteAction(Event $event)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BarathoneventBundle:Event')->find($event);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Preisliste entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirectToRoute('event_index');
    }

    /**
     * Creates a form to delete a event entity.
     *
     * @param Event $event The event entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Event $event)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('event_delete', array('id' => $event->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function addUserAction(User $user,Event $event){
//        TODO : completer méthode

//        $em = $this->getDoctrine()->getManager();
//
//        // On récupère l'annonce $id
//        $advert = $em->getRepository('Barathon:Advert')->find($id);
//
//        if (null === $advert) {
//            throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
//        }
//
//        // La méthode findAll retourne toutes les catégories de la base de données
//        $listCategories = $em->getRepository('OCPlatformBundle:Category')->findAll();
//
//        // On boucle sur les catégories pour les lier à l'annonce
//        foreach ($listCategories as $category) {
//            $advert->addCategory($category);
//        }
//
//        // Pour persister le changement dans la relation, il faut persister l'entité propriétaire
//        // Ici, Advert est le propriétaire, donc inutile de la persister car on l'a récupérée depuis Doctrine
//
//        // Étape 2 : On déclenche l'enregistrement
//        $em->flush();
//
//        // … reste de la méthode
    }
}
