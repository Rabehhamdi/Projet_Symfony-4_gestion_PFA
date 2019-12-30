<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Entity\User;
use App\Entity\Prof;
use App\Entity\Profsignaleretudiant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request; 

class ProfController extends AbstractController
{
    /**
     * @Route("/prof", name="prof")
     */
    public function index()
    {
        $etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findAll();
        $user =$this->getDoctrine()->getRepository(User::class)->findAll();
        

        return $this->render('dachborde/dachbordeProf.html.twig', [
            'etudiant' => $etudiant,'user'=>$user
        ]);
    }


    /**
     * @Route("/AjouteCommantaire/{id}", name="AjouteCommantaire")
     */
    public function AjouteCommantaire(Request $request , UserInterface $user ,$id)
    {
        $params = $request->query->all();
        
        $Etudiant = $this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id' => $id))[0];
        $Prof = $this->getDoctrine()->getRepository(Prof::class)->findBy(array('id_user' => $user->getId()))[0];
        $Commantaire=new Profsignaleretudiant();

         

        $Commantaire->setCommantaire($request->get('commantaire'));
        if($request->get('optionsRadios') == "0")
        $Commantaire->setPositivenegative(0);
        else
        $Commantaire->setPositivenegative(1);
        $Commantaire->setEtudiant($Etudiant  );
        $Commantaire->setProfesseur($Prof );
        $Commantaire->setCreatedAt(\DateTime::createFromFormat('Y-m-d', "2018-09-09")); 
        $Commantaire->setIdProf(" "); 
        
        $em=$this->getDoctrine()->getManager();
        $em->persist($Commantaire);
        $em->flush();
 

        return $this->redirectToRoute("prof");
    }

}
