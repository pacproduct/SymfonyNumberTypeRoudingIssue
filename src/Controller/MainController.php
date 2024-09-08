<?php

namespace App\Controller;

use App\Form\NumberTypeTestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    public const TEST_VALUE = 1.2345;
    #[Route('/', name: 'app_main')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(NumberTypeTestType::class);
        $form->add('submit', SubmitType::class, ['label' => 'Submit']);
        $form->handleRequest($request);

        $formData = null;
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $formData = $form->getData();
                $this->addFlash(
                    'success',
                    var_export($formData, true),
                );
            }
        }

        return $this->render(
            'index.html.twig',
            [
                'formData' => $formData,
                'form' => $form->createView(),
            ]
        );
    }
}
