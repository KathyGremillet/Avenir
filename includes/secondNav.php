		<div id="second-nav" class="row">
			<div class="search-panel col-lg-5 col-sm-7 col-xs-6">
				<img src="../images/icon-search.png" alt="Icône de recherche">
				<input type="search" placeholder="Rechercher">
			</div>
			<div class="profil-panel col-lg-7 col-sm-5 col-xs-6">
				<ul class="clearfix">
					<li>
						<a href="profil.php?id=<?php echo $_SESSION['id']?>" title="Profil">
							<span class="text">Bonjour <span class="user-name"><?php echo $userInfo['prenom']; ?></span></span>
							<div class="avatar">
								<?php
									if(!empty($userInfo['avatar'])) {

									echo '<img src="../membres/avatar/' . $userInfo['avatar'] . '" alt="Photo de profil">';
								
									} else{ 
										echo '<img src="../membres/avatar/default.jpg" alt="Photo de profil par défaut">';
									}
								?>
							</div>							
						</a>
					</li>
					<li>
						<a href="#" title="Notifications">
							<span class="text">Notifications</span>
							<img src="../images/icon-notif.png" alt="Icône de notification">
						</a>
					</li>
					
				</ul>
			</div>
		</div>