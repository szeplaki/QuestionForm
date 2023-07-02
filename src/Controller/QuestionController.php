<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Message;
use App\Form\Type\QuestionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController {

    #[Route('/question/new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $question = new Question();

        $form = $this->createFormBuilder($question)
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('message', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $question = $form->getData();
            $message = new Message();
            $message->setName($form["name"]->getData());
            $message->setEmail($form["email"]->getData());
            $message->setQuestion($form["message"]->getData());
            $entityManager->persist($message);
            $entityManager->flush();

            return $this->render('question/success.html.twig');
        }

        return $this->render('question/new.html.twig', [
            'form' => $form
        ]);
    }
}
?>