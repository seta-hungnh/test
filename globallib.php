<?php
@ini_set( "session.bug_compat_warn", "0" );
@ini_set( "allow_url_fopen", "0" );
session_start();
$session_language = $_SESSION['session_language'];
$session_charset = $_SESSION['session_charset'];

@set_time_limit(0);
//set binary to "binary" for more sensitive searches
$binary = "";
$notrunc = 0; //don't truncate if link doesn't go to showmedia
$envelope = false;

if( isset($offset) && $offset && !is_numeric($offset) ) die ("invalid offset");
$languages_path = "languages/";
$endrootpath = "";

$newroot = preg_replace( "/\//", "", $rootpath );
$newroot = preg_replace( "/ /", "", $newroot );
$newroot = preg_replace( "/\./", "", $newroot );
$errorcookiename = "tngerror_$newroot";
if( isset($_COOKIE[$errorcookiename]) ) {
	$message = $_COOKIE[$errorcookiename];
	$error = $message;
	setcookie("tngerror_$newroot", "", time()-31536000, "/");
}
else
	$error = "";

function tng_db_connect($dbhost,$dbname,$dbusername,$dbpassword) {
	global $textpart, $session_charset, $tng_notinstalled;
	$link = @mysql_connect($dbhost, $dbusername, $dbpassword);
	if ($session_charset == 'UTF-8')
		@mysql_set_charset('utf8');
	if( $link && mysql_select_db($dbname))
		return $link;
	else if( $textpart != "setup" && $textpart != "index" ) {
		if(isset($tng_notinstalled) && $tng_notinstalled){
			header("Location:readme.html");
			exit;
		}
		else
			echo "Error: TNG is not communicating with your database. Please check your database settings and try again.";
		exit;
	}
	return( FALSE );
}

function debugPrint($obj) {
	echo "<pre>\n";
	print_r($obj);
	echo "</pre>\n";
}

function constructName($firstnames, $lastnames, $suffix, $order) {
	switch($order) {
		case "3":
			if($lastnames && $firstnames) $lastnames .= ",";
			$namestr = trim("$lastnames $firstnames $suffix");
			break;
		case "2":
			$namestr = trim("$lastnames $firstnames");
			if($suffix) $namestr .= ", $suffix";
			break;
		default:
			$namestr = trim("$firstnames $lastnames");
			if($suffix) $namestr .= ", $suffix";
			break;
	}

	return $namestr;
}

function getName( $row, $hcard = null ) {
	global $nameorder;

	$locnameorder = $row['nameorder'] ? $row['nameorder'] : ($nameorder ? $nameorder : 1);
	$namestr = getNameUniversal($row, $locnameorder, $hcard);

	return $namestr;
}

function getNameRev( $row, $hcard = null ) {
	global $nameorder;

	$locnameorder = $row['nameorder'] ? $row['nameorder'] : ($nameorder ? $nameorder : 1);
	if($locnameorder != 2) $locnameorder = 3;
	$namestr = getNameUniversal($row, $locnameorder, $hcard);

	return $namestr;
}

function getNameUniversal($row, $order, $hcard=null) {
	global $text, $admtext, $tngconfig, $nonames;

	//$nonames = showNames($row);
	$lastname = trim( $row['lnprefix']." ".$row['lastname'] );
	if($tngconfig['ucsurnames']) $lastname = tng_strtoupper($lastname);
	if($hcard) $lastname = "<span class=\"family-name\">" . $lastname . "</span>";
	$title = $row['title'] && ($row['title'] == $row['prefix']) ? $row['title'] : trim($row['title'] . " " . $row['prefix']);
	if( ($row['allow_living'] || !$nonames) && ($row['allow_private'] || !$tngconfig['nnpriv']) ) {
		$firstname = $hcard ? "<span class=\"given-name\">" . $row['firstname'] . "</span>" : $row['firstname'];
		$firstname = trim( $title . " " . $firstname );
		$namestr = constructName($firstname, $lastname, $row['suffix'], $order);
	}
	elseif( $row['living'] && !$row['allow_living'] && $nonames == 1 )
		$namestr = $text['living'];
	elseif( $row['private'] && !$row['allow_private'] && $tngconfig['nnpriv'] == 1 )
		$namestr = $admtext['text_private'];
	else {  //initials
		$firstname = $hcard ? "<span class=\"given-name\">" . initials( $row['firstname']) . "</span>" : initials( $row['firstname']);
		$firstname = trim( $title . " " . $firstname );
		$namestr = constructName($firstname, $lastname, $row['suffix'], $order);
	}

	if($hcard) $namestr = "<span class=\"n\">$namestr</span>";
	return $namestr;
}

function getFamilyName( $row ) {
	global $text, $people_table;

	$righttree = checktree($row['gedcom']);

	$hquery = "SELECT firstname, lnprefix, lastname, living, private, branch, nameorder, gedcom FROM $people_table WHERE personID = \"{$row['husband']}\" AND gedcom = \"{$row['gedcom']}\"";
	$hresult = mysql_query($hquery) or die ($text['cannotexecutequery'] . ": $hquery");
	$hrow = mysql_fetch_assoc( $hresult );

	$hrights = determineLivingPrivateRights($hrow, $righttree);
	$hrow['allow_living'] = $hrights['living'];
	$hrow['allow_private'] = $hrights['private'];

	$husbname = getName( $hrow );
	mysql_free_result( $hresult );

	$wquery = "SELECT firstname, lnprefix, lastname, living, private, branch, nameorder, gedcom FROM $people_table WHERE personID = \"{$row['wife']}\" AND gedcom = \"{$row['gedcom']}\"";
	$wresult = mysql_query($wquery) or die ($text['cannotexecutequery'] . ": $wquery");
	$wrow = mysql_fetch_assoc( $wresult );

	$wrights = determineLivingPrivateRights($wrow, $righttree);
	$wrow['allow_living'] = $wrights['living'];
	$wrow['allow_private'] = $wrights['private'];

	$wifename = getName( $wrow );
	mysql_free_result( $wresult );

	return "$husbname/$wifename ({$row['familyID']})";
}

function initials( $name ) {
	global $session_charset;

	$newname = "";
    if($session_charset == "UTF-8") $name = utf8_decode($name);

	$token = strtok( $name, " " );
	do{
		if( substr( $token, 0, 1 ) != "(" ) { //In case there is a name in brackets, in which case ignore
			if($session_charset == "UTF-8")
				$newname .= utf8_encode(substr( $token, 0, 1 )) . ".";
			else
				$newname .= substr( $token, 0, 1 ) . ".";
		}
		$token = strtok(" ");
	}
	while( $token != "" );

	return $newname;
}

function showNames($row) {
	global $nonames, $tngconfig;

	return $row['private'] ? $tngconfig['nnpriv'] : $nonames;
}

function getGenderIcon($gender, $valign) {
	global $text, $cms;

	$icon = "";
	if($gender) {
		if($gender == "M") $genderstr = "male";
		elseif($gender == "F") $genderstr = "female";
		if($genderstr)
			$icon = "<img src=\"{$cms['tngpath']}img/tng_$genderstr.gif\" width=\"11\" height=\"11\" border=\"0\" alt=\"" . $text[$genderstr] . "\" style=\"vertical-align: " . $valign . "px;\"/>";
	}
	return $icon;
}

function getURL( $destination, $args, $ext=".php") {
        global $cms;

	if( $cms['support'] ) {
		if (class_exists('TNGcms')) {
			$url=TNGcms::getURL($destination, $args, $ext=".php", $cms);
		}
		else
			$url = $args ? $cms['url'] . "=$destination&" : $cms['url'] . "=$destination";
	}
	else
		$url = $args ? $cms['tngpath'] . $destination . $ext . "?" : $cms['tngpath'] . $destination . $ext;

	return $url;
}

function getFORM( $action, $method, $name, $id, $onsubmit=null ) {
	global $cms;

    if( !$cms['support'] )
        $url = $action ? $cms['tngpath'] . $action . ".php" : "";
    elseif(class_exists('TNGcms'))
        return TNGcms::getFORM($action, $method, $name, $id, $cms);
    elseif($cms['support']=="joomla")  // backwards compatibility
        $url = "index.php";
    elseif($cms['support']=="zikula")  // backwards compatibility
        $url = "index.php";
    else
        $url = "modules.php";          // backwards compatibility

	$formstr = "<form action=\"$url\"";
	if( $method )
		$formstr .= " method=\"$method\"";
	if( $name )
		$formstr .= " name=\"$name\"";
	if( $id )
		$formstr .= " id=\"$id\"";
	if( $onsubmit )
		$formstr .= " onsubmit=\"$onsubmit\"";

	$formstr .= ">\n";

	if( $cms['support'] ) {
		if ($cms['support']=="joomla") {
			$formstr .="<input type=\"hidden\" name=\"option\" value= \"com_tngbridge\" />\n";
			$formstr .="<input type=\"hidden\" name=\"Itemid\" value=\"39\" /> \n";
			$formstr .="<input type=\"hidden\" name=\"url\" value=\"$action\" /> \n";
		}
        elseif($cms['support']=="zikula") {
            $formstr .= "<input type=\"hidden\" name=\"module\" value=\"{$cms['module']}\" />\n";
            $formstr .= "<input type=\"hidden\" name=\"show\" value=\"$action\" />\n";
        }
		else {
			$formstr .= "<input type=\"hidden\" name=\"op\" value=\"modload\" />\n";
			$formstr .= "<input type=\"hidden\" name=\"name\" value=\"{$cms['module']}\" />\n";
			$formstr .= "<input type=\"hidden\" name=\"file\" value=\"$action\" />\n";
		}
	}

	return $formstr;
}

function isPhoto($row) {
	global $imagetypes;

	if( $row['form'] )
		$form = strtoupper($row['form']);
	else {
		preg_match( "/\.(.+)$/", $row['path'], $matches );
		$form = strtoupper($matches[1]);
	}

	if($row['path'] && !$row['abspath'] && in_array($form,$imagetypes))
		return true;
	else
		return false;
}

function getEventDisplay( $displaystr ) {
	global $mylanguage, $languages_path;
	
	$dispvalues = explode( "|", $displaystr );
	$numvalues = count( $dispvalues );
	if( $numvalues > 1 ) {
		$displayval = "";
		for( $i = 0; $i < $numvalues; $i += 2 ) {
			$lang = $dispvalues[$i]; 
			if( $mylanguage == $languages_path . $lang ) {
				$displayval = $dispvalues[$i+1];
				break;
			}
		}
	}
	else
		$displayval = $displaystr;
		
	return $displayval;
}

function checkbranch( $branch ) {
	global $assignedbranch;

	return ( !$assignedbranch || ( FALSE !== ( $pos = strpos( $branch, $assignedbranch, 0 ) ) ) ) ? 1 : 0;
}

function checktree( $tree ) {
	global $assignedtree;

	return ( !$assignedtree || $tree == $assignedtree );
}

//The following function is now obsolete
function determineLivingRights($row, $usedb = 0, $allow_living_db = 0, $allow_private_db = 0) {
	global $livedefault, $allow_living, $allow_private, $rightbranch, $tree;

    $allow_living_loc = $usedb ? $allow_living_db : $allow_living;
    $allow_private_loc = $usedb ? $allow_private_db : $allow_private;

	$rightbranch = checkbranch($row['branch']) ? 1 : 0;
	//echo "myg=" . $_SESSION['mygedcom'] . ", myp=" . $_SESSION['mypersonID'] . "rp=" . $row['personID'] . "<br>";
	//change $tree back to $row[gedcom] after all calling pages can be updated
    $living = $row['living'];
    $private = $row['private'];

    if(!$private && !$living) {
        $livingrights = 1;
    }
    else {
        $yes_living = $yes_private = true;
        $user_person = $_SESSION['mypersonID'] && $_SESSION['mygedcom'] == $tree && $_SESSION['mypersonID'] == $row['personID'];
        if($living) {
            if($livedefault != 2) {   //everyone has living rights
                if((!$allow_living_loc || !$rightbranch) && !$user_person) {
                    $yes_living = false;
                    //echo "fn={$row['firstname']}, al=$allow_living, br={$row['branch']}, rb=$rightbranch, up=$user_person<br>";
                }
            }
        }
        if($private) {
            if((!$allow_private_loc || !$rightbranch) && !$user_person)
                $yes_private = false;
        }
        $livingrights = $yes_living && $yes_private ? 1 : 0;
    }
	//$livingrights = ((!$row['private'] || $allow_private) && (!$row['living'] || $livedefault == 2)) || ($allow_living && $rightbranch) || ($_SESSION['mypersonID'] && $_SESSION['mygedcom'] == $tree && $_SESSION['mypersonID'] == $row['personID']) ? 1 : 0;
	
	return $livingrights;
}
//end obsolete function

function determineLivingPrivateRights($row, $pagerighttree = -1, $pagerightbranch = -1) {
	global $livedefault, $ldsdefault, $allow_living, $allow_private, $allow_lds, $tree;

	$rights = array('private' => true, 'living' => true, 'lds' => (!$ldsdefault ? true : false));
 
	$living = $livedefault == 2 ? false : $row['living'];
    $private = $row['private'];

    if($private || $living || $ldsdefault == 2) {
		//check tree
		$righttree = $pagerighttree >= 0 ? $pagerighttree : checktree($row['gedcom']);
		$righttreebranch = $pagerightbranch >= 0 ? $pagerightbranch : ($righttree ? checkbranch($row['branch']) : false);
    	$user_person = $_SESSION['mypersonID'] && $_SESSION['mygedcom'] == $tree && $_SESSION['mypersonID'] == $row['personID'];

    	if($living && (!$allow_living || !$righttreebranch) && !$user_person)
    		$rights['living'] = false;
    		
    	if($private && (!$allow_private || !$righttreebranch) && !$user_person)
    		$rights['private'] = false;

		if($ldsdefault == 2 && (($allow_lds && $righttreebranch) || $user_person))
			$rights['lds'] = true;
		//echo $righttree . " " . $righttreebranch . " " . $row['branch'] . " | ";
    }
   	$rights['both'] = $rights['private'] && $rights['living'];

	return $rights;
}

function determineLDSRights($notree = false) {
	global $ldsdefault, $allow_lds, $tree, $assignedtree;

	$treeOK = !$tree || $notree || !$assignedtree || $tree == $assignedtree;
	$ldsOK = !$ldsdefault || ($ldsdefault == 2 && $allow_lds && $treeOK) ? true : false;

	return $ldsOK;
}

function getLivingPrivateRestrictions($table, $firstname, $allOtherInput) {
	global $livedefault, $nonames, $tngconfig, $allow_living, $allow_private, $assignedtree, $assignedbranch, $people_table;
	
	$query = "";
	if($table) $table .= ".";
	$limitedLivingRights = $allow_living && !$livedefault;
	$limitedPrivateRights = $allow_private;
	$allLivingRights = $allow_living && !$assignedtree;
	$allPrivateRights = $allow_private && !$assignedtree;
	$livingNameRestrictions = $livedefault == 1 || (!$livedefault && ($nonames == 1 || ($nonames == 2 && $firstname)) && !$allLivingRights);
	$privateNameRestrictions = ($tngconfig['nnpriv'] == 1 || ($tngconfig['nnpriv'] == 2 && $firstname)) && !$allPrivateRights;
	
	if($livingNameRestrictions || $privateNameRestrictions || $allOtherInput) {
		$atreestr = $matchperson = "";
		if($_SESSION['mypersonID'] && $table == $people_table) {
			//this is me (current user)
			$matchperson = " OR ({$table}gedcom = \"{$_SESSION['mygedcom']}\" AND {$table}personID = \"{$_SESSION['mypersonID']}\")";
		}
		if($assignedtree) {
			//rights are limited to a tree or tree+branch
			$atreestr = $assignedbranch ? " OR ({$table}gedcom = \"$assignedtree\" AND {$table}branch LIKE \"%$assignedbranch%\")" : " OR {$table}gedcom = \"$assignedtree\"";
		}
		if(($livingNameRestrictions && $privateNameRestrictions) || ($allOtherInput && !$allLivingRights && !$allPrivateRights)) {
			if($limitedLivingRights && $limitedPrivateRights)
				$query .= "(({$table}living != 1 && {$table}private != 1)$atreestr$matchperson)";
			elseif($limitedLivingRights)
				$query .= "({$table}private != 1 && ({$table}living != 1$atreestr$matchperson))";
			elseif($limitedPrivateRights)
				$query .= "({$table}living != 1 && ({$table}private != 1$atreestr$matchperson))";
			else 
				$query .= "(({$table}living !=1 && {$table}private != 1)$matchperson)";
		}
		else {
			if($livingNameRestrictions || ($allOtherInput && !$allLivingRights)) {
				if($limitedLivingRights)
					$query .= "({$table}living != 1$atreestr$matchperson)";
				else 
					$query .= "({$table}living != 1$matchperson)";
			}
			elseif($privateNameRestrictions || ($allOtherInput && !$allPrivateRights)) {
				if($limitedPrivateRights)
					$query .= "({$table}private != 1$atreestr$matchperson)";
				else 
					$query .= "({$table}private != 1$matchperson)";
			}
		}
	}
	
	return $query;
}

function checkLivingLinks($itemID) {
	global $livedefault, $assignedtree, $assignedbranch, $people_table, $text, $medialinks_table, $sources_table, $citations_table, $families_table, $allow_living, $allow_private;

	if(($livedefault == 2 || $allow_living) && $allow_private && !$assignedtree)
		return true;

	if (!$allow_living && !$allow_private) {
		// Viewer can not see media of Living individuals regardless of tree/branch,
		// So need to check all links to this media for living individuals (don't narrow the search.)
		$icriteria = $fcriteria = "AND (living = 1 OR private = 1)";
	}
	else {
		// Viewer can see some media of Living individuals, now figure if there are some the viewer should not see
		if( $assignedtree ) {
			// Should not be able to see Living individuals in other Trees, so narrow search to those other Trees
			$icriteria = "$people_table.gedcom != \"$assignedtree\"";
			$fcriteria = "$families_table.gedcom != \"$assignedtree\"";

			if ($assignedbranch ) { // Note: must have a Tree selected to have a Branch
				// Should not be able to see Living individuals in other Branches either, so need to check for those too.
				$bcriteria = "OR !(branch LIKE \"%$assignedbranch%\")";
				$icriteria = "($icriteria $bcriteria)";
				$fcriteria = "($fcriteria $bcriteria)";
			}
		}
		if(!$allow_living) {
			$icriteria = $icriteria ? "AND (living = 1 OR ($icriteria AND private = 1))" : "AND living = 1";
			$fcriteria = $fcriteria ? "AND (living = 1 OR ($fcriteria AND private = 1))" : "AND living = 1";
		}
		elseif(!$allow_private) {  //!$allow_private_db
			$icriteria = $icriteria ? "AND (private = 1 OR ($icriteria AND living = 1))" : "AND private = 1";
			$fcriteria = $fcriteria ? "AND (private = 1 OR ($fcriteria AND living = 1))" : "AND private = 1";
		}
		else {
			if($icriteria) $icriteria = "AND $icriteria AND (living = 1 OR private = 1)";
			if($fcriteria) $fcriteria = "AND $fcriteria AND (living = 1 OR private = 1)";
		}
	}

	// Now find Living individuals linked to the media that fit the criteria set above.
	$query = "SELECT count(*) as pcount
		FROM ($medialinks_table, $people_table)
		WHERE $medialinks_table.personID = $people_table.personID
			AND $medialinks_table.gedcom = $people_table.gedcom
			AND $medialinks_table.mediaID = '$itemID'
			$icriteria";
	$result = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
	$row = mysql_fetch_assoc( $result );
	mysql_free_result( $result );
	if( $row['pcount'] )
		return false;  // found at least one

	$query = "SELECT count(*) as pcount
		FROM ($medialinks_table, $families_table)
		WHERE $medialinks_table.personID = $families_table.familyID
			AND $medialinks_table.gedcom = $families_table.gedcom
			AND $medialinks_table.mediaID = '$itemID'
			$fcriteria";
	$result = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
	$row = mysql_fetch_assoc( $result );
	mysql_free_result( $result );
	if( $row['pcount'] )
		return false;  // found at least one

	/*
 	$query = "SELECT count(*) as pcount
		FROM ($medialinks_table, $sources_table, $citations_table, $people_table)
		WHERE $medialinks_table.personID = $sources_table.sourceID
			AND $medialinks_table.gedcom = $sources_table.gedcom
			AND $medialinks_table.gedcom = $citations_table.gedcom
			AND $medialinks_table.gedcom = $people_table.gedcom
			AND $sources_table.sourceID = $citations_table.sourceID
			AND $citations_table.persfamID = $people_table.personID
			AND $medialinks_table.mediaID = '$itemID'
			AND living = 1 $criteria";
	$result = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
	$row = mysql_fetch_assoc( $result );
   	mysql_free_result( $result );
	if( $row['pcount'] )
		return false;

 	$query = "SELECT count(*) as pcount
		FROM ($medialinks_table, $sources_table, $citations_table, $families_table)
		WHERE $medialinks_table.personID = $sources_table.sourceID
			AND $medialinks_table.gedcom = $sources_table.gedcom
			AND $medialinks_table.gedcom = $citations_table.gedcom
			AND $medialinks_table.gedcom = $families_table.gedcom
			AND $sources_table.sourceID = $citations_table.sourceID
			AND $citations_table.persfamID = $families_table.familyID
			AND $medialinks_table.mediaID = '$itemID'
			AND living = 1 $fcriteria";
	$result = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
	$row = mysql_fetch_assoc( $result );
   	mysql_free_result( $result );
	if( $row['pcount'] )
		return false;
	*/

    // so we made it here ok, so there must not be any Living individulals linked to this media
    return true;
}

function checkMediaFileSize($path) {
	global $maxmediafilesize;

	return file_exists($path) && filesize($path) < $maxmediafilesize;
}

function getScriptName($replace = true) {
	global $_SERVER;

	$scriptname = $_SERVER['REQUEST_URI'] ? $_SERVER['REQUEST_URI'] : $_SERVER['SCRIPT_NAME'] . "?" . $_SERVER['QUERY_STRING'];
	if($replace) {
		$scriptname = str_replace("&","&amp;",$scriptname);
		$scriptname = str_replace("amp;amp;", "amp;", $scriptname);
	}
	
	return $scriptname;
}

function getScriptPath() {
	$uri = getScriptName();
	return dirname($uri);
}

function get_browseitems_nav( $total, $address, $perpage, $pagenavpages ) {
	global $tngpage, $totalpages, $tree, $text, $orgtree;

	if( !$tngpage ) $tngpage = 1;
	if( !$perpage ) $perpage = 50;

	if( $total <= $perpage )
		return "";

	$totalpages = ceil( $total / $perpage );
	if ( $tngpage > $totalpages ) $tngpage = $totalpages;

	if( $tngpage > 1 ) {
		$prevpage = $tngpage-1;
		$navoffset = ( ( $prevpage * $perpage ) - $perpage );
		$prevlink = " <a href=\"$address=$navoffset&amp;tree=$orgtree&amp;tngpage=$prevpage\" class=\"snlink\" title=\"{$text['text_prev']}\">&laquo;{$text['text_prev']}</a> ";
	}
	if ($tngpage<$totalpages) {
		$nextpage = $tngpage+1;
		$navoffset = (($nextpage * $perpage) - $perpage);
		$nextlink = "<a href=\"$address=$navoffset&amp;tree=$orgtree&amp;tngpage=$nextpage\" class=\"snlink\" title=\"{$text['text_next']}\">{$text['text_next']}&raquo;</a>";
	}
	while( $curpage++ < $totalpages ) {
   	$navoffset = ( ($curpage - 1 ) * $perpage );
		if( ( $curpage <= $tngpage - $pagenavpages || $curpage >= $tngpage + $pagenavpages ) && $pagenavpages ) {
			if( $curpage == 1 )
				$firstlink = " <a href=\"$address=$navoffset&amp;tree=$orgtree&amp;tngpage=$curpage\" class=\"snlink\" title=\"{$text['firstpage']}\">&laquo;1</a> ... ";
		    if( $curpage == $totalpages )
				$lastlink = "... <a href=\"$address=$navoffset&amp;tree=$orgtree&amp;tngpage=$curpage\" class=\"snlink\" title=\"{$text['lastpage']}\">$totalpages&raquo;</a>";
		}
		else {
			if( $curpage == $tngpage )
				$pagenav .= " <span class=\"snlink snlinkact\">$curpage</span> ";
			else
				$pagenav .= " <a href=\"$address=$navoffset&amp;tree=$orgtree&amp;tngpage=$curpage\" class=\"snlink\">$curpage</a> ";
		}
	}
	if($firstlink || $lastlink) {
		$gotolink = " <span class=\"snlink\"><input type=\"text\" class=\"tngpage minifield\" placeholder=\"{$text['page']} #\" name=\"tngpage\" onkeyup=\"if(pageEnter(this,event)) {goToPage(\$('#gotopage'),'$address','$orgtree',$perpage);}\"/> <input type=\"button\" id=\"gotopage\" value=\"{$text['go']}\" class=\"minibutton\" onclick=\"goToPage(this,'$address','$orgtree',$perpage);\"/></span>";
	}
	else
		$gotolink = "";
	$pagenav = "<span class=\"normal\">$prevlink $firstlink $pagenav $lastlink $nextlink$gotolink</span>";
	
	return $pagenav;
}

function doMenuItem( $index, $link, $image, $label, $page, $thispage ) {
	//global $newbrowser, $cms;
	global $sitever;

	if( $page == $thispage ) {
		$divclass = " class=\"divhere\"";
		$class = " class=\"here\"";
	}
	if($sitever == "mobile" && $image)
		$label = "";
	//$imagetext = $image ? "<img src=\"{$cms['tngpath']}img/$image\" width=\"16\" height=\"15\" border=\"0\" alt=\"\" class=\"tngmenuicon\"/>" : "";
	$imagetext = $image ? "<span class=\"tngsmallicon2\" id=\"{$image}-smicon\"></span>" : "";
	//if( $newbrowser )

	return "<li><a id=\"a$index\" href=\"$link\"$class>$imagetext$label</a></li>\n";
	//else
		//return "<div id=\"a$index\"$divclass><a href=\"$link\"$class>$imagetext$label</a></div>\n";
}

function displayDate( $date ) {
	global $dates;

	$newdate = "";
	$dateparts = explode( " ", $date );
	foreach( $dateparts as $datepart ) {
		if( !is_numeric( $datepart ) ) {
			$datepartu = strtoupper( $datepart );
			if( isset( $dates[$datepartu] ) )
				$datepart = $dates[$datepartu];
			elseif( $datepartu == "AND" )
				$datepart = $dates['TEXT_AND'];
			elseif( $datepartu == "@#DJULIAN@" )
				$datepart = "[J]";
		}
		$newdate .= $newdate ? " $datepart" : $datepart;
	}

	return $newdate;
}

function xmlcharacters($string) {
	global $session_charset;

	$bad = array("&", "\"");
	$good = array("&#038;", "&#034;");

	$ucharset = strtoupper($session_charset);
	$enc = function_exists('mb_detect_encoding') ? @mb_detect_encoding($string) : "";
	if($enc && strtoupper($enc) == "UTF-8" && $ucharset == "UTF-8") {
		return str_replace($bad, $good, @mb_convert_encoding($string, 'UTF-8', $enc));
	}
	elseif($ucharset == "ISO-8859-1") {
		$trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
		foreach ($trans as $k=>$v)
		    $trans[$k]= "&#".ord($k).";";
        $trans[chr(38)] = '&';  // don't translate the & when it is part of &xxx;
        // now translate & into &#38, but only when it is not part of &xxx or &#xxxx;
        return preg_replace("/&(?![A-Za-z]{0,4}\w{2,3};|#[0-9]{2,5};)/","&#38;" , strtr($string, $trans));
	}
	else
		return str_replace($bad, $good, $string);
}

function generatePassword($flag) {
  $password = "";
  $possible = $flag ? "bcdfghjkmnpqrstvwxyz" : "0123456789bcdfghjkmnpqrstvwxyz";
  $length = 8;

  $i = 0;
  while( $i < $length ) {
    $char = substr( $possible, mt_rand( 0, strlen( $possible ) - 1 ), 1 );
    if( !strstr( $password, $char ) ) {
      $password .= $char;
      $i++;
    }
  }

  return $password;
}

function getXrefNotes($noteref, $tree="") {
	global $xnotes_table;

	preg_match( "/^@(\S+)@/", $noteref, $matches );
	if( $matches[1] ) {
		$query = "SELECT note from $xnotes_table WHERE noteID = \"$matches[1]\" AND gedcom=\"$tree\"";
		$xnoteres = @mysql_query( $query );
		if( $xnoteres ) {
			$xnote = mysql_fetch_assoc( $xnoteres );
			$note = trim( $xnote['note'] );
		}
		mysql_free_result($xnoteres);
	}
	else
		$note = $noteref;
	return $note;
}

function getDatePrefix($datestr) {
	global $dates;
	
	$prefix = "";
	if($datestr) {
		$orgstr = $datestr;
		$datestr = strtoupper($datestr);
		$prefixes = array($dates['BEF'], $dates['AFT'], $dates['ABT'], $dates['CAL'], $dates['EST']);
		foreach($prefixes as $str) {
			if(!empty($str) && strpos($datestr, strtoupper($str)) === 0) {
				$prefix = $str . " ";
				break;
			}
		}
	}
	return $prefix;
}

function getYears( $row ) {
	global $dates;

	$years = getGenderIcon( $row['sex'], -1 );
	if( $row['allow_living'] && $row['allow_private'] ) {
		if($row['deathdate']) {
			$deathdate = $row['deathdate'];
			$truedeath = $row['deathdatetr'];
		}
		else {
			$deathdate = $row['burialdate'];
			$truedeath = $row['burialdatetr'];
		}
		$deathyearonly = $row['death'] && $row['death'] . "-00-00" == $truedeath ? true : false;
		$deathstr = displayDate($deathdate);
		$displaydeath = !$row['death'] || $deathyearonly ? $deathstr : getDatePrefix($deathstr) . $row['death'];
		$displaydeath = $displaydeath != "Y" ? $displaydeath : $dates['Y'];

		if($row['birthdate']) {
			$birthdate = $row['birthdate'];
			$truebirth = $row['birthdatetr'];
		}
		else {
			$birthdate = $row['altbirthdate'];
			$truebirth = $row['altbirthdatetr'];
		}
		$birthyearonly = $row['birth'] && $row['birth'] . "-00-00" == $truebirth ? true : false;
		$birthstr = displayDate($birthdate);
		$displaybirth = !$row['birth'] || $birthyearonly ? $birthstr : getDatePrefix($birthstr) . $row['birth'];
		if( $displaybirth || $displaydeath ) {
			$years .= " $displaybirth - $displaydeath";
			$age = age($row);
			if($age)
				$years .= " &nbsp;($age)";
		}
	}

	return $years;
}

function age($row) {
	// If person is living calculate todays age
	$datum_1_tr = $row['birthdatetr'];
	$datum_1 = $row['birthdate'];
	$datum_alt_1_tr = $row['altbirthdatetr'];
	$datum_alt_1 = $row['altbirthdate'];
	$datum_2_tr = $row['deathdatetr'];
	$datum_2 = $row['deathdate'];
	$datum_alt_2_tr = $row['burialdatetr'];
	$datum_alt_2 = $row['burialdate'];
	$age = "";

	if($row['living'] == "1") {
		// Today
		$datum_2_tr = date ("Y-m-d", time() + ( 3600 * $time_offset ) );
	}

	// Only if one of the FROM and one of the TO dates are filled
	if(($datum_1_tr != "0000-00-00" || $datum_alt_1_tr != "0000-00-00") && ($datum_2_tr != "0000-00-00" || $datum_alt_2_tr != "0000-00-00")) {

	// FROM date
	// $datum1 = result datum1
	// $datum_1_tr = date numeric, Datum_1 = date alfanumeric
	// $datum_alt_1_tr = alternative date numeric, $datum_alt_1 = alternative date alfanumeric

		if($datum_1_tr != "0000-00-00") {
			$datum1 = $datum_1_tr;
			if(substr($datum_1, 0, 3) == "BEF")
			$sign1 = ">";
			else {
				if (substr($datum_1, 0, 3) == "AFT") {
					$sign1 = "&lt;";
					$datum1 = substr_replace($datum1, "12-31", 5);
				}
				else {
					if(substr($datum_1, 1, 4) == substr($datum1, 0, 4)) {
						$sign1 = "~";
						$datum1 = substr_replace($datum1, "07-15", 5);
					}
					else {
						if(substr($datum_1, 0, 2) < 1) {
							$sign1 = "~";
							$datum1 = substr_replace($datum1, "15", 8);
						}
					}
				}
			}
		}
		else {
			$datum1 = $datum_alt_1_tr;
			$sign1 = "~";
			if(substr($datum_alt_1, 0, 3) == "BEF")
				$sign1 = ">";
			else {
				if(substr($datum_alt_1, 0, 3) == "AFT") {
					$sign1 = "&lt;";
					$datum1 = substr_replace($datum1, "12-31", 5);
				}
				else {
					if(substr($datum_alt_1, 1, 4) == substr($datum1, 0, 4))
				  		$datum1 = substr_replace($datum1, "07-15", 5);
					else {
						if(substr($datum_alt_1, 0, 2) < 1)
							$datum1 = substr_replace($datum1, "15", 8);
					}
				}
			}
		}

		// TO date
		// $datum2 = result datum2
		// $datum_2_tr = date numeric, Datum_2 = datum alfanumeric
		// $datum_alt_2_tr = alternative date numeric, $datum_alt_2 = alternative date alfanumeric

		if($datum_2_tr != "0000-00-00") {
			$datum2 = $datum_2_tr;
			if(substr($datum_2, 0, 3) == "BEF")
				$sign2 = "&lt;";
			else {
				if(substr($datum_2, 0, 3) == "AFT") {
					$sign2 = "&gt;";
					$datum2 = substr_replace($datum2, "12-31", 5);
				}
				else {
					if(substr($datum_2, 1, 4) == substr($datum2, 0, 4))
						$datum2 = substr_replace($datum2, "07-15", 5);
					else {
						if(substr($datum2, 8, 2) < 1)
							$datum2 = substr_replace($datum2, "15", 8);
					}
				}
			}
		}
		else {
			$datum2 = $datum_alt_2_tr;
			$sign2 = "~";
			if(substr($datum_alt_2, 0, 3) == "BEF")
				$sign2 = "&lt;";
			else {
				if(substr($datum_alt_2, 0, 3) == "AFT") {
					$sign2 = "&gt;";
					$datum2 = substr_replace($datum2, "12-31", 5);
				}
				else {
					if(substr($datum_alt_2, 1, 4) == substr($datum2, 0, 4))
						$datum2 = substr_replace($datum2, "07-15", 5);
					else {
						if(substr($datum_alt_2, 0, 2) < 1)
							$datum2 = substr_replace($datum2, "15", 8);
					}
				}
			}
		}

		// age = date2 - date1

		$datum1 = substr($datum1, 0, 4) . substr($datum1, 5, 2) . substr($datum1, 8, 2);
		$datum2 = substr($datum2, 0, 4) . substr($datum2, 5, 2) . substr($datum2, 8, 2);
		$age = $datum2 - $datum1;

	// format age

		if($age < 0)
			$age = "";
		else {
			if($age >= 0 && $age < 10000)
				$age = "0 ";
			else {
				if($age > 9999 && $age < 100000)
					$age = substr($age, 0, 1);
				else {
					if($age > 99999 && $age < 1000000)
						$age = substr($age, 0, 2);
					else {
						if($age > 999999)
							$age = substr($age, 0, 3);
					}
				}
			}
		}

		// format sign

		if ((($sign1 == "<") || ($sign1 == ">")) && (($sign2 == "<") || ($sign2 == ">")))
			$sign = "~";
		else {
			if (($sign1 == "~") || ($sign2 == "~"))
				$sign = "~";
			else {
				if ($sign1 <> " ") $sign = $sign1;
				if ($sign2 <> " ") $sign = $sign2;
			}
		}

		if ($age && $sign <> "")
			$age = $sign . " " . $age;

	}

	if ($age <> "") {
		global $text;
		$age .= " {$text['years']}";
	}

	return $age;
}

function showSmallPhoto( $persfamID, $alttext, $rights, $height, $type=false, $gender="" ) {
	global $rootpath, $photopath, $documentpath, $headstonepath, $historypath, $mediapath, $mediatypes_assoc;
	global $photosext, $tree, $medialinks_table, $media_table, $text, $cms, $admtext, $tngconfig;

	$photo = "";
	$photocheck = "";

	$query = "SELECT $media_table.mediaID, medialinkID, alwayson, thumbpath, mediatypeID, usecollfolder, newwindow FROM ($media_table, $medialinks_table)
		WHERE personID = \"$persfamID\" AND $medialinks_table.gedcom = \"$tree\" AND $media_table.mediaID = $medialinks_table.mediaID AND defphoto = '1'";
	$result = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
	$row = mysql_fetch_assoc( $result );

	if($row['thumbpath']) {
		$targettext = $row['newwindow'] ? " target=\"_blank\"" : "";

		if( $adm || $row['alwayson'] || checkLivingLinks($row['mediaID'])) {
			$mediatypeID = $row['mediatypeID'];
			$usefolder = $row['usecollfolder'] ? $mediatypes_assoc[$mediatypeID] : $mediapath;
			$photocheck = "$usefolder/" . $row['thumbpath'];
			$photoref = $cms['tngpath'] . "$usefolder/" . str_replace("%2F","/",rawurlencode( $row['thumbpath'] ));
			if($type)
				$prefix = "<a href=\"{$cms['tngpath']}admin_editmedia.php?mediaID={$row['mediaID']}\"$targettext>";
			else {
				$showmedia_url = getURL( "showmedia", 1 );
				$prefix = "<a href=\"$showmedia_url" . "mediaID={$row['mediaID']}&amp;medialinkID={$row['medialinkID']}\" title=\"" . str_replace("\"","&#34;",$alttext) . "\"$targettext>";
			}
			$suffix = "</a>";
		}
	}
	elseif($rights) {
		$photoref = $photocheck = $tree ? "$photopath/$tree.$persfamID.$photosext" : "$photopath/$persfamID.$photosext";
		$prefix = $suffix = "";
	}

	$gotfile = $photocheck ? file_exists( "$rootpath$photocheck" ) : false;
	if(!$gotfile) {
		if($type) {
			$query = "SELECT medialinkID FROM ($media_table, $medialinks_table)
				WHERE personID = \"$persfamID\" AND $medialinks_table.gedcom = \"$tree\" AND $media_table.mediaID = $medialinks_table.mediaID AND mediatypeID = \"photos\" AND thumbpath != \"\"";
			$result2 = mysql_query($query) or die ($text['cannotexecutequery'] . ": $query");
			$numphotos = mysql_num_rows($result2);
			mysql_free_result($result2);
			if($numphotos) {
				//if photos exist, show box with link to sort page where they can pick a default
				$photo = "<a href=\"admin_ordermedia.php?newlink1=$persfamID&tree1=$tree&mediatypeID=photos&linktype1=$type\" class=\"smaller\" style=\"display:block;padding:8px;border:1px solid black;margin-right:6px;text-align:center\">{$admtext['choosedef']}</a>";
			}
		}
		elseif( $gender && $tngconfig['usedefthumbs'] ) {
			if($gender == "M") {
				$photocheck = "img/male.jpg";
			}
			elseif ($gender == "F") {
				$photocheck = "img/female.jpg";
			}
			$photoref = $cms['tngpath'] . $photocheck;
			$gotfile = file_exists( "$rootpath$photocheck" );
		}
	}
	if( $gotfile ) {
		$border = $height ? 0 : 1;
		$align = $height ? "" : " style=\"float:left;\"";
		$photoinfo = @GetImageSize( "$rootpath$photocheck" );
		$photohtouse = $height ? $height : 100;
		if( $photoinfo[1] <= $photohtouse ) {
			$photohtouse = $photoinfo[1];
			$photowtouse = $photoinfo[0];
		}
		else
			$photowtouse = intval( $photohtouse * $photoinfo[0] / $photoinfo[1] ) ;
		$photo = "$prefix<img src=\"$photoref\" border=\"$border\" alt=\"" . str_replace("\"","&#34;",$alttext) . "\" width=\"$photowtouse\" height=\"$photohtouse\" class=\"smallimg\"{$align}/>$suffix";
	}
	mysql_free_result( $result );

	return $photo;
}

function placeImage($place) {
	global $placesearch_url, $cms;

	return "<a href=\"$placesearch_url" . "psearch=" . urlencode($place) . "\" class=\"pl\"><img src=\"{$cms['tngpath']}img/tng_search_small.gif\" alt=\"\" class=\"placeimg\"/></a>";
}

function checkMaintenanceMode($area){
	global $tngconfig;

	if(strpos($_SERVER['SCRIPT_NAME'],"/suggest.php") === FALSE && strpos($_SERVER['SCRIPT_NAME'],"/admin.php") === FALSE && $tngconfig['maint'] && (!$_SESSION['allow_admin'] || $_SESSION['assignedtree']) && strpos($_SERVER['SCRIPT_NAME'],"/index.") === FALSE) {
		$maint_url = $area ? "adminmaint.php" : getURL("maint",0);
		header("Location:$maint_url");
		exit;
	}
}

function cleanIt($string) {
	$string = htmlspecialchars(preg_replace("/\n/"," ",$string), ENT_QUOTES);
	$string = preg_replace("/\"/", "&#34;",$string);
	$string = preg_replace("/</", "&lt;",$string);
	$string = preg_replace("/>/", "&gt;",$string);
	$string = preg_replace("/\t/", "&#09;",$string);

	return $string;
}

function truncateIt($string,$length) {
	global $notrunc;

	if($length > 0 && !$notrunc && strlen($string) > $length) {
		$truncated = substr(strip_tags($string),0,$length);
		$truncated = substr($truncated,0,strrpos($truncated,' ')) . '&hellip;';
	}
	else
		$truncated = $string;
	return $truncated;
}

function tng_strtoupper($string) {
	global $session_charset;

	$ucharset = strtoupper($session_charset);
	$enc = function_exists(mb_detect_encoding) ? @mb_detect_encoding($string) : "";
	if($enc && strtoupper($enc) == "UTF-8" && $ucharset == "UTF-8")
		$string = mb_strtoupper($string, "UTF-8");
	else
		$string = strtoupper($string);

	return $string;
}

function tng_strtolower($string) {
	global $session_charset;

	$ucharset = strtoupper($session_charset);
	$enc = function_exists(mb_detect_encoding) ? @mb_detect_encoding($string) : "";
	if($enc && strtoupper($enc) == "UTF-8" && $ucharset == "UTF-8")
		$string = mb_strtolower($string, "UTF-8");
	else
		$string = strtolower($string);

	return $string;
}

function tng_utf8_decode($text) {
	global $session_charset;

	$ucharset = strtoupper($session_charset);
	if($ucharset == "ISO-8859-1") {
		$text = utf8_decode($text);
	}
	elseif($ucharset == "ISO-8859-2") {
		$text = utf82iso88592($text);
	}
	return $text;
}

function utf82iso88592($text) {
	$text = str_replace("\xC4\x85", '±', $text);
	$text = str_replace("\xC4\x84", '¡', $text);
	$text = str_replace("\xC4\x87", 'æ', $text);
	$text = str_replace("\xC4\x86", 'Æ', $text);
	$text = str_replace("\xC4\x99", 'ê', $text);
	$text = str_replace("\xC4\x98", 'Ê', $text);
	$text = str_replace("\xC5\x82", '³', $text);
	$text = str_replace("\xC5\x81", '£', $text);
	$text = str_replace("\xC3\xB3", 'ó', $text);
	$text = str_replace("\xC3\x93", 'Ó', $text);
	$text = str_replace("\xC5\x9B", '¶', $text);
	$text = str_replace("\xC5\x9A", '¦', $text);
	$text = str_replace("\xC5\xBC", '¿', $text);
	$text = str_replace("\xC5\xBB", '¯', $text);
	$text = str_replace("\xC5\xBA", '¼', $text);
	$text = str_replace("\xC5\xB9", '¬', $text);
	$text = str_replace("\xc5\x84", 'ñ', $text);
	$text = str_replace("\xc5\x83", 'Ñ', $text);

	return $text;
}

function getAllTextPath() {
	global $rootpath, $mylanguage, $language, $languages_path, $endrootpath, $cms, $text, $admtext, $dates;

	$rootpath = trim($rootpath);
	if($rootpath && strpos($rootpath,"http") !== 0 ) {
		$thislanguage = trim($mylanguage ? $mylanguage : $languages_path . $language);
		if(strpos($thislanguage,"http") !== 0) {
			if($cms['support'])
				@include_once($rootpath . $cms['tngpath'] . "$thislanguage/alltext.php");
			else
				@include_once($rootpath . $endrootpath . "$thislanguage/alltext.php");
		}
	}
}?>