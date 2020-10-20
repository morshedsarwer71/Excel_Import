<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Export Excel to database
        </div>
        <div class="card-body">
        <form action="{{url('/import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="excel_file">
                <br>
                <button class="btn btn-success" style="margin-top: 20px;">Import</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
