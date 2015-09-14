<!-- START MOBILE CONTROLS -->
        		<!-- LEFT SIDE -->
        		<div class="pull-left full-height visible-sm visible-xs">
          			<!-- START ACTION BAR -->
          			<div class="sm-action-bar">
            			<a href="#" class="btn-link toggle-sidebar" data-toggle="sidebar">
              				<span class="fa fa-bars"></span>
            			</a>
         			</div>
          			<!-- END ACTION BAR -->
        		</div>
        		<!-- RIGHT SIDE -->
        		<div class="pull-right full-height visible-sm visible-xs">
          			<!-- START ACTION BAR 
          			<div class="sm-action-bar">
            			<a href="#" class="btn-link" data-toggle="quickview" data-toggle-element="#quickview">
              				<span class="icon-set menu-hambuger-plus"></span>
            			</a>
          			</div>
          			<!-- END ACTION BAR -->
        		</div>
        		<!-- END MOBILE CONTROLS -->
        		<div class=" pull-left sm-table">
          			<div class="header-inner">
            			<div class="brand inline">
             				<img class="com-logo"src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" alt="logo" data-src="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" data-src-retina="<?= $this->Url->build(['controller'=>'Company','action'=>'Logo'])?>" width="95" height="30">
            			</div>
            			<!-- BEGIN NOTIFICATION DROPDOWN -->
            			<ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
              				<li class="p-r-15 inline">
                				<div class="dropdown">
                  					<a href="javascript:;" id="notification-center" class="icon-set globe-fill" data-toggle="dropdown">
                    					<span class="bubble"></span>
                  					</a>
                  					<div class="dropdown-menu notification-toggle" role="menu" aria-labelledby="notification-center">
                    					<div class="notification-panel">
                      						<!-- START Notification Body-->
                      						<div class="notification-body scrollable">
                       							<!-- START Notification Item-->
                        						<div class="notification-item  clearfix">
                          							<div class="heading">
                            							<a href="#" class="text-danger">
                              								<i class="fa fa-exclamation-triangle m-r-10"></i>
                              								<span class="bold">98% Server Load</span>
                              								<span class="fs-12 m-l-10">Take Action</span>
                            							</a>
                            							<span class="pull-right time">
                                                        	2 mins ago
                                                    	</span>
                          							</div>
                          							<div class="option">
                            							<a href="#" class="mark"></a>
                          							</div>
                        						</div>
                        						<!-- END Notification Item-->
                      						</div>
                     						<!-- END Notification Body-->
                      						<!-- START Notification Footer-->
                      						<div class="notification-footer text-center">
                        						<a href="#" class="">Read all notifications</a>
                        						<a data-toggle="refresh" class="portlet-refresh text-black pull-right" href="#">
                          							<i class="pg-refresh_new"></i>
                        						</a>
                     						</div>
                      						<!-- END Notification Footer-->
                    					</div>
                 					</div>
                				</div>
              				</li>
              				<li class="p-r-15 inline">
                				<a href="#" class="icon-set clip "></a>
              				</li>
              				<li class="p-r-15 inline">
                				<a href="#" class="icon-set grid-box"></a>
              				</li>
            			</ul>
            			<!-- END NOTIFICATION DROPDOWN -->
            			
          			</div>
        		</div>
        		<div class=" pull-right">
          			<div class="header-inner">
            		
          			</div>
        		</div>
        		<div class=" pull-right">
          			<!-- START User Info-->
          			<div class="visible-lg visible-md m-t-10">
            			<div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
              				<span class="semi-bold user_name"><?= $user ?></span>
            			</div>
                        <div class="dropdown pull-right">
             	 			<button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                				<span class="thumbnail-wrapper d32 circular inline m-t-5">
									<img class="user_image" alt="user image" src="<?= $this->Url->build(['controller'=>'admin','action'=>'image',$act])?>" width="32" height="32"/>
            					</span>
              				</button>
              				<ul class="dropdown-menu profile-dropdown" role="menu">
               					<li class="user-header" style="padding:10px; text-align: center">
                	<!--90x90-->
                    				<div  style=" width:250px;text-align:center; display: flex;">
                    					<div class="thumbnail-wrapper circular bordered" style="width:90px; height:90px; margin:auto; display:block">
											<img class="user_image" alt="user_image" src="<?= $this->Url->build(['controller'=>'admin','action'=>'image',$act])?>" width="90" height="90"/>
                    					</div>
                					</div>
                    				<span class="user_name block bold"><?= $user ?></span>
                                    <span class="block user_type"><?= $role ?></span>
                				</li>
                				<li class="user-body">
                                	<ul class="user-body-wrap nav">
                                		<li class="user-links">
                                			<a  href="<?= $this->Url->build(['controller' =>'admin','action' =>'profile', $act])?>" id="link-profile">
                                            	<i class="fa fa-user"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="user-links">
                                        	<a  href="<?= $this->Url->build(['controller' =>'setting','action' =>'index'])?>" id="link-setting">
                                            	<i class="fa fa-gear"></i>
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                				</li>
                				<li class="user-footer">
                                	<a id="logout" href="<?= $this->Url->build(['controller'=>'admin','action'=>'logout'])?>">
                                    	<i class="fa fa-power-off"></i>Logout</a>
                				</li>
              				</ul>
           				 </div>
          			</div>
          			<!-- END User Info-->
        		</div>