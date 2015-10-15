<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* ================================================================================================================= */
/* =======================                     === Main Layout ===                 ================================= */
/* =======================         Đây là phần nền trang web .. hiển thị top menu         ========================== */
/* =======================         Header, Footer, cho hầu hết các site, Ngoài ra         ========================== */
/* =======================         phần content sẽ được load từ các site khác trong view  ========================== */
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


            <?php echo \Yii::$app->view->renderFile('@app/views/layouts/banner.php'); ?>


            <?php

            NavBar::begin([
                'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'my-top-navbar navbar-fixed-top',
                ],
            ]);

            $guestOption[] = ['label' => 'Thương Hiệu', 'url' => ['/site/signup']];
            $guestOption[] = ['label' => 'Loại', 'url' => ['/site/login']];
            $guestOption[] = ['label' => 'Giảm Giá', 'url' => ['/site/contact']];
            $guestOption[] = ['label' => 'Khác', 'url' => ['/site/hello']];
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left my-navbar-menu'],
                'items' => $guestOption,
            ]);

            $menuItems[] = ['label' => 'App', 'url' => ['/site/index'] , 'items' => [['label' => 'List User', 'url' => ['/app/index']],['label' => 'App Login', 'url' =>['/app/login']],]];

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);

            NavBar::end();
            ?>



            <?php

        //    $menuItems = [
        //        ['label' => 'Home', 'url' => ['/site/index']],
        //        ['label' => 'About', 'url' => ['/site/about']],
        //    ];
        //
        //    $menuItems[] = ['label' => 'Menu', 'url' => ['/site/index'] , 'items' => [['label' => 'Contact', 'url' => ['/site/contact']],['label' => 'Country', 'url' =>['/country/country']],]];
            ?>

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
