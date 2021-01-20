<div class="product-widget">
    <div class="product-img">
        <a href="<?php echo 'index.php?page=ChiTiet&id=' . $key ?>" >
            <img src="<?php echo $value['avatar'] ?>" alt="">
        </a>
    </div>
    <div class="product-body">
        <h3 class="product-name"><a href="<?php echo 'index.php?page=ChiTiet&id=' . $key ?>">
                <?php echo $value['name'] ?>
            </a></h3>
        <h4 class="product-price"><span class="qty">
                <?php echo $value['quantity'] ?>
                x
            </span>
            <?php echo number_format($value['price'], 0, '.', '.') . '₫' ?>
        </h4>
    </div>
    <button class="delete" onclick = "cartAction('remove', <?php echo '\'' . $key . '\'' ?> ) "><i
            class="fa fa-close"></i></button>
</div>