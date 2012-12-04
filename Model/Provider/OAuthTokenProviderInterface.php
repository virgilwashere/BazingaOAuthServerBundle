<?php

namespace Bazinga\OAuthServerBundle\Model\Provider;

use Bazinga\OAuthServerBundle\Model\OAuthAccessTokenInterface;
use Bazinga\OAuthServerBundle\Model\OAuthConsumerInterface;
use Bazinga\OAuthServerBundle\Model\OAuthRequestTokenInterface;
use Bazinga\OAuthServerBundle\Model\OAuthUserInterface;

/**
 * OAuthTokenProviderInterface interface.
 *
 * @package     BazingaOAuthServerBundle
 * @subpackage  Provider
 * @author William DURAND <william.durand1@gmail.com>
 */
interface OAuthTokenProviderInterface
{
    /**
     * Create a request token.
     *
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthConsumerInterface     $consumer An OAuth consumer.
     * @return \Bazinga\OAuthServerBundle\Model\OAuthRequestTokenInterface
     */
    public function createRequestToken(OAuthConsumerInterface $consumer);

    /**
     * Create an access token.
     *
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthConsumerInterface    $consumer An OAuth consumer.
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthUserInterface        $user
     * @return \Bazinga\OAuthServerBundle\Model\OAuthAccessTokenInterface
     */
    public function createAccessToken(OAuthConsumerInterface $consumer, OAuthUserInterface $user);

    /**
     * @param $oauth_token
     * @return mixed
     */
    public function loadRequestTokenByToken($oauth_token);

    /**
     * @param $oauth_token
     * @return mixed
     */
    public function loadAccessTokenByToken($oauth_token);

    /**
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthRequestTokenInterface $token
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthUserInterface         $user
     * @return mixed
     */
    public function setUserForRequestToken(OAuthRequestTokenInterface $token, OAuthUserInterface $user);

    /**
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthRequestTokenInterface $requestToken
     * @return mixed
     */
    public function deleteRequestToken(OAuthRequestTokenInterface $requestToken);

    /**
     * @param  \Bazinga\OAuthServerBundle\Model\OAuthAccessTokenInterface $accessToken
     * @return mixed
     */
    public function deleteAccessToken(OAuthAccessTokenInterface $accessToken);
}
