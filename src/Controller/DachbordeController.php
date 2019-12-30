<?php

namespace App\Controller;

use App\Entity\Responsableentreprise;  
use App\Entity\Categorieoffre;
use App\Entity\Postuler;
use App\Entity\Responsablesignaleretudiant;
use App\Entity\Etudiant;
use App\Entity\User; 
use App\Entity\Offreentreprise;
use App\Entity\Prof; 
use App\Entity\Profsignaleretudiant;
use App\Entity\Image;
 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class DachbordeController extends AbstractController
{
    /**
     * @Route("/dachborde", name="dachborde")
     */
    public function index()
    {
        return $this->render('dachborde/dachbordeAdmin.html.twig', [
            'controller_name' => 'DachbordeController',
        ]);
    }

    /**
     * @Route("/etudiant", name="etudiant")
     */
    public function etudiant(Request $request, UserInterface $user)
    {
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $User = $this->getDoctrine()->getRepository(User::class)->findAll();
        $commentaire = $this->getDoctrine()->getRepository(Profsignaleretudiant::class)->findAll();

        return $this->render('dachborde/dachbordeEtudiant.html.twig', [
            'etudiant' => $etudiant,'commentaire'=>$commentaire,'User'=>$User
        ]);
    }

    /**
     * @Route("/listeEntrepriseAvecOffresResponsable", name="listeEntrepriseOffresResponsable")
     */
    public function listeEntrepriseAvecOffresResponsable(UserInterface $user)
    {
        $Responsableentreprise = $this->getDoctrine()->getRepository(Responsableentreprise::class)->findAll();
        $userr = $this->getDoctrine()->getRepository(USER::class)->findAll();

        
         return $this->render('dachborde/listeentrepriseoffresresponsable.html.twig', [
            'Responsableentreprise' => $Responsableentreprise,'user'=>$userr 
        ]);
    }

    /**
     * @Route("/listeEtudiant", name="listeEtudiant")
     */
    public function listeEtudiant()
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( User::class) ;
        $listeEtudiant   = $repo->findAll();

        return $this->render('dachborde/listeetudiant.html.twig', [
            'listeEtudiant' => $listeEtudiant,
        ]);
    }

     

    

    /**
     * @Route("/listeProf", name="listeProf")
     */
    public function listeProf()
    {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( User::class) ;
        $listeProf   = $repo->findAll();
        return $this->render('dachborde/listeprof.html.twig', [
            'listeProf' => $listeProf,
        ]);
    }

    /**
     * @Route("/listeresponsable", name="listeresponsable")
     */
    public function listeresponsable( Request $request)
    { 
         
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( User::class) ;
        $listeResponsableentreprise   = $repo->findAll();

        $RE = $this->getDoctrine()->getRepository(Responsableentreprise::class)->findAll();
        
        return $this->render('dachborde/listeresponsable.html.twig', [
            'listeResponsableentreprise' => $listeResponsableentreprise, 'RE'=>$RE
        ]);
    }


    


    /**
     * @Route("/listeVosOffres", name="listeVosOffres")
     */
    public function listeVosOffres( UserInterface $user)
    {
        $u =$this->getDoctrine()->getRepository(Offreentreprise::class)->findAll();
        $cat  =$this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();

        return $this->render('dachborde/listedevosoffres.html.twig', [
            'Offreentreprise' => $u,'Categories'=>$cat
        ]);
    }

    /**
     * @Route("/listeOffresPstuler", name="listeOffresPstuler")
     */
    public function listeOffresPstuler(UserInterface $user)
    {
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $Postuler = $this->getDoctrine()->getRepository(Postuler::class)->findBy(array('etudiant' =>  $etudiant->getId()  ));
        return $this->render('dachborde/listeOffresPstuler.html.twig', [
            'controller_name' => 'DachbordeController','Postuler'=>$Postuler
        ]);
    }



    /**
     * @Route("/ActiverEtudiant/{id}", name="ActiverEtudiant")
     */
    public function ActiverEtudiant(Request $request ,$id)
    {
         
        $emm = $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $emm->setActiver("1");
        $em=$this->getDoctrine()->getManager();
            $em->persist($emm);
            $em->flush();
        
        $Etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' => $id));
      
        if(count($Etudiant) == 0)
        { 
            $Etu=new Etudiant();
            $Etu->setIdUser($id);
            $Etu->setAdresse(" ");
            $Etu->setImage(" ");
            $Etu->setDescriptionProfilCv(" ");
            $em->Persist($Etu);
            $em->flush();
        } 
        return $this->redirectToRoute("listeEtudiant");
    }

    /**
     * @Route("/DeActiverEtudiant/{id}", name="DeActiverEtudiant")
     */
    public function DeActiverEtudiant(Request $request ,$id)
    {
         
        $emm = $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $emm->setActiver("0");
        $em=$this->getDoctrine()->getManager();
            $em->persist($emm);
            $em->flush();

        return $this->redirectToRoute("listeEtudiant");
    }



    ///////////////


    /**
     * @Route("/ActiverResponsableentreprise/{id}", name="ActiverResponsableentreprise")
     */
    public function ActiverResponsableentreprise(Request $request ,$id)
    {
         
        $user= $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $user->setActiver("1");
        $em=$this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        
        $Etudiant = $this->getDoctrine()->getRepository(Responsableentreprise::class)->findBy(array('id_user' => $id));
      
        if(count($Etudiant) == 0)
        { 
            $Etu=new Responsableentreprise();
            $Etu->setIdUser($id);
            $Etu->setNomEntreprise(" ");
            $Etu->setDomaineEntreprise(" ");
            $Etu->setLogo(" ");
            $Etu->setDescriptionEntreprise(" ");
            $em->Persist($Etu);
            $em->flush();
        } 
         
        return $this->redirectToRoute("listeresponsable");
    }

    /**
     * @Route("/DeActiverResponsableentreprise/{id}", name="DeActiverResponsableentreprise")
     */
    public function DeActiverResponsableentreprise(Request $request ,$id)
    {
         
        $emm = $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $emm->setActiver("0");
        $em=$this->getDoctrine()->getManager();
            $em->persist($emm);
            $em->flush();

        return $this->redirectToRoute("listeresponsable");
    }



    /////////


    /**
     * @Route("/ActiverProf/{id}", name="ActiverProf")
     */
    public function ActiverProf(Request $request ,$id)
    {
         
        $a = $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $a->setActiver("1");
        $em=$this->getDoctrine()->getManager();
            $em->persist($a);
            $em->flush();

         
        $proff = $this->getDoctrine()->getRepository(Prof::class)->findBy(array('id_user' => $id));
      
      


        if(count($proff) == 0)
        { 
            $Etu=new Prof();
            $Etu->setIdUser($id); 
            $Etu->setImage(" ");
            $em->Persist($Etu);
            $em->flush();
        } 
         
        return $this->redirectToRoute("listeProf");
    }

    /**
     * @Route("/DeActiverProf/{id}", name="DeActiverProf")
     */
    public function DeActiverProf(Request $request ,$id)
    {
         
        $emm = $this->getDoctrine()->getRepository(User::class)->find($id); 
            
        $emm->setActiver("0");
        $em=$this->getDoctrine()->getManager();
            $em->persist($emm);
            $em->flush();

        return $this->redirectToRoute("listeProf");
    }

}
