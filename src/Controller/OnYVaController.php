<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\Voyage;
use App\Entity\Reservation;
use App\Entity\Utilisateur;
use App\Form\ReservationType;
use App\Form\EditerProfilType;
use App\Form\ProposerVoyageType;
use App\Form\RechercherVoyageType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class OnYVaController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('on_y_va/index.html.twig', [
            'controller_name' => 'OnYVaController',
        ]);
    }

     /**
     * @Route("/rechercher", name="rechercher_voyage")
     */
    public function rechercher_voyage(Request $request, ObjectManager $manager)
    {
        $voyage=new Voyage();
        $form=$this->createForm(RechercherVoyageType::class, $voyage);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $repository = $this->getDoctrine()->getRepository(Voyage::class);
            $voyages = $repository->findAll();

            return $this->render('on_y_va/rechercher_voyage.html.twig', [
                'controller_name' => 'OnYVaController',
                'form' => $form->createView(),
                'voyages' => $voyages,
            ]);
        }

        return $this->render('on_y_va/rechercher_voyage.html.twig', [
            'controller_name' => 'OnYVaController',
            'form' => $form->createView()
        ]);
    }
    

     /**
     * @Route("/proposer", name="proposer_voyage")
     */
    public function proposer_voyage(Request $request, ObjectManager $manager)
    {
        $voyage=new Voyage();
        $form=$this->createForm(ProposerVoyageType::class, $voyage);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $voyage->setConducteur($this->getUser());
            $voyage->setDateAjout(new \DateTime);

            $manager->persist($voyage);
            $manager->flush();
            $this->addFlash('success', 'Votre voyage à bien été ajouté.');

            return $this->redirectToRoute('voyage_show', ['id' => $voyage->getId()]);
        }

        

        return $this->render('on_y_va/proposer_voyage.html.twig', [
            'controller_name' => 'OnYVaController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/voyage{id}", name="voyage_show")
     */
    public function show(Voyage $voyage, Request $request, ObjectManager $manager) //Injection dépendance avec param converter
    {
        return $this->render('on_y_va/voyage.html.twig', [
            'controller_name' => 'OnYVaController',
            'voyage' => $voyage,
            
        ]);
    }

    /**
     * @Route("/reserver_voyage{id}", name="reserver_voyage")
     */
    public function reserver(Voyage $voyage, Request $request, ObjectManager $manager) //Injection dépendance avec param converter
    {
        $reservation=new Reservation();
        $form=$this->createForm(ReservationType::class, $reservation);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $reservation->setVoyage($voyage);
            $reservation->setPassager($this->getUser());
            $reservation->setDate(new \DateTime);
            $reservation->setConfirm(false);

            $manager->persist($reservation);
            $manager->flush();
            $this->addFlash('success', 'Votre reservation à bien été ajouté.');

            return $this->redirectToRoute('voyage_show', ['id' => $voyage->getId()]);
        }

        

        return $this->render('on_y_va/reserver_voyage.html.twig', [
            'controller_name' => 'OnYVaController',
            'form' => $form->createView(),
            'voyage' => $voyage,
        ]);
    }

     /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(Request $request, ObjectManager $manager)
    {
        $util= $this->getUser();
        $form=$this->createForm(EditerProfilType::class, $util);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
          

            $manager->persist($util);
            $manager->flush();
            $this->addFlash('success', 'Votre compte à bien été modifié.');

        }

        return $this->render('on_y_va/dashboard.html.twig', [
            'controller_name' => 'OnYVaController',
            'form' => $form->createView()
        ]);
    }


    /**
 * @Route("/search-ville", name="search_ville", defaults={"_format"="json"})
 * @Method("GET")
 */
public function searchVilleAction(Request $request)
{
    $q = $request->query->get('term'); // use "term" instead of "q" for jquery-ui
    $results = $this->getDoctrine()->getRepository('App:Ville')->findLike($q);

    return $this->render("on_y_va/search.json.twig", ['villes' => $results]);
}

public function getVille($id = null): Response
{
    $ville = $this->getDoctrine()->getRepository('App:Ville')->find($id);

    return $this->json($ville->getName());
}
     
}
