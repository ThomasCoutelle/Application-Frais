<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use projetGSB\projetGsbBundle\Entity\EtatFiche;
use projetGSB\projetGsbBundle\Form\EtatFicheType;

/**
 * EtatFiche controller.
 *
 */
class EtatFicheController extends Controller
{

    /**
     * Lists all EtatFiche entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('projetGSBprojetGsbBundle:EtatFiche')->findAll();

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EtatFiche entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EtatFiche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etatfiche_show', array('id' => $entity->getId())));
        }

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EtatFiche entity.
     *
     * @param EtatFiche $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(EtatFiche $entity)
    {
        $form = $this->createForm(new EtatFicheType(), $entity, array(
            'action' => $this->generateUrl('etatfiche_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EtatFiche entity.
     *
     */
    public function newAction()
    {
        $entity = new EtatFiche();
        $form   = $this->createCreateForm($entity);

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EtatFiche entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatFiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatFiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EtatFiche entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatFiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatFiche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EtatFiche entity.
    *
    * @param EtatFiche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EtatFiche $entity)
    {
        $form = $this->createForm(new EtatFicheType(), $entity, array(
            'action' => $this->generateUrl('etatfiche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EtatFiche entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatFiche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EtatFiche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etatfiche_edit', array('id' => $id)));
        }

        return $this->render('projetGSBprojetGsbBundle:EtatFiche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EtatFiche entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('projetGSBprojetGsbBundle:EtatFiche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EtatFiche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etatfiche'));
    }

    /**
     * Creates a form to delete a EtatFiche entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etatfiche_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
