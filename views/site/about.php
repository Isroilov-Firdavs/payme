<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($model as $key):
                    ?>
                    <tr>
                        <td><?= $key->id;?></td>
                        <td><?= $key->name;?></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <button class="btn btn-success"><i class="bi bi-filetype-php"></i></button>

</div>
