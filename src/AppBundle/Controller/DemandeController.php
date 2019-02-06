<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Demande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Demande controller.
 *
 * @Route("demande")
 */
class DemandeController extends Controller
{
    /**
     * Lists all demande entities.
     *
     * @Route("/", name="demande_index")
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

            $demandes = $em->getRepository('AppBundle:Demande')->findBy([],['valide'=>'DESC']);

            return $this->render('demande/index.html.twig', array(
                'demandes' => $demandes,
            ));


        }
        else
        {

            $em = $this->getDoctrine()->getManager();

            $demandes = $em->getRepository('AppBundle:Demande')->findBy(['valide'=>true],['id'=>'DESC']);

            return $this->render('demande/index.html.twig', array(
                'demandes' => $demandes,
            ));

        }
    }

    /**
     * Creates a new demande entity.
     *
     * @Route("/new", name="demande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $this->denyAccessUnlessGranted(['ROLE_CLIENT'], null, "Vous n'avez pas les droit ");
        $em = $this->getDoctrine()->getManager();

        $abon = $em->getRepository('AppBundle:ListeUser')->findOneBy(['username'=>$user]);
        $abon = $em->getRepository('UserBundle:User')->findOneBy(['id'=>$abon->getIduser()]);
        $demande = new Demande();
        $form = $this->createForm('AppBundle\Form\DemandeType', $demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $demande->setValide(false);
            $date = new \DateTime();
            $demande->setDateDebut($date);
            $demande->setDateFin($date);
            $demande->setUserId( $abon->getId());
            $em->persist($demande);
            $em->flush();

            return $this->redirectToRoute('demande_show', array('id' => $demande->getId()));
        }

        return $this->render('demande/new.html.twig', array(
            'demande' => $demande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demande entity.
     *
     * @Route("/{id}", name="demande_show")
     * @Method("GET")
     */
    public function showAction(Demande $demande)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $deleteForm = $this->createDeleteForm($demande);

        return $this->render('demande/show.html.twig', array(
            'demande' => $demande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demande entity.
     *
     * @Route("/{id}/edit", name="demande_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Demande $demande)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $deleteForm = $this->createDeleteForm($demande);
        $editForm = $this->createForm('AppBundle\Form\DemandeType', $demande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demande_edit', array('id' => $demande->getId()));
        }

        return $this->render('demande/edit.html.twig', array(
            'demande' => $demande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demande entity.
     *
     * @Route("/{id}", name="demande_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Demande $demande)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        $form = $this->createDeleteForm($demande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demande);
            $em->flush();
        }

        return $this->redirectToRoute('demande_index');
    }

    /**
     * Creates a form to delete a demande entity.
     *
     * @param Demande $demande The demande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demande $demande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demande_delete', array('id' => $demande->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    /**
     * Creates a new demande entity.
     *
     * @Route("/accesDemande", name="demande_acces")
     * @Method({"GET", "POST"})
     */
    public function AccesAction(Demande $demande)
    {
        return $this->redirectToRoute('deman', array('id' => $demande->getId()));

    }
}
