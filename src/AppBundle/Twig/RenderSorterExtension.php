<?php

namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class RenderSorterExtension extends \Twig_Extension
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('sortingPath', array($this, 'setSortingPath')),
            new \Twig_SimpleFilter('sortingName', array($this, 'setSortingName')),
            new \Twig_SimpleFilter('sortingIcon', array($this, 'setSortingIcon')),
        );
    }

    public function setSortingPath($current_sorting, $route, $route_params, $sorting_type = 'none')
    {
        $uri = '';

        if($sorting_type == 'date')
        {
            if($current_sorting == 'date_asc')
            {
                $route_params['sorting'] = 'date_dsc';
            }
            elseif($current_sorting == 'date_dsc')
            {
                $route_params['sorting'] = 'date_asc';
            }
            else
            {
                $route_params['sorting'] = 'date_asc';
            }
            $uri = $this->container->get('router')->generate($route, $route_params);
        }
        if($sorting_type == 'name')
        {
            if($current_sorting == 'name_dsc')
            {
                $route_params['sorting'] = 'name_asc';
            }
            elseif($current_sorting == 'name_asc')
            {
                $route_params['sorting'] = 'name_dsc';
            }
            else
            {
                $route_params['sorting'] = 'name_asc';
            }
            $uri = $this->container->get('router')->generate($route, $route_params);
        }
        if($sorting_type == 'none')
        {
            if($current_sorting == 'name_dsc')
            {
                $route_params['sorting'] = 'name_asc';
            }
            elseif($current_sorting == 'name_asc')
            {
                $route_params['sorting'] = 'name_dsc';
            }
            elseif($current_sorting == 'date_dsc')
            {
                $route_params['sorting'] = 'date_asc';
            }
            elseif($current_sorting == 'date_asc')
            {
                $route_params['sorting'] = 'date_dsc';
            }
            else
            {
                $route_params['sorting'] = 'name_asc';
            }
            $uri = $this->container->get('router')->generate($route, $route_params);
        }
        return $uri;
    }

    public function setSortingName($current_sorting)
    {
        $string = '';

        if($current_sorting == 'date_asc' || $current_sorting == 'date_dsc')
        {
            $string = "Publish Date";
        }
        else if($current_sorting == 'name_asc' || $current_sorting == 'name_dsc')
        {
            $string = "Course Name";
        }
        return $string;
    }

    public function setSortingIcon($current_sorting)
    {
        $string = '';

        if($current_sorting == 'date_asc' || $current_sorting == 'name_asc')
        {
            $string = "glyphicon-sort-by-alphabet-alt";
        }
        else if($current_sorting == 'name_dsc' || $current_sorting == 'date_dsc')
        {
            $string = "glyphicon-sort-by-alphabet";
        }
        return $string;
    }

    public function getName()
    {
        return 'renderSorter_extension';
    }
}