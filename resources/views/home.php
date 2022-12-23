<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <!-- <table class="table">
        <thead>
            <tr>
                <th>Product_Id</th>
                <th>Product_Name</th>
                <th>Price</th>
                <th>Count</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <th>{{$product->product_id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->price}}</th>
                <th>
                  @if($product->count >= 1 )
                  $product->count
                  @else
                  Out of stock
                  @endif
                </th>
                  <a href="{{route('product.select',['id'=>$product->product_id])}}">
                    <button class="btn btn-primary">Select</button>
                  </a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table> -->
    
  </body>
</html>