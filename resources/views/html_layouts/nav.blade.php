<div class="navbar">
    <a href="{{ route('home') }}">Home</a>

    <div class="dropdown">
        <button class="dropbtn">Account ▾</button>
        <div class="dropdown-menu">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a> 
                <a href="{{ route('profile.show', ['username' => auth()->user()->username]) }}">Mijn Profiel</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-menu">Uitloggen</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Registreer</a>
                <a href="{{ route('profile.default') }}">Profiel</a>
            @endauth
        </div>
    </div>

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
    align-items: center;
    padding: 12px 0;
    gap: 16px;
}

.navbar a,
.dropbtn {
    color: #ecf0f1;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: 500;
    border-radius: 6px;
    background: none;
    border: none;
    font-size: 16px;
    cursor: pointer;
}

.navbar a:hover,
.dropbtn:hover {
    background-color: #575757;
}

/* Dropdown container */
.dropdown {
    position: relative;
}

/* Dropdown content */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #34495e; 
}


.dropdown-menu a {
    display: block;
    padding: 12px 16px;
    color: #ecf0f1;
    text-decoration: none;
}

.dropdown-content a:hover {
    background-color: #575757;
}

.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
