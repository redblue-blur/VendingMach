<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <style>
    td,th {
      text-align: center;
    }
    .wide {
      width: 50%;
    }
    .num {
      width: 15%;
    }
    #payment{
      display: none;
		}
  </style>
  </head>
  <body>
  <div class="container border">
    <table class="table ">
        <thead>
            <tr>
                <th class="num">Product_Id</th>
                <th class="wide">Product_Name</th>
                <th class="num">Price</th>
                <th class="num">Select</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                @if($product->count >= 1 )
                  <a >
                    <button class="btn btn-primary select " data-price="{{ $product->price }}" data-id="{{ $product->id }}">Select</button>
                  </a>
                @else
                  <button class="btn btn-primary" disabled>Select</button>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h3 id="cost"></h3>
</div>
<div id="payment" class="container text-center border">
<form>
  
  <br>
  <!-- Email input -->
  <div class="form-outline row justify-content-start">
    <div class="col-md-2">
    <button class="btn btn-primary coin5" id="exit">coin of 5</button>
    </div>
    <div class="col-md-2">
    <button class="btn btn-primary coin10" id="exit">coin of 10</button>
    </div>
    <div class="col-md-2">
    <button class="btn btn-primary coin20" id="exit">coin of 20</button>
    </div>
    <div class="col-md-2">
    <button class="btn btn-primary coin50">coin of 50</button>
    </div>
    <div class="col-md-2">
    <button class="btn btn-primary coin100">coin of 100</button>
    </div>
    <div class="col-md-2">
    <button type="button" id="exit" onclick="exit()"class="btn btn-primary btn-block mb-4">Exit</button>
    </div>
  </div>
  <br>
  <div class="form-outline row justify-content-start">
    <div class="col-md-4">
    <h5>Total</h5>
    </div>
    <div class="col-md-2 offset-md-5">
    <h3 id="total">0</h3>
    </div>
  </div>

  <!-- Submit button -->
  <button type="button" id="pay" onclick="pay()" class="btn btn-primary btn-block mb-4">Pay</button>

  <h3 id="transation"></h3>
  </div>
</form>
</div>
  </body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ secure_asset('/js/jquery.validate.min.js') }}"></script>
<script src="{{ secure_asset('/js/additional-methods.min.js') }}"></script>
<script>
let total = 0;
const coins = [0, 0, 0, 0, 0];
$(document).ready(function(){

  $(".select").click(function() {
      $("#payment").show();
      console.log('price = '+$(this).attr('data-price'));
      let price=$(this).attr('data-price');
      
      $("#cost").html("Cost of product "+$(this).attr('data-id')+":-"+price);  
  });
  $("#coin5").click(function(e) {
    total=total+5;
    coins[0]=coins[0]+1
    document.getElementById("total").innerHTML = total;
  });
  $("#coin10").click(function(e) {
    total=total+10;
    coins[0]=coins[0]+1
    document.getElementById("total").innerHTML = total;
  });
  $("#coin20").click(function(e) {
    total=total+20;
    coins[0]=coins[0]+1
    document.getElementById("total").innerHTML = total;
  });
  $("#coin50").click(function(e) {
    total=total+50;
    coins[0]=coins[0]+1
    document.getElementById("total").innerHTML = total;
  });
  $("#coin100").click(function(e) {
    total=total+100;
    coins[0]=coins[0]+1
    document.getElementById("total").innerHTML = total;
  });
  $("#exit").click(function(e) {
    console.log("yo");
    total=0;
    coins = [0, 0, 0, 0, 0]
    document.getElementById("total").innerHTML = total;
  });
  $("#pay").click(function(e) {
    if (price <= total) {
      let diff =price-total;
      document.getElementById("transation").innerHTML = "add :-"+diff;
    }
  });
});
</script>
</html>