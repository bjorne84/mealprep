<?php
class Test extends UserModel
{
    private $testdata = [];

    public function returtest()
    {
        $this->testdata = [
            'message' => 'hej',
            'forName' => 'testfff'
        ]; 
        return $this->testdata;

    }
}
