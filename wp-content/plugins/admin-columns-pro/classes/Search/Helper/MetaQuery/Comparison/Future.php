<?php

namespace ACP\Search\Helper\MetaQuery\Comparison;

use ACP\Search\Helper\DateValueFactory;
use ACP\Search\Helper\MetaQuery;
use ACP\Search\Operators;
use ACP\Search\Value;

class Future extends MetaQuery\Comparison
{

    public function __construct(string $key, Value $value)
    {
        $value_factory = new DateValueFactory($value->get_type());

        parent::__construct($key, Operators::GT, $value_factory->create_today());
    }

}