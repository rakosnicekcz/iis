<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#mytickets">My Tickets</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#mypresentations">My Presentations</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#myconferences">My Conferences</a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active show" id="mytickets">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Conference</th>
                    <th scope="col">Ticket count</th>
                    <th scope="col">Code</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tickets as $ticket) : ?>
                    <tr>
                        <th scope="row"><a href=<?php echo '"' . base_url() . 'conference?id=' . $ticket["ID"] . '"' ?>><?php echo $ticket["name"] ?></a></th>
                        <td><?php echo $ticket["count"] ?></td>
                        <td><?php echo $ticket["code"] ?></td>
                        <td><?php echo $ticket["from"] . " - " . $ticket["to"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="mypresentations">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Presentation</th>
                    <th scope="col">Conference</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($presentations as $pres) : ?>
                    <tr>
                        <th scope="row"><a href=<?php echo '"' . base_url() . 'presentation?id=' . $pres["presentation_id"] . '"' ?>><?php echo $pres["p_name"] ?></a></th>
                        <td><a href=<?php echo '"' . base_url() . 'conference?id=' . $pres["conference_id"] . '"' ?>><?php echo $pres["c_name"] ?></a></td>
                        <td><?php echo $pres["start"] . " - " . $pres["finish"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="myconferences">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Conference</th>
                    <th scope="col">Tickets reserved</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($conferences as $conf) : ?>
                    <tr>
                        <th scope="row"><a href=<?php echo '"' . base_url() . 'conference?id=' . $conf["conference_id"] . '"' ?>><?php echo $conf["name"] ?></a></th>
                        <td><?php echo $conf["reserved"] . "/" . $conf["capacity"] ?></td>
                        <td><?php echo $conf["from"] . " - " . $conf["to"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>