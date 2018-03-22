<div id="goods-page">
    <div class="search">
        <form action="<?php echo url('goods/search')?>">
            <input type="text" name="name_search" id="cat_search"
                <?php if($search_params != NULL) {?>
                    value=<?php echo $search_params['name_search']?>
                <?php  }?>>
            <select name="cat_search" id="cat_search">
                <option value=""><?php echo t('- Select category -')?></option>
                <?php foreach ($cats as $cat_key => $cat_item): ?>
                    <?php if($search_params != NULL) {?>
                        <?php if($search_params['cat_search'] == $cat_key) {?>
                            <option value="<?php echo $cat_key?>" selected><?php echo $cat_item?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $cat_key?>"><?php echo $cat_item?></option>
                        <?php  }?>
                    <?php }else{ ?>
                        <option value="<?php echo $cat_key?>"><?php echo $cat_item?></option>
                    <?php  }?>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="<?php echo t('search')?>">
        </form>
    </div>
    <a href="<?php echo url('/goods/add')?>"><?php echo t('Add new')?></a>
    <?php if(count($goods) > 0) {?>
    <table>
        <thead>
            <tr>
                <th> Номер </th>
                <th class="sortfield sortbyname" title="Сортировать по названию"> Назвение </th>
                <th> Категория </th>
                <th class="sortfield sortbyprice" title="Сортировать по цене"> Цена </th>
                <th> Действие </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goods as $good_item): ?>
                <tr>
                    <td><?php echo $good_item->id ?></td>
                    <td><?php echo $good_item->name ?></td>
                    <td><?php echo $cats[$good_item->category] ?></td>
                    <td><?php echo $good_item->price ?></td>
                    <td><a href="<?php echo url('/goods/'.$good_item->id.'/edit')?>">изменить</a> / <a href="<?php echo url('/goods/'.$good_item->id.'/delete')?>">удалить</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php }else{ echo t('<div>No goods available</div>');}?>
</div>