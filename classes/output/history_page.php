<?php
declare(strict_types=1);

namespace block_quadratic_calculator\output;

class history_page implements \renderable
{
    public function export_for_template(\renderer_base $output)
    {
        global $DB, $USER;
        $records = $DB->get_records('block_quadratic_calculator', ['userid' => $USER->id], 'created_at DESC');
        return ['records' => array_values($records)];
    }
}
