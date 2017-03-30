<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 歐付寶，第三方支付
 */
include_once APPPATH.'third_party/AllPay.Payment.Integration.php';
class Allpay extends AllInOne
{
    private $_ci;
    public function __construct()
    {
        parent::__construct();
        $this->_ci = &get_instance();
        $this->_ci = $this->_ci->config->load('allpay');
        $this->ServiceURL = $this->_ci->config->item('ServiceURL');
        $this->HashKey = $this->_ci->config->item('HashKey');
        $this->HashIV = $this->_ci->config->item('HashIV');
        $this->MerchantID = $this->_ci->config->item('MerchantID');
    }
    /**
     * 取得回傳訊息，相對應語言資訊
     * @param  string $type 類型
     * @param  string $key  關鍵字
     * @return string 訊息
     */
    public function getPaymentMsg($type = '', $key = '')
    {
        $this->_ci->lang->laod('allpay');
        //paymentmethod
        $msg_key['Method']['ALL'] = lang('txt_Method_ALL');
        $msg_key['Method']['Credi'] = lang('txt_Method_Credi');
        $msg_key['Method']['WebATM'] = lang('txt_Method_WebATM');
        $msg_key['Method']['ATM'] = lang('txt_Method_ATM');
        $msg_key['Method']['CVS'] = lang('txt_Method_CVS');
        $msg_key['Method']['BARCODE'] = lang('txt_Method_BARCODE');
        $msg_key['Method']['Alipay'] = lang('txt_Method_Alipay');
        $msg_key['Method']['Tenpay'] = lang('txt_Method_Tenpay');
        $msg_key['Method']['TopUpUsed'] = lang('txt_Method_TopUpUsed');
        //paymethod_item
        $msg_key['MethodItem']['None'] = lang('txt_MethodItem_None');
        $msg_key['MethodItem']['WebATM_TAISHIN'] = lang('txt_MethodItem_WebATM_TAISHIN');
        $msg_key['MethodItem']['WebATM_ESUN'] = lang('txt_MethodItem_WebATM_ESUN');
        $msg_key['MethodItem']['WebATM_HUANAN'] = lang('txt_MethodItem_WebATM_HUANAN');
        $msg_key['MethodItem']['WebATM_BO'] = lang('txt_MethodItem_WebATM_BO');
        $msg_key['MethodItem']['WebATM_CHINATRUST'] = lang('txt_MethodItem_WebATM_CHINATRUST');
        $msg_key['MethodItem']['WebATM_FIRST'] = lang('txt_MethodItem_WebATM_FIRST');
        $msg_key['MethodItem']['WebATM_CATHAY'] = lang('txt_MethodItem_WebATM_CATHAY');
        $msg_key['MethodItem']['WebATM_MEGA'] = lang('txt_MethodItem_WebATM_MEGA');
        $msg_key['MethodItem']['WebATM_YUANTA'] = lang('txt_MethodItem_WebATM_YUANTA');
        $msg_key['MethodItem']['WebATM_LAND'] = lang('txt_MethodItem_WebATM_LAND');
        $msg_key['MethodItem']['ATM_TAISHIN'] = lang('txt_MethodItem_ATM_TAISHIN');
        $msg_key['MethodItem']['ATM_ESUN'] = lang('txt_MethodItem_ATM_ESUN');
        $msg_key['MethodItem']['ATM_HUANAN'] = lang('txt_MethodItem_ATM_HUANAN');
        $msg_key['MethodItem']['ATM_BOT'] = lang('txt_MethodItem_ATM_BOT');
        $msg_key['MethodItem']['ATM_FUBON'] = lang('txt_MethodItem_ATM_CHINATRUST');
        $msg_key['MethodItem']['ATM_CHINATRUST'] = lang('txt_MethodItem_ATM_CHINATRUST');
        $msg_key['MethodItem']['ATM_FIRST'] = lang('txt_MethodItem_ATM_FIRST');
        $msg_key['MethodItem']['CVS'] = lang('txt_MethodItem_CVS');
        $msg_key['MethodItem']['CVS_OK'] = lang('txt_MethodItem_CVS_OK');
        $msg_key['MethodItem']['CVS_FAMILY'] = lang('txt_MethodItem_CVS_FAMILY');
        $msg_key['MethodItem']['CVS_HILIFE'] = lang('txt_MethodItem_CVS_HILIFE');
        $msg_key['MethodItem']['CVS_IBON'] = lang('txt_MethodItem_CVS_IBON');
        $msg_key['MethodItem']['Alipay'] = lang('txt_MethodItem_Alipay');
        $msg_key['MethodItem']['Tenpay'] = lang('txt_MethodItem_Tenpay');
        $msg_key['MethodItem']['TopUpUsed_AllPay'] = lang('txt_MethodItem_TopUpUsed_AllPay');
        $msg_key['MethodItem']['TopUpUsed_ESUN'] = lang('txt_MethodItem_TopUpUsed_ESUN');
        $msg_key['MethodItem']['BARCODE'] = lang('txt_MethodItem_BARCODE');
        $msg_key['MethodItem']['Credit'] = lang('txt_MethodItem_Credit');
        $msg_key['MethodItem']['COD'] = lang('txt_MethodItem_COD');

        if (isset($msg_key[$type][$key])) {
            return $msg_key[$type][$key];
        } else {
            return false;
        }
    }
}
