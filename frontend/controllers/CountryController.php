<?php
/**
 * Created by PhpStorm.
 * User: An Khang
 * Date: 10/5/2015
 * Time: 3:43 AM
 */

namespace frontend\controllers;


use frontend\models\Country;
use yii\data\Pagination;
use yii\web\Controller;

class CountryController extends Controller
{
    public function actionCountry(){
        $query = Country::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('country', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
}