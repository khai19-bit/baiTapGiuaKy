<!DOCTYPE html>
<html lang="en">
<head>
    <title>Danh sách sinh viên</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Bảng sinh viên</h2>
    <div id="search">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Nhập tên hoặc quê quán">
            <button type="submit" name="tk">Tìm Kiếm</button>
            <a class="btn btn-success" onclick="return confirm('Bạn có muốn thêm sinh viên')" href="http://localhost/KTGKweb/html/index.html" id="them"><link rel="stylesheet" href="../css/style.css"> Thêm </a>
        </form>
    </div>
    <?php
    require 'connect.php';
    global $conn;
    if(isset($_POST['tk']) ) {
        $search = $_POST['search'];
        if($search == ''){
            echo "Vui lòng nhập để tìm kiếm";
            echo "<br><a href= 'list.php'><button>Quay lại trang chủ</a>";
        }else{
            $sql_search = "SELECT * FROM table_students  WHERE fullname LIKE '%$search%' OR hometown LIKE '%$search%'";
            $result_search = mysqli_query($conn, $sql_search);
            $count = mysqli_num_rows($result_search);
                if($count <= 0){
                    echo "Không tim thấy kết quả nào với từ khóa: ".$search;
                    echo "<br><a href= 'list.php'><button>Quay lại trang chủ</a>";
                }
                    else{ echo " Tìm thấy ".$count. " kết quả với từ khóa: ".$search;
                    ?><br><a href= 'list.php'><button>Quay lại trang chủ</button> </a>
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
                                    while($row = mysqli_fetch_array($result_search)){
                                ?>

                            <tr>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['dob']; ?></td>
                                <td><?php echo $row['gender'] ==1 ? 'Nam' : 'Nữ'; ?></td>
                                <td><?php echo $row['hometown']; ?></td>
                                <td><?php echo $row['level']; ?></td>
                                <td><?php echo "Nhóm " . $row['group']; ?></td>
                                <td><a href="edit.php?kid=<?php echo $row['id'] ?>" class="btn btn-info">Sửa</a> <a onclick="return confirm('Bạn có muốn xóa sinh viên này không')" href="delete.php?kid=<?php echo $row['id'] ?>" class="btn btn-danger">Xóa</a> </td>
                            </tr>
                            <?php
                                    }
                            ?>
                            </tr>
                            </tbody>
                        </table>
                <?php
                    }
            }

        }else {
            require 'content.php';
    }
?>
</div>
</body>
</html>