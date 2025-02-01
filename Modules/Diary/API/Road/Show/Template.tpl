<link href="<?php echo ROOT_URL; ?>/Modules/Diary/API/Road/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Road.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
    </div>

    <h3>Day</h3>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <?php echo $entity->parse(); ?>

    <h3>Schedule</h3>

    <table>
        <tr>
            <th>\</th>
            <th>:00</th>
            <th>:15</th>
            <th>:30</th>
            <th>:45</th>
        </tr>
    <?php foreach($schedule as $idHour => $hour): ?>
    <tr>
        <th><?php echo $idHour; ?>:</th>
        <?php foreach($hour as $iqQuarter => $quarter): ?>
            <td>
                <?php if($quarter === null): ?>
                    <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Jobs.create('<?php echo $entity->getKey(); ?>', '<?php echo $idHour; ?>', '<?php echo $iqQuarter; ?>');">Create</a>
                <?php else: ?>
                    <?php echo $quarter->getTitle(); ?>
                <?php endif; ?>
            </td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
    </table>
</div>