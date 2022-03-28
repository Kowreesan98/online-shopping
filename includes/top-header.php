<?php 
//session_start();

?>

<div class="top-bar animate-dropdown">
 <h3>STAY HOME|STAY SAFE|SHOP ONLINE</h3>
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#">Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					<li><a href="my-account.php">My Account</a></li>
					<li><a href="my-wishlist.php">Wishlist</a></li>
					<li><a href="my-cart.php">My Cart</a></li>
					<li><a href="chat.php">Chat</a></li>
					<li><a href="track-orders.php" class="dropdown-toggle" ><span class="key">Track Order</b></a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php"></i>Login</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php"></i>Logout</a></li>
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->


					
					
						
					

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->