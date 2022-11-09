<?php
    require $_SERVER['DOCUMENT_ROOT'].'/php/rooms.php';
    $rooms = getRooms();

    require $_SERVER['DOCUMENT_ROOT'].'/php/reports.php';
    $reports = getReports();
    $setting = getSettings();

    require 'admin.php';
    $userCookie = checkAdminCookie();

    include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';

    $adminInfo = getAdmin($userCookie["uname"], $userCookie["pass"]);
?>

<div class="container">
    <h1 class="display-4">Welcome to RamNav Maintenance Website!</h1>
  	<p class="lead">This is a simple app for editing the database of Asia Pacific College's Smart Building Directory.</p>
  	<hr class="my-4">
  	<p>Hello, <strong><?php echo $adminInfo["name"]?></strong>! Choose what action would you like to do below:</p>

    <div>
        <a class="btn btn-success" href="/php/add.php">Add a New Room</a>
        <button class="btn btn-danger" id="reportsBtn">View Reports/Feedback</button>
        <!--<button class="btn btn-warning" id="settingsBtn" disabled>Change App Settings</button>-->
        <button class="btn btn-primary" id="adminBtn">Manage Admin Accounts</button>
        <form method="post" action="logout.php" style="display: inline-block;">
            <button class="btn btn-secondary" id="logoutBtn">Logout</button>
        </form>
    </div>
    <br>   

    <table class="table">
        <thead>
        <tr>
            <th>Image</th>
			<th>RoomID</th>
            <th>Name</th>
            <th>Room Num</th>
            <th>Room Flr</th>
            <th>Keyword 1</th>
            <th>Keyword 2</th>
            <th>Keyword 3</th>
			<th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $room): ?>
            <tr>
                <td>
                    <?php if (isset($room['roomID'])): ?>
                        <img style="width: 60px" src="<?php echo "/images/map/${room['roomID']}.png" ?>" alt="">
                    <?php endif; ?>
                </td>
				<td><?php echo $room['roomID'] ?></td>
                <td><?php echo $room['name'] ?></td>
                <td><?php echo $room['roomNum'] ?></td>
                <td><?php echo $room['roomLvl'] ?></td>
                <td><?php echo $room['keyword1'] ?></td>
                <td><?php echo $room['keyword2'] ?></td>
				<td><?php echo $room['keyword3'] ?></td>
                <td>
                    <a href="/php/edit.php?roomID=<?php echo $room['roomID'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                    <form method="POST" action="/php/delete.php">
                        <input type="hidden" name="roomID" value="<?php echo $room['roomID'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
    <div class="modal" id="reportsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reports and Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Report ID</th>
                            <th>Comment</th>
                            <th>Timestamp</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reports as $report): ?>
                            <tr>
                                <td><?php echo $report['reportID'] ?></td>
                                <td><?php echo $report['comment'] ?></td>
                                <td><?php echo $report['timestamp'] ?></td>
                                <td>
                                    <form method="POST" action="/php/deleteReport.php">
                                        <input type="hidden" name="reportID" value="<?php echo $report['reportID'] ?>">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="settingsModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Settings</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Update <b><?php echo $setting[0]['id'] ?></b> Settings
                                </h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data"
                                    action="/php/updateSetting.php">
                                    <?php foreach ($setting[0] as $i => $val): ?>
                                        <div class="form-group">
                                            <label><?php echo $i ?></label>
                                            <input name="name" value="<?php echo $val ?>"
                                                class="form-control <?php echo $errors[$i] ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?php echo  $errors[$i] ?>
                                            </div>
                                        </div>
                                    <?php endforeach;; ?>
                                    <button class="btn btn-success">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/admin.index.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'?>