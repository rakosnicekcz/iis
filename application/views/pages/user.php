<script type='text/javascript' src="<?php echo base_url(); ?>js/user.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/user.css">
<div>
    <ul class="nav nav-tabs mt-5">
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
    <div id="tabUserDeatail" class="tab-content">
        <div class="tab-pane fade active show tableDivContainer" id="mytickets">
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
</div>
<br>
<?php if (isset($users)) : ?>
    <h3>Users</h3>
    <div class="form-group">
        <input class="form-control" id="usersFilter" placeholder="Search">
    </div>
    <br>
    <div class="tableDivContainer mb-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surename</th>
                    <th scope="col">Conferences</th>
                    <th scope="col">Presentations</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="usersTbody">
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row" <?php echo intval($user["is_admin"]) ? 'style="color: red"' : "" ?>><?php echo $user["email"] . (intval($user["is_admin"]) ? " (admin)" : "") ?></th>
                        <td><?php echo $user["name"]  ?></td>
                        <td><?php echo $user["surename"] ?></td>
                        <td <?php if (!intval($user["conferences"])) {
                                echo 'style="color: grey"';
                            } ?>> <?php echo $user["conferences"] ?></td>
                        <td <?php if (!intval($user["presentations"])) {
                                echo 'style="color: grey"';
                            } ?>> <?php echo $user["presentations"] ?></td>
                        <td>
                            <a href="" data-bs-toggle="modal" onclick=<?php echo '"editUserModal(' . $user["id"] . ' )"' ?> data-bs-target="#userEditModal">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="userEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userEditModalLabel">Edit user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="form-group">
                            <label for="modalInputEmail" class="form-label mt-4">Email address</label>
                            <input type="email" class="form-control" id="modalInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="modalInputName" class="form-label mt-4">Name</label>
                            <input type="email" class="form-control" id="modalInputName" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="modalInputSurename" class="form-label mt-4">Surename</label>
                            <input type="email" class="form-control" id="modalInputSurename" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <br>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="modalCheckboxAdmin">
                            <label class="form-check-label" for="modalCheckboxAdmin">
                                Admin
                            </label>
                        </div>
                        <br>
                        <button class="btn btn-primary" id="editSubmit" data-bs-dismiss="modal" onclick="editUserModalSubmit()">Edit</button>
                        <button class="btn btn-danger float-end" data-bs-dismiss="modal" onclick="deleteUserModalSubmit()">Delete user</button>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>