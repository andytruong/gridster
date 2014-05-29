<?php

namespace GO1\Gridster\Output;

class outputJson implements OutputInterface{
    function output($output){
        return json_encode($output);
    }
}