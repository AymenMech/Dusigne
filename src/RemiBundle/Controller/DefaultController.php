<?php

namespace RemiBundle\Controller;

use RemiBundle\Entity\BookPhoto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('Default/index.html.twig');
    }
    public function activiteAction()
    {
        return $this->render('Default/activite.html.twig');
    }
    public function parcoursAction()
    {
        $req = $this->getDoctrine()->getRepository('RemiBundle:Parcours');
        $data = $req->findAll();
        return $this->render('Default/parcours.html.twig',
            array('parcours' => $data));
    }

    public function parcoursCVAction()
    {
        return new BinaryFileResponse('');
    }
    public function photoAction()
    {
        $req = $this->getDoctrine()->getRepository("RemiBundle:BookPhoto");
        $data = $req->findAll();
        return $this->render('Default/photo.html.twig',
            array( 'photos' => $data ));

    }
    public function videoAction()
    {
        return $this->render('Default/video.html.twig');
    }
}
