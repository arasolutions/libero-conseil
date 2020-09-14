<?php

namespace App\Controller;

use App\Entity\Jobs;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PosteController extends AbstractController
{

    /** @var SerializerInterface */
    private $serializer;

    /**
     * PosteController constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }


    /**
     * @Route("/poste", name="poste")
     */
    public function index()
    {

        $datas = file_get_contents($_SERVER['LIBERO_JOBS_PUBLISH_URL']);

        $jobs = $this->serializer->deserialize($datas, Jobs::class, 'json');

        return $this->render('poste/index.html.twig', [
            'active' => 'poste',
            'jobs' => $jobs
        ]);
    }

    /**
     * @Route("/poste/{id}", name="poste_detail")
     */
    public function posteDetail($id)
    {

        $datas = file_get_contents(sprintf($_SERVER['LIBERO_JOB_URL'], $id));

        /** @var Jobs $job */
        $job = $this->serializer->deserialize($datas, Jobs::class, 'json');

        return $this->render('poste/detail.html.twig', [
            'active' => 'poste',
            'job' => $job->getData()[0]
        ]);
    }
}
