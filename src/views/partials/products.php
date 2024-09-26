<div class="col-7 offset-1">
    <?php
        $products = get_product_model()->getProducts();

        if ($_GET) {
            if (isset($_GET['sortBy'])) {
                switch ($_GET['sortBy']) {
                    case 'name':
                        $products = $products->sortBy('name');
                        break;
                    case 'date':
                        $products = $products->sortBy('date')->reverse();
                        break;
                    case 'lower_price':
                        $products = $products->sortBy('price');
                        break;

                    default:
                        break;
                }
            }

            if (isset($_GET['changeCategory'])) {
                $products = $products->where('category_id', $_GET['changeCategory']);
            }
        }
    ?>

    <div class="row d-flex justify-content-between" id="products-block">
        <?php
            if (!$products->isEmpty()) {
                foreach ($products as $product) {
                    echo product_card_template($product);
                }
            } else {
                echo '<h1>404</h1>';
            }
        ?>

    </div>
</div>