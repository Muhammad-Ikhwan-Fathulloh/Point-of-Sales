@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                     <a href="{{ url('gr')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Back</a>
                    

                    <button class="btn btn-sm btn-flat btn-success btn-approved "><i class="fa fa-refresh"></i> Approved</button>
                </p>
            </div>
            <div class="box-body">

                <div class='row'>
                  <div class="col-md-6">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Document No</th>
                                <td>:</td>
                                <td>{{ $dt->document_no }}</td>

                                <th>Document PO</th>
                                <td>:</td>
                                <td>{{ $dt->purchase_orders->document_no}}</td>
                            </tr>

                             <tr>
                                <th>Status</th>
                                <td>:</td>
                                 @if($dt->status == 1)
                                <td>
                                    <label class="label label-warning">{{ $dt->statuss->nama }}</label>
                                </td>
                                @else
                                   <td>
                                        <label class="label label-success">{{ $dt->statuss->nama }}</label>
                                   </td>
                                @endif
                                <th>Created At</th>
                                <td>:</td>
                                <td>{{ date('d M Y',strtotime($dt->Created_at))}}</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>     
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Buy</th>
                                    <th>Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dt->purchase_orders->lines as $ln)
                                <tr>
                                    <td>{{ $ln->produks->nama }}</td>
                                    <td>{{ $ln->qty }}</td>
                                    <td>{{ $ln->buy }}</td>
                                    <td>{{ $ln->grand_total}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>
                                        <b><i>Total</i></b>
                                    </th>
                                    <th>
                                        <b><i>{{ $ln->sum_buy()}}</i></b>
                                    </th>
                                    <th>
                                        <b><i>{{$ln->sum_grand_total()}}</i></b>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal approved -->
<div class="modal fade" id="modal-approved" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
 
          <div class="modal-body">
 
            <div class="py-3 text-center">
              <i class="ni ni-bell-55 ni-3x"></i>
              <h4 class="heading mt-4">Apakah kamu yakin ingin Meng Approved Dokumen ini?</h4>
            </div>
 
          </div>
 
          <div class="modal-footer">
            <form action="{{ url('gr/'.$dt->id) }}" method="post">
              {{ csrf_field() }}
              <p>
              <button type="submit" class="btn btn-success btn-flat btn-sm menu-sidebar">Ok, Approved</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
              </p>
            </form>
          </div>
 
        </div>
      </div>
    </div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){

         $('.btn-approved').click(function(){
            $('#modal-approved').modal();
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