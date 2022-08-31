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

          <div class="container mt-20">
            <div class="row">
                <div class="col-sm-12">
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
                </div>
            </div>
          </div>

          <div class="container mt-20">
            <div class="row">
                <div class="col-sm-12">
                    <form class="row g-3" method="post" action="{{url('save')}}">
                        @csrf
                        <div class="col-md-6">
                          <label for="usia_kematian_a" class="form-label"><b>Person A:</b> Age of death </label>
                          <input type="number" class="form-control" id="usia_kematian_a" name="usia_kematian_a" required>
                        </div>
                        <div class="col-md-6">
                          <label for="tahun_kematian_a" class="form-label"><b>Person A:</b> Year of Death</label>
                          <input type="number" class="form-control" id="tahun_kematian_a" name="tahun_kematian_a" required>
                        </div>
                        <div class="col-md-6">
                            <label for="usia_kematian_b" class="form-label"><b>Person B:</b> Age of death </label>
                            <input type="number" class="form-control" id="usia_kematian_b" name="usia_kematian_b" required>
                          </div>
                          <div class="col-md-6">
                            <label for="tahun_kematian_b" class="form-label"><b>Person B:</b> Year of Death</label>
                            <input type="number" class="form-control" id="tahun_kematian_b" name="tahun_kematian_b" required>
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
                  @foreach($row as $key)
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
                                  <th scope="row">#</th>
                                  <td>{{$key->usia_kematian_a}}</td>
                                  <td>{{$key->tahun_kematian_a}}</td>
                                  <td>{{$key->usia_kematian_b}}</td>
                                  <td>{{$key->tahun_kematian_b}}</td>
                                  <td>{{$key->result}}</td>
                                  <td>
                                    <a href="{{url('delete/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Edit
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <div class="card">
                                    <div class="card-body">
                                      <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Given</b></li>
                                        <li class="list-group-item">Person A: Age of death = {{$key->usia_kematian_a}}, Year of Death = {{$key->tahun_kematian_a}} </li>
                                        <li class="list-group-item">Person B: Age of death = {{$key->usia_kematian_b}}, Year of Death = {{$key->tahun_kematian_b}} </li>
                                        <li class="list-group-item"><b>Answer:</b></li>
                                        <li class="list-group-item">Person A born on Year = {{$key->tahun_kematian_a}} – {{$key->usia_kematian_a}} = {{Helper::Un($key->usia_kematian_a,$key->tahun_kematian_a)['tahun']}}, number of people killed on year {{Helper::Un($key->usia_kematian_a,$key->tahun_kematian_a)['tahun']}} is {{Helper::Un($key->usia_kematian_a,$key->tahun_kematian_a)['kematian']}}. </li>
                                        <li class="list-group-item">Person B born on Year = {{$key->tahun_kematian_b}} – {{$key->usia_kematian_b}} = {{Helper::Un($key->usia_kematian_b,$key->tahun_kematian_b)['tahun']}}, number of people killed on year {{Helper::Un($key->usia_kematian_b,$key->tahun_kematian_b)['tahun']}} is {{Helper::Un($key->usia_kematian_b,$key->tahun_kematian_b)['kematian']}}. </li>
                                        <li class="list-group-item"><b>Result</b></li>
                                        @if($key->result == -1)
                                          <li class="list-group-item">
                                            (i.e. negative age, person who born before the witch took control) the program return {{$key->result}}
                                          </li>
                                        @else
                                          <li class="list-group-item">So the average is ( {{Helper::Un($key->usia_kematian_a,$key->tahun_kematian_a)['kematian']}} + {{Helper::Un($key->usia_kematian_b,$key->tahun_kematian_b)['kematian']}} )/2 = {{$key->result}}</li>
                                        @endif
                                      </ul>
                                    </div>
                                  </div>
                                </tr>
                              </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Witch Saga</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form class="row g-3" method="post" action="{{url('update')}}">
                          <div class="modal-body">
                            
                              @csrf
                              <input type="hidden" name="id" value="{{$key->id}}">
                              <div class="col-sm-12">
                                <label for="usia_kematian_a" class="form-label"><b>Person A:</b> Age of death </label>
                                <input type="number" class="form-control" value="{{$key->usia_kematian_a}}" id="usia_kematian_a" name="usia_kematian_a" required>
                              </div>
                              <div class="col-sm-12">
                                <label for="tahun_kematian_a" class="form-label"><b>Person A:</b> Year of Death</label>
                                <input type="number" class="form-control" value="{{$key->tahun_kematian_a}}" id="tahun_kematian_a" name="tahun_kematian_a" required>
                              </div>
                              <div class="col-sm-12">
                                  <label for="usia_kematian_b" class="form-label"><b>Person B:</b> Age of death </label>
                                  <input type="number" class="form-control" value="{{$key->usia_kematian_b}}" id="usia_kematian_b" name="usia_kematian_b" required>
                                </div>
                                <div class="col-sm-12">
                                  <label for="tahun_kematian_b" class="form-label"><b>Person B:</b> Year of Death</label>
                                  <input type="number" class="form-control" value="{{$key->tahun_kematian_b}}" id="tahun_kematian_b" name="tahun_kematian_b" required>
                                </div>
                          
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update changes</button>
                          </div>
                        </form>
                        </div>
                      </div>
                    </div>

                    @endforeach

                </div>
            </div>
          </div>
    </section>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>