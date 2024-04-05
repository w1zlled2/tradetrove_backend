<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="">
    <label for="">Введите номер телефона</label>
    <input type="text" id="phone-mask">
</form>
</body>
</html>
<script src="https://unpkg.com/imask"></script>
<script>
    IMask(
        document.getElementById('phone-mask'),
        {
            mask: '+{7}(000)000-00-00'
        }
    )
</script>
