		<div id="second-nav" class="row">
			<div class="search-panel col-lg-5">
				<img src="../images/icon-search.png" alt="Icône de recherche">
				<input type="search" placeholder="Rechercher">
			</div>
			<div class="profil-panel col-lg-7">
				<ul class="clearfix">
					<li>
						<a href="profil.php?id=<?php echo $_SESSION['id']?>" title="Profil">
							Bonjour <span class="user-name"><?php echo $userInfo['prenom']; ?></span>
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
							Notifications
							<img src="../images/icon-notif.png" alt="Icône de notification">
						</a>
					</li>
					
				</ul>
			</div>
		</div>