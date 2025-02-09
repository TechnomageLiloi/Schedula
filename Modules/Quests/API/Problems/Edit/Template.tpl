<link href="<?php echo ROOT_URL; ?>/Engine/API/Road/Edit/Style.css" rel="stylesheet" />

<div id="application-diary-edit">
    <a href="javascript:void(0)" onclick="Schedula.Quest.Problems.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Diary.Road.show();">Cancel</a>
    <hr/>
    <table>
        <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $entity->getTitle(); ?>"/></td></tr>
        <tr><td>Status</td><td><input type="text" name="status" value="<?php echo $entity->getStatus(); ?>"/></td></tr>
        <tr><td>Summary</td><td><textarea name="program"><?php echo $entity->getProgram(); ?></textarea></td></tr>
        <tr><td>Data</td><td><textarea name="data"><?php echo $entity->getData(); ?></textarea></td></tr>
    </table>
    <hr/>
    <a href="javascript:void(0)" onclick="Schedula.Quest.Problems.save('<?php echo $entity->getKey(); ?>');">Save</a>
    <a href="javascript:void(0)" onclick="Schedula.Diary.Road.show();">Cancel</a>
</div>