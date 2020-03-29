<!--<div class="sitemap"><a href="#"><h3>sitemap1</h3></a></div>-->
<!--<div class="sitemap"><a href="#"><h3>sitemap1</h3></a></div>-->
<!--<div class="sitemap"><a href="#"><h3>sitemap1</h3></a></div>-->
<!--<div class="sitemap"><a href="#"><h3>sitemap1</h3></a></div>-->
<?php if(isset($productsModel)) : foreach ($productsModel AS $pro) :?>
    <div class="sitemap"><a href="<?php echo url('product/view/'.$pro->id. '/'. rawurldecode(str_replace(' ', '-',$pro->name)) ) ?>"><h3><?php echo url('product/view/'.$pro->id. '/'. rawurldecode(str_replace(' ', '-',$pro->name)) ) ?></h3></a></div>

<?php endforeach; endif;  ?>