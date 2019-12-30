<?php

namespace App\Controller;
use App\Entity\Categorieoffre;
use App\Entity\Offreentreprise;
use App\Entity\User;
use App\Entity\Prof; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Responsableentreprise;  
use App\Entity\Etudiant;
use App\Entity\Postuler;
use Symfony\Component\Security\Core\User\UserInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
          return $this->render('dachborde/dachbordeAdmin.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }


    /**
     * @Route("/page404", name="page404")
     */
    public function page404()
    {
          return $this->render('page404/page404.html.twig');
    }



        /**
     * @Route("/AvancModificationUserRESPONSABLE/{nom_Entreprise,domaine_Entreprise,description_Entreprise}",name="AvancModificationUserRESPONSABLE")
     * 
     */
    public function AvancModificationUserRESPONSABLE(Request $request, UserInterface $user){

        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();
        
        $uz =$this->getDoctrine()->getRepository(Responsableentreprise::class)->findBy(array('id_user'=>$user->getId()))[0]; 


        $uz->setNomEntreprise($request->get('nom_Entreprise'));
        $uz->setDomaineEntreprise($request->get('domaine_Entreprise'));
        $uz->setDescriptionEntreprise($request->get('description_Entreprise'));  
     
            $entityManager->persist($uz); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('responsable_entreprise'); 

    }




    /**
     * @Route("/ModificationUserRESPONSABLE/{cin,prenom,nom,date_naissance,adresse_email}",name="ModificationUserRESPONSABLE")
     * 
     */
    public function ModificationUserRESPONSABLE(Request $request, UserInterface $user){

        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(user::class)->find($user->getId()); 


        $u->setCin($request->get('cin'));
        $u->setPrenom($request->get('prenom'));
        $u->setNom($request->get('nom')); 


        $u->setAdresseEmail($request->get('adresse_email'));  
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('responsable_entreprise'); 

    }




    /**
     * @Route("/ModificationUserAdmin/{cin,prenom,nom,date_naissance,adresse_email}",name="ModificationUserAdmin")
     * 
     */
    public function ModificationUserAdmin(Request $request, UserInterface $user){

        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(user::class)->find($user->getId()); 


        $u->setCin($request->get('cin'));
        $u->setPrenom($request->get('prenom'));
        $u->setNom($request->get('nom')); 


        $u->setAdresseEmail($request->get('adresse_email'));  
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('admin'); 

    }


 
   



    /**
     * @Route("/ModificationOffre",name="ModificationOffre")
     * 
     */
    public function ModificationOffre(Request $request){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Offreentreprise::class)->findBy(array('id' =>$request->get('id')   ))[0];
        $cat =$this->getDoctrine()->getRepository(Categorieoffre::class)->findBy(array('id' =>  $request->get('Categorie')  ))[0];


        $u->setTitre($request->get('titre'));
        $u->setDescription($request->get('description')); 
        $u->setType($request->get('type')); 
        $u->setCategorie($cat); 
 
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('listeVosOffres'); 

    }


    /**
     * @route("/supprimerOffre/{id}",name="supprimerOffre")
     */
    public function supprimerOffre( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Offreentreprise::class) ;
        $Offreentreprise   = $repo->find($id);
        if(! $Offreentreprise){
            throw $this->createNotFoundException("No Offre entreprise ".$id);
        }
        $em->remove($Offreentreprise);
        $em->flush();

        return $this->redirectToRoute('listeVosOffres');
    }



    /**
     * @route("/supprimerProf/{id}",name="supprimerProf")
     */
    public function supprimerProf( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();

        $user=$em->getRepository( USER::class)->find($id);
         


        $Prof=$em->getRepository( Prof::class)->findby(array('id_user' =>$id   ))[0];
         


        if(! $Prof){
            throw $this->createNotFoundException("No Prof ".$id);
        }
        if(! $user){
            throw $this->createNotFoundException("No User ".$id);
        }

        $em->remove($Prof);
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('listeProf');
    }




    /**
     * @route("/supprimerEtudiant/{id}",name="supprimerEtudiant")
     */
    public function supprimerEtudiant( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();

        $user=$em->getRepository( USER::class)->find($id);
         


        $Etudiant=$em->getRepository( Etudiant::class)->findby(array('id_user' =>$id   ))[0];
         


        if(! $Etudiant){
            throw $this->createNotFoundException("No Etudiant ".$id);
        }
        if(! $user){
            throw $this->createNotFoundException("No User ".$id);
        }

        $em->remove($Etudiant);
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('listeEtudiant');
    }



    /**
     * @route("/supprimerRsponsable/{id}",name="supprimerRsponsable")
     */
    public function supprimerRsponsable( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();

        $user=$em->getRepository( USER::class)->find($id);
         


        $Responsableentreprise=$em->getRepository( Responsableentreprise::class)->findby(array('id_user' =>$id   ))[0];
         


        if(! $Responsableentreprise){
            throw $this->createNotFoundException("No Responsabl eentreprise ".$id);
        }
        if(! $user){
            throw $this->createNotFoundException("No User ".$id);
        }

        $em->remove($Responsableentreprise);
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('listeresponsable');
    }



    /**
     * @route("/rechercheEntreprise" , name="rechercheEntreprise")
     */
    public function rechercheEntreprise (Request $request )
    {
        $params = $request->query->all(); 
        $u =$this->getDoctrine()->getRepository(Responsableentreprise::class)->findby(array('nom_Entreprise' =>  $request->get('nom_Entreprise')  ));

        if (!$u ) {
            throw $this->createNotFoundException("No entreprise " . $request->get('nom_Entreprise'));
            // return $this->redirectToRoute("affiche");
        }
        return $this->render("dachborde/listeentreprise.html.twig", [
            "Entreprise" => $u
        ]);
    }

    /**
     * @route("/rechercheOffre" , name="rechercheOffre")
     */
    public function rechercheOffre (Request $request )
    {
        $params = $request->query->all(); 
        $u =$this->getDoctrine()->getRepository(Offreentreprise::class)->findby(array('titre' =>  $request->get('titre')  ));

        if (!$u ) {
            throw $this->createNotFoundException("No entreprise " . $request->get('titre'));
            // return $this->redirectToRoute("affiche");
        }
        return $this->render("dachborde/listeOffres.html.twig", [
            "Offres" => $u
        ]);
    }

     



    /**
     * @Route("/ModificationCategorie/{titre,description ,id}",name="ModificationCategorie")
     * 
     */
    public function ModificationCategorie(Request $request ){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager();


        $u =$this->getDoctrine()->getRepository(Categorieoffre::class)->find($request->get('id'));


        $u->setTitre($request->get('titre'));
        $u->setDescription($request->get('description')); 

 
     
            $entityManager->persist($u); 
            $entityManager->flush(); 
        
        return $this->redirectToRoute('listeCategories'); 

    }


    /**
     * @route("/supprimerCategories/{id}",name="supprimerCategories")
     */
    public function supprimerCategories( Request $request ,$id ) {
        $em=$this->getDoctrine()->getManager();
        $repo=$em->getRepository( Categorieoffre::class) ;
        $Categorieoffre   = $repo->find($id);
        if(! $Categorieoffre){
            throw $this->createNotFoundException("No Categori eoffre".$id);
        }
        $em->remove($Categorieoffre);
        $em->flush();

        return $this->redirectToRoute('listeCategories');
    }


    /**
     * @Route("/listeCategories", name="listeCategories")
     */
    public function listeCategories()
    {
        $Categories = $this->getDoctrine()->getRepository(Categorieoffre::class)->findAll();
        return $this->render('dachborde/categoriesOffre.html.twig', [
            'Categories' => $Categories,
        ]);
    }


    /**
     * @Route("/AjouteCategorie/{titre,description }",name="AjouteCategorie")
     * 
     */
    public function AjouteCategorie(Request $request){
        
        $params = $request->query->all();
        $entityManager = $this->getDoctrine()->getManager(); 
        $Categorieoffre  = new Categorieoffre();
        $Categorieoffre->setTitre($request->get('titre'));  
        $Categorieoffre->setDescription($request->get('description'));     
        
        // $file = $request->files->get('image');
        // $fileName = md5(uniqid()).'.'.$file->guessExtension();
        // $file->move('/public/images',$fileName);

        // $Categorieoffre->setImage($request->get($fileName));

        $Categorieoffre->setImage("image");

        $entityManager->persist($Categorieoffre); 
        $entityManager->flush(); 
            
        
        return $this->redirectToRoute('listeCategories'); 

    }

 


}
