<?php

namespace AsaGick\Portfolio\Services;

class Portfolio
{
    public function experience()
    {
        return new Experience();
    }

    public function skill()
    {
        return new Skill();
    }

    public function social()
    {
        return new Social();
    }

    public function teamMember()
    {
        return new TeamMember();
    }
}
