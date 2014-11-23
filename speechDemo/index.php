<html>
<head>
</head>
<body>
<!--<form action="javascript:void(0);" method="post">-->
<form action="getResult.php" method="post">
    <input type="text" name="text" placeholder="enter a text" />
    <input type="submit" value="submit" />
</form>
<!--
<script type="text/javascript">
    $("form").submit(function(){
        var str = $(this).serialize();
        $.ajax('getResult.php', str, function(result){
            alert(result); 
        }
        return(false);
    });
</script>
-->
</body>
</html>
