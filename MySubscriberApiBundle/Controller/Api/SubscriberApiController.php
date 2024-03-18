<?php
// MySubscriberApiBundle/Controller/Api/SubscriberApiController.php

namespace MauticPlugin\MySubscriberApiBundle\Controller\Api;

use Mautic\ApiBundle\Controller\CommonApiController;
use Mautic\CoreBundle\Templating\Helper\ResponseHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MauticPlugin\MySubscriberApiBundle\Entity\Subscriber;

class SubscriberApiController extends CommonApiController
{
    public function createAction(Request $request)
    { //die('jjjjjj');
        $data = $request->request->all();

        $subscriber = new Subscriber();
        $subscriber->setUsername($data['username']);
        $subscriber->setStatus($data['status']);
        $subscriber->setExpireDate(new \DateTime($data['expire_date']));

        $em = $this->getDoctrine()->getManager();
        $em->persist($subscriber);
        $em->flush();

        return new JsonResponse(['success' => true, 'id' => $subscriber->getId()], Response::HTTP_CREATED);
    }

    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Subscriber::class);
        $subscribers = $repository->findAll();

        $subscriberData = [];

        foreach ($subscribers as $subscriber) {
            $subscriberData[] = [
                'id' => $subscriber->getId(),
                'username' => $subscriber->getUsername(),
                'expire_date' => $subscriber->getExpireDate()->format(\DateTimeInterface::ATOM),
                'status' => $subscriber->getStatus()
            ];
        }

        return new JsonResponse($subscriberData);
    }

    public function getEntityAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $subscriber = $em->getRepository(Subscriber::class)->find($id);

        if (!$subscriber) {
            return new JsonResponse(['message' => 'Subscriber not found'], Response::HTTP_NOT_FOUND);
        }

        $data = [
            'id' => $subscriber->getId(),
            'username' => $subscriber->getUsername(),
            'expire_date' => $subscriber->getExpireDate()->format(\DateTimeInterface::ATOM),
            'status' => $subscriber->getStatus()
        ];

        return new JsonResponse($data);
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $subscriber = $em->getRepository(Subscriber::class)->find($id);

        if (!$subscriber) {
            return new JsonResponse(['message' => 'Subscriber not found'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($subscriber);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}