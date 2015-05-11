<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use projetGSB\projetGsbBundle\Entity\LigneHorsForfait;
use projetGSB\projetGsbBundle\Form\LigneHorsForfaitType;

/**
 * LigneHorsForfait controller.
 *
 */
class LigneHorsForfaitController extends Controller
{

    /**
     * Lists all LigneHorsForfait entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->findAll();

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new LigneHorsForfait entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new LigneHorsForfait();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lignehorsforfait_show', array('id' => $entity->getId())));
        }

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a LigneHorsForfait entity.
     *
     * @param LigneHorsForfait $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LigneHorsForfait $entity)
    {
        $form = $this->createForm(new LigneHorsForfaitType(), $entity, array(
            'action' => $this->generateUrl('lignehorsforfait_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LigneHorsForfait entity.
     *
     */
    public function newAction()
    {
        $entity = new LigneHorsForfait();
        $form   = $this->createCreateForm($entity);

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LigneHorsForfait entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneHorsForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LigneHorsForfait entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneHorsForfait entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a LigneHorsForfait entity.
    *
    * @param LigneHorsForfait $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LigneHorsForfait $entity)
    {
        $form = $this->createForm(new LigneHorsForfaitType(), $entity, array(
            'action' => $this->generateUrl('lignehorsforfait_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LigneHorsForfait entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneHorsForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lignehorsforfait_edit', array('id' => $id)));
        }

        return $this->render('projetGSBprojetGsbBundle:LigneHorsForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a LigneHorsForfait entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneHorsForfait')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LigneHorsForfait entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lignehorsforfait'));
    }

    /**
     * Creates a form to delete a LigneHorsForfait entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lignehorsforfait_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
