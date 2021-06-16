@extends("layouts.template")
@section("content")
<div class="container-fluid">
                        <h1 class="mt-4">Charts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
<!--                         <div class="card mb-4"> -->
<!--                             <div class="card-body"> -->
<!--                                 Chart.js is a third party plugin that is used to generate the charts in this template. The charts below have been customized - for further customization options, please visit the official -->
<!--                                 <a target="_blank" href="https://www.chartjs.org/docs/latest/">Chart.js documentation</a> -->
<!--                                 . -->
<!--                             </div> -->
<!--                         </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>
                                Revenue per month
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Books in stock
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
@section("script")
<script>

// Kho
if(@json($saches)){
	var ctx = document.getElementById("myPieChart");
    const groupedData = @json($saches).reduce((agr, item) => {
        let x = (agr[item.parent_id] ??= { parent_name:item.parent_name ,quantity: 0 });
        x.quantity = x.quantity+item.quantity;
        return agr;
    }, {});

    const result = Object.entries(groupedData).reduce((agr, item) => {
        agr.push(item);
        return agr;
    }, []);    
    // mảng danh mục sách
    const bookCategories = result.map((e)=>{
        return e[1].parent_name;
    })
    // mảng số lượng sách mỗi danh mục
    const bookNumbers = result.map((e)=>{
        return e[1].quantity;
    })
    
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    
    // Pie Chart Example
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: bookCategories,
            datasets: [{
                data: bookNumbers,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107'],
            }],
        },
    });
}else {
	ctx.innerHTML = "<h4>Chưa có dữ liệu</h4>"
}

// Doanh thu
if(@json($doanhthus)){
    var myArray = JSON.parse(@json($doanhthus));
	const month = myArray.map((e)=>{
        return `Tháng `+e.month
    })
    const revenue = myArray.map((e)=>{
        if(e.revenue==null){
        	return 0
        }else {
        	return e.revenue
        }
    })
    var ctxBar = document.getElementById("myBarChart");
	var myLineChart = new Chart(ctxBar, {
  		type: 'bar',
  		data: {
    		labels: month,
    		datasets: [{
      			label: "Revenue",
      			backgroundColor: "rgba(2,117,216,1)",
      			borderColor: "rgba(2,117,216,1)",
      			data: revenue,
    		}],
  		},
  		options: {
    		scales: {
      			xAxes: [{
        			time: {
          				unit: 'month'
        			},
        			gridLines: {
          				display: false
        			},
        			ticks: {
          				maxTicksLimit: 12
        			}
      			}],
      			yAxes: [{
        			ticks: {
          				min: 0,
          				max: 1500000,
          				maxTicksLimit: 5
        			},
        			gridLines: {
          				display: true
        			}
      			}],
    		},
    		legend: {
      			display: false
    			}
  			}
		});
    }else {
    
    }
</script>
@endsection