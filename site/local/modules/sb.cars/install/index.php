<?
class sb_cars extends \CModule{
    public $MODULE_ID = 'sb.cars';

    public $MODULE_VERSION = '1.0.0';

    public $MODULE_VERSION_DATE = '2020-06-13 15:00:00';

    public $MODULE_NAME = 'TestDealer';

    public $MODULE_DESCRIPTION = 'Module for Car Dealer';

    public function __construct(){
        $this->PARTNER_NAME = 'Test';
        $this->PARTNER_URI = 'https://test.ru';
    }

    public function DoInstall(){
        $this->InstallFiles();
        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallTasks();

        return true;
    }

    public function InstallEvents(){
        \Bitrix\Main\EventManager::getInstance()->registerEventHandler(
            'main',
            'OnPageStart',
            'sb.cars',
            '\SB\Cars\Rest\CoreApi',
            'init'
        );

        return true;
    }

    public function InstallFiles(){
        return true;
    }

    public function InstallTasks(){
       return true;
    }

    public function InstallDB(){
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall(){
        $this->UnInstallTasks();
        $this->UnInstallEvents();
        $this->UnInstallFiles();
        $this->UnInstallDB();
    }

    public function UnInstallDB(){
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }

    public function UnInstallEvents(){
        \Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            'main',
            'OnPageStart',
            'sb.cars',
            '\SB\Cars\Rest\CoreApi',
            'init'
        );
        return true;
    }

    public function UnInstallFiles(){
        return true;
    }

    public function UnInstallTasks(){
        return true;
    }


}