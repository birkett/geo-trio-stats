<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto\attributes;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
final class DtoArrayValue extends AbstractDtoValueAttribute
{
}