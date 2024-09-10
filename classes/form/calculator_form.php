<?php
declare(strict_types=1);

namespace block_quadratic_calculator\form;

require_once($CFG->libdir . '/formslib.php');

class calculator_form extends \moodleform
{
    public function definition()
    {
        $mform = $this->_form;

        global $PAGE;
        $full_url = $PAGE->url->out_as_local_url();

        $mform->addElement('hidden', 'return_url', $full_url);
        $mform->setType('return_url', PARAM_URL);

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
