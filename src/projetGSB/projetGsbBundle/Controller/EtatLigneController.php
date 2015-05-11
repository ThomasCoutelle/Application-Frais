<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use projetGSB\projetGsbBundle\Entity\EtatLigne;
use projetGSB\projetGsbBundle\Form\EtatLigneType;

/**
 * EtatLigne controller.
 *
 */
class EtatLigneController extends Controller
{

    /**
     * Lists all EtatLigne entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('projetGSBprojetGsbBundle:EtatLigne')->findAll();

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EtatLigne entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EtatLigne();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etatligne_show', array('id' => $entity->getId())));
        }

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EtatLigne entity.
     *
     * @param EtatLigne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EtatLigne $entity)
    {
        $form = $this->createForm(new EtatLigneType(), $entity, array(
            'action' => $this->generateUrl('etatligne_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EtatLigne entity.
     *
     */
    public function newAction()
    {
        $entity = new EtatLigne();
        $form   = $this->createCreateForm($entity);

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EtatLigne entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatLigne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatLigne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtatLigne entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatLigne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatLigne entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EtatLigne entity.
    *
    * @param EtatLigne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EtatLigne $entity)
    {
        $form = $this->createForm(new EtatLigneType(), $entity, array(
            'action' => $this->generateUrl('etatligne_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EtatLigne entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatLigne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatLigne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etatligne_edit', array('id' => $id)));
        }

        return $this->render('projetGSBprojetGsbBundle:EtatLigne:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EtatLigne entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatLigne')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EtatLigne entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etatligne'));
    }

    /**
     * Creates a form to delete a EtatLigne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etatligne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
