<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

use GeoTrio\classes\geotrio\dto\attributes\DtoArrayValue;
use GeoTrio\classes\geotrio\dto\attributes\DtoValue;
use GeoTrio\classes\geotrio\dto\abstract\AbstractSettableDto;
use GeoTrio\classes\geotrio\dto\components\ActiveTariffDto;
use GeoTrio\classes\geotrio\dto\components\BillingModeDto;
use GeoTrio\classes\geotrio\dto\components\BillToDateListDto;
use GeoTrio\classes\geotrio\dto\components\BudgetRagStatusDto;
use GeoTrio\classes\geotrio\dto\components\BudgetSettingDto;
use GeoTrio\classes\geotrio\dto\components\ConsumptionListDto;
use GeoTrio\classes\geotrio\dto\components\EnergyCostDto;
use GeoTrio\classes\geotrio\dto\components\SeasonalAdjustmentDto;
use GeoTrio\classes\geotrio\dto\components\SetPointsDto;
use GeoTrio\classes\geotrio\dto\components\SupplyStatusDto;
use GeoTrio\classes\geotrio\dto\interfaces\GeoTrioApiResponseInterface;
use GeoTrio\classes\geotrio\dto\traits\TtlTrait;

final class GeoTrioApiPeriodicDataResponse extends AbstractSettableDto implements GeoTrioApiResponseInterface
{
    use TtlTrait;

    /**
     * @var int
     */
    protected int $latestUtc;

    /**
     * @var string
     */
    protected string $id;

    /**
     * @var ConsumptionListDto[]|null
     */
    #[DtoArrayValue(ConsumptionListDto::class)]
    protected array|null $totalConsumptionList;

    /**
     * @var int
     */
    protected int $totalConsumptionTimestamp;

    /**
     * @var SupplyStatusDto[]|null
     */
    #[DtoArrayValue(SupplyStatusDto::class)]
    protected array|null $supplyStatusList;

    /**
     * @var int
     */
    protected int $supplyStatusTimestamp;

    /**
     * @var BillToDateListDto[]|null
     */
    #[DtoArrayValue(BillToDateListDto::class)]
    protected array|null $billToDateList;

    /**
     * @var int
     */
    protected int $billToDateTimestamp;

    /**
     * @var ActiveTariffDto[]|null
     */
    #[DtoArrayValue(ActiveTariffDto::class)]
    protected array|null $activeTariffList;

    /**
     * @var int
     */
    protected int $activeTariffTimestamp;

    /**
     * @var EnergyCostDto[]|null
     */
    #[DtoArrayValue(EnergyCostDto::class)]
    protected array|null $currentCostsElec;

    /**
     * @var int
     */
    protected int $currentCostsElecTimestamp;

    /**
     * @var EnergyCostDto[]|null
     */
    #[DtoArrayValue(EnergyCostDto::class)]
    protected array|null $currentCostsGas;

    /**
     * @var int
     */
    protected int $currentCostsGasTimestamp;

    /**
     * @TODO: Unknown structure. Needs implementing.
     *
     * @var array|null
     */
    protected array|null $prePayDebtList;

    /**
     * @var int
     */
    protected int $prePayDebtTimestamp;

    /**
     * @var BillingModeDto[]|null
     */
    #[DtoArrayValue(BillingModeDto::class)]
    protected array|null $billingMode;

    /**
     * @var int
     */
    protected int $billingModeTimestamp;

    /**
     * @var BudgetRagStatusDto[]|null
     */
    #[DtoArrayValue(BudgetRagStatusDto::class)]
    protected array|null $budgetRagStatusDetails;

    /**
     * @var int
     */
    protected int $budgetRagStatusDetailsTimestamp;

    /**
     * @var BudgetSettingDto[]|null
     */
    #[DtoArrayValue(BudgetSettingDto::class)]
    protected array|null $budgetSettingDetails;

    /**
     * @var int
     */
    protected int $budgetSettingDetailsTimestamp;

    /**
     * @var SetPointsDto
     */
    #[DtoValue(SetPointsDto::class)]
    protected SetPointsDto $setPoints;

    /**
     * @var SeasonalAdjustmentDto[]|null
     */
    #[DtoArrayValue(SeasonalAdjustmentDto::class)]
    protected array|null $seasonalAdjustments;
}
