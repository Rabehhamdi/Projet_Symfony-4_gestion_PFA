<?php

namespace App\Controller;
use App\Entity\Categorieoffre;
use App\Entity\Offreentreprise;
use App\Entity\Responsableentreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Security\Core\User\UserInterface;

class ResponsableEntrepriseController extends AbstractController
{
    /**
     * @Route("/responsable/entreprise", name="responsable_entreprise")
     */
    public function index(UserInterface $user)
    {
        $u =$this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();
        $uu =$this->getDoctrine()->getRepository(Responsableentreprise::class)->findBy(array('id_user'=>$user->getId()))[0]; 
        

        return $this->render('dachborde/dachbordeResponsable.html.twig', [
            'Categories' => $u,'u'=>$uu
        ]);
    }

    /**
     * @Route("/AjouteOffre/{titre,description,type,Categorie}",name="AjouteOffre")
     * 
     */
    public function AjouteOffre(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        

        $u =$this->getDoctrine()->getRepository(Responsableentreprise::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $cat =$this->getDoctrine()->getRepository(Categorieoffre::class)->findBy(array('id' =>  $request->get('Categorie')  ))[0];

       
        $Offre  = new Offreentreprise();
        $Offre->setTitre($request->get('titre')); 
        $Offre->setDescription($request->get('description')); 
        $Offre->setType($request->get('type'));
         
        $Offre->setResponsable($u);
        $Offre->setCategorie($cat); 
 
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Offre); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('responsable_entreprise'); 

    }
}
