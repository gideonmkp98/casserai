<?php

namespace App\Controller;

use App\Entity\Reservering;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Form\BookingType;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\KamerRepository;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(KamerRepository $kamerRepository)
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
            'kamers' => $kamerRepository->findWithImage(),
        ]);
    }

    /**
     * @Route("/booking/{id}", name="booking", methods={"GET","POST"})
     */
    public function booking(Request $request, KamerRepository $kamerRepository)
    {
        $roomData = $kamerRepository->findWithImageWhere($request->get('id'));
        $booking = new Reservering();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);
        $user = $this->getUser()->getId();
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $booking->setUser($user);
            $booking->setKamer($roomData[0]['id']);
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('reservering_index');
        }

        return $this->render('public/booking.html.twig', [
            'controller_name' => 'PublicController',
            'kamers' => $roomData,
            'form' => $form->createView(),
        ]);
    }
}
