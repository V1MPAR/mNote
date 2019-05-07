<?php

namespace App\Controller;

use App\Entity\Note;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    /**
     * @Route("/", name="app_notes")
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(Note::class);

        $notes = $repository->findAll();
        return $this->render('note/index.html.twig', [
            'notes' =>
            $paginator->paginate($notes, $request->query->getInt('page', 1), 3),
            'notesCount' => $repository->findAll(),
        ]);
    }
}
