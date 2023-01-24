<?php

/** @var $params \app\models\ProductModel
 */

?>
<div class="card">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-info text-gradient">Insert product</h3>
    </div>
    <div class="card-body">
        <form action="/createProductProcess" method="post" role="form">
            <label>Name</label>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" value="<?php echo $params->name; ?>" placeholder="Name" aria-label="Name" aria-describedby="name-addon">
                <?php
                if ($params !== null && $params->errors !== null) {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "name") {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Image url</label>
            <div class="mb-3">
                <input type="text" class="form-control" name="image_url" value="<?php echo $params->image_url; ?>" placeholder="Image url" aria-label="Image url" aria-describedby="image-url-addon">
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "image_url")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Price</label>
            <div class="mb-3">
                <input type="text" class="form-control" name="price" value="<?php echo $params->price; ?>" placeholder="Price" aria-label="Price" aria-describedby="price-addon">
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "price")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Categories</label>
            <div class="mb-3">
                <select name="category_id" id="category_id" class="form-control">
                    <?php
                        if ($params !== null && $params->categories !== null){
                            foreach ($params->categories as $category)
                            {
                                $id = $category["id"];
                                $name = $category["name"];
                                if ($params->category_id == $id)
                                {
                                    echo "<option value='$id' selected='selected'>$name</option>";
                                }else
                                {
                                    echo "<option value='$id'>$name</option>";
                                }
                            }
                        }
                    ?>
                </select>
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "category_id")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <label>Description</label>
            <div class="mb-3">
                <textarea class="form-control" name="description" placeholder="Enter description" aria-label="Description" aria-describedby="description-addon"><?php echo $params->description; ?></textarea>
                <?php
                if ($params !== null && $params->errors !== null)
                {
                    foreach ($params->errors as $objectNum => $item) {
                        if ($objectNum == "description")
                        {
                            echo "<span class='text-danger'>$item[0]</span>";
                        }
                    }
                }
                ?>
            </div>
            <div class="text-center">
                <button  type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0 btn-primary">Insert product</button>
            </div>
        </form>
    </div>
</div>