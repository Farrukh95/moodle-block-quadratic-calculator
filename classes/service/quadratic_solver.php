<?php
declare(strict_types=1);

namespace block_quadratic_calculator\service;

class quadratic_solver
{
    public function solve(float $a, float $b, float $c): array
    {
        $discriminant = $b * $b - 4 * $a * $c;

        if ($discriminant < 0) {
            throw new \moodle_exception('Реальных корней нет!');
        }

        $x1 = (-$b + sqrt($discriminant)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminant)) / (2 * $a);

        return ['x1' => $x1, 'x2' => $x2];
    }
}
