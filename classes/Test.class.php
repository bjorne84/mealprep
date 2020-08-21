<?php
class Test
{
    private $testdata = [];

    public function returtest()
    {
        $this->testdata = [
            'message' => 'hej',
            'forName' => 'test'
        ]; 
        return $this->testdata;

    }
}
