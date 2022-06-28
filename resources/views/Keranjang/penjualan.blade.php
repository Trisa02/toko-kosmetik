@extends('template')
@section('content')
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Penjualan</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{route('home')}}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Pembelian</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>

                            @php
                                $sub_total = 0;
                            @endphp
                            @foreach ($keranjangtmps as $kp)
                            <tr>
                                <td><img src="{{asset('gambar/'.$kp->gambar)}}" style="width: 50px;"></td>
                                <td>{{$kp->nama_barang}}</td>
                                <td>Rp.{{number_format($kp->harga)}}</td>
                                <td>{{$kp->qty}} Produk</td>
                                <td>Rp.{{number_format($kp->total)}}</td>
                            </tr>
                            @php
                                $sub_total += $kp->total;
                            @endphp
                            @endforeach
                    </table>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Sub Total</h5>
                        <h5 class="font-weight-bold">Rp.{{number_format($sub_total)}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Ongkos Kirim</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Pilih Pengiriman</h6>
                    </div>
                    @php
                        $city = DB::table('cities')->where('city_id', Auth::user()->city_destination)->first();
                    @endphp
                    {{-- <div class="form-group">
                        <label class="font-weight-bold">PROVINSI ASAL</label>
                        <select class="form-control provinsi-asal" name="province_origin">
                            <option value="0">-- pilih provinsi asal --</option>
                            <option value="{{$pro->province_id}}" >{{$pro->name}}</option>
                        </select>
                    </div> --}}

                    <div class="form-group" style="display: none">
                        <label class="font-weight-bold">Alamat Toko</label>
                        <select class="form-control kota-asal" style="width:100%"  name="city_origin" disabled>
                            <option value="455">Tanggerang</option>
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <label class="font-weight-bold">Provinsi Tujuan</label>
                        <select class="form-control provinsi-tujuan" name="province_destination" style="width:100%">
                            <option value="0">--Pilih Provinsi Tujuan--</option>
                            @foreach ($pro1 as $province =>$value)
                                <option value="{{$value->province_id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label class="font-weight-bold">Kota / Kabupaten Tujuan</label>
                        <select class="form-control kota-tujuan" name="city_destination" style="width:100%" disabled>
                            <option value="{{$city->city_id}}">{{$city->name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Kurir</label>
                                <select class="form-control btn-check" name="courier">
                                    <option value="0">--Pilih Kurir--</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="row mt-3" id="form-ongkir">
                    <div class="col-md-12">
                        <div class="card d-none ongkir">
                            <div class="card-body">
                                {{-- <input type="radio" id="ongkir" class="list-group">
                                <label for="ongkir"></label> --}}
                                <div class="form-group" id="ongkir">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total Pembayaran</h5>
                    </div>
                    @php
                        $sub_total = 0;
                     @endphp
                    @foreach ($keranjangtmps as $kp)
                    @php
                        $sub_total += $kp->total;
                        $ongkir=45000;
                        $total_belanja=$sub_total+$ongkir;
                    @endphp
                    @endforeach
                    <table class="table">
                        <tr>
                            <th>Sub Total</th>
                            <th>:</th>
                            <td>Rp.  {{number_format($sub_total)}}</td>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td id="hasil_ongkir">Rp. </td>
                        </tr>
                        <tr>
                            <th>Total belanja</th>
                            <th>:</th>
                            <td id="total_belanja">Rp. </td>
                            <input type="hidden" id="input_total_belanja">
                        </tr>
                    </table>

                    <button type="button" id="pay-button" class="btn btn-block btn-primary my-3 py-3">Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{route('send.result.midtrans')}}" method="post" id="myForm">
    @csrf
    <input type="hidden" name="json" id="json">
    <input type="hidden" class="form_control" name="hasil_ongkir" id="hasil_ongkir1">
    <input type="hidden" class="form_control" name="courier" id="courier1">
</form>

<script>
    var id_user = {{Auth::guard('member')->user()->id}}
    $(document).ready(function(){
        //aktif kan select 2
        $(".provinsi-asal, .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme:'boostrap4',width:'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function(){
            let provindeId = $(this).val();
            if(provindeId) {
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response){
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }else{
                $('select[name="city_origin"]').append('<option value="">--Pilih Kota Asal--</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change',function(){
            let provindeId = $(this).val();
            if(provindeId){
                jQuery.ajax({
                    url: '/cities/'+provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function (response){
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function (key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else{
                $('select[name="city_destination"]').append('<option value="">--Pilih Kota Tujuan--</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').change(function (e){
            e.preventDefault();

            let token            = $("meta[name='csrf-token']").attr("content");
            let city_origin      = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier          = $('select[name=courier]').val();


            if(courier == '0'){
                $('#form-ongkir').html(' ');
            }else{
                if(isProcessing){
                return;
            }
            isProcessing = true;
            jQuery.ajax({
                url: "cart/"+id_user,
                data:{
                    _token:              token,
                    city_origin:         city_origin,
                    city_destination:    city_destination,
                    courier:             courier,
                },
                dataType: "JSON",
                type: "POST",
                success:function (response){
                    isProcessing = false;
                    if(response){
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function(key, value){
                            // $('#ongkir').append('<li class="list-group-item">'+response[0].code.toUpperCase()
                            // +' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value
                            // +' ('+value.cost[0].etd+' hari)</li>')


                            $('#ongkir').append(`<input onclick="hasil_cost()" type="radio" name="cost" id="cost"
                            value=${value.cost[0].value}-${value.service}> ${response[0].code.toUpperCase()} : <strong>
                            ${value.service} </strong> - Rp. ${value.cost[0].value} (${value.cost[0].etd} Hari) <br>`);
                        });

                    }
                }
            });
            }


        });
    });

    function hasil_cost(){
        var cost = $('input[name="cost"]:checked').val()
        var pecah = cost.split("-");
        var sub_total = '{{$sub_total}}';
        var total = parseInt(cost) + parseInt(sub_total);
               $('#hasil_ongkir').html(`Rp. ${cost}`);
            //    $('#courier').html(`${service}`);
               $('#hasil_ongkir1').val(pecah[0]);
               $('#total_belanja').html(`Rp. ${total}`);
               $('#input_total_belanja').val(total);
               $('#courier1').val(pecah[1]);
           }
</script>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      var total_belanja = $('#input_total_belanja').val();
      var id_user = '{{Auth::user()->id}}';
      if(total_belanja == ''){
          alert('Harap memilih pergiriman terlebih dahulu');
      }else{
        $.ajax({
          type: "post",
          url: "{{route('get.snaptoken')}}",
          data : {
            total_belanja : total_belanja,
            id_user:id_user,
          },
          dataType: "json",
          success: function (response) {
              console.log(response)
              if(response.status == 'ok'){
                window.snap.pay(response.snaptoken, {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    alert("payment success!"); console.log(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    // alert(JSON.stringify(result));
                    $('#json').val(JSON.stringify(result));
                    $('#myForm').submit();

                },
                onError: function(result){
                    /* You may add your own implementation here */
                    alert("payment failed!"); console.log(result);
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
                })
              }
            }
        });
      }
      // customer will be redirected after completing payment pop-up
    });
</script>
@endsection
