<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Etudiant; 
use App\Entity\Prof;
use App\Entity\Responsableentreprise;  

use App\Entity\Categorieoffre;
use App\Entity\Offreentreprise;
 
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home/page", name="home_page")
     */
    public function index()
    {
        $User = $this->getDoctrine()->getRepository(User::class)->findAll();
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findAll(); 
        $Prof = $this->getDoctrine()->getRepository(Prof::class)->findAll(); 
        $Responsableentreprise = $this->getDoctrine()->getRepository(Responsableentreprise::class)->findAll();
        
        $Categorieoffre = $this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();
        $Offreentreprise = $this->getDoctrine()->getRepository(Offreentreprise::class)->findAll();
        
        return $this->render('home_page/home.html.twig', [
            
            'User'=>$User,
            'etudiant'=>$etudiant ,
            'Prof'=>$Prof ,
            'Responsableentreprise' => $Responsableentreprise,
            
            'Categorieoffre'=>$Categorieoffre,
            'Offreentreprise'=>$Offreentreprise,
        ]);
    }

    /**
     * @Route("/home/contact", name="home_contact")
     */
    public function contact()
    {
        return $this->render('home_page/contact.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route("/home/ListesDesOffres", name="ListesDesOffres")
     */
    public function ListesDesOffres()
    {
        $Categorieoffre = $this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();
        $Offreentreprise = $this->getDoctrine()->getRepository(Offreentreprise::class)->findAll();
        return $this->render('home_page/listeoffres.html.twig', [
            'Categorieoffre' => $Categorieoffre,'Offreentreprise'=>$Offreentreprise
        ]);
    }

    /**
     * @Route("/home/ListesDesCategories", name="ListesDesCategories")
     */
    public function ListesDesCategories()
    {
        $Categorieoffre = $this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();
        $Offreentreprise = $this->getDoctrine()->getRepository(Offreentreprise::class)->findAll();
        return $this->render('home_page/listecategories.html.twig', [
             'Categorieoffre' => $Categorieoffre,'Offreentreprise'=>$Offreentreprise
        ]);
    }

    /**
     * @Route("/home/ListesDesEntreprises", name="ListesDesEntreprises")
     */
    public function ListesDesEntreprises()
    {
         $Responsableentreprise = $this->getDoctrine()->getRepository(Responsableentreprise::class)->findAll();
        
        return $this->render('home_page/listeentreprise.html.twig', [
            'Responsableentreprise' => $Responsableentreprise,
        ]);
    }

    /**
     * @Route("/home/DetailsEntreprises", name="DetailsEntreprises")
     */
    public function DetailsEntreprises()
    {
        return $this->render('home_page/detailsentreprises.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route("/home/DetailsOffre", name="DetailsOffre")
     */
    public function DetailsOffre()
    {
        return $this->render('home_page/detailoffre.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route("/home/ListeProf", name="ListeProf")
     */
    public function ListeProf()
    {
         $User = $this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('home_page/listeprof.html.twig', [
            'User' => $User,
        ]);
    }

    /**
     * @Route("/home/ListeEtudiant", name="ListeEtudiant")
     */
    public function ListeEtudiant()
    {
        $User = $this->getDoctrine()->getRepository(User::class)->findAll();
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findAll(); 
        return $this->render('home_page/listeetudiant.html.twig', [
            'User' => $User,'etudiant' => $etudiant
        ]);
    }
}
