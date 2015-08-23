<?php

namespace tests\codeception\_pages;

use yii\codeception\BasePage;

/**
 * Represents api page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class ApiPage extends BasePage
{
    public $route = 'site/api';
}
