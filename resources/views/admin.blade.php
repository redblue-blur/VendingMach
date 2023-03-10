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
    <table class="table">
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
<form id="submit" action="{{ secure_url('/pay') }}" method="post">
  @csrf
  <br>
  <!-- Email input -->
  <div class="form-outline row justify-content-start">
    <div class="col-md-2">
    <input type="button" class="btn btn-primary coin5" value="coin of 5">
    </div>
    <div class="col-md-2">
    <input type="button"  class="btn btn-primary coin10" value="coin of 10">
    </div>
    <div class="col-md-2">
    <input type="button"  class="btn btn-primary coin20" value="coin of 20">
    </div>
    <div class="col-md-2">
    <input type="button"  class="btn btn-primary coin50" value="coin of 50">
    </div>
    <div class="col-md-2">
    <input type="button"  class="btn btn-primary coin100" value="coin of 100">
    </div>
    <div class="col-md-2">
    <input type="button"  type="button" id="exit" onclick="exit()"class="btn btn-primary btn-block mb-4" value="Exit">
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
  <input type="hidden" id="id" name="id" value="">
  <input type="hidden" id="coins" name="coins" value="">
  <!-- Submit button -->
  <input type="button" id="pay" class="btn btn-primary btn-block mb-4" value="Pay">

  <h3 id="insuff"></h3>
  </div>
</form>
</div>
  </body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ secure_asset('/js/jquery.validate.min.js') }}"></script>
<!-- <script src="{{ secure_asset('/js/additional-methods.min.js') }}"></script> -->
<script>
let total = 0;
const coins = [0, 0, 0, 0, 0];
$(document).ready(function(){
  let price = 0;
  let id=0;
  $(".select").click(function() {
      $("#payment").show();
      price=$(this).attr('data-price');
      id=$(this).attr('data-id');
      console.log('price = '+price+' & id = '+id);
      $("#cost").html("Cost of product "+$(this).attr('data-id')+":-"+price);  
  });
  $(".coin5").click(function() {
    total=total+5;
    coins[0]=coins[0]+1;
    console.log("coin5");
    document.getElementById("total").innerHTML = total;
  });
  $(".coin10").click(function() {
    total=total+10;
    coins[2]=coins[1]+1;
    console.log("coin10");
    document.getElementById("total").innerHTML = total;
  });
  $(".coin20").click(function() {
    total=total+20;
    coins[2]=coins[2]+1;
    console.log("coin20");
    document.getElementById("total").innerHTML = total;
  });
  $(".coin50").click(function() {
    total=total+50;
    coins[3]=coins[3]+1;
    console.log("coin50");
    document.getElementById("total").innerHTML = total;
  });
  $(".coin100").click(function() {
    total=total+100;
    coins[4]=coins[4]+1;
    console.log("coin100");
    document.getElementById("total").innerHTML = total;
  });
  $("#exit").click(function() {
    total=0;
    coins = [0, 0, 0, 0, 0];
    console.log("Empty");
    document.getElementById("total").innerHTML = total;
  });
  $("#pay").click(function(e) {
    console.log('pay')
    $("#coins").val(coins);
    $("#id").val(id);
    if (price > total) {
      let diff =price-total;
      console.log('diff')
      document.getElementById("insuff").innerHTML = "add :-"+diff;
    }
    else{  
      console.log("payment");
      document.getElementById("submit").submit();
    }
  });
});
</script>
</html>