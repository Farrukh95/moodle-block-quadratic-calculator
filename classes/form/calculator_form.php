<?php
declare(strict_types=1);

namespace block_quadratic_calculator\form;

use moodleform;

class calculator_form extends moodleform
{
    public function definition()
    {
        $mform = $this->_form;

        $mform->addElement('text', 'a', get_string('coefficienta', 'block_quadratic_calculator'));
        $mform->setType('a', PARAM_FLOAT);
        $mform->addRule('a', null, 'numeric', null, 'client');

        $mform->addElement('text', 'b', get_string('coefficientb', 'block_quadratic_calculator'));
        $mform->setType('b', PARAM_FLOAT);
        $mform->addRule('b', null, 'numeric', null, 'client');

        $mform->addElement('text', 'c', get_string('coefficientc', 'block_quadratic_calculator'));
        $mform->setType('c', PARAM_FLOAT);
        $mform->addRule('c', null, 'numeric', null, 'client');

        $this->add_action_buttons(false, get_string('calculate', 'block_quadratic_calculator'));
    }
}
