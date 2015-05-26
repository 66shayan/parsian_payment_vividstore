namespace Concrete\Package\parsian_payment_vividstore\src\VividStore\Payment;

use Package;
use Core;
use Exception;

use \Concrete\Package\VividStore\Src\VividStore\Payment\Method as PaymentMethod;
use \Concrete\Package\VividStore\Src\VividStore\Cart\Cart as VividCart;

class ParsianPaymentVividStorePaymentMethod extends PaymentMethod
{
    public function dashboardForm()
    {
        $pkg = Package::getByHandle("parsian_payment_vividstore");
        $pkgconfig = $pkg->getConfig();
	$this->set('PIN',$pkgconfig->get('parsianpaymentvividstore.PIN'));
        $this->set('sysurl',$pkgconfig->get('parsianpaymentvividstore.sysurl'));
        $this->set('form',Core::make("helper/form"));
    }
    
    public function save($data)
    {
        $pkg = Package::getByHandle("my_custom_payment_method");
        $pkg->getConfig()->save('mycustompaymentmethod.apikey',$data['apiKey']);		
    }
    public function validate($data,$e)
    {
        //validation stuff      
        return $e;        
    }
    public function checkoutForm()
    {
        $years = array();
        $year = date("Y");
        for($i=0;$i<15;$i++){
            $years[$year+$i] = $year+$i;
        }
        $this->set("years",$years);
        $this->set('form',Core::make("helper/form"));
    }
    
    public function submitPayment()
    {
        $dir = $this->getMethodDirectory();    
        $filepath = $dir."MyAPI.php";
        require_once($filepath);
        
		//send what data needs to be sent to the payment method
		//get back if it was a success or not
		
        if($success != 1){
            return array('error'=>1,'errorMessage'=>"Things went wrong. Everyone drowned.");
        } else {
            return true;
        }        
    }    
}

return __NAMESPACE__;