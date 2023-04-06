<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

<div>
    <!-- Button trigger modal -->


<!-- Modal -->

<div class="container">

                        <form action="/dashboard/products/{$id}" method="POST" enctype="multipart/form-data">
                         @method('put')   
                        @csrf
                           
                            <label for="exampleFormControlInput1" class="form-label"></label>
                                <select class="form-select" name="collection_id" aria-label="Default select example">
                                    <option selected value="{{$collection->collection_id}}">{{$collection->description_collection}}</option>
                                    @foreach($description as $key)  
                                    <option value="{{$key->id}}">{{$key->description_collection}}</option>
                                @endforeach
                                  </select>



                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <select class="form-select" name="type_id" aria-label="Default select example">
                                <option selected>Selecione a coleção:</option>
                                    <option value="{{$collection->type_id}}">{{$types->categories}}</option>
                                    @foreach($description as $key)  
                                    <option value="{{$key->id}}">{{$key->description_collection}}</option>
                                    @endforeach
                                </select>

                                <input  class="form-control" id="exampleFormControlInput1" name="code" value="{{$post->code}}" placeholder="Digite o valor">
                                <label for="exampleFormControlInput1" class="form-label"></label>
                                <input  class="form-control" id="exampleFormControlInput1" name="value" value="{{$post->value}}"  placeholder="Digite o valor">
                                <input  class="form-control" id="exampleFormControlInput1" name="reference"  value="{{$post->reference}}" placeholder="Digite a referencia">
                                <input  class="form-control" id="exampleFormControlInput1" name="description" value="{{$post->description}}" placeholder="Digite a Descrição">
                                <label for="formFile" class="form-label"></label>
                                <input class="form-control" type="file" name="patch" id="formFile">
                                <input type="hidden"  value="{{$post->patch}}" name="imagem">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>