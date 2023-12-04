<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form to Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>


    <div class="contaner">
        <div class="row p-2">
            <div class="col-md-6">
                <h1>ADD Assign-Master</h1>

                <!-- Add Form -->
                <form id="myForm" action="" method="POST" class="shadow p-2 bg-info">
                    {{-- <label for="departmentID">DepartmentID:</label>
                    <input type="text" id="departmentID" required> --}}

                    <select id="departmentID">

                        <option selected disabled>select Department ID</option>
                            @foreach ($Alldepartment as $department)
                            <option value="{{ $department['id'] }}">{{ $department['depertmentName'] }}</option>
                            @endforeach
                        
                        
                      </select>

                    <button type="button" id="submitBtn" class="btn btn-sm btn-success">ADD</button>
                </form><br><br>

                <!-- Table form -->
                <form action="{{ route('assignMaster.store') }}" method="POST" class="shadow p-2">
                    @csrf
                    <table id="dataTable" class="table">
                        <thead>
                            <tr>
                                <th>DepartmentID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table content will be dynamically added here -->
                        </tbody>
                    </table>

                    <button type="submit" id="" style="margin-left: 530px;"
                        class="btn btn-primary btn-sm">Submit</button>


                </form>

                <a href="{{ route('checklist.all')}}">checklist</a><br>
                <a href="{{ route('department.all')}}">Department</a><br>
                <a href="{{ route('assignMaster.all')}}">Assign Master</a><br>
                <a href="{{ route('AssignDetails.all')}}">Assign Details</a><br>

            </div>

            <!-- Show data Table -->

            {{-- @php
                dd($Alldatas)
            @endphp --}}



            {{-- Table start --}}
            <div class="col-md-6">
                <h4><a href="{{ route('checklist.editShow') }}">Edit data</a></h4>
                <h1>Show Data</h1>

                <table class="table table-striped shadow p-2">
                    <tr>
                        <th>SL</th>
                        <th>Department Name</th>
                      
                    </tr>

                   
                    {{--  show Data --}}
                    @foreach ($Alldatas as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->departmentID }}</td>
                           
                        </tr>
                    @endforeach



                </table>

            </div>

            {{-- Table end --}}

           


        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#submitBtn").on("click", function() {
                var departmentID = $("#departmentID").val();

                // var remark = $("#remark").val();



                if (departmentID != "") {
                    var newRow = $("<tr>");
                    newRow.append(
                        "<td> <input type='text' style='border:none' id='name'   name ='departmentID[]' value='" +
                            departmentID + "'>   </td>"); //value='" + description + "'
                  
                    $("#dataTable tbody").append(newRow);

                    $("#departmentID").val("");
                    
                }

            });
        });
    </script>

</body>

</html>
