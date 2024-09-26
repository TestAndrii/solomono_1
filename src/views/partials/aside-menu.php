<div class="col-2 offset-1 d-flex justify-content-start flex-column">
<?php
    $categories = get_category_model()->getCategories();
    $selectSize = $categories->count();
    echo '<select size='. $selectSize .'  class="form-select text-center" id="category-select">';

    $categories->each(function ($category, $index) {
    $isActive = (
            key_exists('changeCategory', $_GET) &&
            $_GET['changeCategory'] == $category->id
    )? 'selected' : '';
    $count = get_product_model()->countProducts($category->id);
    echo '<option value="' . $category->id . '" ' . $isActive . '>' . $category->name . ' ('. $count .')</option>';
    });
?>
    </select>
    <select class="form-select mt-5 text-center" id="sort-by-select">
        <?php
        if (!key_exists('sortBy', $_GET)) {
            $_GET['sortBy'] = 'name';
        }
        ?>
        <option value="lower_price" <?= $_GET['sortBy'] == 'lower_price' ? 'selected' : '' ?>>Сначала дешёвые</option>
        <option value="name" <?= $_GET['sortBy'] == 'name' ? 'selected' : '' ?>>По алфавиту</option>
        <option value="date" <?= $_GET['sortBy'] == 'date' ? 'selected' : '' ?>>Сначала новые</option>
    </select>
</div>