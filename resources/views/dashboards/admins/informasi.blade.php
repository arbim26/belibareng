@extends('layouts.admin')

@section('main')

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow text-white border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Monthly Sales</p>
                          <span class="h3 mb-0 text-white">$1250</span>
                          <span class="small text-muted">+5.5%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger">
                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Orders</p>
                          <span class="h3 mb-0">1,869</span>
                          <span class="small text-success">+16.5%</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger">
                            <i class="fe fe-16 fe-filter text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">Conversion</p>
                          <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                              <span class="h3 mr-2 mb-0"> 86.6% </span>
                            </div>
                            <div class="col-md-12 col-lg">
                              <div class="progress progress-sm mt-2" style="height:3px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-danger">
                            <i class="fe fe-16 fe-activity text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col">
                          <p class="small text-muted mb-0">AVG Orders</p>
                          <span class="h3 mb-0">$80</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end section -->

              <?php
 
                $userData = array(
                array("y" => 15, "label" => "January"),
                array("y" => 100, "label" => "Febuary"),
                array("y" => 25, "label" => "March"),
                array("y" =>  5, "label" => "April"),
                array("y" => 10, "label" =>  "May"),
                array("y" =>  0, "label" => "June"),
                array("y" => 20, "label" => "July"),
                array("y" => 15, "label" => "August"),
                array("y" => 30, "label" => "September"),
                array("y" => 25, "label" => "October"),
                array("y" => 45, "label" => "November"),
                array("y" => 30, "label" => "December")
              );
                
              ?>

              <div id="container" style="height: 370px; width: 100%;"></div>
              <script src="https://code.highcharts.com/highcharts.js"></script>

              <script type="text/javascript">
                var userData = <?php echo json_encode($userData)?>;
                Highcharts.chart('container', {
                    title: {
                        text: 'Pendaftar User Belibareng, 2023'
                    },
                    subtitle: {
                        text: 'Source: belibareng.com'
                    },
                    xAxis: {
                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                            'October', 'November', 'December'
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Number of New Users'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'New Users',
                        data: userData
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
              </script>
            
              
              <div class="row align-items-center my-2">
                <div class="col-auto ml-auto">
                  <form class="form-inline">
                    <div class="form-group">
                      <label for="reportrange" class="sr-only">Date Ranges</label>
                      <div id="reportrange" class="px-2 py-2 text-muted">
                        <i class="fe fe-calendar fe-16 mx-2"></i>
                        <span class="small"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-sm"><span class="fe fe-refresh-ccw fe-12 text-muted"></span></button>
                      <button type="button" class="btn btn-sm"><span class="fe fe-filter fe-12 text-muted"></span></button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- charts-->
              <div class="row my-4">
                <div class="col-md-12">
                  <div class="chart-box">
                    <div id="columnChart"></div>
                  </div>
                </div> <!-- .col -->
              </div> <!-- end section -->
              <!-- info small box -->
              <?php
 
                $artikelData = array(
                array("y" => 15, "label" => "January"),
                array("y" => 20, "label" => "Febuary"),
                array("y" => 25, "label" => "March"),
                array("y" =>  5, "label" => "April"),
                array("y" => 10, "label" =>  "May"),
                array("y" =>  0, "label" => "June"),
                array("y" => 20, "label" => "July"),
                array("y" => 15, "label" => "August"),
                array("y" => 30, "label" => "September"),
                array("y" => 25, "label" => "October"),
                array("y" => 45, "label" => "November"),
                array("y" => 30, "label" => "December")
              );
                
              ?>

              <div id="container1" style="height: 370px; width: 100%;"></div>
              <script src="https://code.highcharts.com/highcharts.js"></script>

              <script type="text/javascript">
                var artikelData = <?php echo json_encode($artikelData)?>;
                Highcharts.chart('container1', {
                    title: {
                        text: 'Jumlah Artikel Belibareng, 2023'
                    },
                    subtitle: {
                        text: 'Source: belibareng.com'
                    },
                    xAxis: {
                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                            'October', 'November', 'December'
                        ]
                    },
                    yAxis: {
                        title: {
                            text: 'Number of Artikel'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                        name: 'New Artikel',
                        data: artikelData
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
              </script>
            

        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
@endsection
