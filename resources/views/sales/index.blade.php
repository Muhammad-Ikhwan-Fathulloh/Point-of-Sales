@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <button class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter Tanggal</button>

                </p>
            </div>
            <div class="box-body">
               
               <div class="table-responsive">
                   <table class="table table-stripped myTable ">
                    <thead>
                        <tr>
                            <th>Detail</th>
                            <th>No</th>
                            <th>No struk</th>
                            <th>Jumlah Bayar</th>
                            <th>Kembalian</th>
                            <th>Grand Total</th>
                            <th>Total Item</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e=>$dt)
                        <tr>
                            <td>
                              <a href="{{ url('sales/'.$dt->id)}}" class=" btn btn-xs btn-primary">Detail</a>
                            </td>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $dt->no_struk }}</td>
                            <td>{{ number_format($dt->jumlah_bayar,0) }}</td>
                            <td>{{ number_format($dt->kembalian,0) }}</td>
                            <td>{{ number_format($dt->grand_total,0) }}</td>
                            <td>{{ $dt->lines_count }}</td>
                            <td>{{ date('d M Y H:i:s',strtotime($dt->created_at)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>
                                <b><i>Total</i></b>
                            </th>
                            <th>
                                <b><i>{{ number_format($dt->total_jumlah_bayar($awal, $akhir),0)}}</i></b>
                            </th>

                            <th>
                                <b><i>{{ number_format($dt->total_kembalian($awal, $akhir),0)}}</i></b>
                            </th>


                            <th>
                                <b><i>{{ number_format($dt->total_grand_total($awal, $akhir),0)}}</i></b>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                   </table>
               </div> 
            </div>
        </div>
    </div>
</div>

<!-- modal filter -->
<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">

            <form role="form" method="get" action="{{ url('sales/filter') }}">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Awal</label>
                  <input type="text" name="awal" class="form-control datepicker" id="exampleInputEmail1" autocomplete="off" value="{{ $awal }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Akhir</label>
                  <input type="text" name="akhir" autocomplete="off" class="form-control datepicker" id="exampleInputPassword1" value="{{ $akhir}}">
                </div>
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
 
          </div>
 
        </div>
      </div>
    </div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

        $('.btn-filter').click(function(e){
            e.preventDefault();
            $('#modal-filter').modal();
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