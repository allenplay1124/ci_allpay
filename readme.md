# AllPay SDK for CodeIgniter 3.x

這是將 Allpay 官方提供的串接 SDK，簡單包進 CodeIgniter Framework。

## 安裝
將 Allpay 官網最新提供的SDK版本程式：`AllPay.Payment.Integration.php`，覆蓋到 `application/third_party` 路徑底下，必免官方有更新。

系統預設語言，預設為 `zh-TW`，若系統語為其它，請自行新增相關語言檔。

相關串接設定，在 `config/allpay.php`，這些設定值，請依歐付寶提供設定

```php
$config['ServiceURL'] = 'https://payment.allpay.com.tw/Cashier/AioCheckOut';
$config['HashKey'] = '您的hashkey';
$config['HashIV'] = '您的hashiv';
$config['MerchantID'] = '您的merchantid';
```


## 使用

### 載入library

`$this->load->library('allpay');`

### 基本參數

```php
$this->allpay->Send['ReturnURL'] = site_url('order/result');
....
array_push($this->allpay->Send{'Items'}, array(
        'Name' => '產品名稱',
        'Price' => '價格',
        'Currency' => '幣別',
        'Quantity' => '數量',
        'URL' => '產品說明網址'
    ));
```
詳細參數設定，請參考歐付寶官方所提供之文件

### 產生訂單
`$this->allpay->CheckOut();`
