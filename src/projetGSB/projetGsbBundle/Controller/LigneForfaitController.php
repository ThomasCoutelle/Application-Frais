<?php

namespace projetGSB\projetGsbBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use projetGSB\projetGsbBundle\Entity\LigneForfait;
use projetGSB\projetGsbBundle\Form\LigneForfaitType;

/**
 * LigneForfait controller.
 *
 */
class LigneForfaitController extends Controller
{

    /**
     * Lists all LigneForfait entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('projetGSBprojetGsbBundle:LigneForfait')->findAll();

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new LigneForfait entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new LigneForfait();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ligneforfait_show', array('id' => $entity->getId())));
        }

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a LigneForfait entity.
     *
     * @param LigneForfait $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LigneForfait $entity)
    {
        $form = $this->createForm(new LigneForfaitType(), $entity, array(
            'action' => $this->generateUrl('ligneforfait_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LigneForfait entity.
     *
     */
    public function newAction()
    {
        $entity = new LigneForfait();
        $form   = $this->createCreateForm($entity);

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a LigneForfait entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing LigneForfait entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneForfait entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a LigneForfait entity.
    *
    * @param LigneForfait $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LigneForfait $entity)
    {
        $form = $this->createForm(new LigneForfaitType(), $entity, array(
            'action' => $this->generateUrl('ligneforfait_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LigneForfait entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LigneForfait entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ligneforfait_edit', array('id' => $id)));
        }

        return $this->render('projetGSBprojetGsbBundle:LigneForfait:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a LigneForfait entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('projetGSBprojetGsbBundle:LigneForfait')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LigneForfait entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ligneforfait'));
    }

    /**
     * Creates a form to delete a LigneForfait entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligneforfait_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
