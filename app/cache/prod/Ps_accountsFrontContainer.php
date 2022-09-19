<?php

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * Ps_accountsFrontContainer.
 *
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 */
class Ps_accountsFrontContainer extends Container
{
    private $parameters;
    private $targetDirs = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array();
        $this->scopeChildren = array();
        $this->methodMap = array(
            'prestashop\\module\\psaccounts\\api\\accountsclient' => 'getPrestashop_Module_Psaccounts_Api_AccountsclientService',
            'prestashop\\module\\psaccounts\\api\\eventbusproxyclient' => 'getPrestashop_Module_Psaccounts_Api_EventbusproxyclientService',
            'prestashop\\module\\psaccounts\\api\\eventbussyncclient' => 'getPrestashop_Module_Psaccounts_Api_EventbussyncclientService',
            'prestashop\\module\\psaccounts\\decorator\\categorydecorator' => 'getPrestashop_Module_Psaccounts_Decorator_CategorydecoratorService',
            'prestashop\\module\\psaccounts\\decorator\\productdecorator' => 'getPrestashop_Module_Psaccounts_Decorator_ProductdecoratorService',
            'prestashop\\module\\psaccounts\\formatter\\arrayformatter' => 'getPrestashop_Module_Psaccounts_Formatter_ArrayformatterService',
            'prestashop\\module\\psaccounts\\formatter\\jsonformatter' => 'getPrestashop_Module_Psaccounts_Formatter_JsonformatterService',
            'prestashop\\module\\psaccounts\\provider\\cartdataprovider' => 'getPrestashop_Module_Psaccounts_Provider_CartdataproviderService',
            'prestashop\\module\\psaccounts\\provider\\categorydataprovider' => 'getPrestashop_Module_Psaccounts_Provider_CategorydataproviderService',
            'prestashop\\module\\psaccounts\\provider\\googletaxonomydataprovider' => 'getPrestashop_Module_Psaccounts_Provider_GoogletaxonomydataproviderService',
            'prestashop\\module\\psaccounts\\provider\\moduledataprovider' => 'getPrestashop_Module_Psaccounts_Provider_ModuledataproviderService',
            'prestashop\\module\\psaccounts\\provider\\orderdataprovider' => 'getPrestashop_Module_Psaccounts_Provider_OrderdataproviderService',
            'prestashop\\module\\psaccounts\\provider\\productdataprovider' => 'getPrestashop_Module_Psaccounts_Provider_ProductdataproviderService',
            'prestashop\\module\\psaccounts\\repository\\accountssyncrepository' => 'getPrestashop_Module_Psaccounts_Repository_AccountssyncrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\cartproductrepository' => 'getPrestashop_Module_Psaccounts_Repository_CartproductrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\cartrepository' => 'getPrestashop_Module_Psaccounts_Repository_CartrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\categoryrepository' => 'getPrestashop_Module_Psaccounts_Repository_CategoryrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\configurationrepository' => 'getPrestashop_Module_Psaccounts_Repository_ConfigurationrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\currencyrepository' => 'getPrestashop_Module_Psaccounts_Repository_CurrencyrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\deletedobjectsrepository' => 'getPrestashop_Module_Psaccounts_Repository_DeletedobjectsrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\googletaxonomyrepository' => 'getPrestashop_Module_Psaccounts_Repository_GoogletaxonomyrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\imagerepository' => 'getPrestashop_Module_Psaccounts_Repository_ImagerepositoryService',
            'prestashop\\module\\psaccounts\\repository\\incrementalsyncrepository' => 'getPrestashop_Module_Psaccounts_Repository_IncrementalsyncrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\languagerepository' => 'getPrestashop_Module_Psaccounts_Repository_LanguagerepositoryService',
            'prestashop\\module\\psaccounts\\repository\\modulerepository' => 'getPrestashop_Module_Psaccounts_Repository_ModulerepositoryService',
            'prestashop\\module\\psaccounts\\repository\\orderdetailsrepository' => 'getPrestashop_Module_Psaccounts_Repository_OrderdetailsrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\orderrepository' => 'getPrestashop_Module_Psaccounts_Repository_OrderrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\productrepository' => 'getPrestashop_Module_Psaccounts_Repository_ProductrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\serverinformationrepository' => 'getPrestashop_Module_Psaccounts_Repository_ServerinformationrepositoryService',
            'prestashop\\module\\psaccounts\\repository\\shoprepository' => 'getPrestashop_Module_Psaccounts_Repository_ShoprepositoryService',
            'prestashop\\module\\psaccounts\\repository\\themerepository' => 'getPrestashop_Module_Psaccounts_Repository_ThemerepositoryService',
            'prestashop\\module\\psaccounts\\service\\apiauthorizationservice' => 'getPrestashop_Module_Psaccounts_Service_ApiauthorizationserviceService',
            'prestashop\\module\\psaccounts\\service\\compressionservice' => 'getPrestashop_Module_Psaccounts_Service_CompressionserviceService',
            'prestashop\\module\\psaccounts\\service\\deletedobjectsservice' => 'getPrestashop_Module_Psaccounts_Service_DeletedobjectsserviceService',
            'prestashop\\module\\psaccounts\\service\\proxyservice' => 'getPrestashop_Module_Psaccounts_Service_ProxyserviceService',
            'prestashop\\module\\psaccounts\\service\\synchronizationservice' => 'getPrestashop_Module_Psaccounts_Service_SynchronizationserviceService',
            'ps_accounts.context' => 'getPsAccounts_ContextService',
            'ps_accounts.db' => 'getPsAccounts_DbService',
            'ps_accounts.link' => 'getPsAccounts_LinkService',
        );

        $this->aliases = array();
    }

    /**
     * {@inheritdoc}
     */
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }

    /**
     * {@inheritdoc}
     */
    public function isFrozen()
    {
        return true;
    }

    /**
     * Gets the 'prestashop\module\psaccounts\api\accountsclient' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\AccountsClient A PrestaShop\Module\PsAccounts\Api\AccountsClient instance
     */
    protected function getPrestashop_Module_Psaccounts_Api_AccountsclientService()
    {
        return $this->services['prestashop\module\psaccounts\api\accountsclient'] = new \PrestaShop\Module\PsAccounts\Api\AccountsClient($this->get('ps_accounts.link'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\api\eventbusproxyclient' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\EventBusProxyClient A PrestaShop\Module\PsAccounts\Api\EventBusProxyClient instance
     */
    protected function getPrestashop_Module_Psaccounts_Api_EventbusproxyclientService()
    {
        return $this->services['prestashop\module\psaccounts\api\eventbusproxyclient'] = new \PrestaShop\Module\PsAccounts\Api\EventBusProxyClient($this->get('ps_accounts.link'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\api\eventbussyncclient' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Api\EventBusSyncClient A PrestaShop\Module\PsAccounts\Api\EventBusSyncClient instance
     */
    protected function getPrestashop_Module_Psaccounts_Api_EventbussyncclientService()
    {
        return $this->services['prestashop\module\psaccounts\api\eventbussyncclient'] = new \PrestaShop\Module\PsAccounts\Api\EventBusSyncClient($this->get('ps_accounts.link'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\decorator\categorydecorator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Decorator\CategoryDecorator A PrestaShop\Module\PsAccounts\Decorator\CategoryDecorator instance
     */
    protected function getPrestashop_Module_Psaccounts_Decorator_CategorydecoratorService()
    {
        return $this->services['prestashop\module\psaccounts\decorator\categorydecorator'] = new \PrestaShop\Module\PsAccounts\Decorator\CategoryDecorator();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\decorator\productdecorator' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Decorator\ProductDecorator A PrestaShop\Module\PsAccounts\Decorator\ProductDecorator instance
     */
    protected function getPrestashop_Module_Psaccounts_Decorator_ProductdecoratorService()
    {
        return $this->services['prestashop\module\psaccounts\decorator\productdecorator'] = new \PrestaShop\Module\PsAccounts\Decorator\ProductDecorator($this->get('ps_accounts.context'), $this->get('prestashop\module\psaccounts\repository\languagerepository'), $this->get('prestashop\module\psaccounts\repository\productrepository'), $this->get('prestashop\module\psaccounts\repository\categoryrepository'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\formatter\arrayformatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Formatter\ArrayFormatter A PrestaShop\Module\PsAccounts\Formatter\ArrayFormatter instance
     */
    protected function getPrestashop_Module_Psaccounts_Formatter_ArrayformatterService()
    {
        return $this->services['prestashop\module\psaccounts\formatter\arrayformatter'] = new \PrestaShop\Module\PsAccounts\Formatter\ArrayFormatter();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\formatter\jsonformatter' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Formatter\JsonFormatter A PrestaShop\Module\PsAccounts\Formatter\JsonFormatter instance
     */
    protected function getPrestashop_Module_Psaccounts_Formatter_JsonformatterService()
    {
        return $this->services['prestashop\module\psaccounts\formatter\jsonformatter'] = new \PrestaShop\Module\PsAccounts\Formatter\JsonFormatter();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\cartdataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\CartDataProvider A PrestaShop\Module\PsAccounts\Provider\CartDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_CartdataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\cartdataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\CartDataProvider($this->get('prestashop\module\psaccounts\repository\cartrepository'), $this->get('prestashop\module\psaccounts\repository\cartproductrepository'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\categorydataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\CategoryDataProvider A PrestaShop\Module\PsAccounts\Provider\CategoryDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_CategorydataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\categorydataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\CategoryDataProvider($this->get('prestashop\module\psaccounts\repository\categoryrepository'), $this->get('prestashop\module\psaccounts\decorator\categorydecorator'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\googletaxonomydataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\GoogleTaxonomyDataProvider A PrestaShop\Module\PsAccounts\Provider\GoogleTaxonomyDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_GoogletaxonomydataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\googletaxonomydataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\GoogleTaxonomyDataProvider($this->get('prestashop\module\psaccounts\repository\googletaxonomyrepository'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\moduledataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\ModuleDataProvider A PrestaShop\Module\PsAccounts\Provider\ModuleDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_ModuledataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\moduledataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\ModuleDataProvider($this->get('prestashop\module\psaccounts\repository\modulerepository'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\orderdataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\OrderDataProvider A PrestaShop\Module\PsAccounts\Provider\OrderDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_OrderdataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\orderdataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\OrderDataProvider($this->get('ps_accounts.context'), $this->get('prestashop\module\psaccounts\repository\orderrepository'), $this->get('prestashop\module\psaccounts\repository\orderdetailsrepository'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\provider\productdataprovider' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Provider\ProductDataProvider A PrestaShop\Module\PsAccounts\Provider\ProductDataProvider instance
     */
    protected function getPrestashop_Module_Psaccounts_Provider_ProductdataproviderService()
    {
        return $this->services['prestashop\module\psaccounts\provider\productdataprovider'] = new \PrestaShop\Module\PsAccounts\Provider\ProductDataProvider($this->get('prestashop\module\psaccounts\repository\productrepository'), $this->get('prestashop\module\psaccounts\decorator\productdecorator'), $this->get('prestashop\module\psaccounts\repository\languagerepository'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\accountssyncrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\AccountsSyncRepository A PrestaShop\Module\PsAccounts\Repository\AccountsSyncRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_AccountssyncrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\accountssyncrepository'] = new \PrestaShop\Module\PsAccounts\Repository\AccountsSyncRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\cartproductrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\CartProductRepository A PrestaShop\Module\PsAccounts\Repository\CartProductRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_CartproductrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\cartproductrepository'] = new \PrestaShop\Module\PsAccounts\Repository\CartProductRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\cartrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\CartRepository A PrestaShop\Module\PsAccounts\Repository\CartRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_CartrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\cartrepository'] = new \PrestaShop\Module\PsAccounts\Repository\CartRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\categoryrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\CategoryRepository A PrestaShop\Module\PsAccounts\Repository\CategoryRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_CategoryrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\categoryrepository'] = new \PrestaShop\Module\PsAccounts\Repository\CategoryRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\configurationrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository A PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ConfigurationrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\configurationrepository'] = new \PrestaShop\Module\PsAccounts\Repository\ConfigurationRepository();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\currencyrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\CurrencyRepository A PrestaShop\Module\PsAccounts\Repository\CurrencyRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_CurrencyrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\currencyrepository'] = new \PrestaShop\Module\PsAccounts\Repository\CurrencyRepository();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\deletedobjectsrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\DeletedObjectsRepository A PrestaShop\Module\PsAccounts\Repository\DeletedObjectsRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_DeletedobjectsrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\deletedobjectsrepository'] = new \PrestaShop\Module\PsAccounts\Repository\DeletedObjectsRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\googletaxonomyrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\GoogleTaxonomyRepository A PrestaShop\Module\PsAccounts\Repository\GoogleTaxonomyRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_GoogletaxonomyrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\googletaxonomyrepository'] = new \PrestaShop\Module\PsAccounts\Repository\GoogleTaxonomyRepository($this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\imagerepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ImageRepository A PrestaShop\Module\PsAccounts\Repository\ImageRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ImagerepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\imagerepository'] = new \PrestaShop\Module\PsAccounts\Repository\ImageRepository($this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\incrementalsyncrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\IncrementalSyncRepository A PrestaShop\Module\PsAccounts\Repository\IncrementalSyncRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_IncrementalsyncrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\incrementalsyncrepository'] = new \PrestaShop\Module\PsAccounts\Repository\IncrementalSyncRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\languagerepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\LanguageRepository A PrestaShop\Module\PsAccounts\Repository\LanguageRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_LanguagerepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\languagerepository'] = new \PrestaShop\Module\PsAccounts\Repository\LanguageRepository();
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\modulerepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ModuleRepository A PrestaShop\Module\PsAccounts\Repository\ModuleRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ModulerepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\modulerepository'] = new \PrestaShop\Module\PsAccounts\Repository\ModuleRepository($this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\orderdetailsrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\OrderDetailsRepository A PrestaShop\Module\PsAccounts\Repository\OrderDetailsRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_OrderdetailsrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\orderdetailsrepository'] = new \PrestaShop\Module\PsAccounts\Repository\OrderDetailsRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\orderrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\OrderRepository A PrestaShop\Module\PsAccounts\Repository\OrderRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_OrderrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\orderrepository'] = new \PrestaShop\Module\PsAccounts\Repository\OrderRepository($this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\productrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ProductRepository A PrestaShop\Module\PsAccounts\Repository\ProductRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ProductrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\productrepository'] = new \PrestaShop\Module\PsAccounts\Repository\ProductRepository($this->get('ps_accounts.db'), $this->get('ps_accounts.context'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\serverinformationrepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ServerInformationRepository A PrestaShop\Module\PsAccounts\Repository\ServerInformationRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ServerinformationrepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\serverinformationrepository'] = new \PrestaShop\Module\PsAccounts\Repository\ServerInformationRepository($this->get('ps_accounts.context'), $this->get('ps_accounts.db'), $this->get('prestashop\module\psaccounts\repository\currencyrepository'), $this->get('prestashop\module\psaccounts\repository\languagerepository'), $this->get('prestashop\module\psaccounts\repository\configurationrepository'), $this->get('prestashop\module\psaccounts\repository\shoprepository'), $this->get('prestashop\module\psaccounts\formatter\arrayformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\shoprepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ShopRepository A PrestaShop\Module\PsAccounts\Repository\ShopRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ShoprepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\shoprepository'] = new \PrestaShop\Module\PsAccounts\Repository\ShopRepository($this->get('ps_accounts.context'), $this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\repository\themerepository' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Repository\ThemeRepository A PrestaShop\Module\PsAccounts\Repository\ThemeRepository instance
     */
    protected function getPrestashop_Module_Psaccounts_Repository_ThemerepositoryService()
    {
        return $this->services['prestashop\module\psaccounts\repository\themerepository'] = new \PrestaShop\Module\PsAccounts\Repository\ThemeRepository($this->get('ps_accounts.context'), $this->get('ps_accounts.db'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\service\apiauthorizationservice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\ApiAuthorizationService A PrestaShop\Module\PsAccounts\Service\ApiAuthorizationService instance
     */
    protected function getPrestashop_Module_Psaccounts_Service_ApiauthorizationserviceService()
    {
        return $this->services['prestashop\module\psaccounts\service\apiauthorizationservice'] = new \PrestaShop\Module\PsAccounts\Service\ApiAuthorizationService($this->get('prestashop\module\psaccounts\repository\accountssyncrepository'), $this->get('prestashop\module\psaccounts\api\eventbussyncclient'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\service\compressionservice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\CompressionService A PrestaShop\Module\PsAccounts\Service\CompressionService instance
     */
    protected function getPrestashop_Module_Psaccounts_Service_CompressionserviceService()
    {
        return $this->services['prestashop\module\psaccounts\service\compressionservice'] = new \PrestaShop\Module\PsAccounts\Service\CompressionService($this->get('prestashop\module\psaccounts\formatter\jsonformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\service\deletedobjectsservice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\DeletedObjectsService A PrestaShop\Module\PsAccounts\Service\DeletedObjectsService instance
     */
    protected function getPrestashop_Module_Psaccounts_Service_DeletedobjectsserviceService()
    {
        return $this->services['prestashop\module\psaccounts\service\deletedobjectsservice'] = new \PrestaShop\Module\PsAccounts\Service\DeletedObjectsService($this->get('ps_accounts.context'), $this->get('prestashop\module\psaccounts\repository\deletedobjectsrepository'), $this->get('prestashop\module\psaccounts\service\proxyservice'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\service\proxyservice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\ProxyService A PrestaShop\Module\PsAccounts\Service\ProxyService instance
     */
    protected function getPrestashop_Module_Psaccounts_Service_ProxyserviceService()
    {
        return $this->services['prestashop\module\psaccounts\service\proxyservice'] = new \PrestaShop\Module\PsAccounts\Service\ProxyService($this->get('prestashop\module\psaccounts\api\eventbusproxyclient'), $this->get('prestashop\module\psaccounts\formatter\jsonformatter'));
    }

    /**
     * Gets the 'prestashop\module\psaccounts\service\synchronizationservice' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \PrestaShop\Module\PsAccounts\Service\SynchronizationService A PrestaShop\Module\PsAccounts\Service\SynchronizationService instance
     */
    protected function getPrestashop_Module_Psaccounts_Service_SynchronizationserviceService()
    {
        return $this->services['prestashop\module\psaccounts\service\synchronizationservice'] = new \PrestaShop\Module\PsAccounts\Service\SynchronizationService($this->get('prestashop\module\psaccounts\repository\accountssyncrepository'), $this->get('prestashop\module\psaccounts\repository\incrementalsyncrepository'), $this->get('prestashop\module\psaccounts\service\proxyservice'));
    }

    /**
     * Gets the 'ps_accounts.context' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Context A Context instance
     */
    protected function getPsAccounts_ContextService()
    {
        return $this->services['ps_accounts.context'] = \Context::getContext();
    }

    /**
     * Gets the 'ps_accounts.db' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Db A Db instance
     */
    protected function getPsAccounts_DbService()
    {
        return $this->services['ps_accounts.db'] = \Db::getInstance();
    }

    /**
     * Gets the 'ps_accounts.link' service.
     *
     * This service is shared.
     * This method always returns the same instance of the service.
     *
     * @return \Link A Link instance
     */
    protected function getPsAccounts_LinkService()
    {
        return $this->services['ps_accounts.link'] = \PrestaShop\Module\PsAccounts\Factory\Link::get();
    }
}
