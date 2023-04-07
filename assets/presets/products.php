<?php
require_once "classes/product.php";

$product = new Product($db);
$productsCount = $product->getProductsCount();
$idArray = $product->getIdArray();
?>


<div class="container px-4 px-lg-5 mt-5">
  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
  <?php 
  foreach($idArray as $id)
  {
  ?>
    <div class="col mb-5">
      <div class="card h-100">
        <!-- Product image-->
        <img
          class="card-img-top"
          src="/shop/assets/img/products/<?=$product->getImage($id)?>.webp"
        />
        <!-- Product details-->
        <div class="card-body p-4">
          <div class="text-center">
            <!-- Product name-->
            <h5 class="fw-bolder"><?=$product->getName($id)?></h5>
            <!-- Product price-->
            <?=$product->getPrice($id)?>zł
          </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
          <div class="text-center">
            <a class="btn btn-outline-dark mt-auto" href="/shop/product.php?id=<?=$id?>">Pokaż więcej</a>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  </div>
</div>
