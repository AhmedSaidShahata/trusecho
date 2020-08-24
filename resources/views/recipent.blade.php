<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
</head>
<body>
    <div id="app"></div>
    wating....
    <script>


            localStorage.setItem('uID',{{auth()->user()->id}});


    </script>
<script src="{{asset('js/app.js')}}">

</script>
</body>
</html>
