<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, perferendis?</p>
    <div class="card">
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, quo earum, sunt suscipit veritatis id optio, placeat nihil obcaecati porro aliquid eum dignissimos ipsum quaerat.</p>
        </div>
    </div>

    <code><?= __FILE__ ?></code>
</div>
