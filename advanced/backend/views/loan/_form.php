<?php

use common\models\Help;
use common\models\Loan;
use yii\db\Query;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Loan */
/* @var $form ActiveForm */

$current_exercise_id = (new Query())->from('exercise')->max('id');
$current_session_id = (new Query())->from('session')->where(['id_exercise' =>$current_exercise_id])->max('id');
?>

<div class="loan-form">
     <div class="card card-info" style="width: 50%; margin: 0 auto;">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php $model->id_session = $current_session_id ?>
    <?php $form = ActiveForm::begin([
                'action' => ['loan/create'],
                'options' => ['class' => 'saving-form']
    ]); ?>
        
        <div class="card-body">
            <div class="form-group">
                <?= $form->field($model, 'matricule_member')->dropDownList(Help::getMemberList2())->label('Member') ?>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'amount')->textInput() ?>
            </div>
        </div>
        <!-- /.card-body -->
         <div class="card-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-warning']) ?>
       <?= Html::a('Cancel', ['loan/index'], ['class' => 'btn btn-default float-right']) ?>
        </div>
        <!-- /.card-footer -->
    <?php ActiveForm::end(); ?>

</div>
