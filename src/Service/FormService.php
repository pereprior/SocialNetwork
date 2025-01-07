<?php

namespace App\Service;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ObjectManager;

class FormService
{
    private FormFactoryInterface $formFactory;
    private ObjectManager $manager;

    public function __construct(FormFactoryInterface $formFactory, ManagerRegistry $doctrine)
    {
        $this->formFactory = $formFactory;
        $this->manager = $doctrine->getManager();
    }

    public function handleForm($entity, $formType, $manager, callable $setForm, Request $request, callable $onsuccess): FormInterface
    {
        $form = $this->formFactory->create($formType, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();

            $setForm($entity);

            $manager->persist($entity);
            $manager->flush();

            $onsuccess();
        }

        return $form;
    }
}