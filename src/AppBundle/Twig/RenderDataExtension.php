<?php

namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class RenderDataExtension extends \Twig_Extension
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('renderData', array($this, 'dataFilter')),
            new \Twig_SimpleFilter('statusColor', array($this, 'statusColor')),
        );
    }

    public function dataFilter($data, $name = 'status')
    {
        $string = '';

        if($name == 'status')
        {
            if($data == $this->container->getParameter('DISABLED'))
            {
                $string = 'Disabled';
            }
            else if($data == $this->container->getParameter('ENABLED'))
            {
                $string = 'Enabled';
            }
            else if($data == $this->container->getParameter('PENDING'))
            {
                $string = 'Pending';
            }
            else if($data == $this->container->getParameter('REJECTED'))
            {
                $string = 'Rejected';
            }
        }
        else if($name == 'skill')
        {
            if($data == $this->container->getParameter('BEGINNER'))
            {
                $string = 'Beginner';
            }
            else if($data == $this->container->getParameter('INTERMEDIATE'))
            {
                $string = 'Intermediate';
            }
            else if($data == $this->container->getParameter('ADVANCED'))
            {
                $string = 'Advanced';
            }
        }
        else if($name == 'free')
        {
            if($data == $this->container->getParameter('NOT_FREE'))
            {
                $string = 'No';
            }
            else if($data == $this->container->getParameter('FREE'))
            {
                $string = 'Yes';
            }
        }

        if(!isset($string))
        {
            $string = 'N/A';
        }
        return $string;
    }

    public function statusColor($data)
    {
        $string = '';

        if($data == $this->container->getParameter('DISABLED'))
        {
            $string = 'primary';
        }
        else if($data == $this->container->getParameter('ENABLED'))
        {
            $string = 'success';
        }
        else if($data == $this->container->getParameter('PENDING'))
        {
            $string = 'warning';
        }
        else if($data == $this->container->getParameter('REJECTED'))
        {
            $string = 'danger';
        }

        if(!isset($string))
        {
            $string = 'primary';
        }
        return $string;
    }

    public function getName()
    {
        return 'renderData_extension';
    }
}
