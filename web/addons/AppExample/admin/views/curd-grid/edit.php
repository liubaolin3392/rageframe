<?php
use yii\widgets\ActiveForm;
use common\helpers\AddonsUrl;
use backend\widgets\provinces\Provinces;
use backend\widgets\webuploader\Image;
use backend\widgets\webuploader\File;
use dosamigos\datetimepicker\DateTimePicker;

$this->title = $model->isNewRecord ? '创建' : '编辑';
$this->params['breadcrumbs'][] = ['label' => 'Grid表格', 'url' => AddonsUrl::to(['index'])];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Grid表格</h5>
                </div>
                <div class="ibox-content">
                    <div class="col-sm-12">
                        <?php $form = ActiveForm::begin([]); ?>
                        <?= $form->field($model, 'title')->textInput(); ?>
                        <?= $form->field($model, 'description')->textarea(); ?>
                        <?= $form->field($model, 'sort')->textInput(); ?>
                        <?= Provinces::widget([
                            'form' => $form,
                            'model' => $model,
                            'provincesName' => 'provinces',
                            'cityName' => 'city',
                            'areaName' => 'area',
                        ])?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'stat_time')->widget(DateTimePicker::className(), [
                                    'language' => 'zh-CN',
                                    'template' => '{button}{reset}{input}',
                                    'options'   => [
                                        'value'     => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->stat_time),
                                    ],
                                    'clientOptions' => [
                                        'format'         => 'yyyy-mm-dd hh:ii:ss',
                                        'todayHighlight' => true,//今日高亮
                                        'autoclose'      => true,//选择后自动关闭
                                        'todayBtn'       => true,//今日按钮显示
                                    ]

                                ]);?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'end_time')->widget(DateTimePicker::className(), [
                                    'language' => 'zh-CN',
                                    'template' => '{button}{reset}{input}',
                                    'options'   => [
                                        'value'     => $model->isNewRecord ? date('Y-m-d H:i:s') : date('Y-m-d H:i:s',$model->end_time),
                                    ],
                                    'clientOptions' => [
                                        'format'         => 'yyyy-mm-dd hh:ii:ss',
                                        'todayHighlight' => true,//今日高亮
                                        'autoclose'      => true,//选择后自动关闭
                                        'todayBtn'       => true,//今日按钮显示
                                    ]

                                ]);?>
                            </div>
                        </div>
                        <?= $form->field($model, 'cover')->widget(Image::className(), [
                            'boxId' => 'cover',
                            'options' => [
                                'multiple'   => false,
                            ]
                        ]); ?>
                        <?= $form->field($model, 'covers[]')->widget(Image::className(), [
                            'boxId' => 'covers',
                            'options' => [
                                'multiple'   => true,
                            ]
                        ]); ?>
                        <?= $form->field($model, 'attachfile')->widget(File::className(), [
                            'boxId' => 'attachfile',
                            'options' => [
                                'multiple'   => false,
                            ]
                        ]); ?>
                        <?= $form->field($model,'content')->widget('kucha\ueditor\UEditor',[
                            'clientOptions' => [
                                //编辑区域大小
                                'initialFrameHeight' => '300',
                                //定制菜单
                                'toolbars' => [
                                    [
                                        'fullscreen', 'source', '|', 'undo', 'redo', '|',
                                        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                                        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                                        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                                        'directionalityltr', 'directionalityrtl', 'indent', '|',
                                        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                                        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                                        'simpleupload', 'insertimage', 'emotion', 'insertvideo', 'music', 'attachment', 'map', 'insertframe', 'insertcode', 'pagebreak', 'template', 'background', '|',
                                        'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                                        'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                                        'searchreplace', 'help', 'drafts'
                                    ],
                                ],
                            ]
                        ]);?>
                        <?= $form->field($model, 'status')->radioList(['1'=>'启用','-1'=>'禁用']); ?>
                        <div class="hr-line-dashed"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit">保存内容</button>
                            <span class="btn btn-white" onclick="history.go(-1)">返回</span>
                        </div>
                    </div>　
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>