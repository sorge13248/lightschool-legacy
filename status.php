<?php include_once "base.php"; ?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Status - LightSchool</title>
    <?php include_once "style.php"; ?>
		<style type="text/css">
      @media only all and (min-width:800px) and (min-height:600px) {
        .col-md-5{
          text-align: right;
        }
      }
		</style>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".col-md-7 p").each(function(){
					if($(this).html().indexOf("Working") > -1){
						$(this).css({"color": "green", "font-weight": "bold"});
					}else if($(this).html().indexOf("Issues") > -1){
						$(this).css({"color": "orange"});
					}else if($(this).html().indexOf("Broken") > -1){
						$(this).css({"color": "red", "font-style": "italic"});
					}
				});
			});
		</script>
  </head>
  <body>
    <?php include_once "menu.php"; ?>
    <div class="container" style="padding-top: 80px">
      <ol class="breadcrumb">
				<li><a href="<?= $MAIN_DIRECTORY ?>/home"><div class="glyphicon glyphicon-home" style="margin-right: 10px"></div>Home</a></li>
				<li class="active">Status</li>
      </ol>
      <div class="page-header">
				<h1>Status</h1>
				<p>From this page you can see which features are still working as of 2017-11-02.</p>
      </div>
			<h3><a href="<?= $MAIN_DIRECTORY ?>">LightSchool</a></h3>
			<p>This is the main website and it is only available in italian.</p>
			<hr/>
			<h3><a href="<?= $MAIN_DIRECTORY ?>/my">MY LightSchool</a></h3>
			<p>Some strings were not translated to english so they will be displayed in italian.</p>
			<div class="rows">
				<div class="col-md-5">
					<b>Login</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Register</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Outlook.com users not receiving confirmation e-mail making it impossible to complete the registration process)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Account activation</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Password recover</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Outlook.com users not receiving confirmation e-mail making it impossible to complete the password recover process)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Language switcher</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>My desktop</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Not automatically updates when removing an item from "My desktop")</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>My files</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>New folder</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>New notebook</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>File upload</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>File sharing</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>File renaming</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Move file</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Right click on an item > Move doesn't work. You can still use drag-n-drop to move your files)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>File deletion</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>File information</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Notebook export to DOCX and PDF</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Proietta su LIM (Project on whiteboard)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Incorpora (Embed notebook on a webpage)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Cronologia modifiche (Notebook edit history)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Copia (Notebook copy)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Add/remove file to desktop</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Sharing system</b>
				</div>
				<div class="col-md-7">
					<p>Issues</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Address book contact suggestion</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Taskbar position</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Taskbar size</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Setting not being saved, but preview is working)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Add/remove app from taskbar</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Tests</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Class's register</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>My diary</b>
				</div>
				<div class="col-md-7">
					<p>Working<br/>
					(Just some graphical glitches)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Adding a new event</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Subject suggestion when adding a new event</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Editing an event</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Deleting an event</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>My timetable</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Adding a new subject</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Editing a subject</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Deleting a subject</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Messages</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Sending a message</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>E-mail notification</b>
				</div>
				<div class="col-md-7">
					<p>Issues</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>In-site notification</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Read confirmation</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Blocking a user</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Unblocking a user</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Spam folder</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(Messages from blocked users appear both in inbox and in spam folder)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>People (address book)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Contacts</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Contact dialog box</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>My timetable</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Groups</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Creating a new group</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Editing a group</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Deleting a group</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Settings</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>E-mail address change</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Language changing</b>
				</div>
				<div class="col-md-7">
					<p>Issues<br/>
					(It works, but you need to refresh the page two times)</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Provincia di residenza (only in italian website)</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Favourite color</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Wallpaper</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Trasparency</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Icons</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>LIM predefinita (favorite whiteboard)</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Opening file</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Notebook autosave timer</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Restore all alerts</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access control</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from PC</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from mobile</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from tablet</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from Android app</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from Windows 10 app</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Access from Windows 10 Mobile app</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Online visibility</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Show your e-mail address to other users</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Show your school</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Change password</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Deactivate your account</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Notification centre</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Instant search</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Universal search</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Device history</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Logout another device</b>
				</div>
				<div class="col-md-7">
					<p>Broken</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Block another device</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div class="rows">
				<div class="col-md-5">
					<b>Forget another device</b>
				</div>
				<div class="col-md-7">
					<p>Working</p>
				</div>
			</div>
			<div style="clear: both"></div>
			<hr/>
			<h3><a href="<?= $MAIN_DIRECTORY ?>/sub_experimental/windows">MY LightSchool Frames</a></h3>
			<p>This was a new version that were supposed to replace MY LightSchool when ready, although it never happend. It is only available in italian.</p>
			<hr/>
			<h3><a href="<?= $MAIN_DIRECTORY ?>/my/support">MY LightSchool Support</a></h3>
			<p>The support website is only available in italian.</p>
			<hr/>
			<h3><a href="<?= $MAIN_DIRECTORY ?>/blog">LightSchool Blog</a></h3>
			<p>The official LightSchool blog is no longer working and I am not planning to restore it.</p>
			<hr/>
			<h3><a href="<?= $MAIN_DIRECTORY ?>/lim">LightSchool LIM</a></h3>
			<p>LightSchool LIM was the system that provided the feature to project on a whiteboard every content from students' or teachers' devices without having to install any software on the whiteboard's computer. I am not planning to restore it.</p>
			<hr/>
			<h3>and other services...</h3>
			<p>
				There were far more services that those.<br/>
				<ul>
					<li>
						LightSchool for Schools was the system built for managing schools, issuing notifications to students and teachers and more...
					</li>
					<li>
						LightSchool for Publishers was intended to be used by books' publishers to sell their books on the platform.
					</li>
					<li>
						LightSchool Translate was a service where users were able to help translating LightSchool.
					</li>
					<li>
						<a href="<?= $MAIN_DIRECTORY ?>/sub_os">LightOS</a> was a custom rom based on Android 5 which was installed on some Android tablet for testing purpose.
					</li>
					<li>
						LightSchool also had its official Android, Windows Desktop, Windows 10 and Windows 10 Mobile app.
					</li>
				</ul>
			</p>
    </div>
    <?php include_once "footer.php"; ?>
  </body>
</html>