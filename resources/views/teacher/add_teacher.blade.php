<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Insert Student</title>
</head>
<body>
    <div class="container">
        <h2 class="text-decoration-underline text-uppercase">Insert Teacher info:</h2>
        <h2>{{Session::get('sms')}}</h2>
        <div class="row">
            <div class="col-md-5">
                <form action="{{route('store.teacher')}}" method="POST" class="shadow p-3 mb-5 bg-light rounded">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Name:</label>
                      <input type="text" name="name" class="form-control"  placeholder="name" >
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control"  placeholder="email">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control"  placeholder="phone">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('Home')}}" class="btn btn-info">Back to Home</a>
                  </form>
            </div>
            <div class="col-md-7">
                <table class="table-bordered table table-sm bg-info">
                    <thead class="text-uppercase text-center">
                      <tr>
                        <th>Name:</th>
                        <th>Email:</th>
                        <th>Phone:</th>
                        <th>Action:</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $teachers as $teacher )
                      <tr>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td>
                            <a href="{{route('edit.teacher', $teacher->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{route('delete.teacher',$teacher->id)}}" onclick="return confirm('Are you sure to delete??');" class="btn btn-danger">Delet</a>
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
