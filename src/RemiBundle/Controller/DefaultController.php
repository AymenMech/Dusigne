<?php

namespace RemiBundle\Controller;

use RemiBundle\Entity\BookPhoto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        return $this->render('Default/parcours.html.twig');
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
