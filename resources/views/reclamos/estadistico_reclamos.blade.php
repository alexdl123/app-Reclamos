@extends('layouts.admin')

@section('content')
	
	  <!-- DONUT CHART -->
	  <div class="row">
	  	<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Reclamos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
	  </div>
          
          <!-- /.box -->

    @section('javascript')
    <script>
  $(function () {
    "use strict";

	$.get("getReclamosApi",function(datos,status){

		console.log(datos);
		//DONUT CHART
	    var donut = new Morris.Donut({
	      element: 'sales-chart',
	      resize: true,
	      colors: ["#3c8dbc", "#f56954", "#00a65a","green","#ADFF2F","#FFD700","#87CEFA","#F5FFFA"],
	      data: datos.reclamos,
	      hideHover: 'auto'
	    });
	});
    
   
  });
</script>
    @endsection
@endsection