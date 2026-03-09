<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Mã xác nhận quên mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
            line-height: 1.6;
        }

        .email-container {
            max-width: 500px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        h2 {
            background: #1976d2;
            color: #ffffff;
            padding: 10px 15px;
            text-align: center;
            border-radius: 6px;
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h3>Xin chào,</h3>

        <p>Mã xác nhận quên mật khẩu của bạn là:</p>

        <h2>{{ $code }}</h2>
        <span>
            <p>
                Mã này chỉ dùng để đặt lại mật khẩu trên hệ thống FoodXpress
                <img src="https://lh3.googleusercontent.com/PHrSia9eIZsjjcE7jtRi7BkcqZRFD-cg5o4nmQxY95vhLPJx2RFcdQR3n7JaGVl8Nsg5EqO9nDPeLTXja0FrgOlCBhHoIkaNfq3gJqRB"
                    width="30"
                    style="margin-left:5px; vertical-align: middle;"
                    alt="Logo">
            </p>

        </span>




        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
    </div>
</body>

</html>