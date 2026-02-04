<?php

declare(strict_types=1);

namespace TheCodingMachine\GraphQLite\Laravel\Annotations;

use Attribute;
use BadMethodCallException;
use TheCodingMachine\GraphQLite\Annotations\ParameterAnnotationInterface;

/**
 * Use this attribute to validate a parameter for a query or mutation.
 *
 * Usage: #[Validate('email')] or #[Validate('gt:42')]
 */
#[Attribute(Attribute::TARGET_PARAMETER | Attribute::IS_REPEATABLE)]
class Validate implements ParameterAnnotationInterface
{
    private string $rule;

    public function __construct(string $rule)
    {
        $this->rule = $rule;
    }

    public function getTarget(): string
    {
        throw new BadMethodCallException('The #[Validate] attribute is applied directly to parameters, getTarget() should not be called.');
    }

    public function getRule(): string
    {
        return $this->rule;
    }
}
