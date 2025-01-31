<link href="<?php echo ROOT_URL; ?>/Engine/API/Quests/Edit/Style.css" rel="stylesheet" />

<div id="application-Quests-edit">
    <a href="javascript:void(0)" onclick="Schedula.Quests.Quest.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Quests.Quest.show('<?php echo $entity->getStatus(); ?>');">Cancel</a>
    <hr/>
    <table>
        <tr><td>Summary</td><td><textarea name="summary"><?php echo $entity->getSummary(); ?></textarea></td></tr>
        <tr><td>Status</td><td>
            <select name="status">
                <?php foreach($statuses as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php if($entity->getStatus() == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td></tr>
        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Schedula.Quests.Quest.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Quests.Quest.show('<?php echo $entity->getStatus(); ?>');">Cancel</a>
</div>