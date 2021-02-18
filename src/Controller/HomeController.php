<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $rep)
    {
        $articles=$rep->findAll();
        //dd($articles);
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/admin", name="dash")
     */
    public function inx()
    {
        return $this->render('home/admin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
      /**
     * @Route("/login", name="login")
     */

     
    public function login(AuthenticationUtils $authenticationUtils){
        
        $error = $authenticationUtils->getLastAuthenticationError();
        
       
        return $this->render('home/login.html.twig',[
            'error' => $error,
            'login' => true,
            'title'=>'Connexion',
            "date"=>date_format(new \DateTime(),"Y"),
           
        ]);
    }
    
}
