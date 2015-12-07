<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class MainController extends Controller
{
    public function paginator($array)
    {
        $request = $request = Request::createFromGlobals();
        $page = $request->query->get('page');
        if(!isset($page))
        {
            $page = 1;
        }
        $adapter = new ArrayAdapter($array);
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta->setMaxPerPage(10);

        try
        {
            $pagerfanta->setCurrentPage($page);
        }
        catch(NotValidCurrentPageException $e)
        {
            throw new NotFoundHttpException();
        }

        return $pagerfanta;
    }
}
