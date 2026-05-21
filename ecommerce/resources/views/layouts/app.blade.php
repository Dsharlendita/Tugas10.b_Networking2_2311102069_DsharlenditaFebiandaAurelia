<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce CRUD</title>

    <style>
        body{
            font-family: Arial;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            margin:0;
            padding:30px;
        }

        .container{
            max-width:900px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        h1{
            color:#5a4fcf;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table th, table td{
            padding:12px;
            border-bottom:1px solid #ddd;
        }

        .btn{
            padding:10px 16px;
            border:none;
            border-radius:10px;
            color:white;
            text-decoration:none;
            cursor:pointer;
        }

        .btn-add{
            background:linear-gradient(45deg,#36d1dc,#5b86e5);
        }

        .btn-edit{
            background:orange;
        }

        .btn-delete{
            background:red;
        }

        input, textarea{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border-radius:10px;
            border:1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
</html>