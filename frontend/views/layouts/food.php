<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* ================================================================================================================= */
/* =======================                     === Main Layout ===                 ================================= */
/* =======================         ?ây là ph?n n?n trang web .. hi?n th? top menu         ========================== */
/* =======================         Header, Footer, cho h?u h?t các site, Ngoài ra         ========================== */
/* =======================         ph?n content s? ???c load t? các site khác trong view  ========================== */
/* ================================================================================================================= */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" type="image/png" href="images/favicon1.png" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>


<div class="wrap">

    <?php echo \Yii::$app->view->renderFile('@app/views/layouts/menu.php'); ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
