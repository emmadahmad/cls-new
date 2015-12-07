<?php

namespace AppBundle\Controller;

use AppBundle\Controller\MainController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends MainController
{
    public function homeAction($category_id = 'all', $skill_id = 4)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $request = Request::createFromGlobals();
        $sorting = $request->query->get('sorting');
        if(!isset($sorting))
        {
            $sorting = 'date_dsc';
        }
        $array = $em->getRepository('AppBundle:Course')->getBySkills($skill_id, $sorting);
        $courses = $this->paginator($array);

        return $this->render(':default/home:home.html.twig',
            array(
                'skill_id' => $skill_id,
                'courses' => $courses,
                'sorting' => $sorting,
            )
        );
    }
}