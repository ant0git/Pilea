<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\DataValue;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        return $this->render('dashboards/homepage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/electricity", name="general")
     */
    public function electricityAction(Request $request)
    {
        return $this->render('dashboards/electricity.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/dju_x_conso", name="dju_x_conso")
     */
    public function djuXconsoAction(Request $request)
    {
        return $this->render('dashboards/dju_x_conso.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/meteo", name="meteo")
     */
    public function meteoAction(Request $request)
    {
        return $this->render('dashboards/meteo.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        return $this->render('pages/about.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    public function periodAction()
    {
        $period = $this
            ->getDoctrine()
            ->getRepository('App:DataValue')
            ->getPeriodDataAmplitude();

        return $this->render('misc/period.html.twig', [
            'period' => $period[0],
        ]);
    }
}