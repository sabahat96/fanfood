<?php

class API
{

    public function getProducts($storeId)
    {
        $url = "https://api.uat.fanfood.cloud/api/v1/products?availabilityType=PICKUP&storeId=$storeId";
        $response = wp_remote_request($url);
        $code = wp_remote_retrieve_response_code($response);
        $json_products = wp_remote_retrieve_body($response);
        $products = json_decode($json_products);
        $items=$products->items;
        $all_products = array();
        foreach ($items as $item){
            array_push($all_products, array(
                'category'=> array('name'=> $item->category->name, 'active' => $item->category->active),
                'product'=> array('id'=> $item->id, 'name'=>$item->name, 'price'=> $item->price, 'stock'=>$item->stock),
                'global_product'=> array('name'=>$item->globalProduct->name, 'img_url'=> $item->globalProduct->imageUrl),
                )
            );
        }
        return $all_products;
    }
}