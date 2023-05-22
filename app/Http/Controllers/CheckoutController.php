<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Options;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cartItem = session('cart', []);
        if ($cartItem == null) {
            return view('home.shopCart');
        }
        $totalPrice = 0;
        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        return view('home.checkout', compact('cartItem', 'totalPrice'));
    }

    public function checkout_post(Request $request)
    {       
        
        /* Cart */
        $cartNameSurname=$request->cartNameSurname;
        $cartMonth=$request->cartMonth;
        $cartYear=$request->cartYear;
        $cartCode=$request->cartCode;
        $cartCvc=$request->cartCvc;
        /* User */
        $firstName=$request->firstName;
        $lastName=$request->lastName;
        $address=$request->address;
        $city=$request->city;
        $email=$request->email;
        $phone=$request->phone;

        $cartItem = session('cart', []);
        $totalPrice = 0;
        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['quantity'];
        }
        $user=Auth::user();

        $options = new Options();
        $options->setApiKey(env("TEST_IYZI_API_KEY"));
        $options->setSecretKey(env("TEST_IYZI_SECRET_KEY"));
        $options->setBaseUrl(env("TEST_IYZI_BASE_URL"));

        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId("Gönderi");
        $request->setPrice($totalPrice);
        $request->setPaidPrice($totalPrice+20);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId("Yeni");
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($cartNameSurname);
        $paymentCard->setCardNumber($cartCode);
        $paymentCard->setExpireMonth($cartMonth);
        $paymentCard->setExpireYear($cartYear);
        $paymentCard->setCvc($cartCvc);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($user->id);
        $buyer->setIdentityNumber("74300864791");
        $buyer->setName($firstName);
        $buyer->setSurname($lastName);
        $buyer->setGsmNumber($phone);
        $buyer->setEmail($email);
        $buyer->setRegistrationAddress($address);
        $buyer->setIp(\request()->ip);
        $buyer->setCity($city);
        $buyer->setCountry("Türkiye");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($firstName);
        $shippingAddress->setCity($city);
        $shippingAddress->setCountry("Türkiye");
        $shippingAddress->setAddress($address);
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        foreach ($cartItem as $cart) {
            $product=Product::find($cart['productID']);
            $item = new \Iyzipay\Model\BasketItem();
            $item->setId($cart['productID']);
            $item->setName($cart['name']);
            $item->setCategory1($product->category->title);
            $item->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $item->setPrice($cart['price']*$cart['quantity']);
            array_push($basketItems,$item);  
        }
        $request->setBasketItems($basketItems);
        $payment = \Iyzipay\Model\Payment::create($request, $options);
    }
}
