<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/admin-user-list', name: 'app_user_list')]
    public function UserList(EntityManagerInterface $emi, UserRepository $userRepository): Response
    {

     

        $count = $userRepository->count([]);
        $repoUser =  $emi->getRepository(User::class);
        $user = $repoUser->findAll(); 
        return $this->render('admin/user-list.html.twig', [
            'user' => $user,
            'count' => $count,
       
        ]);
    }

    
    #[Route('/admin-remove-user-list/{id}', name: 'app_remove_user_list')]
    public function RemoveUserList(EntityManagerInterface $entityManagerInterface, Request $request): Response
    {

     
        $id = $request->get('id');
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $user = $repoUser->find($id);
        
        
        $entityManagerInterface->remove($user);
        $entityManagerInterface->flush();

      
        return $this->redirectToRoute('app_user_list');
            
    }

    #[Route('/admin-verif-user/{id}', name: 'app_user_verif')]
    public function VerifUser(EntityManagerInterface $emi, UserRepository $userRepository, Request $request): Response
    {

     
        $id = $request->get('id');
        $repoUser = $emi->getRepository(User::class);
        $user = $repoUser->find($id);
        $user ->setIsVerified(true); 
        $emi -> flush(); 

        return $this->redirectToRoute('app_user_list');
        
    }

}
