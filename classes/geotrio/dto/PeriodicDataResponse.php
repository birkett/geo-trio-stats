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

final class PeriodicDataResponse extends AbstractSettableDto implements GeoTrioApiResponseInterface
{
    use TtlTrait;

    public const DEFAULT_ID = '00000000-0000-0000-0000-000000000000';

    /**
     * @var int
     */
    protected int $latestUtc = 0;

    /**
     * @var string
     */
    protected string $id = self::DEFAULT_ID;

    /**
     * @var ConsumptionListDto[]
     */
    #[DtoArrayValue(ConsumptionListDto::class)]
    protected array $totalConsumptionList = [];

    /**
     * @var int
     */
    protected int $totalConsumptionTimestamp = 0;

    /**
     * @var SupplyStatusDto[]
     */
    #[DtoArrayValue(SupplyStatusDto::class)]
    protected array $supplyStatusList = [];

    /**
     * @var int
     */
    protected int $supplyStatusTimestamp = 0;

    /**
     * @var BillToDateListDto[]
     */
    #[DtoArrayValue(BillToDateListDto::class)]
    protected array $billToDateList = [];

    /**
     * @var int
     */
    protected int $billToDateTimestamp = 0;

    /**
     * @var ActiveTariffDto[]
     */
    #[DtoArrayValue(ActiveTariffDto::class)]
    protected array $activeTariffList = [];

    /**
     * @var int
     */
    protected int $activeTariffTimestamp = 0;

    /**
     * @var EnergyCostDto[]
     */
    #[DtoArrayValue(EnergyCostDto::class)]
    protected array $currentCostsElec = [];

    /**
     * @var int
     */
    protected int $currentCostsElecTimestamp = 0;

    /**
     * @var EnergyCostDto[]
     */
    #[DtoArrayValue(EnergyCostDto::class)]
    protected array $currentCostsGas = [];

    /**
     * @var int
     */
    protected int $currentCostsGasTimestamp = 0;

    /**
     * @TODO: Unknown structure. Needs implementing.
     */
    protected array $prePayDebtList = [];

    /**
     * @var int
     */
    protected int $prePayDebtTimestamp = 0;

    /**
     * @var BillingModeDto[]
     */
    #[DtoArrayValue(BillingModeDto::class)]
    protected array $billingMode = [];

    /**
     * @var int
     */
    protected int $billingModeTimestamp = 0;

    /**
     * @var BudgetRagStatusDto[]
     */
    #[DtoArrayValue(BudgetRagStatusDto::class)]
    protected array $budgetRagStatusDetails = [];

    /**
     * @var int
     */
    protected int $budgetRagStatusDetailsTimestamp = 0;

    /**
     * @var BudgetSettingDto[]
     */
    #[DtoArrayValue(BudgetSettingDto::class)]
    protected array $budgetSettingDetails = [];

    /**
     * @var int
     */
    protected int $budgetSettingDetailsTimestamp = 0;

    /**
     * @var SetPointsDto|null
     */
    #[DtoValue(SetPointsDto::class)]
    protected SetPointsDto|null $setPoints = null;

    /**
     * @var SeasonalAdjustmentDto[]
     */
    #[DtoArrayValue(SeasonalAdjustmentDto::class)]
    protected array $seasonalAdjustments = [];
}
