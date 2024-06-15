foreach ($stmt->get_result() as $i => $stuff) { ?>
    <div class="col-sm-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-header"><?php echo $stuff['categoryname']; ?></div>
            <div class="card-body outermydiv">
                <div class="myDIV">
                    <form method="POST">
                        <div class="form-row">
                            <div class="col-5">
                                <input type="text" class="form-control" name="name" placeholder="Item name" required autocomplete="off">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="cost" placeholder="Cost" required>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="price" placeholder="Price" required>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" name="btnsaveitem">Save</button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="code" value="<?php echo $stuff['categorycode']; ?>">
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['btnsaveitem'])) {
        $stmt = $conn->prepare("INSERT INTO tbl_items(`itemname`) VALUES (?)");
        $stmt->bind_param("s",$_POST['name']);
        $stmt->execute();
    }