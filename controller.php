use Package;
use Whoops\Exception\ErrorException;
use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as PaymentMethod;

defined('C5_EXECUTE') or die(_("Access Denied."));

class ParsianPaymentVividStorePackage extends Package {

     protected $pkgHandle = 'parsian_payment_vividstore';
     protected $appVersionRequired = '5.7.3';
     protected $pkgVersion = '1.0';

     public function getPackageDescription() {
          return t("Parsian bank payment gateway for Concrete5 vivid store.");
     }

     public function getPackageName() {
          return t("Parsian Payment VividStore");
     }
     
     public function install() {
          $installed = Package::getInstalledHandles();
	if(!(is_array($installed) && in_array('vivid_store',$installed)) ) {
		throw new ErrorException(t('This package requires that Vivid Store be installed'));    
	} else {
		$pkg = parent::install();
		$pm = new PaymentMethod();
		$pm->add('parsian_payment_vividstore','Parsian Payment VividStore',$pkg);
	}
     
	public function uninstall() {
		$pkg = parent::uninstall();
    PaymentMethod::getByHandle('parsian_payment_vividstore')->delete();
     }
     
}