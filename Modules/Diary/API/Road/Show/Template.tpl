<link href="<?php echo ROOT_URL; ?>/Modules/Diary/API/Road/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Road.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
    </div>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <hr/>

    <?php echo $entity->parse(); ?>

</div>