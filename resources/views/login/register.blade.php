<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Latihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
      }
      .register-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        width: 90%;
        margin: 100px auto 20px;
      }

      .register-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #3B6790;
      }
      
      .register-container label {
        margin-bottom: 8px;
        color: #555555;
        font-weight: 500;
      }
      .register-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 16px;
      }

      .register-container button {
        width: 100%;
        padding: 10px;
        background-color: #3B6790;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
      }
      .register-container button:hover {
        background-color: #23486A;
      }
      .register-container p {
        text-align: center;
        color: #777777;
      }
      .register-container a {
        color: #EFB036;
        text-decoration: none;
      }
      .register-container a:hover {
        text-decoration: underline;
      }
      .form-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;
      }
      .form-row .col {
          flex: 1;
      }
      .form-row .col label {
          display: block;
          margin-bottom: 5px;
      }
      .form-row .col input {
          width: 100%;
          padding: 10px;
          border: 1px solid #cccccc;
          border-radius: 4px;
          font-size: 16px;
      }

      select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        background-color: white;
        font-size: 16px;
    }

    .back-link {
      text-align: center;
      margin-bottom: 20px;
      color: #555555;
    }

    .back-link a {
      color: #3B6790;
      text-decoration: none;
    }

    .back-link a:hover {
      text-decoration: underline;
    }

    .alert {
      margin-bottom: 20px;
    }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col">
                  <label for="role">Pilih Role</label>
                  <select id="role" name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                      <option value="editor">Editor</option>
                  </select>
                  @error('role')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
            </div>
        </div>
        
            <button type="submit">Register</button>
        </form>
        <br>
        <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
    <div class="back-link">
      <p><a href="/">Kembali ke website <i class="fa-solid fa-arrow-right"></i></a></p>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
