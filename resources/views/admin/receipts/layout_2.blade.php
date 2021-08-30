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
                        <div class="col-xs-4">
                            <!-- col-xs-6 start here -->
                            <div class="invoice-logo"><img width="250" src="{{asset('logo.jpg')}}" alt="Invoice logo"></div>
                                <p style="width:25rem; font-weight: 600;">15 CHARLES STREET,NEATH. SA11 1NF NEATH PORTTALBOT</p>
                                
                                    <i class="fa fa-phone"></i> 01639 77 88 77
                                <p>
                                    <i class="fa fa-envelope"></i> atozcabs@outlook.com
                                </p>
                        </div>
                        <!-- col-xs-6 end here -->
                        <div class="col-xs-8">
                            <!-- col-xs-6 start here -->
                            <div class="invoice-from">
                               <table class="table table-bordered rightTable">
                                <tbody>
                                    <tr>
                                        <td style="width: 20rem" class="text-center bg-gray text-white">DATED</td>
                                        <td>{{$date}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">INVOICE</td>
                                        <td><samll>ATOZ</samll>{{$invoice_id}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">VAT NUMBER</td>
                                        <td>{{$vat_number}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">REF</td>
                                        <td>{{$ref}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">COMPANY NAME ADDRESS</td>
                                        <td>{{$company}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center bg-gray text-white">POSTAL CODE</td>
                                        <td>{{$postal}}</td>
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
                                                <th class="per5 text-center">Date</th>
                                                <th class="per70 text-center">Description</th>
                                                <th class="per25 text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $value)
                                            
                                            <tr>
                                                <td>{{$value->work_date }}</td>
                                                <td>{{$value->description}}</td>
                                                
                                                <td class="text-center">
                                                    @if($value['duty'] == 1)
                                                        £ {{$value['contract']['pay_per_day']}}
                                                    @endif
                                                @if($value['duty'] == 2)
                                                    £ {{$value['contract']['pay_per_day']/2}}
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-right">Sub Total:</th>
                                                <th class="text-center">£ {{$total_paid}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" class="text-right">{{$vat_percent}}% VAT:</th>
                                                <th class="text-center">£ {{$vat_amount}}</th>
                                            </tr>
                                            
                                            <tr>
                                                <th colspan="2" class="text-right">Total:</th>
                                                <th class="text-center">£ {{$total_paid_vat}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-footer mt25">
                                <p class="text-center">
                                    PLEASE MAKE ALL PAYMENTS TO:  A TO Z CABS LIMITED. <label style="color:blue;">BARCLAYS BANK S/C: 20-58-72 ACC NO: 23948870</label></p>
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