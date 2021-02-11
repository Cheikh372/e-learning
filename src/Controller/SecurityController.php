<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $user=$this->getUser();
        if ($user) {
            if(in_array('ROLE_ETUDIANT',$user->getRoles())){
                return $this->redirectToRoute('etudiant_profile');
            }
            else if(in_array('ROLE_ENSEIGNANT',$user->getRoles())){
                return $this->redirectToRoute('enseignant_profile');
            }
            else if(in_array('ROLE_ADMIN',$user->getRoles())){
                return $this->redirectToRoute('admin_profile');
            }

            
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig',[
            'last_username' => $lastUsername, 
            'error' => $error,
            'csrf_token_intention' => 'authenticate',
            'username_parameter' => 'username',
            'password_parameter' => 'password',
            ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
