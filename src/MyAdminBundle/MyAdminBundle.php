<?php

namespace MyAdminBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MyAdminBundle extends Bundle
{
    public function getParent()
    {
        return "MMAdminBundle";
    }

}
