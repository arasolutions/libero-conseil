<?php

namespace App\Controller;

use App\Command\Contact;
use App\Entity\Bureaux;
use App\Entity\Members;
use App\Entity\SubjectType;
use App\Enum\SubjectTypeEnum;
use App\Helper\KiwiHelper;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /**
     * ContactController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $success = null;

        $form = $this->createContactForm($request);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            /** @var UploadedFile $uploaded */
            $uploaded = $datas->getFile();
            $message = (new \Swift_Message($_ENV['SUBJECT_MAIL']))
                ->setFrom($_ENV['SENDER_MAIL'])
                ->setTo($_ENV['RECEIVER_MAIL'])
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        ['datas' => $datas]),
                    'text/html'
                );
            if ($uploaded != 'Aucun') {
                $message->attach(
                    \Swift_Attachment::fromPath($uploaded->getRealPath())
                        ->setFilename($uploaded->getClientOriginalName())
                );
            }
            $sent = $mailer->send($message);

            if ($sent > 0) {
                $form = $this->createContactForm($request);
                $success = true;
            } else {
                $success = false;
            }
        }

        $json = KiwiHelper::list(160, array(
            'order' => 'id%2Casc'
        ));

        /** @var Bureaux $bureaux */
        $bureaux = $this->serializer->deserialize($json, Bureaux::class, 'json');

        return $this->render('contact/index.html.twig', [
            'active' => 'contact',
            'form' => $form->createView(),
            'bureaux' => $bureaux->getItems(),
            'success' => $success
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createContactForm(Request $request)
    {
        /** @var FormBuilderInterface $form */
        $form = $this->createFormBuilder(new Contact())
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Nom *'
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Email *'
            ]);
        if ($request->get('poste')) {
            $form->
            add('subject', ChoiceType::class, [
                'label' => 'Sujet',
                'choices' => [
                    0 => new SubjectType('Demande d’information', 0),
                    1 => new SubjectType('Candidature spontanée', 1)
                ],
                'choice_label' => function (SubjectType $choice, $key, $value) {
                    return $choice->getLabel();
                },
                'choice_value' => function (SubjectType $choice = null) {
                    return $choice != null ? $choice->getValue() : ' ';
                },
                'data' => new SubjectType('Candidature spontanée', 1)
            ])
                ->add('message', TextareaType::class, [
                    'data' => 'Réponse à l\'annonce ' . $request->get('poste')
                ]);
        } else {
            $form->
            add('subject', ChoiceType::class, [
                'label' => 'Sujet',
                'choices' => [
                    new SubjectType('Demande d’information', 0),
                    new SubjectType('Candidature spontanée', 1)
                ],
                'choice_label' => function (SubjectType $choice, $key, $value) {
                    return $choice->getLabel();
                },
                'choice_value' => function (SubjectType $choice = null) {
                    return $choice != null ? $choice->getValue() : ' ';
                }])
                ->add('message', TextareaType::class);
        }
        $form->add('file', FileType::class, [
            'required' => false,
            'empty_data' => 'Aucun'
        ])->add('submit', SubmitType::class, ['label' => 'Envoyer']);


        return $form->getForm();
    }
}
