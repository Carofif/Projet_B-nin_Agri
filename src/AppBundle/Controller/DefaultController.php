<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        if($user == null)
        {

            return $this->render('BlockAccueil/base.html.twig'
            );
        }
            else
            {
                return $this->render('default/dashboard.html.twig'
                );
            }
        }
//

//        return $this->render('default/index.html.twig', [
//            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
//        ]);

    /**
     * @Route("/test2", name="log2")
     */
    public function testAction(Request $request)
    {

    return $this->render('autre/affichageArticle.html.twig');

    }


    /**
     * @Route("/marche", name="marche")
     */
    public function MarcheAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offre = $em->getRepository('AppBundle:Offre')->findBy(['valide'=>true],['id'=>'DESC'],3);

        $demande = $em->getRepository('AppBundle:Demande')->findBy(['valide'=>true],['id'=>'DESC'],3);
//        dump($offre);die();
    return $this->render('offre/ofrreDemandeListe.html.twig',['offres'=>$offre,'demandes'=>$demande]
        );

    }
    /**
     * @Route("/offreliste", name="offreliste")
     */
    public function OffreListeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offre = $em->getRepository('AppBundle:Offre')->findBy(['valide'=>true],['id'=>'DESC'],3);

//        dump($offre);die();
        return $this->render('offre/OffreListe.html.twig',['offres'=>$offre]
        );

    }
    /**
     * @Route("/Demandeliste", name="Demandeliste")
     */
    public function DemandeListeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $demande = $em->getRepository('AppBundle:Demande')->findBy(['valide'=>true],['id'=>'DESC'],3);
//        dump($offre);die();
        return $this->render('demande/DemandeListe.html.twig',['demandes'=>$demande]
        );

    }
    /**
     * @Route("/accueil2", name="acceuil2")
     */
    public function WelAction(Request $request)
    {

        return $this->render('BlockAccueil/base.html.twig'
        );

    }
    /**
     * @Route("/apropos", name="apropos")
     */
    public function AproposAction(Request $request)
    {

        return $this->render('apropos.html.twig'
        );

    }
    /**
     * @Route("/contact", name="contact")
     */
    public function ContactAction(Request $request)
    {

        return $this->render('contact.html.twig'
        );

    }
    
}
