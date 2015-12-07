<?php

namespace AppBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class RenderSkillsExtension extends \Twig_Extension
{
    private $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('skillsIcon', array($this, 'setSkillIcon')),
            new \Twig_SimpleFilter('skillsName', array($this, 'setSkillName')),
            new \Twig_SimpleFilter('activeSkill', array($this, 'setActiveSkill')),
            new \Twig_SimpleFilter('getRoute', array($this, 'getRoute')),
        );
    }

    public function setSkillName($skill_id)
    {
        $string = '';

        if($skill_id == 1)
        {
            $string = "Beginner";
        }
        else if($skill_id == 2)
        {
            $string = "Intermediate";
        }
        else if($skill_id == 3)
        {
            $string = "Advanced";
        }
        else
        {
            $string = 'N / A';
        }
        return $string;
    }

    public function setSkillIcon($skill_id)
    {
        $string = '';

        if($skill_id == 1)
        {
            $string = "beginners_icon_grey";
        }
        else if($skill_id == 2)
        {
            $string = "intermediate_icon_grey";
        }
        else if($skill_id == 3)
        {
            $string = "advance_icon_grey";
        }
        else
        {
            $string = 'beginners_icon_grey';
        }
        return $string;
    }

    public function setActiveSkill($current_skill, $div_skill)
    {
        $string ='';
        $active = 'active';
        $normal = '';

        if($current_skill == $div_skill)
        {
            $string = $active;
        }
        else
        {
            $string = $normal;
        }
        return $string;
    }

    public function getRoute($dataType, $data = null, $skillId)
    {
        $route = '';
        $uri = '';
        $route_params = array();

        if($dataType == 'tag')
        {
            $route = 'cls_home_homepage_skills';
            $route_params['tag_id'] = $data;
            $route_params['skill_id'] = $skillId;

        }
        else if($dataType == 'category')
        {
            if($data == 'all')
            {
                $route = 'cls_home_homepage_skills';
                $route_params['category_id'] = $data;
                $route_params['skill_id'] = $skillId;
            }
            else
            {
                $route = 'cls_home_homepage_skills';
                $route_params['category_id'] = $data;
                $route_params['skill_id'] = $skillId;
            }
        }
        else if($dataType == 'subscriptions')
        {
            $route = 'cls_home_homepage_skills';
            $route_params['skill_id'] = $skillId;
        }
        else if($dataType == 'myCourses')
        {
            $route = 'cls_home_homepage_skills';
            $route_params['skill_id'] = $skillId;
        }
        $uri = $this->container->get('router')->generate($route, $route_params);

        return $uri;
    }

    public function getName()
    {
        return 'renderSkills_extension';
    }
}