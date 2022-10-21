<?php

declare(strict_types=1);

namespace GeoTrio\classes\geotrio\dto;

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
    protected array|null $totalConsumptionList;

    /**
     * @var int
     */
    protected int $totalConsumptionTimestamp;

    /**
     * @var SupplyStatusDto[]|null
     */
    protected array|null $supplyStatusList;

    /**
     * @var int
     */
    protected int $supplyStatusTimestamp;

    /**
     * @var BillToDateListDto[]|null
     */
    protected array|null $billToDateList;

    /**
     * @var int
     */
    protected int $billToDateTimestamp;

    /**
     * @var ActiveTariffDto[]|null
     */
    protected array|null $activeTariffList;

    /**
     * @var int
     */
    protected int $activeTariffTimestamp;

    /**
     * @var EnergyCostDto[]|null
     */
    protected array|null $currentCostsElec;

    /**
     * @var int
     */
    protected int $currentCostsElecTimestamp;

    /**
     * @var EnergyCostDto[]|null
     */
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
    protected array|null $billingMode;

    /**
     * @var int
     */
    protected int $billingModeTimestamp;

    /**
     * @var BudgetRagStatusDto[]|null
     */
    protected array|null $budgetRagStatusDetails;

    /**
     * @var int
     */
    protected int $budgetRagStatusDetailsTimestamp;

    /**
     * @var BudgetSettingDto[]|null
     */
    protected array|null $budgetSettingDetails;

    /**
     * @var int
     */
    protected int $budgetSettingDetailsTimestamp;

    /**
     * @var SetPointsDto
     */
    protected SetPointsDto $setPoints;

    /**
     * @var SeasonalAdjustmentDto[]|null
     */
    protected array|null $seasonalAdjustments;

    /**
     * @param array $data
     *
     * @return void
     */
    protected function set(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'totalConsumptionList':
                    $this->setDtoArray($key, ConsumptionListDto::class, $value);

                    break;

                case 'supplyStatusList':
                    $this->setDtoArray($key, SupplyStatusDto::class, $value);

                    break;

                case 'billToDateList':
                    $this->setDtoArray($key, BillToDateListDto::class, $value);

                    break;

                case 'activeTariffList':
                    $this->setDtoArray($key, ActiveTariffDto::class, $value);

                    break;

                case 'currentCostsElec':
                case 'currentCostsGas':
                    $this->setDtoArray($key, EnergyCostDto::class, $value);

                    break;

                case 'billingMode':
                    $this->setDtoArray($key, BillingModeDto::class, $value);

                    break;

                case 'budgetRagStatusDetails':
                    $this->setDtoArray($key, BudgetRagStatusDto::class, $value);

                    break;

                case 'budgetSettingDetails':
                    $this->setDtoArray($key, BudgetSettingDto::class, $value);

                    break;

                case 'setPoints':
                    if (is_array($value)) {
                        $this->setPoints = new SetPointsDto($value);
                    }

                    break;

                case 'seasonalAdjustments':
                    $this->setDtoArray($key, SeasonalAdjustmentDto::class, $value);

                    break;

                default:
                    $this->{$key} = $value;
            }
        }
    }
}
