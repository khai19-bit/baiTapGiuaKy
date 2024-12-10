
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Giới tính</th>
        <th>Quê quán</th>
        <th>Trình độ học vấn</th>
        <th>Nhóm</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        require_once ("connect.php");
        global $conn;

        $lksql = "SELECT * FROM `table_students`";
        $result = mysqli_query($conn, $lksql);
        while ($row = mysqli_fetch_assoc($result)) {
        switch ($row['level']) {
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
        ?>

    <tr>
        <td><?php echo $row['fullname']; ?></td>
        <td><?php echo $row['dob']; ?></td>
        <td><?php echo $row['gender'] ==1 ? 'Nam' : 'Nữ'; ?></td>
        <td><?php echo $row['hometown']; ?></td>
        <td><?php echo $lv; ?></td>
        <td><?php echo "Nhóm " . $row['group']; ?></td>
        <td><a href="edit.php?kid=<?php echo $row['id'] ?>" class="btn btn-info">Sửa</a> <a onclick="return confirm('Bạn có muốn xóa sinh viên này không')" href="delete.php?kid=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a> </td>
    </tr>

    <?php
    }
    ?>
    </tr>
    </tbody>
</table>
