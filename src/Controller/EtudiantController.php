<?php

namespace App\Controller;
use App\Entity\User; 
use App\Entity\Etudiant; 
use App\Entity\Offreentreprise;
use App\Entity\Formation;
use App\Entity\Experianceprofessionnelle;
use App\Entity\Competence;
use App\Entity\Langue;
use App\Entity\Projet;
use App\Entity\Telephone;
use App\Entity\Postuler;
use App\Entity\Responsableentreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
class EtudiantController extends AbstractController
{
    /**
     * @Route("/CVetudiant/{id}", name="cv")
     */
    public function index( Request $request ,$id)
    {
        $Etudiant =$this->getDoctrine()->getRepository(Etudiant::class)->find($id);
        $u =$this->getDoctrine()->getRepository(User::class)->find($Etudiant->getIdUser());
        

        return $this->render('etudiant/cv.html.twig', [
            'Etudiant' =>$Etudiant,'user'=>$u
        ]);
    }

     /**
     * @Route("/listeEtudiantIntereser", name="listeEtudiantIntereser")
     */
    public function listeEtudiantIntereser(UserInterface $user)
    {
        $responsable =$this->getDoctrine()->getRepository(Responsableentreprise::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        
        $u =$this->getDoctrine()->getRepository(Postuler::class)->findAll();
        $us =$this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->render('dachborde/listeetudiantintereser.html.twig', [
            'Postuler' => $u,'responsable'=>$responsable,'us'=>$us
        ]);
    }

    /**
     * @route("/supprimerPostulerPAREtudant/{id}",name="supprimerPostulerPAREtudant")
     */
    public function supprimerPostulerPAREtudant( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Postuler::class) ;
        $Postuler   = $repo->find($id);
        if(! $Postuler){
            throw $this->createNotFoundException("No Postuler".$id);
        }
        $em->remove($Postuler);
        $em->flush();

        return $this->redirectToRoute('listeEntrepriseOffresResponsable');
    }

    /**
     * @Route("/PostulerEtOf/{id}",name="PostulerEtOf")
     * 
     */
    public function Postuler(Request $request, UserInterface $user,$id){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();

        $ETUD =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $OFFRE =$this->getDoctrine()->getRepository(Offreentreprise::class)->find($id); 
        
        $Postuler  = new Postuler();
        $Postuler->setEtudiant($ETUD);   
        $Postuler->setOffre($OFFRE);   

            $entityManager->persist($Postuler); 
            $entityManager->flush(); 
            
        
        return $this->redirectToRoute('listeOffresPstuler'); 

    }

    /**
     * @Route("/ModificationUser/{cin,prenom,nom,date_naissance,adresse_email}",name="ModificationUser")
     * 
     */
    public function ModificationUser(Request $request, UserInterface $user){

        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(user::class)->find($user->getId()); 


        $u->setCin($request->get('cin'));
        $u->setPrenom($request->get('prenom'));
        $u->setNom($request->get('nom')); 


        $u->setAdresseEmail($request->get('adresse_email'));  
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }


    /**
     * @Route("/ModificationEtudiant/{adresse,description_profil_cv}",name="ModificationEtudiant")
     * 
     */
    public function ModificationEtudiant(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];


        $u->setAdresse($request->get('adresse'));
        $u->setDescriptionProfilCv($request->get('description_profil_cv')); 

 
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }

       /**
     * @Route("/AjouteFormation/{nom,description,date_debut,date_fin}",name="AjouteFormation")
     * 
     */
    public function AjouteFormation(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $formation  = new Formation();
        $formation->setNom($request->get('nom')); 
        $formation->setDescription($request->get('description')); 
        $formation->setDateDebut(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
        $formation->setDateFin(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));

        $u->addFormation($formation);
        

            $entityManager->persist($formation);
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }

    /**
     * @Route("/AjouteExperience/{titre,description,date_debut,date_fin}",name="AjouteExperience")
     * 
     */
    public function AjouteExperience(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $Experiance  = new Experianceprofessionnelle();
        $Experiance->setTitre($request->get('titre')); 
        $Experiance->setDescription($request->get('description')); 
        $Experiance->setDateDebut(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));
        $Experiance->setDateFin(\DateTime::createFromFormat('Y-m-d', "2018-09-09"));

        $u->addExperiance($Experiance);
        

            $entityManager->persist($Experiance);
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }

    /**
     * @Route("/AjouteCompetence/{titre,niveau,description}",name="AjouteCompetence")
     * 
     */
    public function AjouteCompetence(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $Competence  = new Competence();
        $Competence->setTitre($request->get('titre')); 
        $Competence->setDescription($request->get('description'));  
        $Competence->setNiveau($request->get('niveau')); 
        
        $u->addCompetence($Competence);
        

            $entityManager->persist($Competence);
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }


    /**
     * @Route("/AjouteLangue/{nom,description,niveaux}",name="AjouteLangue")
     * 
     */
    public function AjouteLangue(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $Langue  = new Langue();
        $Langue->setNom($request->get('nom')); 
        $Langue->setDescription($request->get('description'));  
        $Langue->setNiveaux($request->get('niveaux'));  

        $u->addLangue($Langue);
        

            $entityManager->persist($Langue);
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }

    /**
     * @Route("/AjouteProjet/{titre,description }",name="AjouteProjet")
     * 
     */
    public function AjouteProjet(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Etudiant::class)->findBy(array('id_user' =>  $user->getId()  ))[0];
        $Projet  = new Projet();
        $Projet->setTitre($request->get('titre')); 
        $Projet->setDescription($request->get('description'));   

        $u->addProjet($Projet);
        

            $entityManager->persist($Projet);
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('etudiant'); 

    }

    /**
     * @Route("/Ajoutetelephone/{tele }",name="Ajoutetelephone")
     * 
     */
    public function Ajoutetelephone(Request $request, UserInterface $user){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        
        $Tele  = new Telephone();
        $Tele->setTele($request->get('tele'));    

         
        $user->addTele($Tele);
        

            $entityManager->persist($Tele);
            $entityManager->persist($user); 
            $entityManager->flush(); 
            
        
        return $this->redirectToRoute('etudiant'); 

    }

    /**
     * @route("/supprimertelephone/{id}",name="supprimertelephone")
     */
    public function supprimertelephone( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Telephone::class) ;
        $Telephone   = $repo->find($id);
        if(! $Telephone){
            throw $this->createNotFoundException("No Telephone".$id);
        }
        $em->remove($Telephone);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    }

    /**
     * @route("/supprimerformation/{id}",name="supprimerformation")
     */
    public function supprimerformation( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Formation::class) ;
        $Formation   = $repo->find($id);
        if(! $Formation){
            throw $this->createNotFoundException("No Formation".$id);
        }
        $em->remove($Formation);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    } 

    /**
     * @route("/supprimerExperiance/{id}",name="supprimerExperiance")
     */
    public function supprimerExperiance( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Experianceprofessionnelle::class) ;
        $Experiance   = $repo->find($id);
        if(! $Experiance){
            throw $this->createNotFoundException("No Experiance".$id);
        }
        $em->remove($Experiance);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    } 

    /**
     * @route("/supprimerCompetence/{id}",name="supprimerCompetence")
     */
    public function supprimerCompetence( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Competence::class) ;
        $Competence   = $repo->find($id);
        if(! $Competence){
            throw $this->createNotFoundException("No Competence".$id);
        }
        $em->remove($Competence);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    } 


    /**
     * @route("/supprimerLangue/{id}",name="supprimerLangue")
     */
    public function supprimerLangue( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Langue::class) ;
        $Langue   = $repo->find($id);
        if(! $Langue){
            throw $this->createNotFoundException("No Langue".$id);
        }
        $em->remove($Langue);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    } 


    /**
     * @route("/supprimerProjet/{id}",name="supprimerProjet")
     */
    public function supprimerProjet( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Projet::class) ;
        $Projet   = $repo->find($id);
        if(! $Projet){
            throw $this->createNotFoundException("No Projet".$id);
        }
        $em->remove($Projet);
        $em->flush();

        return $this->redirectToRoute('etudiant');
    } 

}
