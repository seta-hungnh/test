<?php global $text, $cms, $subroot, $tmp; ?>
<style>
div.art-headerobject {
  background-image: url('<?php echo $cms['tngpath'] . $templatepath . $tmp['t9_headimg']; ?>');
  background-repeat: no-repeat;
  width: 432px;
  height: 150px;
}
</style>
<body>
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-sheet">
        <div class="art-sheet-tl"></div>
        <div class="art-sheet-tr"></div>
        <div class="art-sheet-bl"></div>
        <div class="art-sheet-br"></div>
        <div class="art-sheet-tc"></div>
        <div class="art-sheet-bc"></div>
        <div class="art-sheet-cl"></div>
        <div class="art-sheet-cr"></div>
        <div class="art-sheet-cc"></div>
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-clip">
                <div class="art-header-center">
                    <div class="art-header-jpeg"></div>
                </div>
                </div>
                <div class="art-headerobject"></div>
                <div class="art-logo">
                                 <h1 class="art-logo-name"><a href="<?php echo $cms['tngpath']; ?>index.php"><?php echo getTemplateMessage('t9_maintitle'); ?></a></h1>
                                                 <h2 class="art-logo-text"><?php echo getTemplateMessage('t9_headsubtitle'); ?></h2>
                                </div>
            </div>
            <div class="cleared reset-box"></div>
<div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
	<ul class="art-hmenu">
		<li>
			<a href="<?php echo $cms['tngpath']; ?>pedigree.php?personID=<?php echo $tmp['t9_dadperson']; ?>&amp;tree=<?php echo $tmp['t9_dadtree']; ?>"><span class="l"></span><span class="t"><?php echo getTemplateMessage('t9_dadside'); ?></span></a>
		</li>
		<li>
			<a href="<?php echo $cms['tngpath']; ?>pedigree.php?personID=<?php echo $tmp['t9_momperson']; ?>&amp;tree=<?php echo $tmp['t9_momtree']; ?>"><span class="l"></span><span class="t"><?php echo getTemplateMessage('t9_momside'); ?></span></a>
		</li>
		<li>
			<a href="<?php echo $cms['tngpath']; ?>suggest.php?page=$title"><span class="l"></span><span class="t"><?php echo $text['contactus']; ?></span></a>
		</li>
	</ul>
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-content">
<div class="art-post">
    <div class="art-post-body">
