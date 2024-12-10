<?php
require_once ("connect.php");
global $conn;
$eid = $_GET['kid'];
$edit_sql = "SELECT * FROM table_students WHERE id=$eid";
$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sửa Thông Tin Sinh Viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Sửa Thông Tin Sinh Viên</h2>
    <form action="update.php" method="post" class="was-validated">
        <input type="hidden" name="kid" value="<?php echo $eid ?>">
        <div class="form-group">
            <label for="fullname">Họ và tên:</label>
            <input type="text" class="form-control" id="fullname" placeholder="Nhập họ tên" name="fullname" value="<?php echo $row['fullname'] ?>" required>
        </div>
        <div class="form-group">
            <label for="dob">Ngày sinh:</label>
            <input type="date" class="form-control" id="dob" placeholder="Nhập quê quán" name="dob" value="<?php echo $row['dob'] ?>" required>
        </div>
        <div class="form-group">
            <label>Giới tính:</label>

            <td> Nam:<input name="gender" type="radio" value="1" >   Nữ:<input name="gender" type="radio" value="0" >  </td>
        </div>
        <div class="form-group">
            <label for="hometown">Quê quán:</label>
            <input type="text" class="form-control" id="hometown" placeholder="Nhập quê quán" name="hometown" value="<?php echo $row['hometown'] ?> "required>
        </div>
        <div class="form-group">
            <label for="level">Trình độ học vấn:</label>
            <select class="form-control" id="level" name="level" required>
                <option><?php switch ($row['level']) {
                        case '0':
                            $lv='Tiến sĩ';
                            break;
                        case '1':
                            $lv='Thạc sĩ';
                            break;
                        case '2':
                            $lv='Kỹ sư';
                            break;
                        case '3':
                            $lv='Khác';
                            break;
                    }
                    echo $lv ?></option>
                <option disabled >--------</option>
                <option value=0>Tiến sĩ</option>
                <option value=1>Thạc sĩ</option>
                <option value=2>Kỹ sư</option>
                <option value=3>Khác</option>
            </select>
        </div>
        <div class="form-group">
            <label for="group">Nhóm:</label>
            <input type="number" class="form-control" id="group" placeholder="Nhập ID nhóm" name="group" value="<?php echo $row['group'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Bạn có xác nhận muốn sửa không')">Cập nhập thông tin</button>
        <button type="reset" class="btn btn-primary">Hủy sửa đổi</button>
        <a href="list.php" class="btn btn-primary">Quay lại trang chủ</a>
    </form>
</div>

</body>
</html>

