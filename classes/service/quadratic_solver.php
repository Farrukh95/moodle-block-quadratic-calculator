<?php
declare(strict_types=1);

namespace block_quadratic_calculator\service;

class quadratic_solver
{
    public function solve(float $a, float $b, float $c): array
    {
        if ($a == 0) {
            // Линейное уравнение
            return $this->solveLinear($b, $c);
        } else {
            // Квадратное уравнение
            return $this->solveQuadratic($a, $b, $c);
        }
    }

    private function solveLinear(float $b, float $c): array
    {
        if ($b == 0) {
            return ['x1' => null, 'x2' => null];
        } else {
            $x1 = -$c / $b;
            return ['x1' => $x1, 'x2' => null];
        }
    }

    private function solveQuadratic(float $a, float $b, float $c): array
    {
        $discriminant = $b * $b - 4 * $a * $c;

        if ($discriminant < 0) {
            return ['x1' => null, 'x2' => null];
        } else {
            $sqrtDiscriminant = sqrt($discriminant);
            $x1 = (-$b + $sqrtDiscriminant) / (2 * $a);
            $x2 = (-$b - $sqrtDiscriminant) / (2 * $a);

            return ['x1' => $x1, 'x2' => $x2];
        }
    }

}
