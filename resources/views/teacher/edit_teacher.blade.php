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
        <h2>Insert Teacher info:</h2>
        <h2>{{Session::get('sms')}}</h2>
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('update.teacher')}}" method="POST">
                    @csrf
                    <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                    <div class="mb-3">
                      <label  class="form-label">Name:</label>
                      <input type="text" name="name" class="form-control" value="{{$teacher->name}}"  placeholder="name" >
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{$teacher->email}}"  placeholder="email">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" value="{{$teacher->phone}}"  placeholder="phone">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                  </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
