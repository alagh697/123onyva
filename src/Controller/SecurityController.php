<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_inscription")
     */
    public function inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $util=new Utilisateur();
        $form=$this->createForm(InscriptionType::class, $util);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash=$encoder->encodePassword($util, $util->getMotdepasse());
            $util->setMotdepasse($hash);
            $util->setDateInscription(new \DateTime);
            $util->setEmailVerif(false);
            $manager->persist($util);
            $manager->flush();
            $this->addFlash('success', 'Votre compte à bien été enregistré.');

            return $this->redirectToRoute('security_connexion');
        }

        return $this->render('security/inscription.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion", name="security_connexion")
     */
    public function login()
    {
        return $this->render('security/connexion.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_deconnexion")
     */
    public function logout()
    {
        
    }
}
