<?php

/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\EzPlatformAdminUi\Behat\Helper;

class PlatformEnvironmentConstants
{
    /** @var string[] */
    public $values;
    private $adminURIKey = "ADMIN_URI";
    private $defaultAdminURI = "admin";

    public function __construct()
    {
        print_r('ADMIN_URI: ' . getenv($this->adminURIKey) . ' | ');

        $adminUri = (getenv($this->adminURIKey) != false) ? getenv($this->adminURIKey) : $this->defaultAdminURI;

        print_r('adminUri: ' . $adminUri . ' | ');

        $this->values = [
            'ROOT_CONTENT_NAME' => 'eZ Platform',
            'ROOT_CONTENT_TYPE' => 'Folder',
            'ARTICLE_MAIN_FIELD_NAME' => 'Intro',
            'CREATE_REGISTRATION_ROLE_POLICIES' => 'user/login,content/read',
            'REGISTRATION_CONFIRMATION_MESSAGE' => 'Your account has been created',
            $this->adminURIKey => $adminUri,
        ];

        print_r('adminUri: ' . $this->values[$this->adminURIKey] . ' | ');
    }
}
