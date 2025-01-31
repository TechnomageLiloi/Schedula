<link href="<?php echo ROOT_URL; ?>/Modules/Levels/API/Quests/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <!--<a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Quest.edit('<?php //echo $entity->getKey(); ?>');">Edit quest</a>-->
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Quest.create();">Create new quest</a>
        &diams;
        <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show(1);" class="butn">New quests</a>
        <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show(2);" class="butn">In hand quests</a>
        <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show(3);" class="butn">Success quests</a>
        <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show(4);" class="butn">Failure quests</a>

        <a href="javascript:void(0)" class="butn" onclick="Schedula.Maps.show();" style="float: right;">x</a>
    </div>


    <table>
        <?php foreach($quests as $quest): ?>

            <tr>
                <td style="width: 200px;">#<?php echo $quest->getKey(); ?></td>
                <td><?php echo $quest->parse(); ?></td>
                <td style="width: 300px;text-align: right;">
                    <a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Tickets.create('<?php echo $quest->getKey(); ?>');">Create ticket</a>
                    <a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Quest.edit('<?php echo $quest->getKey(); ?>');">Edit quest</a>
                    <a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Quest.update('<?php echo $quest->getKey(); ?>', <?php echo $status; ?>);">To top</a>
                </td>
            </tr>

            <?php if($tickets[$quest->getKey()]): ?>
                <?php foreach($tickets[$quest->getKey()] as $ticket): ?>
                    <tr>
                        <td style="width: 200px;" class="<?php echo $ticket->getClass(); ?>"><?php echo $ticket->getKey(); ?></td>
                        <td class="<?php echo $ticket->getClass(); ?>"><?php echo $ticket->parse(); ?></td>
                        <td style="width: 200px;text-align: right;">
                            <a href="javascript:void(0)" class="butn" onclick="Schedula.Levels.Tickets.edit('<?php echo $ticket->getKey(); ?>', '<?php echo $ticket->getKeyQuest(); ?>');">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        <?php endforeach; ?>
    </table>
</div>