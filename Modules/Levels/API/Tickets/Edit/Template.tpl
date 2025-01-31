<link href="<?php echo ROOT_URL; ?>/Engine/API/Tickets/Edit/Style.css" rel="stylesheet" />

<div id="application-Quests-edit">
    <a href="javascript:void(0)" onclick="Schedula.Levels.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyQuest(); ?>', '<?php echo $quest->getStatus(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show('<?php echo $quest->getStatus(); ?>');">Cancel</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Schedula.Levels.Tickets.save('<?php echo $entity->getKey(); ?>', '<?php echo $entity->getKeyQuest(); ?>', '<?php echo $quest->getStatus(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Levels.Quest.show('<?php echo $quest->getStatus(); ?>');">Cancel</a>
</div>