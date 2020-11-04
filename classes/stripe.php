<?php

class Stripe
{

    public function index(){
        $stripe = [
            "secret_key"      => "sk_test_51HYqziG79BYjrrOvYq3kBbuS85dKeg5f87rAXTWgXIzVZYNnuO2mnj4zVvTvnMEFi7nGyngZ5yhnGhiKiItfoomh005KJHPNuL",
            "publishable_key" => "pk_test_51HYqziG79BYjrrOvwToSSbjbhKMzGty8CjmcrRzd4iUumzCFHgJeCA8aZAQlU45nJcv0BF9BojuH9lcDBLdnIScL00XprqoSSR",
        ];

        $stripe = new \Stripe\StripeClient(
            'sk_test_51HYqziG79BYjrrOvYq3kBbuS85dKeg5f87rAXTWgXIzVZYNnuO2mnj4zVvTvnMEFi7nGyngZ5yhnGhiKiItfoomh005KJHPNuL'
        );
        $res=$stripe->transfers->create([
            'amount' => 400,
            'currency' => 'inr',
            'destination' => 'acct_1HYqziG79BYjrrOv',
            'transfer_group' => 'ORDER_95',
        ]);

    }

    public function payment($data){
        $cardNo = $new_str = str_replace(' ', '', $data['card_number']);
        $accountTitle = trim($data['account_title']);
        $expiryDate = str_replace(' ', '', $data['expiry_date']);
        $expiryDate = explode("/", $expiryDate);
        $expMonth= $expiryDate[0];
        $expYear= $expiryDate[1];
        $cvc = trim($data['cvc']);

        //initiate stripe
        $stripe = new \Stripe\StripeClient(
            'sk_test_51HYqziG79BYjrrOvYq3kBbuS85dKeg5f87rAXTWgXIzVZYNnuO2mnj4zVvTvnMEFi7nGyngZ5yhnGhiKiItfoomh005KJHPNuL'
        );
        //create stripe token (1 time)
        $token = $this->createToken($stripe, $cardNo, $expMonth, $expYear, $cvc);
        if($token['success']){
            //create stripe customer
            $customer = $this->createCustomer($stripe, $accountTitle, $token['token']->id);
            if($customer['success']){
                //create charge
                $charge = $this->createCharge($stripe, $customer['customer']->id, 100, 'USD', 'itemId: 123');
                if($charge['success']){
                    $detail = $charge['data'];
                    //$detail->status;
                    wp_send_json(array('success'=>true, 'title'=> 'Congrats and welcome on board!',  'message'=> "You will receive a welcome email shortly with a link to set up your store."));
                    exit;
                }else{
                    wp_send_json($charge);
                    exit;
                }
            }else{
                wp_send_json($customer);
                exit;
            }
        }else{
            wp_send_json($token);
            exit;
        }
    }

    private function createToken($stripe, $cardNo, $expMonth, $expYear, $cvc){
        try {
            $token=$stripe->tokens->create([
                'card' => [
                    'number' => $cardNo,
                    'exp_month' => $expMonth,
                    'exp_year' => $expYear,
                    'cvc' => $cvc,
                ],
            ]);
            return ($token->id)? array('success'=>true, 'token'=>$token)  : array('success'=>false, 'title'=> 'Unknown Error!',
                'message'=> 'There is an error to create token. Please try again later.');
        }catch (Exception $e){
          return array('success'=>false, 'title'=> 'Error!', 'message'=> $e->getMessage());
        }
    }

    private function createCustomer($stripe, $accountTitle, $token){
        try {
            $customer = $stripe->customers->create(array(
                'name' => $accountTitle,
                'description'  => $token
            ));
            if($customer AND is_object($customer)){
                return array('success'=>true, 'customer'=>$customer);
            }else{
                return array('success'=>false, 'title'=> 'Unknown Error!',
                    'message'=> 'There is an error to create customer. Please try again later.');
            }
        }catch(Exception $e) {
            return array('success'=>false, 'title'=> 'Error!', 'message'=> $e->getMessage());
        }
    }

    private function createCharge($stripe, $customerId, $amount, $currency, $itemDesc){
        try {
            $charge = $stripe->charges->create(array(
                //'customer' => $customerId,
                'source' => 'tok_visa',
                'amount' => $amount,
                'currency' => 'inr',
                'description' => 'my last order',
            ));
            if($charge AND is_object($charge)){
                return array('success'=>true, 'data'=>$charge);
            }else{
                return array('success'=>false, 'title'=> 'Transaction Failed!',
                    'message'=> $charge);
            }
        }catch(Exception $e) {
            return array('success'=>false, 'title'=> 'Error!', 'message'=> $e->getMessage());
        }
    }
}