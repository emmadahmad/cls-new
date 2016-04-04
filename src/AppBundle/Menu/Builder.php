<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

class Builder extends ContainerAware
{
    public function topMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $em = $this->container->get('doctrine')->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findByStatus(1);

        foreach($categories as $category)
        {
            if(!$category->getParent())
            {
                if(count($category->getCategories()) > 0)
                {
                    $menu->addChild($category->getTitle(), array('route' => 'cls_categories_homepage', 'routeParameters' => array('category_id' => $category->getId()), 'attributes' => array('class' => 'has_dropdown','icon' => 'glyphicon-chevron-right')));
                }
                else
                {
                    $menu->addChild($category->getTitle(), array('route' => 'cls_categories_homepage', 'routeParameters' => array('category_id' => $category->getId())));
                }
            }
        }

        foreach($categories as $category)
        {
            if($category->getParent())
            {
                $menu[$category->getParent()->getTitle()]->addChild($category->getTitle(), array('route' => 'cls_categories_homepage', 'routeParameters' => array('category_id' => $category->getId())));
            }
        }
        return $menu;
    }

    public function sidebarMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('id' => 'sidebar_menu', 'class' => 'panel-group'));

        $em = $this->container->get('doctrine')->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findByStatus(1);

        foreach($categories as $category)
        {
            if(!$category->getParent())
            {
                $title = str_replace("&", "and", strtolower($category->getTitle()));
                $name = str_replace(" ", "_", $title);
                $ref = '#'.$name;

                $menu->addChild($category->getTitle(), array('uri' => $ref, 'attributes' => array('class' => 'panel panel-default', 'icon' => 'glyphicon-chevron-right')));
            }
        }

        foreach($categories as $category)
        {
            $linksDone = array();

            if($category->getParent())
            {
                $title = str_replace("&", "and", strtolower($category->getParent()->getTitle()));
                $name = str_replace(" ", "_", $title);
                $ref = '#'.$name;

                if(!in_array($name, $linksDone))
                {
                    $menu[$category->getParent()->getTitle()]->setChildrenAttributes(array('id' => $name, 'class' => 'panel-collapse collapse'));
                    $menu[$category->getParent()->getTitle()]->setLinkAttributes(array('href' => $ref, 'class' => 'accordion-toggle', 'data-toggle' => 'collapse', 'data-parent' => '#sidebar_menu'));
                    array_push($linksDone,$name);
                }
                $menu[$category->getParent()->getTitle()]->addChild($category->getTitle(), array('route' => 'cls_categories_homepage', 'routeParameters' => array('category_id' => $category->getId())));
            }
        }
        return $menu;
    }

    public function accountMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('role' => 'menu', 'class' => 'dropdown-menu', 'aria-labelledby' => 'account_menu'));

        if(true === $this->container->get('security.authorization_checker')->isGranted('ROLE_SUBSCRIBER'))
        {
            $menu->addChild('My Subscriptions', array('route' => 'beusoft_subscriptions_homepage'));
        }

        if(true === $this->container->get('security.authorization_checker')->isGranted('ROLE_AUTHOR'))
        {
            $menu->addChild('My Courses', array('route' => 'cls_my_courses'));
            $menu->addChild('Create New Course', array('route' => 'cls_new_course'));
        }

        $menu->addChild('My Profile', array('route' => 'fos_user_profile_show'));
        $menu->addChild('Change Password', array('route' => 'fos_user_change_password'));
        $menu->addChild('Transaction History', array('route' => 'cls_home'));
        $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));

        return $menu;
    }

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $request = $this->container->get('request');
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('role' => 'menu', 'class' => 'nav navbar-nav'));

        if(true === $this->container->get('security.authorization_checker')->isGranted('ROLE_SUBSCRIBER'))
        {
            $menu->addChild('My Subscriptions', array('route' => 'beusoft_subscriptions_homepage'));
            if($request->get('_route') == 'beusoft_subscriptions_homepage_skills')
            {
                $menu['My Subscriptions']->setCurrent(true);
            }
        }

        if(true === $this->container->get('security.authorization_checker')->isGranted('ROLE_AUTHOR'))
        {
            $menu->addChild('My Courses', array('route' => 'cls_my_courses'));
            $menu->addChild('Create New Course', array('route' => 'cls_new_course'));
            if($request->get('_route') == 'cls_my_courses_skills')
            {
                $menu['My Courses']->setCurrent(true);
            }
        }

        $menu->addChild('My Profile', array('route' => 'fos_user_profile_show'));
        $menu->addChild('Change Password', array('route' => 'fos_user_change_password'));
        $menu->addChild('Transaction History', array('route' => 'cls_home'));



        return $menu;
    }
}