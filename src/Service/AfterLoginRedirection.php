<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

/**
 * Class AfterLoginRedirection
 *
 * @package App\Service
 */
class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    private $router;

    /**
     * AfterLoginRedirection constructor.
     *
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request        $request
     *
     * @param TokenInterface $token
     *
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $roles = $token->getRoles();
        $user = $token->getUser();
        $active = $user->getActiver();
        $rolesTab = array_map(function ($role) {
            return $role->getRole();
        }, $roles);

        if (in_array('ROLE_ADMIN', $rolesTab, true)) {
            // c'est un aministrateur : on le rediriger vers l'espace admin
            $redirection = new RedirectResponse($this->router->generate('admin'));

        } else 
        
        if($active == "0" ) {
            $redirection = new RedirectResponse($this->router->generate('page404'));

        }elseif(in_array('ROLE_ETUDIANT', $rolesTab, true)) {  

            $redirection = new RedirectResponse($this->router->generate('etudiant'));

        } elseif(in_array('ROLE_PROF', $rolesTab, true)) {  

            $redirection = new RedirectResponse($this->router->generate('prof'));

        } elseif(in_array('ROLE_RESPONSABLE_ENTREPRISE', $rolesTab, true)) {  

            $redirection = new RedirectResponse($this->router->generate('responsable_entreprise'));

        } else {  

            $redirection = new RedirectResponse($this->router->generate('home_page'));

        }

        return $redirection;
    }
}
