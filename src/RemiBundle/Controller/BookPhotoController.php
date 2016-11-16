<?php

namespace RemiBundle\Controller;

use RemiBundle\Entity\BookPhoto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bookphoto controller.
 *
 */
class BookPhotoController extends Controller
{
    /**
     * Lists all bookPhoto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bookPhotos = $em->getRepository('RemiBundle:BookPhoto')->findAll();

        return $this->render('bookphoto/index.html.twig', array(
            'bookPhotos' => $bookPhotos,
        ));
    }

    /**
     * Creates a new bookPhoto entity.
     *
     */
    public function newAction(Request $request)
    {
        $bookPhoto = new Bookphoto();
        $form = $this->createForm('RemiBundle\Form\BookPhotoType', $bookPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bookPhoto);
            $em->flush($bookPhoto);

            return $this->redirectToRoute('test_show', array('id' => $bookPhoto->getId()));
        }

        return $this->render('bookphoto/new.html.twig', array(
            'bookPhoto' => $bookPhoto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a bookPhoto entity.
     *
     */
    public function showAction(BookPhoto $bookPhoto)
    {
        $deleteForm = $this->createDeleteForm($bookPhoto);

        return $this->render('bookphoto/show.html.twig',
            array(  'bookPhoto' => $bookPhoto,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bookPhoto entity.
     *
     */
    public function editAction(Request $request, BookPhoto $bookPhoto)
    {
        $deleteForm = $this->createDeleteForm($bookPhoto);
        $editForm = $this->createForm('RemiBundle\Form\BookPhotoType', $bookPhoto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_edit', array('id' => $bookPhoto->getId()));
        }

        return $this->render('bookphoto/edit.html.twig', array(
            'bookPhoto' => $bookPhoto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bookPhoto entity.
     *
     */
    public function deleteAction(Request $request, BookPhoto $bookPhoto)
    {
        $form = $this->createDeleteForm($bookPhoto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bookPhoto);
            $em->flush($bookPhoto);
        }

        return $this->redirectToRoute('test_index');
    }

    /**
     * Creates a form to delete a bookPhoto entity.
     *
     * @param BookPhoto $bookPhoto The bookPhoto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BookPhoto $bookPhoto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('test_delete', array('id' => $bookPhoto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
