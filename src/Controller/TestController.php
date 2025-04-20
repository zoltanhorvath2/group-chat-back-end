<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestController extends AbstractController
{
    #[Route('/api/test', name: 'app_test')]
    public function test(): Response
    {
        return $this->json(
            [
                [
                    'id' => 1,
                    'messageText' => 'egy kismalac röf röf röf',
                ],
                [
                    'id' => 2,
                    'messageText' => 'Trombitálgat töf töf töf',
                ],

                [
                    'id' => 3,
                    'messageText' => 'Trombitája, víg orrmánya',
                ],
                [
                    'id' => 4,
                    'messageText' => 'Földet túrja, döf döf döf.',
                ]
            ],
            Response::HTTP_OK,
            ['Content-Type' => 'application/json']
        );
    }
}
