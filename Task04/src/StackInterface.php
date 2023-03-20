<?php

namespace App;

interface StackInterface
{
    public function push(mixed ...$elems);
    public function pop();
    public function top();
    public function isEmpty();
    public function copy();
    public function __toString();
}
