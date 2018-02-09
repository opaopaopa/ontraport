<?php

class OneDimensionArrayConverter extends AbstractArrayConverter {

    public function convert() {
        $result = [];
        $this->run($this->input, $result);
        return $result;
    }

    protected function run($input, &$result, &$input_key = '') {

        foreach($input as $key => $value) {

            $result_key = "{$input_key}{$this->separator}{$key}";

            if (is_array($value)) {
                $this->run($value, $result, $result_key);
            } else {
                $result[$result_key] = $value;
            }
        }

    }

}