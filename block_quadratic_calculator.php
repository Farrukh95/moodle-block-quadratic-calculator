<?php
declare(strict_types=1);

class block_quadratic_calculator extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_quadratic_calculator');
    }

    public function get_content()
    {
        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->text = $this->get_calculator_form();
        $this->content->footer = html_writer::link(
            new moodle_url('/blocks/quadratic_calculator/pages/history.php'),
            get_string('viewhistory', 'block_quadratic_calculator')
        );

        return $this->content;
    }

    private function get_calculator_form()
    {
        global $PAGE;

        $courseid = $this->get_course_id();

        $full_url = $PAGE->url->out_as_local_url();
        $customdata = ['courseid' => $courseid];

        $form = new \block_quadratic_calculator\form\calculator_form($full_url, $customdata);

        $output = '';

        if ($data = $form->get_data()) {
            $solver = new \block_quadratic_calculator\service\quadratic_solver();
            $a = (float) $data->a;
            $b = (float) $data->b;
            $c = (float) $data->c;

            $solution = $solver->solve($a, $b, $c);

            $x1 = $solution['x1'] ?? null;
            $x2 = $solution['x2'] ?? null;

            $this->store_solution($a, $b, $c, $x1, $x2);

            $output .= get_string('result', 'block_quadratic_calculator', $solution);
        }

        $output .= $form->render();

        return $output;
    }

    private function get_course_id(): int
    {
        global $PAGE;

        if ($PAGE->context->contextlevel == CONTEXT_COURSE) {
            return (int) $PAGE->context->instanceid;
        }

        return 0;
    }

    private function store_solution(float $a, float $b, float $c, ?float $x1, ?float $x2)
    {
        global $DB, $USER;
        $record = new stdClass();
        $record->userid = $USER->id;
        $record->a = $a;
        $record->b = $b;
        $record->c = $c;
        $record->x1 = $x1;
        $record->x2 = $x2;
        $record->created_at = time();
        $DB->insert_record('block_quadratic_calculator', $record);
    }
}
