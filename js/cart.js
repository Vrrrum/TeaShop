// Write cart content
function getCartInfo() {
  let products;
  $.getJSON("/shop/ajax/getCartContent.php", function (result) {
    products = result;
    console.log(result);
  });
  return products;
}

function writeCartContent(items) {
  for (const i in items) {
    $(".cartList").append(`
                <div class="d-flex m-5 justify-content-around">
                    <div class="display-5"><p>${items[i]["name"]}</p></div>
                    <div class="display-5"><p>${items[i]["price"]}</p></div>
                    <div class="display-5 itemCount">
                        <input value = "1" min="1" type="number" class="cartItem">
                    </div>
                    <div class="display-5">
                        <button class="btn btn-outline-danger" type="submit">-</button>
                    </div>
                </div>
                `);
    console.log(items[i]["name"]);
  }
  console.log(items[0]["name"]);
}

const products = getCartInfo();

writeCartContent(products);
