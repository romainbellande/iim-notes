<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use KnpU\Guard\AbstractGuardAuthenticator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getCredentials(Request $request)
    {
        return $request->headers->get('X-TOKEN');
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {

        $token = $this->em->getRepository('AppBundle:Token')->findOneBy(array('apiToken' => $credentials));

        // we could just return null, but this allows us to control the message a bit more
        if (!$token) {
            throw new AuthenticationCredentialsNotFoundException();
        }

        return $token;
    }

    public function checkCredentials($credentials, UserInterface $token)
    {
        // no need to check
        return;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse(
            // you could translate the message
            array('message' => $exception->getMessageKey()),
            403
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        // do nothing - let the request just continue!
        return;
    }

    public function supportsRememberMe()
    {
        return false;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new JsonResponse(
            // you could translate the message
            array('message' => 'Authentication required'),
            401
        );
    }
}
