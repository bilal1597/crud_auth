<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Edit Product</h1>
            </div>
            <div class="card-body">
                <form action="{{route('edit.product', $product->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <form>
                        <input type="hidden" name="id" value="{{$product->id}}" >
                        <div class="mb-3">
                            <label for="exampleInputname" class="form-label">Product Name</label>
                            <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control " id="exampleInputname" placeholder="Enter Full Name">
                            @error('product_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Details</label>
                            <input name="details" type="text" value="{{$product->details}}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                            @error('details')
                            <span class="text-danger">{{$message}} </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputbatch" class="form-label">price</label>
                            <input type="number" name="price" value="{{$product->price}}" class="form-control " id="exampleInputbatch" placeholder="Enter Batch Year">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
