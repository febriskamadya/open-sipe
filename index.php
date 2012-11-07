<?php
	require('includes/header.inc.php');	
?>
<div id="menu-secondary">
	<ul>
	<?php 
		$category_list = $category->getCategoryList('active', 'all');
		foreach($category_list as $cl) : 
	?>
		<li><a href="catalog.php?category=<?php echo $cl; ?>"><?php echo $category->getCategoryName($cl); ?></a></li>
	<?php endforeach; ?>
	</ul>
	<div class="clearfix"></div>
</div>
<div id="top-content">
	<div id="slideshow">
		<script type="text/javascript">

			$(document).ready(function(){	
	
				$("#slider").easySlider({
	
					auto: true, 
	
					continuous: true,
	
					numeric: true
	
				});
	
			});	
	
		</script>
		<div id="slider">

			<ul>
	
				<?php 
					$product_list = $product->getProductList('frontend');
					
					foreach($product_list as $pl):
						if($product->getPromoted($pl) == 1):
				?>
				<li>
					<a href="product.php?code=<?php echo $pl; ?>">
						<img src="<?php echo $product->getProductImageURL($pl, 1); ?>" />
						<div class="product-info">
							<div class="f-left">
								<span class="category"><?php echo $category->getCategoryName($product->getProductCategory($pl)); ?></span>
								<span class="product-title"><?php echo $product->getProductName($pl); ?></span>
							</div>
							<div class="f-right">
								<span class="currency">Rp</span>
								<span class="price"><?php echo simplePrice($product->getProductPrice1($pl)); ?></span>
							</div>
							<div class="clearfix"></div>
						</div>
					</a>
				</li>

				<?php 
						endif;
					endforeach;
				?>

			</ul>

		</div>
	</div>
	<div id="banner-right">
		<a href="http://www.twitter.com/kuonlinestore" target="_blank"><img src="assets/images/template/home-sidebar-twitter.png" alt="Twitter"/></a>
		<a href="page.php?p=kontak"><img src="assets/images/template/home-sidebar-contact.png" alt="Kontak Korean Updates Online Store"/></a>
		<img src="assets/images/template/home-sidebar-payment.png" alt="Payment"/>
	</div>
	<div id="clearfix"></div>
</div>
						</div>
						
						<div id="home-catalog-title">
							<div class="mm-l"></div>
							<div class="mm-c"></div>
							<div class="mm-r"></div>
						</div>
						
						<div id="home-catalog">
							<div id="main">
							<ul id="holder">
							<?php 

							$product_list = $product->getProductList('frontend');

							$i = 1;
							$j = 0;

							foreach($product_list as $pl)
							{
								if($i == 1)
								{
									echo '<li>';
								}
									
								?>

									<div class="product-grid <?php if($i%4 == 0): ?>rm-margin-r<?php endif; ?>">
										<div class="product-grid-img">
											<?php if($product->getProductStatus($pl) == 2): ?>
												<div class="badge-preorder"></div>
											<?php elseif($product->getProductStatus($pl) == 3): ?>
												<div class="badge-limited"></div>
											<?php elseif($product->getProductStatus($pl) == 4): ?>
												<div class="badge-best-seller"></div>
											<?php elseif($product->getProductStatus($pl) == 5): ?>
												<div class="badge-sold-out"></div>
											<?php endif;?>
											
											<a href="product.php?code=<?php echo $pl ?>">
												<img src="<?php echo $product->getProductImageURL($pl, 3)?>" width="198"/>
											</a>	
										</div>
										<div class="product-grid-title">
											<div class="pgt-l">
												
											</div>
											<div class="pgt-c">
												<a href="product.php?code=<?php echo $pl ?>">
													<div class="w150 f-left">
														<span class="category"><?php echo $category->getCategoryName($product->getProductCategory($pl)); ?></span>
														<span class="product-title"><?php echo $product->getProductName($pl); ?></span>
													</div>
													<div class="f-right">
														<span class="currency">Rp</span>
														<span class="price"><?php echo simplePrice($product->getProductPrice1($pl)); ?></span>
													</div>
													<div class="clearfix"></div>
													
												</a>
											</div>
											<div class="pgt-r">
												
											</div>
										</div>
									</div>
								
								
								
								
								<?php

								$i++;
								$j++;


								if($i == 9)
								{
									$i = 1;
									echo '</li>';
								}

								if($j == sizeof($product_list))
								{
									echo '';
								}

							}

							?>
							
							<?php
								$remain = sizeof($product_list) % 4 ;
									if($remain != 0)
									{
										$n = 4 - $remain;
										for($m = 1; $m <= $n; $m++) 
										{
							?>
									
									<div class="product-grid <?php if($m == $n): ?>rm-margin-r<?php endif; ?>">
										<div class="product-grid-img">
									
										</div>
										<div class="product-grid-title">
											<div class="pgt-l">
												
											</div>
											<div class="pgt-c">
												&nbsp;
											</div>
											<div class="pgt-r">
												
											</div>
										</div>
									</div>							
									
							<?php
											
										}
										echo '</li>';
									}
							?>
							
							
						
							</ul>
							</div>
						</div>
<?php
	require('includes/footer.inc.php');	
?>		
						
						
		
