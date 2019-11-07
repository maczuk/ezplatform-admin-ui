<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzPlatformAdminUi\Behat\BusinessContext;

use EzSystems\EzPlatformAdminUi\Behat\PageObject\LoginPage;
use EzSystems\EzPlatformAdminUi\Behat\PageObject\PageObjectFactory;
use OutOfBoundsException;

/** Context for authentication actions */
class AuthenticationContext extends BusinessContext
{
    /** @var array Dictionary of known user logins and their passwords */
    private $userCredentials = [
        'admin' => 'publish',
        'jessica' => 'publish',
        'yura' => 'publish',
        'anil' => 'publish',
    ];

    /**
     * @When I log in as :username with password :password
     */
    public function iLoginAs(string $username, string $password): void
    {
        $loginPage = PageObjectFactory::createPage($this->utilityContext, LoginPage::PAGE_NAME);
        $loginPage->login($username, $password);
    }

    /**
     * @Given I am logged as :username
     */
    public function iAmLoggedAs(string $username): void
    {

        $loginPage = PageObjectFactory::createPage($this->utilityContext, LoginPage::PAGE_NAME);
        $loginPage->open();

        print_r(' | CURRENT URL: ' . $this->utilityContext->getSession()->getCurrentUrl()
            .'; CURRENT ROUTE: ' . $loginPage->getRoute() . ' | ');

        if (!\array_key_exists($username, $this->userCredentials)) {
            throw new OutOfBoundsException('Login is not recognised');
        }

        $password = $this->userCredentials[$username];
        $loginPage->login($username, $password);
        print_r(' | CURRENT URL: ' . $this->utilityContext->getSession()->getCurrentUrl() . ' | ');

    }
}
