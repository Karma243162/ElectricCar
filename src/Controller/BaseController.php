<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
          
        ]);
    }

    #[Route('/profile-user', name: 'app_user_profile')]
    public function Profile(EntityManagerInterface $emi, UserRepository $userRepository, Request $request): Response
    {
         $repoUser =  $emi->getRepository(User::class);
          $user = $repoUser->findAll(); 
        return $this->render('base/profile.html.twig', [
            'user' => $user,
        ]);
    }

}


