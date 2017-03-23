<?php

namespace Barathon\eventBundle\Controller;

use Barathon\barBundle\Entity\Bar;
use Barathon\barBundle\Entity\Category;
use Barathon\eventBundle\Entity\Event;
use Barathon\barBundle\Form\BarSearchType;
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
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('BarathoneventBundle:Event')->findAll();

        $bar = new Bar();
        $form = $this->get('form.factory')->create(BarSearchType::class, $bar);

        if ($form->get('search')->isClicked()){
            return $this->render('BarathoneventBundle:event:index.html.twig', array(
                'form' => $form->createView(), 'events' => $events,
            ));
        }

        return $this->render('BarathoneventBundle:event:index.html.twig', array(
            'form' => $form->createView(), 'events' => $events,
        ));
    }
    /**
     * Lists all event from owner entities.
     *
     */
    public function indexPropAction()
    {
        $em = $this->getDoctrine()->getManager();

        $events = $em->getRepository('BarathoneventBundle:Event')->findAll();

        return $this->render('BarathoneventBundle:event:index_Prop.html.twig', array(
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
            $event->upload();
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
        $em = $this->getDoctrine()->getManager();

        // On récupère l'annonce $id
        $User = $em->getRepository('BarathonutilisateursBundle:User')->find($user);
        $Event = $em->getRepository('BarathoneventBundle:Event')->find($event);

        if (null === $User) {
            throw new NotFoundHttpException("L'utilisateur ".$id." n'existe pas.");
        }
        if (null === $Event) {
            throw new NotFoundHttpException("L'Event ".$id." n'existe pas.");
        }

        $User->addEvent($Event);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
            'subscribe',
            'Vous êtes inscrit'
        );
        return $this->redirectToRoute('event_index');
    }

public function removeUserAction(User $user,Event $event){
//        TODO : completer méthode
    $em = $this->getDoctrine()->getManager();

    // On récupère l'annonce $id
    $User = $em->getRepository('BarathonutilisateursBundle:User')->find($user);
    $Event = $em->getRepository('BarathoneventBundle:Event')->find($event);

    if (null === $User) {
        throw new NotFoundHttpException("L'utilisateur ".$id." n'existe pas.");
    }
    if (null === $Event) {
        throw new NotFoundHttpException("L'Event ".$id." n'existe pas.");
    }

    $User->removeEvent($Event);
    $em->flush();
    $this->get('session')->getFlashBag()->add(
        'unsubscribe',
        'Vous vous êtes désinscrit'
    );
    return $this->redirectToRoute('event_index');
}
}

