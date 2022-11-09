<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($room['roomID']): ?>
                    Update info of <b><?php echo $room['name'] ?></b>
                <?php else: ?>
                    Create New Room
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Room ID</label>
                    <input name="roomID" value="<?php echo $room['roomID'] ?>"
                           class="form-control <?php echo $errors['roomID'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['roomID'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input name="name" value="<?php echo $room['name'] ?>"
                           class="form-control <?php echo $errors['name'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['name'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Room Number:</label>
                    <input name="roomNum" value="<?php echo $room['roomNum'] ?>"
                           class="form-control <?php echo $errors['roomNum'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['roomNum'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Room Level:</label>
                    <input name="roomLvl" value="<?php echo $room['roomLvl'] ?>"
                           class="form-control  <?php echo $errors['roomLvl'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['roomLvl'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword 1:</label>
                    <input name="keyword1" value="<?php echo $room['keyword1'] ?>"
                           class="form-control  <?php echo $errors['keyword1'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['keyword1'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword 2:</label>
                    <input name="keyword2" value="<?php echo $room['keyword2'] ?>"
                           class="form-control  <?php echo $errors['keyword2'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['keyword2'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keyword 3:</label>
                    <input name="keyword3" value="<?php echo $room['keyword3'] ?>"
                           class="form-control  <?php echo $errors['keyword3'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo  $errors['keyword3'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Map Image:</label>
                    <input name="picture" type="file" class="form-control-file">
                </div>

                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
