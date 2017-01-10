<?php

class Freelance extends Supernumerary
{
    public function payment()
    {
        return 20.8 * 8 * $this->hourlyRate;
    }

}
