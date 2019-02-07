<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Offre;
use AppBundle\Entity\ListeUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use mysqli_result;
use AppBundle\Repository;

/**
 * Listeuser controller.
 *
 * @Route("listeuser")
 */
class ListeUserController extends Controller
{
    /**
     * Lists all listeUser entities.
     *
     * @Route("/", name="listeuser_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listeUsers = $em->getRepository('AppBundle:ListeUser')->ListeDesAgriEtChamp();
        return $this->render('listeuser/index.html.twig', array(
            'listeUsers' => $listeUsers,
        ));
    }

    /**
     * Creates a new listeUser entity.
     *
     * @Route("/new", name="listeuser_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $listeUser = new Listeuser();
        $form = $this->createForm('AppBundle\Form\ListeUserType', $listeUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($listeUser);
            $em->flush();

            return $this->redirectToRoute('listeuser_show', array('id' => $listeUser->getId()));
        }

        return $this->render('listeuser/new.html.twig', array(
            'listeUser' => $listeUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a listeUser entity.
     *
     * @Route("/{id}", name="listeuser_show")
     * @Method("GET")
     */
    public function showAction(ListeUser $listeUser, Offre $offre=null)
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }

        $deleteForm = $this->createDeleteForm($listeUser);


        return $this->render('listeuser/show.html.twig', array(
            'listeUser' => $listeUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing listeUser entity.
     *
     * @Route("/{id}/edit", name="listeuser_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ListeUser $listeUser)
    {
        $deleteForm = $this->createDeleteForm($listeUser);
        $editForm = $this->createForm('AppBundle\Form\ListeUserType', $listeUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('listeuser_edit', array('id' => $listeUser->getId()));
        }

        return $this->render('listeuser/edit.html.twig', array(
            'listeUser' => $listeUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a listeUser entity.
     *
     * @Route("/{id}", name="listeuser_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ListeUser $listeUser)
    {
        $form = $this->createDeleteForm($listeUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($listeUser);
            $em->flush();
        }

        return $this->redirectToRoute('listeuser_index');
    }

    /**
     * Creates a form to delete a listeUser entity.
     *
     * @param ListeUser $listeUser The listeUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ListeUser $listeUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('listeuser_delete', array('id' => $listeUser->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
