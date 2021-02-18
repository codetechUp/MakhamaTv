<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
   
   
        /**
     * @Route("/admin/docs", name="addArticle")
     */
    public function addDoc(Request $req)
    {
        
        $rticle=new Article();
         //creation formulaire 
         $form=$this->createForm(ArticleType::class,$rticle);
         //recuperation des donnees modifies
         $form->handleRequest($req);
         if($form->isSubmitted() && $form->isValid()){
             $em=$this->getDoctrine()->getManager();
             
             
             //Modification des donnees dans le db
             $em->persist($rticle);
             $em->flush();
             //Ajout msg alert de success
             $this->addFlash("success","Ajouter avec success");

             //Redirection
             return $this->redirectToRoute('dash');
 
         }
     
         return $this->render('admin/index.html.twig', [
             'form' => $form->createView(),
            
 
         ]);
     }
    
}
