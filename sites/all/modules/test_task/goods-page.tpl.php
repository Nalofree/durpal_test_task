<div id="goods-page">
    <input type="text" name="search">
    <?php foreach ($goods as $good): ?>
        <span>
            <?php echo $good->name; ?>
        </span>
    <?php endforeach; ?>
</div>