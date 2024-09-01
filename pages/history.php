<?php
require_once('../../../config.php');
require_login();

$context = context_system::instance();
$PAGE->set_url('/blocks/quadratic_calculator/pages/history.php');
$PAGE->set_context($context);
$PAGE->set_title(get_string('history', 'block_quadratic_calculator'));

$output = $PAGE->get_renderer('block_quadratic_calculator');
$page = new \block_quadratic_calculator\output\history_page();
echo $output->header();
echo $output->render_history_page($page);
echo $output->footer();
