function updateCart() {
  $.getJSON("/shop/ajax/getCartContent.php", function (result) {
    let products = result;
    let finalPrice = 0;
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
      finalPrice += products[i]["price"] * products[i]["count"];
    }

    $("#final-price").text(`Cena: ${finalPrice} zł`);

    $(".remove").click(function () {
      $.post(
        "/shop/ajax/updateCart.php",
        {
          action: "delete",
          product_id: $(this).val(),
          data: 0,
        },
        function () {
          updateCart();
        }
      );
    });

    $(".cartItem").on("input", function () {
      $.post(
        "/shop/ajax/updateCart.php",
        {
          action: "update",
          product_id: $(this).data("product"),
          data: $(this).val(),
        },
        function () {
          updateCart();
        }
      );
    });
  });
}

updateCart();
