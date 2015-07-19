<?php
$flags['noicons'] = true;
$flags['noheader'] = true;
$flags['nobody'] = true;
$tngconfig['showshare'] = false;

tng_header( $sitename ? "" : $text['ourhist'], $flags );
if(!$cms['support'] && $sitever != "mobile")
	echo "<body>\n";
$title = getTemplateMessage('t13_maintitle');
$text['contactus_long'] = str_replace( "suggest.php", "suggest.php?page=$title", $text['contactus_long'] );
?>

<div id="art-main">
	<div class="cleared reset-box"></div>
	<div class="art-sheet">
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
						<div class="art-post">
						    <div class="art-post-body">
								<div class="art-post-inner art-article">
                                	<div class="art-postcontent">

										<div class="left-indent">
											<p class="big-header">
												<img src="<?php echo $cms['tngpath'] . $templatepath; ?>img/globe.jpg" id="globe" alt="" />
												<?php echo $title; ?>
											</p>
											<br />
											<?php echo tng_customhighlights(); ?>
											<br />
											<div class="photo-container">
												<img alt="" class="rounded10" src="<?php echo $cms['tngpath'] . $templatepath . $tmp['t13_mainimage']; ?>" id="mainphoto"/>
											</div>
											<br />
										</div>
										
										<table class="art-article">
											<tbody>
												<tr class="even">
													<td>
														<div class="left-indent newspaper2">
															<?php echo getTemplateMessage('t13_mainpara'); ?>
														</div>
														<div class="left-indent">
															<h4><?php echo $text['contactus']; ?></h4>
															<p class="contact"><img src="<?php echo $cms['tngpath'] . $templatepath; ?>img/email.gif" alt="email image" class="emailimg" /><?php echo $text['contactus_long']; ?></p>
														</div>
												</td>
												</tr>
											</tbody>
										</table>


                					</div>
                					<div class="cleared"></div>
                				</div>

								<div class="cleared"></div>
    						</div>
						</div>

                      	<div class="cleared"></div>
                    </div>
                    <div class="art-layout-cell art-sidebar1" id="tsearchbox">
						<div class="art-block">
    						<div class="art-block-body">
                				<div class="art-blockheader">
                    				<h2 class="site-head"><?php echo $text['search']; ?></h2>
                				</div>
                				<div class="art-blockcontent">
                    				<div class="art-blockcontent-body">
                						<div>
											<form method="get" name="searchform" action="search.php">
											  	<label for="myfirstname"><?php echo $text['firstname']; ?></label>
											    <input type="text" value="" name="myfirstname" />
											    <br />
											  	<label for="mylastname"><?php echo $text['lastname']; ?></label>
											    <input type="text" value="" name="mylastname" />
												<input type="hidden" name="mybool" value="AND" />
												<input type="submit" id="search-submit" value="<?php echo $text['search']; ?>" />
											</form>

											<br />
											<ul class="home-menus">
												<li><a href="surnames.php"><?php echo $text['surnames']; ?></a></li>
												<li><a href="searchform.php"><?php echo $text['mnuadvancedsearch']; ?></a></li>
											</ul>

											<br />
<?php
	if( $currentuser ) {
	    echo "<p><strong>{$text['welcome']}, $currentuserdesc.</strong></p>\n";
		echo "<ul class=\"home-menus\">\n";

		echo "<li><a href=\"logout.php\">{$text['mnulogout']}</a></li>\n";
	}
	else {
		echo "<ul class=\"home-menus\">\n";
		echo "<li><a href=\"login.php\">{$text['mnulogon']}</a></li>";
		if(!$tngconfig['disallowreg']) {
?>
			<li><a href="newacctform.php"><?php echo $text['mnuregister']; ?></a></li></p>
<?php
		}
	}

	echo "</ul>\n<br />\n";

	if($chooselang) {
		$query = "SELECT languageID, display, folder FROM $languages_table ORDER BY display";
		$result = tng_query($query);
		$numlangs = tng_num_rows( $result );

		if($numlangs > 1) {
			echo getFORM( "savelanguage2", "get", "tngmenu3", "" );
			echo "<select name=\"newlanguage3\" id=\"newlanguage3\" style=\"font-size:11px;\" onchange=\"document.tngmenu3.submit();\">";

			while( $row = tng_fetch_assoc($result)) {
				echo "<option value=\"{$row['languageID']}\"";
				if( $languages_path . $row['folder'] == $mylanguage )
					echo " selected=\"selected\"";
				echo ">{$row['display']}</option>\n";
			}
			echo "</select>\n";
			echo "<input type=\"hidden\" name=\"instance\" value=\"3\" /></form>\n";
		}

		tng_free_result($result);
	}
?>
										</div>
                                		<div class="cleared"></div>
                    				</div>
                				</div>
								<div class="cleared"></div>
    						</div>
						</div>

                      	<div class="cleared"></div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <div class="art-footer">
                <div class="art-footer-body">
                	<div class="art-footer-text">

						<div class="dotted-line">&nbsp;</div>
						<div id="linkarea">
							<ul class="left-indent">
								<li class="linkcol">
										<ul class="fancy_list">
											<li><a href="whatsnew.php"><?php echo $text['mnuwhatsnew']; ?></a></li>
											<li><a href="browsemedia.php?mediatypeID=photos"><?php echo $text['mnuphotos']; ?></a></li>
<?php
	if( $allow_admin ) {
?>
											<li><a href="showlog.php"><?php echo $text['mnushowlog']; ?></a></li>
<?php
	}
?>
											<li><a href="statistics.php"><?php echo $text['mnustatistics']; ?></a></li>
<?php
	if( $allow_admin ) {
?>
											<li><a href="admin.php"><?php echo $text['mnuadmin']; ?></a></li>
<?php
	}
?>
										</ul>
								</li>
							</ul>
						</div>
               			<div class="cleared"></div>
						<br />

						<div class="dotted-line">&nbsp;</div><br/>

<?php
	$flags['basicfooter'] = true;
	echo tng_footer($flags);
?>

                    </div>
                    <div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>

</body>
</html>