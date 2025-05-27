<h2>Wekelijkse Leaderboard </h2>
<div class="LEADER">
<ol>
    @forelse($topUsers as $user)
        <li>{{ $user->naam }} - {{ $user->berichten_count }} berichten</li>
    @empty
        <li>Nog geen activiteit deze week.</li>
    @endforelse
</ol>
</div>

<style>
    h2{
        border-bottom:2px solid red;
        justify-self:center;
    }
    ol li{
        justify-self:center;
        color:white;
    }
    .LEADER{
        border:3px solid black;
        background-color:gray;   
    }
</style>