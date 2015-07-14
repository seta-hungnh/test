<?php
include("../../helplib.php");
echo help_header("Help: Mod Manager");
?>

<body class="helpbody">
<a name="top"></a>
<table width="100%" border="0" cellpadding="10" cellspacing="2" class="tblback normal">
<tr class="fieldnameback">
	<td class="tngshadow">
		<p style="float:right; text-align:right" class="smaller menu">
			<a href="http://tngforum.us" target="_blank" class="lightlink">TNG Forum</a> &nbsp; | &nbsp;
			<a href="http://tng.lythgoes.net/wiki" target="_blank" class="lightlink">TNG Wiki</a><br />
			<a href="backuprestore_help.php" class="lightlink">&laquo; Help: Utilities</a> &nbsp; | &nbsp;
			<a href="index_help.php" class="lightlink">Help: Getting Started &raquo;</a>
		</p>
		<span class="largeheader">Help: Mod Manager</span>
		<p class="smaller menu">
			<a href="#overview" class="lightlink">Overview</a> &nbsp; | &nbsp;
			<a href="#operation" class="lightlink">Operation</a> &nbsp; | &nbsp;
			<a href="#status" class="lightlink">Status</a> &nbsp; | &nbsp;
			<a href="#files" class="lightlink">Config Files</a> &nbsp; | &nbsp;
		</p>
	</td>
</tr>
<tr class="databack">
	<td class="tngshadow">

		<a name="overview"><p class="subheadbold">Overview</p></a>

		<p>The TNG Mod Manager, originally developed by Brian McFadyen and updated by Sean Schwoere to work with the Joomla TNG Component, is intended to provide a more integrated way to install, remove and manage modifications to the TNG software package that have been coded to work with this manager. Updates were made in TNG V9 by Bart Degryse and Ken Roy to prevent clean up attempts when the mod cannot be installed.  The Mod Manager is connected into the TNG Administrative page for easy access. The Mod Manager uses:
		<ul>
			<li>a <strong>mods</strong> in your TNG folder to contain the Mod configuration files and associated Mod support files</li>
			<li>an <strong>extensions</strong> in your TNG folder to contain some of the mod extensions that are installed by other Mod Manager config files</li>
		</ul></p>
<p>Additional information can be found in the <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager" target="_blank">Mod Manager</a> article and in the <a href="http://tng.lythgoes.net/wiki/index.php?title=Category:TNG_Mod_Manager" target="_blank">TNG Mod Manager</a> category of articles on the TNG Wiki.

	</td>
</tr>
<tr class="databack">
	<td class="tngshadow">

		<p style="float:right"><a href="#top">Top</a></p>
		<a name="operation"><p class="subheadbold">Operation</p></a>

		<p>The Mod Manager examines the mods folder and reads each <strong>cfg</strong> file that it finds. The <strong>cfg</strong> files are directive files that describe the mod, the files and locations to be modified, and the code that is used in the modification.
		<p>The Mod Manager checks the following:
			<ul>
				<li>ensures the user is logged in
				<li>examines each code location and change
					<ul>
						<li>ensures the location can be found</li>
						<li>ensures the target location is unique</li>
						<li>identifies whether the target location has already been installed</li>
					</ul>
			<li>identifies new files to be created. If the new file already exists, it examines the version level</li>
			</ul></p>

	</td>
</tr>
<tr class="databack">
	<td class="tngshadow">

		<p style="float:right"><a href="#top">Top</a></p>
		<a name="status"><p class="subheadbold">Status</p></a>
			<p>The Mod Manager returns the following status:
			<ul>
			<li>if the mod is not yet installed and the target locations can be identified, then the option to <strong>Install</strong> is presented</li>
			<li>if the mod is completely installed, the option to <strong>Remove</strong> the Mod is presented and the option to <strong>Edit</strong> parameters if any exist</li>
			<li>if the mod is partially installed, the option to <strong>Cleanup</strong> the Mod is presented. A Cleanup operation will attempt to remove any inserted code, restore and replaced code, and remove any created file.</li>
			<li>if the mod <strong>cannot</strong> be installed, the <strong>Unable to install this mod</strong> message will be displayed. This message will be preceded by an other message that provides more details as to why the mod cannot be installed.</li>
			</ul>
		<p>For examples of the Mod Manager Status screens and how to interpret the various statuses, see <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager_-_Interpreting_Status" target="_blank">Mod Manager - Interpreting Status</a></p>

</p>

	</td>
</tr>
<tr class="databack">
	<td class="tngshadow">

		<p style="float:right"><a href="#top">Top</a></p>
		<a name="files"><p class="subheadbold">Config Files</p></a>

		<span class="optionhead">Installing Mods</span>
		<p>The TNG Wiki provides information on using the <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager_-_Installing_Config_Files" target="_blank">Config Files</a> to install the mods.</p>
		
		<span class="optionhead">Interpreting Status</span>
		<p>The TNG Wiki provides information on <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager_-_Creating_Config_Files" target="_blank">Interpreting Status</a>.</p>
		
		<span class="optionhead">Config File Syntax</span>
		<p>The TNG Wiki provides information on the <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager_-_Config_File_Syntax" target="_blank">Config File Syntax</a>.</p>
		
		<span class="optionhead">Creating Config Files</span>
		<p>The TNG Wiki provides information for the mod developers on the <a href="http://tng.lythgoes.net/wiki/index.php?title=Mod_Manager_-_Creating_Config_Files" target="_blank">Creating Config Files</a>.</p>
	</td>
</tr>


</table>
</body>
</html>