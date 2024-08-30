@extends('frontend.layouts.app')
@section('title') CRICKET247BUZZ @endsection
@section('content')
<!--Main Section-->
<main>
    <div class="container">
        <h5 class="mt-2  text-white p-2"  style="background-color:#2d3387;" >Bet History</h5>
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
                      
                    >
                      <thead>
                        <tr>
                          <th width="" >Bet ID</th>
                          <th width="">Event Name</th>
                          <th width="">Event Type</th>
                          <th width="">Market Type</th>
                          <th width="">Selection</th>
                          <th width="">Bet Type</th>
                          <th width="">Odds</th>
                          <th width="">Stake</th>
                          <th width="">Win/Loss</th>
                          <th width="">Placed Time</th>
                          <th width="">Settled Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr >
                            <td>2011/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>2014/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                        </tr>
                        <tr>
                            <td>2011/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                            <td>6System Architect</td>
                            <td>2014/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                        </tr>
                        <tr>
                            <td>2014/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>2014/04/25</td>  
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>$320,800</td>
                            <td>System Architect</td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr class="data">
                          <th width="" >Bet ID</th>
                          <th width="">Event Name</th>
                          <th width="">Event Type</th>
                          <th width="">Market Type</th>
                          <th width="">Selection</th>
                          <th width="">Bet Type</th>
                          <th width="">Odds</th>
                          <th width="">Stake</th>
                          <th width="">Win/Loss</th>
                          <th width="">Placed Time</th>
                          <th width="">Settled Time</th>
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