<?php
/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Controller\User;

use FOS\UserBundle\Controller\SecurityController as BaseController;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityFOSUser1Controller
 *
 * @package Sonata\UserBundle\Controller
 *
 * @author Hugo Briand <briand@ekino.com>
 */
class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if ($user instanceof UserInterface) {
            $this->container->get('session')->getFlashBag()->set('sonata_user_error', 'sonata_user_already_authenticated');
            $url = $this->container->get('router')->generate('cls_home_homepage');

            return new RedirectResponse($url);
        }

        return parent::loginAction($request);
    }

    /**
     * Renders the login template with the given parameters. Overwrite this function in
     * an extended controller to provide additional data for the login template.
     *
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('default/user/Security/login.html.twig', $data);
    }
}