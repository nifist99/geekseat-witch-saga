<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{Helper::appName()}}</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
    
    <section>
        <div class="container">
            <!-- Content here -->
            <nav class="navbar bg-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="navbar-brand" href="{{url('/')}}">
                                <img src="{{url('image.png')}}" alt="" width="150" height="40" class="d-inline-block align-text-top">
                                {{Helper::appName()}}
                            </a>
                        </div>
                    </div>
                </div>
              </nav>

          </div>

          <div class="container mt-20">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                          Program Control The Witch
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">The story: Geekseat Witch Saga: Return of The Coder!</h5>
                        </div>
                      </div>
                </div>
            </div>
          </div>

          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

        @if(session()->has('message'))

          <div class="alert alert-{{session('message_type')}} alert-dismissible fade show" role="alert">
              <strong>{{session('message')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

        @endif

          <div class="container mt-20">
            <div class="row">
                <div class="col-sm-12">
                    <form class="row g-3" method="post" action="{{url('save')}}">
                        @csrf
                        <div class="col-md-6">
                          <label for="usia_kematian" class="form-label"><b>Person A:</b> Age of death </label>
                          <input type="number" class="form-control" id="usia_kematian" name="usia_kematian" required>
                        </div>
                        <div class="col-md-6">
                          <label for="tahun_kematian" class="form-label"><b>Person A:</b> Year of Death</label>
                          <input type="number" class="form-control" id="tahun_kematian" name="tahun_kematian" required>
                        </div>
                        <div class="col-md-6">
                            <label for="usia_kematian" class="form-label"><b>Person B:</b> Age of death </label>
                            <input type="number" class="form-control" id="usia_kematian" name="usia_kematian" required>
                          </div>
                          <div class="col-md-6">
                            <label for="tahun_kematian" class="form-label"><b>Person B:</b> Year of Death</label>
                            <input type="number" class="form-control" id="tahun_kematian" name="tahun_kematian" required>
                          </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Check Result</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>

          <div class="container mt-20">
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Person A : Age of death</th>
                                  <th scope="col">Person A : Year of Death</th>
                                  <th scope="col">Person B : Age of death</th>
                                  <th scope="col">Person B : Year of Death</th>
                                  <th scope="col">Result</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                  <td><a href="" class="btn btn-sm btn-primary">Edit</a></td>
                                </tr>
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
    </section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>