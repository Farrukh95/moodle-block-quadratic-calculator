<?php
declare(strict_types=1);

namespace block_quadratic_calculator\output;

use renderable;
use renderer_base;
use templatable;

class history_page implements renderable, templatable
{
    public function export_for_template(renderer_base $output)
    {
        global $DB, $USER;
        $records = $DB->get_records('block_quadratic_calculator', ['userid' => $USER->id], 'created_at DESC');
        return ['records' => array_values($records)];
    }
}
