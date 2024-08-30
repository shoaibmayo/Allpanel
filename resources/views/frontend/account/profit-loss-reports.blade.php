@extends('frontend.layouts.app')
@section('title') CRICKET247BUZZ @endsection
@section('content')
 <!--Main Section-->
 <main>
    <div class="container">
        <h5 class="mt-2  text-white p-2"  style="background-color:#2d3387;" >Profit Loss Report</h5>
        <div class="row">
            <div class="col-md-12 mb-3">
              <div class="card">
                <!-- <div class="card-header">
                  <span><i class="bi bi-table me-2"></i></span> Data Table
                </div> -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table
                      id="example"
                      class="table table-striped data-table"
                      style="width: 100%"
                    >
                      <thead>
                        <tr>
                          <th>Event Name</th>
                          <th>Market Name</th>
                          <th>Start Time</th>
                          <th>Settled Time</th>
                          <th>Commission</th>
                          <th>Win/Loss</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>2011/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>61</td>
                            <td>61</td>
                        </tr>
                        <tr>
                            <td>2011/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>61</td>
                            <td>61</td>
                        </tr>
                        <tr>
                            <td>2014/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>61</td>
                            <td>61</td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>Event Name</th>
                            <th>Market Name</th>
                            <th>Start Time</th>
                            <th>Settled Time</th>
                            <th>Commission</th>
                            <th>Win/Loss</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</main>
<!--Main Section-->
@endsection
@section('javascript')
    <script>
    </script>
@endsection