<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Candidates | Simple Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Candidates Dashboard</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-down right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Candidates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit Candidates</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Candidate Information</h3>
                      </div>
                      <div class="card-body">
                        <form id="candidateForm" action="{{ route('candidates.update', $candidate->candidate_id) }}" method="POST">
                          @method('PUT')
                          @csrf
                              <div class="form-group">
                                  <label for="full_name">Full Name</label>
                                  <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value={{ $candidate->full_name }} placeholder="Please enter first name">
                                
                                  @error('full_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value={{ $candidate->email }} placeholder="Please enter email">
                              
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="phone_number">Phone Number</label>
                                  <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value={{ $candidate->phone_number }} placeholder="Please enter phone number">
                                
                                  @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="dob">Date of Birth</label>
                                  <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value={{ $candidate->dob }}>
                              
                                  @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                                </div>
                              <div class="form-group">
                                  <label for="pob">Place of Birth</label>
                                  <input type="text" class="form-control @error('pob') is-invalid @enderror" id="pob" name="pob" placeholder="Please enter place of birth" value={{ $candidate->pob }}>
                              
                                  @error('pob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                                </div>
                              <div class="form-group">
                                  <label for="gender">Gender</label>
                                  <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                    <option value="-">Choose Gender</option>
                                    <option value="M" @if ($candidate->gender == "M") selected @endif>Male</option>
                                    <option value="F" @if ($candidate->gender == "F") selected @endif>Female</option>
                                  </select>
                                  @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                <label for="year_exp">Year Experiences</label>
                                <select class="form-control @error('year_exp') is-invalid @enderror" id="year_exp" name="year_exp">
                                    <option value="-">Choose Year Experiences</option>
                                    <option value="< 1 years" @if ($candidate->year_exp == "< 1 years") selected @endif>< 1 years</option>
                                    <option value="2 - 3 years" @if ($candidate->year_exp == "2 - 3 years") selected @endif>2 - 3 years</option>
                                    <option value="4 - 5 years" @if ($candidate->year_exp == "4 - 5 years") selected @endif>4 - 5 years</option>
                                    <option value="> 5 years" @if ($candidate->year_exp == "> 5 years") selected @endif>> 5 years</option>
                                </select>
                                @error('year_exp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="last_salary">Last Salary</label>
                                  <input type="number" class="form-control @error('last_salary') is-invalid @enderror" id="last_salary" name="last_salary" value={{ $candidate->last_salary }} placeholder="Please enter last salary">
                              
                                  @error('last_salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                  @enderror
                                </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  </div>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>


</body>
</html>
