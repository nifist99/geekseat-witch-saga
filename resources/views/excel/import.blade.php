<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">

    <style>
        .spanner{
          position: absolute;
            top: 100%;
            left: 0;
            background: #2a2a2a55;
            width: 100%;
            display: block;
            text-align: center;
            color: #FFF;
            height: 200%;
            max-height: 200%;
            transform: translateY(-50%);
            z-index: 1000;
            visibility: hidden;
        }
        
        .overlay{
          position: fixed;
            width: 100%;
            height: 100vh;
          background: rgba(0,0,0,0.5);
          visibility: hidden;
        }
        
        .loader,
        .loader:before,
        .loader:after {
          border-radius: 50%;
          width: 2.5em;
          height: 2.5em;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
          -webkit-animation: load7 1.8s infinite ease-in-out;
          animation: load7 1.8s infinite ease-in-out;
        }
        .loader {
          color: #ffffff;
          font-size: 10px;
          margin: 200px auto;
          position: relative;
          text-indent: -9999em;
          -webkit-transform: translateZ(0);
          -ms-transform: translateZ(0);
          transform: translateZ(0);
          -webkit-animation-delay: -0.16s;
          animation-delay: -0.16s;
        }
        .loader:before,
        .loader:after {
          content: '';
          position: absolute;
          top: 0;
        }
        .loader:before {
          left: -3.5em;
          -webkit-animation-delay: -0.32s;
          animation-delay: -0.32s;
        }
        .loader:after {
          left: 3.5em;
        }
        @-webkit-keyframes load7 {
          0%,
          80%,
          100% {
            box-shadow: 0 2.5em 0 -1.3em;
          }
          40% {
            box-shadow: 0 2.5em 0 0;
          }
        }
        @keyframes load7 {
          0%,
          80%,
          100% {
            box-shadow: 0 2.5em 0 -1.3em;
          }
          40% {
            box-shadow: 0 2.5em 0 0;
          }
        }
        
        .show{
          visibility: visible;
        }
        
        .spanner, .overlay{
            opacity: 0;
            -webkit-transition: all 0.3s;
            -moz-transition: all 0.3s;
            transition: all 0.3s;
        }
        
        .spanner.show, .overlay.show {
            opacity: 1
        }
        </style>
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
                                <img src="{{url('excel.png')}}" alt="" width="150" height="60" class="d-inline-block align-text-top">
                                {{$title}}
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
                          Program Import Excel
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
                    <form class="row g-3" method="post" action="{{url('import')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                          <label for="excel" class="form-label"><b>Import File Excel</label>
                          <input type="file" class="form-control" id="excel" name="excel" required>
                        </div>
                        <div>
                            <a href="{{url('example.xlsx')}}" download>Template excel download disini !!!</a>
                        </div>
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                    </form>
                </div>
            </div>
          </div>

          <hr>

          <div class="container mt-20">
            <div class="row">
                <div>
                    <a href="{{url('delete')}}" class="btn btn-danger">delete all data</a>
                </div>
                <div class="col-sm-12 mt-20">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">package id</th>
                            <th scope="col">org</th>
                            <th scope="col">dst</th>
                            <th scope="col">trip</th>
                            <th scope="col">weight</th>
                            <th scope="col">owner</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($row as $key)
                          <tr>
                            <td>{{$key->package_id}}</td>
                            <td>{{$key->org}}</td>
                            <td>{{$key->dst}}</td>
                            <td>{{$key->trip}}</td>
                            <td>{{$key->weight}}</td>
                            <td>{{$key->owner}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $row->links() }}
                <div>
                    <p>Total data : {{$total}}</p>
                </div>
            </div>
          </div>

    </section>

    <div class="overlay"></div>
    <div class="spanner">
      <div class="loader"></div>
      <p>Please wait system import excel</p>
    </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
  $("input[type='submit']").click(function(){
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
  });
</script>
</body>
</html>