<?php
namespace Barathon\barBundle\Controller;
use Barathon\barBundle\Entity\Bar;
use Barathon\barBundle\Form\BarType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Bar controller.
 *
 */
class BarController extends Controller
{
    /**
     * Lists all bar entities.
     *
     */
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BarathonbarBundle:Bar')
        ;
        $bars = $repository->findAll();
        return $this->render('BarathonbarBundle:bar:index.html.twig', array(
            'bars' => $bars,
        ));
    }

    /**
     * Lists all bar entities.
     *
     */
    public function indexPropAction($id)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('BarathonbarBundle:Bar')
        ;
        $bars = $repository->getBarProp($id);
        return $this->render('BarathonbarBundle:bar:Index_Prop.html.twig', array(
            'bars' => $bars,
        ));
    }
    /**
     * Creates a new bar entity.
     *
     */
    public function newAction(Request $request)
    {
        $bar = new Bar();
        $form = $this->createForm('Barathon\barBundle\Form\BarType', $bar);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bar);
            $em->flush($bar);
            return $this->redirectToRoute('bar_index');
        }
        return $this->render('BarathonbarBundle:bar:new.html.twig', array(
            'bar' => $bar,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a bar entity.
     *
     */
    public function showAction(Bar $bar)
    {
        $deleteForm = $this->createDeleteForm($bar);
        return $this->render('BarathonbarBundle:bar:show.html.twig', array(
            'bar' => $bar,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing bar entity.
     *
     */
    public function editAction(Request $request, Bar $bar)
    {
        $deleteForm = $this->createDeleteForm($bar);
        $editForm = $this->createForm('Barathon\barBundle\Form\BarType', $bar);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->get('session')->getFlashBag()->add(
                'modif',
                'modification faite'
            );
            return $this->redirectToRoute('bar_index');
        }
        return $this->render('BarathonbarBundle:bar:edit.html.twig', array(
            'bar' => $bar,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a bar entity.
     *
     */
    public function deleteAction(Request $request, Bar $bar)
    {
        $form = $this->createDeleteForm($bar);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bar);
            $em->flush($bar);
        }
        return $this->redirectToRoute('bar_index');
    }
    /**
     * Creates a form to delete a bar entity.
     *
     * @param Bar $bar The bar entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bar $bar)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('bar_delete', array('id' => $bar->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}