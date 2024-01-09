<!DOCTYPE html>
<html lang="en">
<head>
    
<form action="item/update/{{$item->id}}" method="post">
<meta charset="UTF-8">
    
   <label for="data1">Data 1:</label><br>
   <input type="text" id="data1" name="name" value="{{$item->name}}"><br>
   <label for="data2">Data 2:</label><br>
   <input type="text" id="data2" name="email" value="{{$item->email}}"><br>
   <label for="data3">Data 3:</label><br>
   <input type="text" id="data3" name="book" value="{{$item->book}}"><br>
   <input type="submit" value="Submit">
</form>
    <title>Locura</title>
</head>
<body>
    <!--cambio-->
    
</body>
</html>