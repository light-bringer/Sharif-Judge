<?php
/**
 * Sharif Judge online judge
 * @file settings.php
 * @author Mohammad Javad Naderi <mjnaderi@gmail.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->view('templates/top_bar'); ?>
<?php $this->view('templates/side_bar',array('selected'=>'settings')); ?>
<div id="main_container">
	<div id="page_title"><img src="<?php echo base_url('assets/images/icons/settings.png') ?>"/> <span><?php echo $title ?></span></div>
	<div id="main_content">
		<p class="input_p">
		<?php if ($form_status=="ok"): ?>
			<div class="shj_ok">Settings updated successfully.</div>
		<?php elseif ($form_status=="error"): ?>
			<div class="shj_error">Error updating settings.</div>
		<?php endif ?>
		<?php foreach ($errors as $error): ?>
			<div class="shj_error"><?php echo $error ?></div>
		<?php endforeach ?>
		<?php if ($defc===FALSE): ?>
			<div class="shj_error">"Tester path" is not correct.</div>
		<?php endif ?>
		</p>
		<?php echo form_open('settings/update') ?>
			<p class="input_p">
				<label for="timezone">
					Timezone:<br>
					<a target="_blank" href="http://www.php.net/manual/en/timezones.php">list of timezones</a>
				</label>
				<span class="form_comment timer"></span><br>
				<input type="text" name="timezone" class="sharif_input medium" value="<?php echo $tz ?>"/>
				<?php echo form_error('timezone','<div class="shj_error">','</div>'); ?>
			</p>
			<p class="input_p">
				<label for="week_start">Week start day:</label>
				<select name="week_start" class="sharif_input">
					<option value="0" <?php if($week_start==0) echo 'selected="selected"' ?>>Sunday</option>
					<option value="1" <?php if($week_start==1) echo 'selected="selected"' ?>>Monday</option>
					<option value="2" <?php if($week_start==2) echo 'selected="selected"' ?>>Tuesday</option>
					<option value="3" <?php if($week_start==3) echo 'selected="selected"' ?>>Wednesday</option>
					<option value="4" <?php if($week_start==4) echo 'selected="selected"' ?>>Thursday</option>
					<option value="5" <?php if($week_start==5) echo 'selected="selected"' ?>>Friday</option>
					<option value="6" <?php if($week_start==6) echo 'selected="selected"' ?>>Saturday</option>
				</select>
			</p>
			<p class="input_p">
				<label for="tester_path">"tester" full path:</label>
				<input type="text" name="tester_path" class="sharif_input medium" value="<?php echo $tester_path ?>"/>
			</p>
			<p class="input_p">
				<label for="assignments_root">"assignments" full path:</label>
				<input type="text" name="assignments_root" class="sharif_input medium" value="<?php echo $assignments_root ?>"/>
			</p>
			<p class="input_p">
				<label for="file_size_limit">Upload size limit (kB):</label>
				<input type="text" name="file_size_limit" class="sharif_input medium" value="<?php echo $file_size_limit ?>"/>
				<?php echo form_error('file_size_limit','<div class="shj_error">','</div>'); ?>
			</p>
			<p class="input_p">
				<label for="results_per_page">Results per page:</label>
				<input type="text" name="results_per_page" class="sharif_input medium" value="<?php echo $results_per_page ?>"/>
				<?php echo form_error('results_per_page','<div class="shj_error">','</div>'); ?>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_registration" value="1" <?php if ($enable_registration) echo 'checked' ?>/> Registration<br>
				<p class="form_comment">Open public registration.</p>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_log" value="1" <?php if ($enable_log) echo 'checked' ?>/> Log<br>
				<span class="form_comment">Enable Log</span>
			</p>
			<p class="input_p">
				<label for="default_late_rule">Default coefficient rule</label>
				<p class="form_comment clear">PHP script without <?php echo htmlspecialchars('<?php ?>') ?> tags</p>
				<textarea name="default_late_rule" rows="15" class="sharif_input add_text clear"><?php echo $default_late_rule ?></textarea>
			</p>



			<h2 class="shj_form">Email</h2>

			<p class="input_p">
				<label for="mail_from">Send emails "from" address:</label>
				<input type="text" name="mail_from" class="sharif_input medium" value="<?php echo $mail_from ?>"/>
				<?php echo form_error('mail_from','<div class="shj_error">','</div>'); ?>
			</p>
			<p class="input_p">
				<label for="mail_from_name">Send emails "from" name:</label>
				<input type="text" name="mail_from_name" class="sharif_input medium" value="<?php echo $mail_from_name ?>"/>
				<?php echo form_error('mail_from_name','<div class="shj_error">','</div>'); ?>
			</p>
			<p class="input_p">
				<label for="reset_password_mail">Password reset email:</label>
				<p class="form_comment clear">You can use {SITE_URL}, {RESET_LINK} and {VALID_TIME}</p>
				<textarea name="reset_password_mail" rows="15" class="sharif_input add_text clear"><?php echo $reset_password_mail ?></textarea>
			</p>
			<p class="input_p">
				<label for="add_user_mail">Add user email:</label>
				<p class="form_comment clear">You can use {SITE_URL}, {LOGIN_URL}, {ROLE}, {USERNAME} and {PASSWORD}</p>
				<textarea name="add_user_mail" rows="15" class="sharif_input add_text clear"><?php echo $add_user_mail ?></textarea>
			</p>


			<h2 class="shj_form">Sandboxing <span class="help_span"><a href="http://docs.sharifjudge.ir/sandboxing" target="_blank"><i class="splashy-help"></i> Help</a></span></h2>

			<p class="input_p">
				<input type="checkbox" name="enable_easysandbox" value="1" <?php if ($enable_easysandbox) echo 'checked' ?>/> EasySandbox<br>
				<p class="form_comment">Enable EasySandbox for C/C++.<br>
				You must <a href="http://docs.sharifjudge.ir/sandboxing#build_easysandbox" target="_blank">build EasySandbox</a> before enabling it.<br>
				<?php if (!$sandbox_built): ?>
					<span style="color: red;">You have not built EasySandbox yet.</span>
				<?php endif ?>
			</p>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_java_policy" value="1" <?php if ($enable_java_policy) echo 'checked' ?>/> Java Policy<br>
				<span class="form_comment">Enable <a href="http://docs.sharifjudge.ir/sandboxing#java_sandboxing" target="_blank">Java Sandboxing</a></span>
			</p>



			<h2 class="shj_form">Shield <span class="help_span"><a href="http://docs.sharifjudge.ir/shield" target="_blank"><i class="splashy-help"></i> Help</a></span></h2>

			<p class="input_p">
				<input type="checkbox" name="enable_c_shield" value="1" <?php if ($enable_c_shield) echo 'checked' ?>/> C Shield<br>
				<span class="form_comment">Enable <a href="http://docs.sharifjudge.ir/shield" target="_blank">Shield</a> for C</span>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_cpp_shield" value="1" <?php if ($enable_cpp_shield) echo 'checked' ?>/> C++ Shield<br>
				<span class="form_comment">Enable <a href="http://docs.sharifjudge.ir/shield" target="_blank">Shield</a> for C++</span>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_py2_shield" value="1" <?php if ($enable_py2_shield) echo 'checked' ?>/> Python 2 Shield<br>
				<span class="form_comment">Enable <a href="http://docs.sharifjudge.ir/shield" target="_blank">Shield</a> for Python 2</span>
			</p>
			<p class="input_p">
				<input type="checkbox" name="enable_py3_shield" value="1" <?php if ($enable_py3_shield) echo 'checked' ?>/> Python 3 Shield<br>
				<span class="form_comment">Enable <a href="http://docs.sharifjudge.ir/shield" target="_blank">Shield</a> for Python 3</span>
			</p>
			<p class="input_p">
				<label for="def_c">Shield rules (for C):</label><br>
				<textarea name="def_c" rows="15" class="sharif_input add_text clear"><?php if($defc!==FALSE) echo $defc ?></textarea>
			</p>
			<p class="input_p">
				<label for="def_cpp">Shield rules (for C++):</label><br>
				<textarea name="def_cpp" rows="15" class="sharif_input add_text clear"><?php if($defcpp!==FALSE) echo $defcpp ?></textarea>
			</p>
			<p class="input_p">
				<label for="shield_py2">Shield (for Python 2):</label><br>
				<textarea name="shield_py2" rows="15" class="sharif_input add_text clear"><?php if($shield_py2!==FALSE) echo $shield_py2 ?></textarea>
			</p>
			<p class="input_p">
				<label for="shield_py3">Shield (for Python 3):</label><br>
				<textarea name="shield_py3" rows="15" class="sharif_input add_text clear"><?php if($shield_py3!==FALSE) echo $shield_py3 ?></textarea>
			</p>
			<p class="input_p">
				<br>
				<input type="submit" value="Save Changes" class="sharif_input"/>
			</p>
		</form>
	</div>
</div>