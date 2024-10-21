{{-- <div class="container-fluid page-body-wrapper">
<div class="main-panel">
  <div class="content-wrapper">
      <div class="row">
          <div class="col-md-12 grid-margin">
              <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                      <h3 class="font-weight-bold">Welcome to MyPerpus</h3>
                      <h6 class="font-weight-normal mb-0">All collection book is ready to read  <span class="text-primary">3 unread alerts!</span></h6>
                  </div>
                  <div class="col-12 col-xl-4">
                      <div class="justify-content-end d-flex">
                          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                              <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" aria-label="Select date range">
                                  <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                  <a class="dropdown-item" href="#">January - March</a>
                                  <a class="dropdown-item" href="#">March - June</a>
                                  <a class="dropdown-item" href="#">June - August</a>
                                  <a class="dropdown-item" href="#">August - November</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                  <div class="card-people mt-auto">
                      <img src="assets/images/dashboard/people.svg" alt="people">
                      <div class="weather-info">
                          <div class="d-flex">
                              <div>
                                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                              </div>
                              <div class="ms-2">
                                  <h4 class="location font-weight-normal">Chicago</h4>
                                  <h6 class="font-weight-normal">Illinois</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 grid-margin transparent">
              <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-tale">
                          <div class="card-body">
                              <p class="mb-4">Today’s Bookings</p>
                              <p class="fs-30 mb-2">4006</p>
                              <p>10.00% (30 days)</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                      <div class="card card-dark-blue">
                          <div class="card-body">
                              <p class="mb-4">Total Bookings</p>
                              <p class="fs-30 mb-2">61344</p>
                              <p>22.00% (30 days)</p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                      <div class="card card-light-blue">
                          <div class="card-body">
                              <p class="mb-4">Number of Meetings</p>
                              <p class="fs-30 mb-2">34040</p>
                              <p>2.00% (30 days)</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent">
                      <div class="card card-light-danger">
                          <div class="card-body">
                              <p class="mb-4">Number of Clients</p>
                              <p class="fs-30 mb-2">47033</p>
                              <p>0.22% (30 days)</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <p class="card-title">Order Details</p>
                      <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page, or app, etc.</p>
                      <div class="d-flex flex-wrap mb-5">
                          <div class="me-5 mt-3">
                              <p class="text-muted">Order value</p>
                              <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                          </div>
                          <div class="me-5 mt-3">
                              <p class="text-muted">Orders</p>
                              <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                          </div>
                          <div class="me-5 mt-3">
                              <p class="text-muted">Users</p>
                              <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                          </div>
                          <div class="mt-3">
                              <p class="text-muted">Downloads</p>
                              <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                          </div>
                      </div>
                      <canvas id="order-chart"></canvas>
                  </div>
              </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <p class="card-title">Sales Report</p>
                          <a href="#" class="text-info">View all</a>
                      </div>
                      <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page, or app, etc.</p>
                      <div id="sales-chart-legend" class="chartjs-legend mt-4 mb-2"></div>
                      <canvas id="sales-chart"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                  <div class="card-body">
                      <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-bs-ride="carousel">
                          <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <div class="row">
                                      <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                          <div class="ml-xl-4 mt-3">
                                              <p class="card-title">Detailed Reports</p>
                                              <h1 class="text-primary">$34,040</h1>
                                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page, or app, etc.</p>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-xl-9">
                                          <div class="row">
                                              <div class="col-md-6 border-right">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">Illinois</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">713</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Washington</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">581</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">North Carolina</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">420</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Louisiana</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">660</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">Georgia</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">684</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Ohio</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">490</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Michigan</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">564</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Indiana</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">445</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                          <div class="ml-xl-4 mt-3">
                                              <p class="card-title">Detailed Reports</p>
                                              <h1 class="text-primary">$42,340</h1>
                                              <h3 class="font-weight-500 mb-xl-4 text-primary">Europe</h3>
                                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page, or app, etc.</p>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-xl-9">
                                          <div class="row">
                                              <div class="col-md-6 border-right">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">Germany</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">731</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">France</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">610</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Italy</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">420</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Spain</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">810</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">Netherlands</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">684</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Belgium</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">490</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Switzerland</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">564</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Austria</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">445</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <div class="row">
                                      <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                          <div class="ml-xl-4 mt-3">
                                              <p class="card-title">Detailed Reports</p>
                                              <h1 class="text-primary">$15,908</h1>
                                              <h3 class="font-weight-500 mb-xl-4 text-primary">Asia</h3>
                                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page, or app, etc.</p>
                                          </div>
                                      </div>
                                      <div class="col-md-12 col-xl-9">
                                          <div class="row">
                                              <div class="col-md-6 border-right">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">China</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">731</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Japan</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">610</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">India</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">420</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">South Korea</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">810</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                      <table class="table table-borderless report-table">
                                                          <tbody>
                                                              <tr>
                                                                  <td class="text-muted">Singapore</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">684</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Hong Kong</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">490</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Thailand</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">564</h5>
                                                                  </td>
                                                              </tr>
                                                              <tr>
                                                                  <td class="text-muted">Malaysia</td>
                                                                  <td class="w-100 px-0">
                                                                      <div class="progress progress-md mx-4">
                                                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                      </div>
                                                                  </td>
                                                                  <td>
                                                                      <h5 class="font-weight-bold mb-0">445</h5>
                                                                  </td>
                                                              </tr>
                                                          </tbody>
                                                      </table>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                          </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="row">
                      <div class="col-12">
                          <p class="card-title">Average Sessions</p>
                          <h1 class="text-primary">2,340</h1>
                          <p class="mb-2 mb-xl-0">The average number of sessions per region during the specified date range. It indicates the overall engagement and interest levels across different regions.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div> --}}
