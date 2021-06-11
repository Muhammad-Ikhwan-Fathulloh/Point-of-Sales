@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('home') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <input type="hidden" name="grand_total">

                <div role="row">
                <div class="col-md-6">

                        <form role="form">
                          <div class="box-body">
                            <div class="form-group">
                              <label form="exampleInputEmail1">Scan Barcode</label>
                              <input type="text" autocomplete="off" name="barcode" class="form-control" id="exampleInputEmail1">
                            </div>
                          </div>
                          <!-- /.box-body -->

                        </form>
                        
                    </div>
                </div>

                <div class="row">
                    <form method="post" action="{{ url('pos') }}">
                        @csrf
                    <div class="col-md-12">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                   <th>Kode</th>
                                   <th>Nama</th>
                                   <th>Harga</th>
                                   <th>Qty</th>
                                   <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="produk-ajax">
                                
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-stripped">
                                    <tbody>
                                        <tr>
                                            <th>Jumlah Bayar</th>
                                            <td>:</td>
                                            <td>
                                                <input type="number" class="form-control" name="jumlah_bayar">
                                            </td>
                                        </tr>
                                      <!--   <tr>
                                            <th>Kembalian</th>
                                            <td>:</td>
                                            <td class="kembalian">
                                                
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block"> Submit</button>
                    </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

    $("input[name='barcode']").focus();  
    $("input[name='grand_total']").val(0);    
    $("input[name='jumlah_bayar']").val('');      

         $("input[name='barcode']").keypress(function(e){
            if(e.which == 13){
                e.preventDefault();
                var kode = $(this).val();
                var url = "{{ url('produk/ajax') }}"+'/'+kode;
                var _this = $(this);

                $.ajax({
                    type:'get',
                    dataType:'json',
                    url:url,
                    success:function(data){
                        console.log(data);
                        _this.val('');

                        var nilai = '';

                        nilai += '<tr>';


                        nilai +='<td>';
                        nilai += data.data.kode;
                        nilai += '<input type="hidden" class="form-control" name="produk[]" value="'+data.data.id+'">';
                        nilai +='</td>';

                        nilai +='<td>';
                        nilai += data.data.nama;
                        nilai +='</td>';

                        nilai +='<td class="harga">';
                        nilai += data.data.harga;
                        nilai += '<input type="hidden" class="form-control" name="harga[]" value="'+data.data.harga+'">';
                        nilai +='</td>';

                        nilai +='<td>';
                        nilai += '<input type="number" class="form-control" name="qty[]" value="1">';
                        nilai +='</td>';


                        nilai +='<td>';
                        nilai += '<button class="btn btn-xs btn-danger hapus"><i class="fa fa-trash"></i></button>';
                        nilai +='</td>';


                        nilai +='</tr>';

                        var total = parseInt ($("input[name='grand_total']").val());
                        total += data.data.harga;

                        $("input[name='grand_total']").val(total);

                        $('.produk-ajax').append(nilai);
                        $("input[name='jumlah_bayar']").val(0);
                }
            })
            }
        })

        $('body').on('click','.hapus',function(e){
            e.preventDefault();
            $(this).closest('tr').remove();
        })

        $("button[type='submit']").click(function(e){
            var grand_total = parseInt($("input[name='grand_total']").val());
            var jumlah_bayar = parseInt($("input[name='jumlah_bayar']").val());

            if(jumlah_bayar < grand_total){
                e.preventDefault();
                alert('Uang Anda Kurang');
            }

            // alert(grand_total);
        })

        $("input[name='jumlah_bayar']").keyup(function(e){
            var grand_total = parseInt($("input[name='grand_total']").val());
            var jumlah_bayar = parseInt($(this).val());
            var kembalian = jumlah_bayar - grand_total;

            // alert(grand_total+'/'+jumlah_bayar+'/'+kembalian);

            $(".kembalian").text(kembalian);
        })
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection