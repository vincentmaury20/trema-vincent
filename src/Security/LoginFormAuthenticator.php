<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

// Je définis une classe d'authentification personnalisée pour le formulaire de login
class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    // J'inclus le trait TargetPathTrait pour pouvoir rediriger l'utilisateur vers la page qu'il voulait atteindre avant de se connecter
    use TargetPathTrait;

    // Je définis une constante pour le nom de la route de connexion
    public const LOGIN_ROUTE = 'app_login';

    // J'injecte le générateur d'URL pour pouvoir rediriger l'utilisateur après connexion
    public function __construct(private UrlGeneratorInterface $urlGenerator) {}

    // Cette méthode est appelée pour construire le "Passport" à partir des données du formulaire
    public function authenticate(Request $request): Passport
    {
        // Je récupère l'email envoyé dans le formulaire
        $email = $request->request->get('email', '');

        // Je stocke l'email dans la session pour le pré-remplir en cas d'erreur
        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        // Je retourne un Passport avec :
        // - l'identifiant utilisateur (UserBadge)
        // - les identifiants (mot de passe)
        // - les badges de sécurité : CSRF et RememberMe
        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    // Cette méthode est appelée après une authentification réussie
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Si l'utilisateur avait tenté d'accéder à une page protégée avant de se connecter, je le redirige vers cette page
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Sinon, je le redirige vers la page d'administration
        return new RedirectResponse($this->urlGenerator->generate('admin'));
    }

    // Cette méthode retourne l'URL de la page de login (utilisée en cas d'échec d'authentification)
    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
