<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <?php
    // Bắt đầu khối mã PHP
    $nameError = ""; // Biến lưu trữ thông báo lỗi về tên
    $name = "";     // Biến lưu trữ tên người dùng sau khi kiểm tra

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem dữ liệu có được gửi bằng phương thức POST không
        if (empty($_POST['name'])) {
            // Kiểm tra xem trường "name" có rỗng không
            $nameError = "Tên không được để trống";
        } else {
            // Nếu tên không rỗng, gán giá trị vào biến $name
            $name = $_POST['name'];
            // Kiểm tra xem tên chỉ chứa chữ cái (không chứa số hoặc ký tự đặc biệt)
            if (!preg_match("/^[a-zA-Z]*$/", $name)) {
                $nameError = "Tên chỉ được chứa chữ cái";
            } else {
                // Nếu tên hợp lệ, hiển thị tên ra màn hình
                echo $name;
            }
        }
    }
    ?>

    <form action="index.php" method="post">
        <label for="">Tên:</label>
        <input type="text" name="name">
        <span class="error"><?php echo $nameError; ?></span>
        <br>
        <input type="submit" name="submit" value="gửi">
    </form>
</body>
</html>