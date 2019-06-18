<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Departement;
use App\Form\ContactType;
use App\notification\ContactNotification;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;



class ContactController extends AbstractFOSRestController
{


    public function getContact()
    {
        $contact = $this->getDoctrine()->getRepository(Contact::class)->findall();
        return $this->handleView($this->view($contact));
    }


    public function postContact(Request $request,ContactNotification $notif)
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->submit($request->request->all());
        $contact->setDepartement($this->getDoctrine()->getManager()->getRepository(Departement::class)->find($request->get('departement_id')));
        if ($form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $notif->notify($contact);
            $manager->persist($contact);
            $manager->flush();

            return new JsonResponse([
                "success" => true
            ]);
        }
        else {
            return new JsonResponse([
                'success' => false
            ]);
        }

    }
}
