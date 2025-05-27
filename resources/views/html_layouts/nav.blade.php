<div class="navbar">
    <a href="{{ route('home') }}">Home</a>

    <a href="{{ route('nieuws.index') }}"> Nieuws</a>


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

<!--alleen zichtbar voor admins-->
    @auth
    @if(Auth::user()->is_admin)
        
<!--NieuwsBERICHT link voor admins alleen-->
        <a href="{{ route('admin.nieuws.create') }}">Nieuwsbericht maken</a>

        <div class="dropdown">
            <button class="dropbtn">FAQ ▾</button>
            <div class="dropdown-menu">
                <a href="{{ route('faq.index') }}">Bekijk FAQ</a>
                <a href="{{ route('faqs.create') }}">Nieuwe FAQ toevoegen</a>
            </div>
        </div>
        @else
        <a href="{{ route('faq.index') }}">Bekijk FAQ</a>
        @endif
        @else
        <a href="{{ route('faq.index') }}">Bekijk FAQ</a>
@endauth

</div>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.navbar {
    background-color:rgb(82, 121, 161);
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
    margin: bottom 5px;;
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
