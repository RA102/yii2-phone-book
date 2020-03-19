<?php 
$I = new FunctionalTester($scenario);
$I->amOnPage('/');
$I->see('User');
$I->click(['link' => 'User']);
$I->see('Users');
$I->click(['link' => 'Create User']);
$I->see('Name', 'label');
$I->fillField(['name' => 'User[name]'], 'User 1');
$I->fillField(['name' => 'PhoneList[phone]'], '700-111-11-11');
$I->click('Save', 'button');

