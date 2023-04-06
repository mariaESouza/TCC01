<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <title>Document</title>
</head>

<body>

    <div id="team-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="main-title">Outono 2023</h2>
                </div>
                @foreach($result as $key)
                <form action="/dashboard/products" method="post" enctype="multipart/form-data">
                            @csrf
                <div class="col-md-3">
                    <div class="card border border-3 border border-success p-2 mb-2 border-opacity-25">
                       
                    <img src="{{Storage::url($key->patch)}}" alt="" class="card-img-top" style="padding: 15px;">
                        <div class="card-body">
                            <h5 class="card-title">{{$key->code}}</h5>
                            <p class="card-text">R${{$key->value}}</p>
                        </div>
                    </div>
                </div>
               
               
        </form>
 
            <a href="{{url('/dashboard/products' . '/' . $key->id .'/edit') }}" class="btn btn-warning">Editar</a>
            <form class="btn-group"  action="{{ url('/dashboard/products' . '/' . $key->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Deseja realmente deletar?&quot;)">Deletar</button>
          </form>

          @endforeach
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>