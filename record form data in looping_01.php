<?php
include "../config/dbconfig.php";

$data['productCode'] = "1"; // sample data
$stmt = $conn->prepare("SELECT * FROM tbl_category");
//$stmt->bind_param("i", $data['productCode']);
$stmt->execute();
$result = $stmt->get_result();
$i = 1;
while ($stuff = $result->fetch_assoc()) {
?>
    <div class="col-sm-6" style="margin-top:20px;">
        <div class="card">
            <div class="card-header"><?php echo $stuff['categoryname']; ?>
            </div>
            <div class="card-body outermydiv">
                <div class="myDIV">
                    <form method="POST" name="itemform" action="">
                        <div class="form-row">
                            <div class="col-5">
                                <input type="text" class="form-control" name="name[<?php echo $i; ?>]" id="itemname[<?php echo $i; ?>]" placeholder="Item name" required autocomplete="off">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="cost[<?php echo $i; ?>]" id="itemcost[<?php echo $i; ?>]" placeholder="Cost" required>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="price[<?php echo $i; ?>]" id="itemprice[<?php echo $i; ?>]" placeholder="Price" required>
                                <input type="hidden" class="form-control" name="code[<?php echo $i; ?>]" id="forcatcode[<?php echo $i; ?>]" value="<?php echo $stuff['categorycode'] ?>">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success" name="btnsaveitem" id="btnsaveitem">Save</button>
                            </div>
                            <?php $i++; ?>
                            <input type="hidden" name="count" value="<?php echo $i; ?>" />
                        </div>
                    </form>

                </div>
                <br>

            </div>
        </div>
    </div>
<?php
}
?>

<?php
    if (isset($_POST['btnsaveitem'])) {
      $count = $_POST['count'];
      for ($i = 1; $i < $count; $i++) {
          //$code = $_POST['code'][$i]; // check empty and check if interger
          $foritemname = $_POST['name'][$i]; // check empty and strip tags
          //$qty = $_POST['qty'][$i]; // check empty and check if interger
          $stmt = $conn->prepare("INSERT INTO tbl_items(`itemname`) VALUES ('".$foritemname."')");
          //$stmt->bind_param("iss",$name);
          $stmt->execute();
      }
  }
?>