<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\KamerRepository;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(KamerRepository $kamerRepository)
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
            'kamers' => $kamerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/booking", name="booking")
     */
    public function booking()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
}
