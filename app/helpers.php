<?php

function isActive($route)
{
    return request()->routeIs($route) ? 'active' : '';
}