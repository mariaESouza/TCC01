<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="color:#5B5231;">
                    High Fashion
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse center" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active me-5" aria-current="page" style="color:#5B5231;" href="#"></a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" style="color:#5B5231;" href="#">register</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                             @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                 onclick="event.preventDefault(); 
                                 this.closest('form').submit();">
                            {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                        <li class="nav-item">
                            <a class="nav-link active me-5" aria-current="page" style="color:#5B5231;" href="#"></a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" style="color:#5B5231;" href="#">Home</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" style="color:#5B5231;" href="/dashboard/type">Listar Tipo</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" style="color:#5B5231;" href="/dashboard/collection">Listar Categoria</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link" style="color:#5B5231;" href="/dashboard/products">Listar Produtos</a>
                        </li>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-3 col-sm rounded-pill  border-opacity-2"
                            style="background-color:#e3e4df; border-color: #5B5231;" type="search"
                            placeholder="Oque procura ?" aria-label="Search">
                        <button class="btn btn-outline-success me-5 rounded-circle border-opacity-2" type="submit"><img
                                src="image-removebg-preview.png" width="15" height="15" alt=""></button>
                    </form>
                </div>
            </div>
        </nav>
        <div>
        <button type="button" class="btn btn-success me-3 col-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Adicionar Tipo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar tipo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/type" method="post">
                            @csrf
                            <div class="mb-3 g-3">
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input class="form-control"  name="categories" id="exampleFormControlInput1" placeholder="Tipo">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success me-3 col-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#duda">
Adicionar Categoria
</button>

<!-- Modal -->
<div class="modal fade" id="duda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar categoria</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="/dashboard/collection" method="post">
          @csrf
          <div class="mb-3 g-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input  class="form-control" id="exampleFormControlInput1"  name="description_collection" placeholder="Nome da categoria">
                </div>
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    </div>
       

    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success me-3 col-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#ProductsModal">
            Adicionar Produto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="ProductsModal" tabindex="-1" aria-labelledby="ProductsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ProductsModalLabel">Adicionar Produto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/dashboard/products" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 g-3">
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input class="form-control" id="exampleFormControlInput1" name="code" placeholder="Insira o codigo do produto:">

                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input  class="form-control" id="exampleFormControlInput1" name="reference" placeholder="Digite a referência do produto">

                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input  class="form-control" id="exampleFormControlInput1" name="description" placeholder="Breve descrição do produto">
                                
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <select class="form-select" name="type_id" aria-label="Default select example">
                                <option selected>Selecione a coleção:</option>
                                @foreach($result as $key)  
                                    <option value="{{$key->id}}">{{$key->categories}}</option>
                                @endforeach
                                </select>

                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <select class="form-select" name="collection_id" aria-label="Default select example">
                                <option selected>Selecione a coleção:</option>
                                @foreach($description as $key)  
                                    <option value="{{$key->id}}">{{$key->description_collection}}</option>
                                @endforeach
                                </select>
                                
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input  class="form-control" id="exampleFormControlInput1" name="value" placeholder="Digite o valor">


                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" name="patch" id="formFile">


                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>