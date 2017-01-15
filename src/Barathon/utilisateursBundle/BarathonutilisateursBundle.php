<?php

namespace Barathon\utilisateursBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BarathonutilisateursBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}
