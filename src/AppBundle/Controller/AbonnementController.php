<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Abonnement;
use AppBundle\Entity\ListeUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Abonnement controller.
 *
 * @Route("abonnement")
 */
class AbonnementController extends Controller
{
    /**
     * Lists all abonnement entities.
     *
     * @Route("/", name="abonnement_index")
     * @Method("GET")
     */
    public function indexAction()

    {  $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['username'=>strval($user)]);
        if( $abon==null)
        {
            $em = $this->getDoctrine()->getManager();

            $abonnements = $em->getRepository('AppBundle:Abonnement')->findAll();

            return $this->render('abonnement/index.html.twig', array(
                'abonnements' => $abonnements,
            ));


        }
        else
        {

            $em = $this->getDoctrine()->getManager();

            $abonnements = $em->getRepository('AppBundle:Abonnement')->findBy(['UserId'=>$abon->getIduser()],['id'=>'DESC']);

            return $this->render('abonnement/index.html.twig', array(
                'abonnements' => $abonnements,
            ));

        }

    }

    /**
     * Creates a new abonnement entity.
     *
     * @Route("/new", name="abonnement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['username'=>strval($user)]);

        $abon = $em->getRepository('UserBundle:User')->findOneBy(['id'=>$abon->getIduser()]);

        $abonnement = new Abonnement();
        $form = $this->createForm('AppBundle\Form\AbonnementType', $abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $date = new \DateTime();
            $abonnement->setDateDebut($date);
            $abonnement->setDateFin($date);
            $abonnement->setMontantAbonnement(100);
            $abonnement->setUserId( $abon->getId());
            $em->persist($abonnement);
            $em->flush();
            return $this->redirectToRoute('abonnement_show', array('id' => $abonnement->getId()));
        }

        return $this->render('abonnement/new.html.twig', array(
            'abonnement' => $abonnement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a abonnement entity.
     *
     * @Route("/{id}", name="abonnement_show")
     * @Method("GET")
     */
    public function showAction(Abonnement $abonnement)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $deleteForm = $this->createDeleteForm($abonnement);

        return $this->render('abonnement/show.html.twig', array(
            'abonnement' => $abonnement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing abonnement entity.
     *
     * @Route("/{id}/edit", name="abonnement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Abonnement $abonnement)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $deleteForm = $this->createDeleteForm($abonnement);
        $editForm = $this->createForm('AppBundle\Form\AbonnementType', $abonnement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('abonnement_edit', array('id' => $abonnement->getId()));
        }

        return $this->render('abonnement/edit.html.twig', array(
            'abonnement' => $abonnement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a abonnement entity.
     *
     * @Route("/{id}", name="abonnement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Abonnement $abonnement)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $form = $this->createDeleteForm($abonnement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($abonnement);
            $em->flush();
        }

        return $this->redirectToRoute('abonnement_index');
    }

    /**
     * Creates a form to delete a abonnement entity.
     *
     * @param Abonnement $abonnement The abonnement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Abonnement $abonnement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('abonnement_delete', array('id' => $abonnement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
