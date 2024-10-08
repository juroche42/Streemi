<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\SubscriptionRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SubscriptionController extends AbstractController
{
    #[Route(path: '/subscription', name: 'subscription')]
    public function index(SubscriptionRepository $subscriptionRepository) : Response
    {
        $subscriptions = $subscriptionRepository->findAll();
        return $this->render('abonnements.html.twig',
            ['subscriptions' => $subscriptions]
        );
    }

}