<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }

        .certificate {
            width: 700px;
            height: 500px;
            margin: 50px auto;
            background-color: #fff;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .border-wrapper {
            width: calc(100% + 40px);
            height: calc(100% + 40px);
            position: absolute;
            top: -20px;
            left: -20px;
            background: url('border-pattern.png') repeat;
            box-sizing: border-box;
        }

        .header {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .content {
            padding: 20px;
            font-size: 18px;
        }

        .content p {
            margin: 10px 0;
        }

        .signature {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-family: 'cursive', sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: #3498db;
        }

        .signature .study {
            color: #e67e22;
        }

        .signature .space {
            color: #3498db;
        }

    </style>
</head>
<body>

<div class="certificate">
    <div class="border-wrapper"></div>
    <div class="header">
        <h1>Certificate of Completion</h1>
    </div>
    <div class="content">
        <p>This is to certify that</p>
        <h2 style="color: #3498db;">{{ $certificate->user->firstName .' ' . $certificate->user->lastName }}</h2>
        <p>has successfully completed the course</p>
        <h3 style="color: #3498db;">{{ $certificate -> course -> CourseName }}</h3>
        <p>on <strong>{{ \Carbon\Carbon::parse($certificate->created_at)->format('F j, Y') }}</strong></p>
    </div>
    <div class="signature">
        <span class="study">Study</span> <span class="space">Space</span>
    </div>

</div>

</body>
</html>
