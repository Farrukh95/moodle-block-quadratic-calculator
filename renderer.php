<?php
declare(strict_types=1);

defined('MOODLE_INTERNAL') || die();

class block_quadratic_calculator_renderer extends plugin_renderer_base
{

    /**
     * Рендерит страницу истории.
     *
     * @param \block_quadratic_calculator\output\history_page $page Страница истории для рендеринга.
     * @return string HTML код страницы.
     */
    public function render_history_page(\block_quadratic_calculator\output\history_page $page): string
    {
        $output = '';
        $records = $page->export_for_template($this);

        $output .= html_writer::start_tag('div', ['class' => 'history-page']);
        $output .= html_writer::tag('h2', get_string('history', 'block_quadratic_calculator'));

        if (!empty($records['records'])) {
            $output .= html_writer::start_tag('ul');
            foreach ($records['records'] as $record) {
                $output .= html_writer::tag('li', "a={$record->a}, b={$record->b}, c={$record->c}, x1={$record->x1}, x2={$record->x2}");
            }
            $output .= html_writer::end_tag('ul');
        } else {
            $output .= html_writer::tag('p', get_string('nohistory', 'block_quadratic_calculator'));
        }

        $output .= html_writer::end_tag('div');
        return $output;
    }
}
