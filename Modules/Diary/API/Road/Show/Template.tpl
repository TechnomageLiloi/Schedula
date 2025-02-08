<link href="<?php echo ROOT_URL; ?>/Modules/Diary/API/Road/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">



    <h3>Problems</h3>

    <?php foreach($problems as $problem): ?>

    <div class="problem">
        <?php echo $problem->getTitle(); ?>
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Shots.edit();">Edit</a>
    </div>

    <?php endforeach; ?>

    <br/>

    <h3>Day</h3>

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Road.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
    </div>
    <br/>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <?php echo $entity->parse(); ?>

    <h3>Schedule</h3>

    <table>
        <tr>
            <th style="width: 100px;">\</th>
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
                    <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Shots.create('<?php echo $entity->getKey(); ?>', '<?php echo $idHour; ?>', '<?php echo $iqQuarter; ?>');">Create</a>
                <?php else: ?>
                    <div class="job <?php echo $quarter->getStatusClass(); ?>">
                        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Shots.edit('<?php echo $entity->getKey(); ?>', '<?php echo $idHour; ?>', '<?php echo $iqQuarter; ?>');">Edit</a>
                        [<?php echo $quarter->getKarma(); ?>]
                        <?php echo $quarter->getTitle(); ?>
                    </div>
                <?php endif; ?>
            </td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
    </table>
</div>