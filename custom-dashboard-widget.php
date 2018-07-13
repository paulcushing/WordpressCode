// Add a widget in WordPress Dashboard
add_action('wp_dashboard_setup', 'my_add_dashboard_widgets' );

function my_add_dashboard_widgets() {
	wp_add_dashboard_widget('my_dashboard_widget', 'My Awesome Dashboard Widget', 'create_dashboard_widget_function');
}

function create_dashboard_widget_function() {
	echo "<h3>Here is my custom Dashboard Widget</h3><a href='/' class='button-primary'>Here's A Button</a>";
    echo "<p>Here is a list:</p>";
    echo "<ul><li>Item 1</li><li>Item 2</li><li>Item 3</li></ul>";
}



