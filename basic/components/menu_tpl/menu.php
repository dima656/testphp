<?php /*?> <ul>
     <li ><a href="">item 1</a></li>
     <li ><a href="">item 2</a></li>
     <li ><a href="">item 3</a></li>
     <li ><a href="">item 4</a></li>
     <li ><a href="">item 5</a></li>
 </ul>
<?php */
 use yii\helpers\Url;
?>
<li>
    <a href="<?= Url::to(['category/view', 'id'=>$category['id']]) ?>"><?= $category['name'] ?>
    <?php if (isset($category['children'])): ?>
        <span class="badge pull-right">
    <i class="fa fa-plus"></i>
    </span>
        <?php endif; ?>
    </a>
    <?php if (isset($category['children'])): ?>
     <ul>
         <?= $this->getMenuHtml($category['children'])?>
     </ul>
    <?php endif; ?>
</li>
