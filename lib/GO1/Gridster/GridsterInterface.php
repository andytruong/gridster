<?php

namespace GO1\Gridster;

use GO1\Gridster\GridMaster\GridMasterInterface;

interface GridsterInterface{
    function outputGridster(GridMasterInterface $gridMasterInterface);
}