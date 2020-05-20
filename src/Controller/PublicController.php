<?php

namespace App\Controller;

use App\Entity\Reservering;
use App\Entity\Kamer;
use App\Entity\User;
use App\Repository\UserRepository;
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
    public function booking(Request $request, KamerRepository $kamerRepository, UserRepository $userRepository)
    {
        $roomData = $kamerRepository->findWithImageWhere($request->get('id'));
        $booking = new Reservering();
        $userr = new User();
        $kamer = new Kamer();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);
        $userId = $this->getUser()->getId();
        $user = $userRepository->findBy(['id'=> $userId]);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $booking->setUser($userr->getId());
            $booking->setKamer($kamer->getId());
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
