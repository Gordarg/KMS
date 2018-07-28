<?php
include_once ('core/init.php');
include ('core/secure.php');
include ('forms/submit.php');
include ('master/public-header.php');
?>
<div id="sjfb-wrap">
<h1><?= $functionalitiesInstance->label('فرم‌ساز') ?></h1>
<a href="form.html">View form (rendered from the demo json string) here</a>.
</p>
<div id="sjfb" novalidate>
    <div id="form-fields">
    </div>
</div>
<div class="add-wrap">
    <h3><?= $functionalitiesInstance->label('افزودن فیلد') ?></h3>
    <ul id="add-field">
        <li><a id="add-text" data-type="text" href="#"><?= $functionalitiesInstance->label('متن تک خط') ?></a></li>
        <li><a id="add-textarea" data-type="textarea" href="#"><?= $functionalitiesInstance->label('متن چند خط') ?></a></li>
        <li><a id="add-select" data-type="select" href="#"><?= $functionalitiesInstance->label('لیست آبشاری') ?></a></li>
        <li><a id="add-radio" data-type="radio" href="#"><?= $functionalitiesInstance->label('دکمه‌های رادیویی') ?></a></li>
        <li><a id="add-checkbox" data-type="checkbox" href="#"><?= $functionalitiesInstance->label('چک باکس') ?></a></li>
        <li><a id="add-agree" data-type="agree" href="#"><?= $functionalitiesInstance->label('باکس تائید') ?></a></li>
    </ul>
</div>
</div>
<?php
$_GET['type'] = "QUST";
require_once ('forms/render.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
include ('master/public-footer.php');
?>