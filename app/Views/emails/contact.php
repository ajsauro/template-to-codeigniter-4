<html>

<head>
    <style type='text/css'>
        body {
            font-family: Verdana, Geneva, sans-serif
        }

        p {
            font-weight: bold
        }
    </style>
</head>

<body>
    <h4>Olá, <?php echo $name; ?></h4>
    <p>Você recebeu um email de <?php echo $from; ?>.</p>
    <p><?php echo $message; ?></p>
</body>

</html>