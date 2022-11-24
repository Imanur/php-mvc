<?php

namespace ProgrammerPhp\PhpMvc\Middleware;

interface Middleware
{
    function before(): void;
}
