<?php

// Disable Default Dashboard Widgets
function disable_default_dashboard_widgets() {

	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_activity', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	function hide_help() {
		echo '<style type="text/css">#contextual-help-link-wrap { display: none !important; }</style>';
	}
	add_action('admin_head', 'hide_help');

}
add_action('admin_menu', 'disable_default_dashboard_widgets');

// --- Dashboard widget specifically for the Administrators
if ( current_user_can('manage_options') ) {
	function admin_dashboard_widget_function() {
		echo "<h3>Dashboard widget for Admins</h3>";
	}
	function admin_dashboard_widgets() {
		wp_add_dashboard_widget('admin_dashboard_widget', 'Admin Dashboard', 'admin_dashboard_widget_function');
	}
	add_action('wp_dashboard_setup', 'admin_dashboard_widgets' );
}

// --- Dashboard widget specifically for the HR Team
if ( current_user_can('manage_job_postings') and !current_user_can('manage_options') ) {
        function hr_dashboard_widget_function() {
                echo "<h3>Hey there team! :)</h3><br />";
		echo "<center><a href='/resources/about-caped/careers/' class='button-primary'>Visit Jobs Page</a></center>";
        }
        function hr_dashboard_widgets() {
                wp_add_dashboard_widget('hr_dashboard_widget', 'HR Dashboard', 'hr_dashboard_widget_function');
        }
        add_action('wp_dashboard_setup', 'hr_dashboard_widgets' );
}

// --- Dashboard widget specifically for the Repo Team
if ( current_user_can('manage_repos') and !current_user_can('manage_options') ) {
        function repo_dashboard_widget_function() {
                echo "<h3>Hey there team! :)</h3><br />";
		echo "<center><a href='/news/for-sale/' class='button-primary'>Visit Repos Page</a></center>";
        }
        function repo_dashboard_widgets() {
                wp_add_dashboard_widget('repo_dashboard_widget', 'Repo Dashboard', 'repo_dashboard_widget_function');
        }
        add_action('wp_dashboard_setup', 'repo_dashboard_widgets' );
}

?>