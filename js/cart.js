// Write cart content
// function getCartInfo() {
//   let products;
//   $.getJSON("/shop/ajax/getCartContent.php", function (result) {
//     products = result;
//     console.log(result);
//   });
//   return products;
// }

// function writeCartContent(items) {
//   for (const i in items) {
//     $(".cartList").append(`
//                 <div class="d-flex m-5 justify-content-around">
//                     <div class="display-5"><p>${items[i]["name"]}</p></div>
//                     <div class="display-5"><p>${items[i]["price"]}</p></div>
//                     <div class="display-5 itemCount">
//                         <input value = "1" min="1" type="number" class="cartItem">
//                     </div>
//                     <div class="display-5">
//                         <button class="btn btn-outline-danger" type="submit">-</button>
//                     </div>
//                 </div>
//                 `);
//     console.log(items[i]["name"]);
//   }
//   console.log(items[0]["name"]);
// }

// const prod = getCartInfo();

// writeCartContent(prod);

function updateCart() {
  $.getJSON("/shop/ajax/getCartContent.php", function (result) {
    let products = result;
    $(".cartList").html("");
    for (const i in products) {
      $(".cartList").append(`
                  <div class="d-flex m-5 justify-content-between">
                      <div class="display-5"><p>${products[i]["name"]}</p></div>
                      <div class="display-5"><p>${products[i]["price"]}zł</p></div>
                      <div class="display-5 itemCount">
                          <input value = "${products[i]["count"]}" min="1" type="number" data-product="${products[i]["id"]}" class="cartItem">
                      </div>
                      <div class="display-5">
                          <button class="btn btn-outline-danger remove" type="submit" value="${products[i]["id"]}">-</button>
                      </div>
                  </div>
                  `);
    }

    $('.remove').click(function() {
      $.post('/shop/ajax/updateCart.php', 
              {
                action: "delete",
                product_id: $(this).val(),
                data: 0
              }, function () {
                updateCart();
              });
    });

    $('.cartItem').on('input', function () {
      $.post('/shop/ajax/updateCart.php', 
              {
                action: "update",
                product_id: $(this).data('product'),
                data: $(this).val()
              }, function () {
                updateCart();
              });
    });
  });
}

updateCart();