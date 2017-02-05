<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Authorsbooks */

$this->title = 'Create Authorsbooks';
$this->params['breadcrumbs'][] = ['label' => 'Authorsbooks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authorsbooks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
