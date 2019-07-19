<?php

namespace frontend;

use common\models\Articals;
use frontend\tests\FunctionalTester;
use common\fixtures\ArticlesFixture;

class ArticlesCest
{
    public function _fixtures()
    {
        return [
            'articles' => [
                'class' => ArticlesFixture::className(),
                'dataFile' => codecept_data_dir() . 'articles.php',
            ],
        ];
    }

    public function testFirst(FunctionalTester $I)
    {
        $I->amOnPage('articals/');
        $I->see('Title');
        $I->see('Text');
        $I->see("created_by");
        $I->see("updated_by");
        $I->see('Yesterday');
    }

    public function testMySite(FunctionalTester $I)
    {
        $I->wantTo('testing');
    }
}