<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <div class="container bootdey" >
    <div class="row invoice row-printable card">
        <div class="col-xs-12 ml-2 mt-3">
            <!-- col-lg-12 start here -->
            <div class="panel panel-default plain" id="dash_0">
                <!-- Start .panel -->
                <div class="panel-body p30">
                    <div class="row">
                        <!-- Start .row -->
                        <div class="col-xs-12">
                            <!-- col-xs-6 start here -->
                            <div class="invoice-logo"><img width="250" src="{{asset('logo.jpg')}}" alt="Invoice logo"></div>
                        </div>
                        <!-- col-xs-6 end here -->
                        <div class="col-xs-7">
                            <!-- col-xs-6 start here -->
                            <div class="invoice-from">
                               <table class="table table-bordered rightTable">
                                <tbody>
                                    <tr>
                                        <td style="width: 25rem" class="text-center bg-gray text-white">NAME OF OPERATOR</td>
                                        <td class="text-center">A TO Z CABS LIMITED</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">REGISTERED NAME OF COMPANY</td>
                                         <td class="text-center">A TO Z CABS LIMITED</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">BUSINESS ADDRESS & POST CODE</td>
                                        <td class="text-center">
                                            15 CHARLES STREET,NEATH. SA11 1NF NEATH PORTTALBOT 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">PAYMENT ADDRESS</td>
                                        <td class="text-center"> SAME AS ABOVE</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">DESCRIPTION</td>
                                        <td class="text-center">
                                            TAXI COMPANY 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">POSTAL CODE</td>
                                        <td class="text-center">
                                            SA11 1NF
                                        </td>
                                    </tr>
                                </tbody>
                               </table>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <!-- col-xs-6 start here -->
                            <div class="invoice-from">
                               <table class="table table-bordered rightTable">
                                <tbody>
                                    <tr>
                                        <td style="width: 15rem;" class="text-center bg-gray text-white">VAT NO</td>
                                        <td class="text-center">268538461</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">Invoice no</td>
                                        <td class="text-center"><samll>ATOZ</samll>{{$invoice_id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">Inovice Date</td>
                                        <td class="text-center">{{$date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">Service Period</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">Customer Name & Address</td>
                                        <td class="text-center">
                                            Neath Port Talbot C B C, Passenger Transport, The Quays, Brunel Way, SA11 2GG
                                        </td>
                                    </tr>
                                </tbody>
                               </table>
                            </div>
                        </div>
                        <!-- col-lg-6 end here -->
                        <div class="col-xs-12">
                            <!-- col-lg-12 start here -->
                            <div class="invoice-details mt25">
                                
                            </div>
                            <div class="invoice-to mt25">
                               
                            </div>
                            <div class="invoice-items">
                                <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="per5 text-center">ROUTE NO</th>
                                                <th class="per70 text-center">DRIVER RATE</th>
                                                <th class="per25 text-center">P/A RATE</th>
                                                <th class="per25 text-center">DAILY RATE</th>
                                                <th class="per25 text-center">NO OF DAYS</th>
                                                <th class="per25 text-center">TOTAL</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($routes_data as $value)
                                            
                                            <tr>
                                                <td>{{$value['route'] }}</td>
                                                <td>£{{$value['rate']}}</td>
                                                <td>£{{$value['pa']}}</td>
                                                <td>£{{$value['daily_rate']}}</td>
                                                <td class="text-center">{{$value['days']}}</td>
                                                <td>£{{$value['total']}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="text-right">Sub Total:</th>
                                                <th class="text-center">£ {{$sub_total_amount}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="5" class="text-right">{{$vat_percent}}% VAT:</th>
                                                <th class="text-center">£ {{$vat_amount}}</th>
                                            </tr>
                                            
                                            <tr>
                                                <th colspan="5" class="text-right">Total:</th>
                                                <th class="text-center">£ {{$total_amount}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-footer mt25">
                                <p class="text-center">
                                    THANK YOU FOR YOUR BUSINESS</p>
                                <p class="text-center">
                                <a href="#" onclick="window.print();" id="printPageButton" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                            </div>
                        </div>
                        <!-- col-lg-12 end here -->
                    </div>
                    <!-- End .row -->
                </div>
            </div>
            <!-- End .panel -->
        </div>
        <!-- col-lg-12 end here -->
    </div>
    </div>


<style type="text/css">
    .table td {
        padding: 0.3rem !important;
    }
    .bg-gray {
        background-color: #b2b4c0;
        color: white;
    }
    body{
    margin-top:10px;
    background:#eee;    
}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>