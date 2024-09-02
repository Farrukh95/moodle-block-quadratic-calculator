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
            $output .= html_writer::start_tag('table', ['class' => 'generaltable fullwidth']);
            $output .= html_writer::start_tag('thead');
            $output .= html_writer::start_tag('tr');
            $output .= html_writer::tag('th', "a", ['scope' => 'col']);
            $output .= html_writer::tag('th', "b", ['scope' => 'col']);
            $output .= html_writer::tag('th', "c", ['scope' => 'col']);
            $output .= html_writer::tag('th', "x1", ['scope' => 'col']);
            $output .= html_writer::tag('th', "x2", ['scope' => 'col']);
            $output .= html_writer::end_tag('tr');
            $output .= html_writer::end_tag('thead');
            $output .= html_writer::start_tag('tbody');

            foreach ($records['records'] as $record) {
                $output .= $this->render_history_row($record);
            }

            $output .= html_writer::end_tag('tbody');
            $output .= html_writer::end_tag('table');
        } else {
            $output .= html_writer::tag('p', get_string('nohistory', 'block_quadratic_calculator'));
        }

        $output .= html_writer::end_tag('div');
        return $output;
    }

    /**
     * Рендерит строку таблицы истории.
     *
     * @param stdClass $record Запись с данными для отображения.
     * @return string строка таблицы HTML код.
     */
    private function render_history_row(stdClass $record): string
    {
        $output = html_writer::start_tag('tr', ['class' => 'r' . ($record->id % 2)]);
        $output .= html_writer::tag('td', $record->a);
        $output .= html_writer::tag('td', $record->b);
        $output .= html_writer::tag('td', $record->c);
        $output .= html_writer::tag('td', $record->x1);
        $output .= html_writer::tag('td', $record->x2);
        $output .= html_writer::end_tag('tr');

        return $output;
    }
}
