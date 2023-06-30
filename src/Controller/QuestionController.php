<?php

namespace App\Controller;

use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Question;
use App\Form\Type\QuestionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController {

    #[Route('/question/new')]
    public function new(Request $request): Response
    {
        $question = new Question();

        $form = $this->createFormBuilder($question)
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('message', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Send Question'])
            ->getForm();

        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $question = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('question_success');
        }

        return $this->render('question/new.html.twig', [
            'form' => $form,
        ]);
    }
}
?>