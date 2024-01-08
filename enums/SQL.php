<?php

namespace enums;

enum SQL: string
{
    case IN_OPERATOR = 'IN';
    case IS_OPERATOR = 'IS';
    case IS_NOT_OPERATOR = 'IS NOT';
    case NOT_IN_OPERATOR = 'NOT IN';
    case NULL = 'NULL';
}