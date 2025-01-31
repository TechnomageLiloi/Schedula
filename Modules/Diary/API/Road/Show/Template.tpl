<link href="<?php echo ROOT_URL; ?>/Modules/Diary/API/Road/Show/Style.css" rel="stylesheet" />

<div id="modules-road-show" class="stylo">

    <div class="controls">
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Road.edit('<?php echo $entity->getKey(); ?>');">Edit step</a>
        &diams;
        <a href="javascript:void(0)" onclick="Schedula.Admin.report();" class="butn">Report</a>
        &diams;
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Problems.create();">Create problem</a>
        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Jobs.create();">Create job</a>

        <a href="javascript:void(0)" class="butn" onclick="Schedula.Maps.show();" style="float: right;">x</a>
    </div>

    <div class="data">
        <?php echo $entity->getData(); ?><br/>
    </div>

    <hr/>

    <?php echo $entity->parse(); ?>

    <hr/>

    <h3>Resources for today<?php $resources = $jobs->getResources(); ?></h3>

    <?php foreach($resources as $key => $value): ?>
        <?php echo $key . ': ' . $value . ';'; ?>
    <?php endforeach; ?>

    <h3>Lessons</h3>

    <table>
        <tr>
            <?php foreach($degrees as $key => $degree): ?>
                <th>Degree <?php echo $key; ?>: <?php echo $degree; ?></th>
            <?php endforeach; ?>
        </tr>

        <tr>
            <?php foreach(array_keys($degrees) as $keyDegree): ?>
            <td>
                <?php foreach($problems as $key => $value): ?>

                    <?php if($keyDegree != $value->getKeyDegree()) continue;?>

                    <div class="problem">
                        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Problems.edit('<?php echo $value->getKey(); ?>');">Edit</a>
                        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Problems.remove('<?php echo $value->getKey(); ?>');">Remove</a>
                        <?php echo $value->getSummary(); ?>
                    </div>

                <?php endforeach; ?>
            </td>
            <?php endforeach; ?>
        </tr>

        <tr>
            <?php foreach(array_keys($degrees) as $keyDegree): ?>
            <td>
                <?php foreach($lessons[$keyDegree] as $value): ?>

                    <div>
                        <a href="javascript:void(0)" onclick="Schedula.Degrees.Lessons.edit('<?php echo $value->getKey(); ?>');">
                            <?php echo $value->getStatusTitle(); ?>
                        </a>
                        &rarr;
                        <?php echo $value->getTitle(); ?>
                    </div>

                <?php endforeach; ?>
            </td>
            <?php endforeach; ?>
        </tr>
    </table>

    <br/>

    <h3>Jobs for today</h3>

    <table>
        <tr>
            <th>Time</th>
            <th>Problem</th>
            <th>Title</th>
            <th>Status</th>
            <th>Type</th>
            <th>Karma</th>
            <th>Actions</th>
        </tr>
        <?php foreach($jobs->getByHour() as $hour => $jobsForHour): ?>
            <tr>
                <th><?php echo $hour; ?>:00</th>
                <th colspan="7">
                    <?php if(isset($times[$hour])): ?>
                        <div class="problem">
                            <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Problems.edit('<?php echo $times[$hour]->getKey(); ?>');">Edit</a>
                            <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Problems.remove('<?php echo $times[$hour]->getKey(); ?>');">Remove</a>
                            <?php echo $times[$hour]->getSummary(); ?>
                        </div>
                    <?php else: ?>
                    -
                    <?php endif; ?>
                </th>
            </tr>
            <?php foreach($jobsForHour as $job): ?>
                <tr>
                    <td><?php echo $job->getTimestamp(); ?></td>
                    <td></td>
                    <td><?php echo $job->parse(); ?></td>
                    <td><?php echo $job->getStatusTitle(); ?></td>
                    <td><?php echo $job->getTypeTitle(); ?></td>
                    <td><?php echo $job->getKarma(); ?></td>
                    <td>
                        <a href="javascript:void(0)" class="butn" onclick="Schedula.Diary.Jobs.edit('<?php echo $job->getKey(); ?>');">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
</div>