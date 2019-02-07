<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Offre;

use AppBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Service\FileUploader;
use Symfony\Component\Validator\Constraints\DateTime;



/**
 * Offre controller.
 *
 * @Route("offre")
 */
class OffreController extends Controller
{
    /**
     * Lists all offre entities.
     *
     * @Route("/", name="offre_index")
     * @Method("GET")
     */
    public function indexAction()

    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }

        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['username'=>strval($user)]);

        if($abon==null)
        {

            $em = $this->getDoctrine()->getManager();

            $offres = $em->getRepository('AppBundle:Offre')->findBy([],['valide'=>'DESC']);

            return $this->render('offre/index.html.twig', array(
                'offres' => $offres,
            ));


        }
        else
        {

            $em = $this->getDoctrine()->getManager();

            $offres = $em->getRepository('AppBundle:Offre')->findBy(['valide'=>true],['id'=>'DESC']);

            return $this->render('offre/index.html.twig', array(
                'offres' => $offres,
            ));

        }

    }

    /**
     * Creates a new offre entity.
     *
     * @Route("/new", name="offre_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {


        $user = $this->getUser()
        ;


        if($user == null){
            return $this->redirectToRoute('login'); 
        }
        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['username'=>strval($user)]);
        $abon = $em->getRepository('UserBundle:User')->findOneBy(['id'=>$abon->getIduser()]);

        $offre = new Offre();
        $form = $this->createForm('AppBundle\Form\OffreType', $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $offre->setValide(false);
            $date = new \DateTime();
            $offre->setDateDebut($date);
            $offre->setDateFin($date);
            $offre->setUserId( $abon->getId());
             //$file = $offre->getImage();

            /*dump($file);
            die();*/
            $em->persist($offre);
           $em->flush();

            return $this->redirectToRoute('offre_show', array('id' => $offre->getId()));
        }

        return $this->render('offre/new.html.twig', array(
            'offre' => $offre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offre entity.
     *
     * @Route("/{id}", name="offre_show")
     * @Method("GET")
     */
    public function showAction(Offre $offre)

    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $deleteForm = $this->createDeleteForm($offre);
        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['iduser'=>$offre->getUserId()]);


        return $this->render('offre/show.html.twig', array(
            'offre' => $offre,
            'delete_form' => $deleteForm->createView(),
            'listeuser'=>$abon,
        ));
    }

    /**
     * Displays a form to edit an existing offre entity.
     *
     * @Route("/{id}/edit", name="offre_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Offre $offre)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
      /*  $deleteForm = $this->createDeleteForm($offre);
        $editForm = $this->createForm('AppBundle\Form\OffreType', $offre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offre_edit', array('id' => $offre->getId()));
        }

        return $this->render('offre/edit.html.twig', array(
            'offre' => $offre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ))*/
        $offre->setValide(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($offre);
        $em->flush();
        return $this->redirectToRoute('offre_index');

    }

    /**
     * Deletes a offre entity.
     *
     * @Route("/{id}", name="offre_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Offre $offre)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $form = $this->createDeleteForm($offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offre);
            $em->flush();
        }

        return $this->redirectToRoute('offre_index');
    }

    /**
     * Creates a form to delete a offre entity.
     *
     * @param Offre $offre The offre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Offre $offre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offre_delete', array('id' => $offre->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
