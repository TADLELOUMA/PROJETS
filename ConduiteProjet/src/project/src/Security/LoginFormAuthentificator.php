<?php

namespace App\Security;

use App\Controller\SecurityController;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

class LoginFormAuthentificator extends AbstractAuthenticator
{
    private $userRepository;
    private $urlGenerator;

    public function __construct(UserRepository $userRepository, UrlGeneratorInterface $urlGenerator)
    {
        $this->userRepository = $userRepository;
        $this->urlGenerator = $urlGenerator;
    }
    /**
     * Does the authenticator support the given Request?
     *
     * If this returns false, the authenticator will be skipped.
     *
     * Returning null means authenticate() can be called lazily when accessing the token storage.
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'app_login'
            && $request->isMethod('POST');
    }

    /**
     * Create a passport for the current request.
     *
     * The passport contains the user, credentials and any additional information
     * that has to be checked by the Symfony Security system. For example, a login
     * form authenticator will probably return a passport containing the user, the
     * presented password and the CSRF token value.
     *
     * You may throw any AuthenticationException in this method in case of error (e.g.
     * a UserNotFoundException when the user cannot be found).
     *
     * @throws AuthenticationException
     */
    public function authenticate(Request $request): PassportInterface
    {
        $user = $this->userRepository->findOneBy(['username' => $request->request->get('email')]);
        // $user = $this->userRepository->findOneByEmail($request->request->get('email'));
        /// Pour se souvenir du mail tapé
        $request->getSession()->set(SecurityController::LAST_EMAIL, $request->request->get('email'));

        if (!$user) {
            throw new CustomUserMessageAuthenticationException(" Invalid Credentials");
        }
        return new Passport(
            new UserBadge($request->request->get('email')),
            new PasswordCredentials($request->request->get('password')),
            [

                //and CSRF protection using a "csrf_token" field
                new CsrfTokenBadge('login_form', $request->request->get('csrf_token')),
                new RememberMeBadge

                //and add support for upgrading the password hash
                // new PasswordUpgradeBadge($request->get('password'), $this->userRepository
            ]
        );
    }


    /**
     * Called when authentication executed and was successful!
     *
     * This should return the Response sent back to the user, like a
     * RedirectResponse to the last page they visited.
     *
     * If you return null, the current request will continue, and the user
     * will be authenticated. This makes sense, for example, with an API.
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        $request->getSession()->getFlashBag()->add('success', 'Logged succesfuly');
        return new RedirectResponse($this->urlGenerator->generate('app_project'));
    }

    /**
     * Called when authentication executed, but failed (e.g. wrong username password).
     *
     * This should return the Response sent back to the user, like a
     * RedirectResponse to the login page or a 403 response.
     *
     * If you return null, the request will continue, but the user will
     * not be authenticated. This is probably not what you want to do.
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {

        $request->getSession()->getFlashBag()->add('error', 'Invalid Credentials !');
        return new RedirectResponse($this->urlGenerator->generate('app_login'));
    }
}
