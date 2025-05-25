<div class="navbar">
<a href="{{ route('home') }}">home</a>
<a href="{{ route('login') }}">login</a>
<a href="{{ route('register') }}">Registreer</a>
<a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('faq.index') }}">FAQ</a>
</div>


  <style>
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}


.navbar {
  background-color: #2c3e50;
  display: flex;
  justify-content: center;
  padding: 12px 0;
}

.navbar a {
  color: #ecf0f1;
    padding: 10px 20px;
    margin: 0 8px;
    text-decoration: none;
    font-weight: 500;
    border-radius: 6px;
}


.navbar a:hover {
  background-color: #575757;
  color: white;
}

  </style>