<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student View File</title>
</head>
<body>
    <div class="container">
        <h2 class="text-decoration-underline">Enter stuff Information:</h2>

        <h2 style="color:red;">{{Session::get('sms')}}</h2>
         <div class="row">
             <div class="col-md-4">
                <form action="{{route('store.stuff')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Name:</label>
                      <input type="text" name="name" class="form-control" required>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image:</label>
                        <input type="file" name="photo" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>


             </div>

             <div class="col-md-8">
                 <h2 style="color:red;">{{Session::get('message')}}</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($stuffs as $row)
                        <tr>
                           <td>{{$row->id}}</td>
                           <td>{{$row->name}}</td>
                           <td>
                           <embed src="{{asset($row->photo)}}" width="50" height="50" alt="">
                           </td>
                        <td>
                            <a href="{{route('edit.stuff',$row->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('delete.stuff',$row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete???');">Delelte</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
             </div>
         </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
