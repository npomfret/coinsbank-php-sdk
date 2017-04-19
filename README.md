Coinsbank PHP SDK for RESTful APIs
=======================

```php
use Coinsbank\Api\CoinsbankBitcoinchart;
use Coinsbank\Api\CoinsbankHead;
use Coinsbank\Api\CoinsbankTrade;
use Coinsbank\Api\CoinsbankWallet;
use Coinsbank\CoinsbankApiContext;
use Coinsbank\Filter\CoinsbankTradeFilter;

$contextUnauthorized = new CoinsbankApiContext(null, null, [], CoinsbankApiContext::MODE_SANDBOX);

$headApiGuest = new CoinsbankHead($contextUnauthorized);
$response = $headApiGuest->getData();
$respponseCode = $response->getHttpResponseCode();
$bodyDecoded = $response->getBodyDecoded();

$bitcoinchartApi = new CoinsbankBitcoinchart($contextUnauthorized);
$response = $bitcoinchartApi->getTrades('BTCUSD');
$response = $bitcoinchartApi->getOrderBook('BTCUSD');

$contextAuthorized = new CoinsbankApiContext('{api-key}', '{api-secret}', [], CoinsbankApiContext::MODE_SANDBOX);

$headApiAuth = new CoinsbankHead($contextAuthorized);
$response = $headApiAuth->getData();

$walletApi = new CoinsbankWallet($context);
$response = $walletApi->getList();

$tradeApi = new CoinsbankTrade($context);
$tradeFilter = (new CoinsbankTradeFilter())->setStatus(1);//or array('status' => 1)
$response = $api->getOrders(0, 50, $tradeFilter, false);
//file_put_contents('orders.pdf', $response->getBody());//e.g. for pdf export
$response = $api->createNewOrder('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, 711.86613, 676.2728, 747.4594);
$response = $api->getOrder('30c38325-e550-4b');
$response = $api->cancelOrder('17e9149d-7da5-40');
$response = $api->updateOrder('30c38325-e550-4b', CoinsbankTrade::ACTION_RESET_SL);
$response = $api->orderHistory('30c38325-e550-4b');
$response = $api->getFeeData('4cdd639f-c214-45', '3cd81170-97cf-4b', 0.001, CoinsbankTrade::COMMISSION_TYPE_FROM, CoinsbankTrade::DIRECTION_BUY, 711.86613, 676.2728, 747.4594);
```

## Installing Coinsbank

The recommended way to install Coinsbank is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Coinsbank SDK:

```bash
php composer.phar require coinsbank/rest-api-sdk-php
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Coinsbank SDK using composer:

 ```bash
composer.phar update
 ```