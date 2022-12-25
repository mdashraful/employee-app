<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'roboto', sans-serif;
        }
        
        @page {
        header: page-header;
        footer: page-footer;
        }
        
        .top {
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <section class="leave_application">
        @php 
            $applided_by = DB::table('employees')
                ->join('companies', 'employees.company_id', '=', 'companies.id')
                ->join('users', 'employees.user_id', '=', 'users.id')
                ->select('employees.id','companies.name','users.name as username')
                ->where('employees.id', '=', $leaveApplication->applied_by)
                ->first();
        @endphp
        <div class="top">
            
            <div>
                <p>To</p>

                <p>Manager,</p>

                <p>{{ $applided_by->name }}</p>

                <p>Subject: {{ $leaveApplication->leave_applied_days }} days {{ $leaveApplication->leaveCategory->name }} application

                <p>Respected Sir/Ma’am,</p>

                <p>I am writing this to inform you that I will be taking leave {{ $leaveApplication->leave_from }} from {{ $leaveApplication->leave_to }}. 
                    {{$leaveApplication->details}}
                    I have finished all my tasks for the day and emailed you with all the details. I will be in touch with my team members if my assistance is required anytime.
                </p>
                Thank you.
                <p>
                Yours Sincerely,
                </p>
                <div>{{ $applided_by->username }}</div>
            </div>
        </div>
    </section>
    
    <htmlpageheader name="page-header">
        <div class="text-center">{PAGENO}</div>
        <br>
        <div class="text-center"><img height="100px" src="image/sufigroup.png" alt=""></div>
        
    </htmlpageheader>
        
    <htmlpagefooter name="page-footer">
        Your Footer Content
    </htmlpagefooter>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
