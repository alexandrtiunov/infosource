<?php

/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="main">

    <?php foreach ($array as $key => $value) :

        if (!empty($value)) :
            if($value['pid'] == 0):?>

                <ul>
                    <li><a data-toggle="modal" data-target="#exampleModal" href="#"><?= $value['title']?></a></li>
                </ul>
                <?php
            elseif($value['pid'] == 1):?>

                <ul>
                    <li class="parrent"><a data-toggle="modal" data-target="#exampleModal" href="#"><?= $value['title']?></a></li>
                    <ul>
                        <li class="children"><a data-toggle="modal" data-target="#exampleModal" href="#"><?= $value['title']?> .1</a></li>
                    </ul>

                </ul>
            <? endif?>
        <? endif?>
    <? endforeach?>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Пройдите проверку</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => ['site/write'], 'options' => ['method' => 'post'], 'class' => ['send-captcha']]) ?>
                    <input class="captcha-input" type="text" name="norobot"/>
                    <img class="captcha-img" src="captcha.php"/>
                    <span class="error">Вы не верно ввели проверочный код</span>
                    <?= '<img class="get-captcha" src="' . $picture . '"' ?> alt="">
                <div class="modal-footer">
                    <button type="button" class="dismiss btn btn-secondary" data-dismiss="modal">Close</button>
<!--                    --><?//= Html::submitButton('Отправить', ['class' => 'send-captcha btn btn-primary']) ?>
                    <button type="button" class="send-captcha btn btn-primary">Отправить</button>
                </div>
                <?php $form = ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>

