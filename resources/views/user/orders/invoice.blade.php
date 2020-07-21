<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{@$order->ordernumber}}</title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4" style="text-align: center;"> 
                    <p>Discounted Wheel Warehouse - Order Invoice</p> 
                </td>
            </tr>
            <tr class="top">
                <td colspan="4">
                    Invoice #: {{$order->ordernumber}}<br>
                    Created: {{$order->created_at}}<br>
                    Printed: {{date('Y-m-d  h:i:s ')}}
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Billing To:<br>
                                {{$order->firstname}} {{$order->lastname}},<br>
                                @if($order->companyname)
                                {{$order->companyname}},<br>
                                @endif
                                @if($order->email)
                                {{@$order->email}},<br>
                                @endif
                                {{@$order->dayphone}} {{@$order->cellphone}},<br>
                                {{@$order->address}},<br>
                                @if($order->address2)
                                {{@$order->address2}},<br>
                                @endif
                                {{@$order->city}}, {{@$order->state}} {{@$order->zip}}


 
                            </td>
                            
                            <td>
                                @if($order->same_shipping != 'yes')
                                    Shipping To:<br>
                                    {{$order->shipping_firstname}} {{$order->shipping_lastname}},<br>
                                    @if($order->shipping_companyname)
                                    {{$order->shipping_companyname}},<br>
                                    @endif
                                    @if($order->shipping_email)
                                    {{@$order->shipping_email}},<br>
                                    @endif
                                    {{@$order->shipping_dayphone}} {{@$order->shipping_cellphone}},<br>
                                    {{@$order->shipping_address}},<br>
                                    @if($order->shipping_address2)
                                    {{@$order->shipping_address2}},<br>
                                    @endif
                                    {{@$order->shipping_city}}, {{@$order->shipping_state}} {{@$order->shipping_zip}}
                                @endif

 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> 
            
            <!-- <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr> -->
            
            <tr class="heading">
                <td>
                    Ordered Item(s)
                </td>
                
                <td>Item Price </td>
                <td  class="td-center">Quantity</td>
                <td>Item Total Price</td>
            </tr>
            @foreach($order->OrderItems as $key =>$item)
            <tr class="item">
                <td>
                    {{@$item->ProductDetail()->detailtitle}}
                </td>
                
                <td>{{roundCurrency(@$item->price)}}</td>
                <td  class="td-center">{{@$item->qty}}</td>
                <td>{{roundCurrency(@$item->total)}}</td>
            </tr>
            @endforeach  
            <tr class="total"><td colspan="3">Fees</td><td>{{roundCurrency(@$order->fees)}}</td></tr>
            <tr class="total"><td colspan="3">Tax</td><td>{{roundCurrency(@$order->tax)}}</td></tr>
            <tr class="total"><td colspan="3">Shipping</td><td>{{roundCurrency(@$order->shipping)}}</td></tr>
            <tr class="total"><td colspan="3">Total</td><td>{{roundCurrency(@$order->total)}}</td></tr>
        </table>
    </div>
</body>
</html>